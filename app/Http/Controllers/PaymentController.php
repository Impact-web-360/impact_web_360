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

}