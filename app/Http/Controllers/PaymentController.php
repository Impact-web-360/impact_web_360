<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use FedaPay\FedaPay;
use FedaPay\Transaction;
use FedaPay\Collection;
use FedaPay\Client;
use Exception;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use App\Models\Formation;
use App\Models\UserFormation;

class PaymentController extends Controller
{
    /**
     * Affiche le formulaire de paiement pour une formation spécifique.
     */
    public function showPaymentForm($formationId)
    {
        $user = Auth::user();

        // Récupérez la formation depuis la base de données
        $formation = Formation::findOrFail($formationId);

        // Vérifiez si l'utilisateur a déjà accès à cette formation avec un statut 'paid'
        if ($user->formations()->where('formation_id', $formation->id)->wherePivot('status', 'paid')->exists()) {
            return redirect()->route('Dashboard_utilisateur.details')->with('info', 'Vous avez déjà acheté cette formation.');
        }

        return view('Dashboard_utilisateur.caisse', [
            'user' => $user,
            'formation' => $formation
        ]);
    }

    /**
     * Traite la requête de paiement via Fedapay.
     */
    public function processPayment(Request $request)
    {
            $request->validate([
                'fedapayNumber' => [
                    'required',
                    'string',
                    'regex:/^(\+[0-9]{8,15}|0[1-9][0-9]{8})$/'
                ],
                'formation_id' => 'required|integer|exists:formations,id',
        ]);


        $user = Auth::user();
        $formationId = $request->input('formation_id');

        $formation = Formation::findOrFail($formationId);

        // Créez ou mettez à jour l'entrée user_formations
        // Nous utilisons UserFormation::updateOrCreate pour gérer les cas où une tentative échouée existe déjà
        $userFormation = UserFormation::updateOrCreate(
            ['user_id' => $user->id, 'formation_id' => $formation->id],
            [
                'status' => 'pending', // Statut initial de la tentative
                'amount_paid' => $formation->price, // Montant attendu
                'paid_at' => null, // Réinitialiser en cas de nouvelle tentative après échec
                'fedapay_transaction_id' => null, // Sera mis à jour après la création de la charge Fedapay ou par le webhook
            ]
        );

        try {
            \FedaPay\FedaPay::setApiKey(env('FEDAPAY_SECRET_KEY'));
            \FedaPay\FedaPay::setEnvironment(env('FEDAPAY_ENV', 'live'));
            // IMPORTANT : 'sandbox' pour les tests, 'live' pour la production

            $phone_number = $request->input('fedapayNumber');
            $amount = (int) $formation->price;
            $description = "Paiement pour la formation : " . $formation->title;

            $transaction = \FedaPay\Transaction::create([
                'amount'        => $amount,
                'description'   => $description,
                'currency'      => 'XOF',
                'callback_url'  => route('fedapay.callback', ['user_formation_id' => $userFormation->id]), // Passe l'ID de notre entrée pivot
                'phone_number'  => $phone_number,
                'customer_email' => $user->email,
                'customer_name' => $user->name,
                'metadata'      => [
                    'user_id' => $user->id,
                    'formation_id' => $formation->id,
                    'user_formation_id' => $userFormation->id, // L'ID de notre entrée pivot est crucial ici
                ],
                
            ]);
            dd($transaction);

            // Mettez à jour l'entrée user_formation avec l'ID de transaction Fedapay
            $userFormation->fedapay_transaction_id = $transaction->id;
            $userFormation->save();

            return redirect()->away($transaction->url);

        } catch (Exception $e) {
            Log::error('Erreur lors du traitement du paiement Fedapay: ' . $e->getMessage(), [
                'user_id' => $user->id,
                'formation_id' => $formation->id,
                'error_file' => $e->getFile(),
                'error_line' => $e->getLine(),
                'trace' => $e->getTraceAsString()
            ]);

            // Marquer la tentative comme échouée en cas d'erreur
            if (isset($userFormation)) {
                $userFormation->status = 'failed';
                $userFormation->save();
            }

            return back()->withInput()->with('error', 'Une erreur est survenue lors du démarrage du paiement : ' . $e->getMessage());
        }
    }

