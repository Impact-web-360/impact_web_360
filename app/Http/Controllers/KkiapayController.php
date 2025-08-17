<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Kkiapay\Kkiapay;

class KkiapayController extends Controller
{
    public function callback(Request $request)
    {
        $transactionId = $request->transactionId;

        $kkiapay = new Kkiapay(
            config('services.kkiapay.public'),
            config('services.kkiapay.private'),
            config('services.kkiapay.secret'),
            config('services.kkiapay.mode') === 'sandbox'
        );

        $transaction = $kkiapay->verifyTransaction($transactionId);

        if (isset($transaction->status) && $transaction->status === 'SUCCESS') {
            // Paiement validé → enregistrer en base, etc.
            return response()->json(['status' => 'success', 'amount' => $transaction->amount]);
        } else {
            return response()->json(['status' => 'failed']);
        }
    }
}
