<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Payment;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class CheckMoneroPayments extends Command
{
    /**
     * Le nom et la signature de la commande Artisan.
     *
     * @var string
     */
    protected $signature = 'monero:check-payments';

    /**
     * La description de la commande Artisan.
     *
     * @var string
     */
    protected $description = 'Vérifie les paiements Monero en attente et les valide s\'ils sont reçus.';

    /**
     * Exécute la commande console.
     *
     * @return int
     */
    public function handle()
    {
        $this->info('Début de la vérification des paiements Monero...');

        // 1. Récupérer tous les paiements en attente qui ne sont pas expirés
        $pendingPayments = Payment::where('status', 'pending')
            ->where('expires_at', '>', now())
            ->get();

        if ($pendingPayments->isEmpty()) {
            $this->info('Aucun paiement en attente à vérifier.');
            return 0;
        }

        foreach ($pendingPayments as $payment) {
            $this->info("Vérification du paiement ID: {$payment->id}...");

            // 2. Appeler l'API Monero pour vérifier la transaction
            try {
                $response = Http::timeout(60)->post('pvk_fd1mp9|01K1H67XKRVTZXWEY04RYDT8EG', [
                    'jsonrpc' => '2.0',
                    'id' => '0',
                    'method' => 'get_transfers',
                    'params' => [
                        'in' => true,
                        'account_index' => 0, // Assurez-vous que c'est le même index de compte que celui utilisé pour créer l'adresse
                        'pending' => true,
                    ]
                ]);

                if ($response->successful()) {
                    $result = $response->json();
                    
                    // La réponse contient 'in' qui sont les paiements entrants. On va filtrer.
                    if (isset($result['result']['in'])) {
                        foreach ($result['result']['in'] as $transfer) {
                            // On vérifie si l'ID de paiement correspond et si le montant est suffisant
                            if ($transfer['payment_id'] === $payment->monero_payment_id && $transfer['amount'] >= $payment->amount_monero) {
                                // 3. Le paiement a été trouvé et validé
                                $payment->status = 'paid';
                                $payment->tx_hash = $transfer['tx_hash'];
                                $payment->save();
                                $this->info("Paiement ID {$payment->id} validé !");

                                // 4. Mettre à jour l'accès de l'utilisateur à la formation
                                // Par exemple, en ajoutant une ligne dans une table 'user_formations'
                                $payment->user->formations()->attach($payment->formation_id);

                                // Vous pouvez également envoyer un e-mail de confirmation
                                // Mail::to($payment->user->email)->send(new PaymentConfirmed($payment));
                                
                                // Arrêter la boucle une fois le paiement trouvé
                                continue 2; 
                            }
                        }
                    }
                } else {
                    Log::error("Échec de la requête RPC pour le paiement {$payment->id}.");
                }
            } catch (\Exception $e) {
                Log::error("Erreur de connexion RPC pour le paiement {$payment->id}: " . $e->getMessage());
            }

            // Vérifier si un paiement a expiré pendant la vérification
            if (now()->greaterThan($payment->expires_at)) {
                $payment->status = 'expired';
                $payment->save();
                $this->info("Paiement ID {$payment->id} a expiré.");
            }
        }

        $this->info('Vérification terminée.');
        return 0;
    }
}