    /**
     * Gère la redirection après le paiement sur Fedapay (callback URL).
     */
    public function handleFedapayCallback(Request $request)
    {
        $status = $request->query('status');
        $fedapayTransactionId = $request->query('transaction_id');
        $userFormationId = $request->query('user_formation_id');

        $userFormation = null;
        if ($userFormationId) {
            $userFormation = UserFormation::find($userFormationId);
        }

        if ($status === 'approved') {
            if ($userFormation) {
                // Si le webhook n'a pas encore traité cela, mettez à jour le statut.
                // Le webhook est la source de vérité pour le statut final.
                if ($userFormation->status === 'pending') {
                    $userFormation->status = 'awaiting_webhook_confirmation'; // Nouveau statut pour indiquer l'attente
                    $userFormation->fedapay_transaction_id = $fedapayTransactionId;
                    $userFormation->save();
                }
            }
            return redirect()->route('Dashboard_utilisateur.paiement.success')->with('success', 'Votre paiement a été initié avec succès. Nous attendons la confirmation finale de Fedapay.');
        } else {
            if ($userFormation) {
                $userFormation->status = 'failed';
                $userFormation->fedapay_transaction_id = $fedapayTransactionId;
                $userFormation->save();
            }
            return redirect()->route('Dashboard_utilisateur.paiement.failure')->with('error', 'Le paiement a été annulé ou a échoué. Veuillez réessayer.');
        }
    }

