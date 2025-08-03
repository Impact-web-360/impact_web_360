<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use App\Models\Formation;
use App\Models\Payment;

class PaymentController extends Controller
{
    /**
     * Affiche la page de caisse
     */
    public function showPaymentForm($formationId)
    {
        $formation = Formation::findOrFail($formationId);
        $user = Auth::user();

        return view('Dashboard_utilisateur.caisse', compact('formation', 'user'));
    }

    /**
     * Crée un paiement Monero via ton API
     */
    public function createMoneroPayment($formationId)
    {
        $formation = Formation::findOrFail($formationId);
        $user = Auth::user();

        if ($formation->price <= 0) {
            return redirect()->route('formation_gratuite', ['formationId' => $formation->id]);
        }

        // Conversion FCFA → XMR (taux à récupérer depuis une API réelle)
        $rate = $this->getMoneroExchangeRate();
        $amountXMR = round($formation->price / $rate, 8);

        try {
            $response = Http::withHeaders([
                'Authorization' => 'Bearer ' . env('MONERO_API_KEY'),
                'Accept' => 'application/json'
            ])->post(env('MONERO_API_URL') . '/create_payment', [
                'amount' => $amountXMR,
                'currency' => 'XMR',
                'metadata' => [
                    'user_id' => $user->id,
                    'formation_id' => $formation->id
                ]
            ]);

            $data = $response->json();

            if (!$response->successful() || !isset($data['address'], $data['payment_id'])) {
                Log::error('Erreur API Monero : ' . json_encode($data));
                return back()->with('error', 'Impossible de générer une adresse de paiement.');
            }

            // Enregistrer dans la table payments
            $payment = Payment::create([
                'user_id' => $user->id,
                'formation_id' => $formation->id,
                'amount_xof' => $formation->price,
                'amount_monero' => $amountXMR,
                'monero_address' => $data['address'],
                'monero_payment_id' => $data['payment_id'],
                'status' => 'pending',
                'expires_at' => now()->addHour(),
            ]);

            // Générer un QR code
            $qrCodeUrl = 'https://api.qrserver.com/v1/create-qr-code/?size=200x200&data=monero:' . $data['address'] . '?tx_amount=' . $amountXMR;

            return view('Dashboard_utilisateur.monero', [
                'formation' => $formation,
                'payment' => $payment,
                'qr_code_url' => $qrCodeUrl,
                'userTheme' => $user->theme ?? 'dark',
            ]);

        } catch (\Exception $e) {
            Log::error('Erreur connexion API Monero : ' . $e->getMessage());
            return back()->with('error', 'Erreur de connexion à l’API Monero.');
        }
    }

    /**
     * Vérifie le statut d’un paiement
     */
    public function checkPaymentStatus($paymentId)
    {
        $payment = Payment::findOrFail($paymentId);

        try {
            $response = Http::withHeaders([
                'Authorization' => 'Bearer ' . env('MONERO_API_KEY'),
                'Accept' => 'application/json'
            ])->get(env('MONERO_API_URL') . '/payment_status/' . $payment->monero_payment_id);

            $data = $response->json();

            if ($response->successful() && isset($data['status'])) {
                $payment->status = $data['status'];
                $payment->save();
            }

            return response()->json(['status' => $payment->status]);

        } catch (\Exception $e) {
            Log::error('Erreur API Monero (check status) : ' . $e->getMessage());
            return response()->json(['status' => 'error']);
        }
    }

    /**
     * Exemple simplifié de récupération du taux de change
     */
    protected function getMoneroExchangeRate()
    {
        try {
            $response = Http::get('https://api.coingecko.com/api/v3/simple/price', [
                'ids' => 'monero',
                'vs_currencies' => 'xof'
            ]);

            $data = $response->json();
            return $data['monero']['xof'] ?? 60000; // valeur par défaut 1 XMR = 60000 FCFA

        } catch (\Exception $e) {
            Log::error('Erreur récupération taux Monero : ' . $e->getMessage());
            return 60000;
        }
    }

    public function paiement1($status = null)
    {
        $user = Auth::user();

        $query = Payment::where('user_id', $user->id)
            ->with('formation')
            ->orderBy('created_at', 'desc');

        // On filtre seulement si $status est valide
        if ($status && in_array($status, ['pending', 'paid', 'failed'])) {
            $query->where('status', $status);
        } else {
            $status = null; // Forcer la valeur à null si aucun filtre valide
        }

        $Payments = $query->get();

        return view('Dashboard_utilisateur.paiement1', [
            'user' => $user,
            'Payments' => $Payments,
            'status' => $status // On passe toujours le status à la vue
        ]);
    }

}