    /**
     * Gère les événements webhook de Fedapay.
     */
    public function handleWebhook(Request $request)
    {
        \FedaPay\FedaPay::setApiKey(config('services.fedapay.secret_key'));
        $input = $request->getContent();
        $signature = $request->header('X-FedaPay-Signature');

        try {
            // *TRÈS IMPORTANT :* Décommentez et assurez-vous que votre FEDAPAY_WEBHOOK_SECRET est défini
            $event = Collection::verifyEvent($input, $signature, config('services.fedapay.webhook_secret'));

            // Pour le développement/débogage, vous pouvez temporairement décoder directement SI VOUS ÊTES CERTAIN DE LA SOURCE.
            // $event = json_decode($input, true);
            Log::info('Webhook Fedapay reçu:', $event);

            if (isset($event['event'])) {
                $transaction = $event['resource'];
                $fedapayTransactionId = $transaction['id'];
                // Récupérez les IDs depuis les métadonnées que nous avons envoyées
                $userId = $transaction['metadata']['user_id'] ?? null;
                $formationId = $transaction['metadata']['formation_id'] ?? null;
                $userFormationId = $transaction['metadata']['user_formation_id'] ?? null;
                $autoRenewal = $transaction['metadata']['auto_renewal'] ?? false;
                $amountPaid = $transaction['amount'];

                // Trouvez l'entrée UserFormation via son ID de la table pivot
                $userFormation = null;
                if ($userFormationId) {
                    $userFormation = UserFormation::find($userFormationId);
                }

                // Fallback si user_formation_id n'était pas dans les metadata ou si l'entrée n'est pas trouvée
                // Cela peut arriver si les metadata étaient corrompues ou si l'entrée a été supprimée accidentellement.
                // Dans un cas réel, vous devriez gérer ces scénarios d'erreur plus robustement.
                if (!$userFormation && $userId && $formationId) {
                    $userFormation = UserFormation::where('user_id', $userId)
                                                    ->where('formation_id', $formationId)
                                                    ->first();
                }


                switch ($event['event']) {
                    case 'transaction.succeeded':
                        Log::info('Transaction réussie via webhook:', $transaction);
                        if ($userFormation) {
                            // Mettez à jour seulement si ce n'est pas déjà payé pour éviter les doublons ou conflits
                            if ($userFormation->status !== 'paid') {
                                $userFormation->status = 'paid';
                                $userFormation->paid_at = now();
                                $userFormation->amount_paid = $amountPaid;
                                $userFormation->fedapay_transaction_id = $fedapayTransactionId;
                                $userFormation->auto_renewal_enabled = $autoRenewal;
                                $userFormation->save();

                                Log::info("Accès à la formation {$formationId} accordé à l'utilisateur {$userId} via webhook (Transaction ID: {$fedapayTransactionId}).");
                                // Ici, vous pouvez déclencher des actions post-paiement :
                                // - Envoyer un email de confirmation à l'utilisateur
                                // - Notifier l'administrateur
                                // - Déclencher des événements Laravel pour d'autres logiques
                            } else {
                                Log::info("Webhook: Transaction déjà marquée comme payée. Aucune action requise.", ['fedapay_transaction_id' => $fedapayTransactionId]);
                            }
                        } else {
                            Log::error('Webhook: Entrée user_formation non trouvée ou incohérence pour une transaction réussie.', [
                                'fedapay_transaction_id' => $fedapayTransactionId,
                                'metadata' => $transaction['metadata']
                            ]);
                            // Cas d'erreur : le paiement a réussi mais nous n'avons pas pu trouver l'entrée correspondante.
                            // Vous devriez loguer ceci et potentiellement avoir un processus manuel pour le réconcilier.
                        }
                        break;

                    case 'transaction.failed':
                        Log::warning('Transaction échouée via webhook:', $transaction);
                        if ($userFormation) {
                            $userFormation->status = 'failed';
                            $userFormation->fedapay_transaction_id = $fedapayTransactionId;
                            $userFormation->save();
                            Log::info("Paiement de la formation {$formationId} échoué pour l'utilisateur {$userId} via webhook (Transaction ID: {$fedapayTransactionId}).");
                        }
                        break;

                    case 'transaction.pending':
                        Log::info('Transaction en attente via webhook:', $transaction);
                        if ($userFormation && $userFormation->status !== 'paid') { // Ne pas écraser 'paid'
                            $userFormation->status = 'pending';
                            $userFormation->fedapay_transaction_id = $fedapayTransactionId;
                            $userFormation->save();
                            Log::info("Paiement de la formation {$formationId} en attente pour l'utilisateur {$userId} via webhook (Transaction ID: {$fedapayTransactionId}).");
                        }
                        break;

                    // Ajoutez d'autres cas si nécessaire (e.g., 'transaction.canceled', 'transaction.refunded')
                    default:
                        Log::info('Événement Fedapay non géré via webhook:', ['event_type' => $event['event'], 'transaction_id' => $fedapayTransactionId]);
                        break;
                }
            }

            return response()->json(['status' => 'success'], 200);

        } catch (\FedaPay\Error\InvalidRequest $e) {
            Log::error('Erreur de signature du webhook Fedapay ou requête invalide: ' . $e->getMessage());
            return response()->json(['status' => 'error', 'message' => 'Invalid webhook signature or request'], 400);
        } catch (Exception $e) {
            Log::error('Erreur lors du traitement du webhook Fedapay: ' . $e->getMessage(), [
                'error_message' => $e->getMessage(),
                'error_file' => $e->getFile(),
                'error_line' => $e->getLine(),
                'trace' => $e->getTraceAsString(),
                'request_body' => $input
            ]);
            return response()->json(['status' => 'error', 'message' => 'Internal Server Error'], 500);
        }
    }

    /**
     * Page de succès de paiement.
     */
    public function showPaymentSuccess()
    {
        return view('Dashboard_utilisateur.paiement_success');
    }

    /**
     * Page d'échec de paiement.
     */
    public function showPaymentFailure()
    {
        return view('Dashboard_utilisateur.paiement_failure');
    }
}