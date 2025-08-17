<?php

namespace App\Http\Controllers;

use App\Models\CodePromo;
use App\Models\Ticket;
use App\Models\Evenement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class TicketController extends Controller
{
    /**
     * Étape 1: Afficher le formulaire d'informations personnelles.
     * @param int $evenementId L'ID de l'événement.
     */
    public function step1($evenementId)
    {
        $evenement = Evenement::findOrFail($evenementId);
        $step1 = session('step1');

        $countries = [
            'BJ' => 'Bénin',
            'TG' => 'Togo',
            'CI' => 'Côte d\'Ivoire',
            'SN' => 'Sénégal',
            'CM' => 'Cameroun',
            'FR' => 'France',
            'US' => 'États-Unis',
            'CA' => 'Canada',
        ];

        $dialCodes = [
            'BJ' => '+229',
            'TG' => '+228',
            'CI' => '+225',
            'SN' => '+221',
            'CM' => '+237',
            'FR' => '+33',
            'US' => '+1',
            'CA' => '+1',
        ];
        
        // L'ID est passé à la vue
        return view('step1', compact('step1', 'evenementId', 'countries', 'dialCodes','evenement'));
    }

    /**
     * Étape 1: Traiter le formulaire et rediriger vers l'étape 2.
     * @param \Illuminate\Http\Request $request
     * @param int $evenementId L'ID de l'événement.
     */
    public function postStep1(Request $request, $evenementId)
    {
        $data = $request->validate([
            'prenom' => 'required|string|max:255',
            'nom' => 'required|string|max:255',
            'pays' => 'required|string|max:255',
            'ville' => 'required|string|max:255',
            'telephone' => 'required|string|max:20',
            'email' => 'required|email|max:255',
        ]);
        
        session(['step1' => $data]);
        
        // Redirection vers step2 en conservant l'ID de l'événement
        return redirect()->route('step2', ['evenementId' => $evenementId]);
    }

    /**
     * Étape 2: Afficher la page de sélection de billet.
     * @param int $evenementId L'ID de l'événement.
     */
    public function step2($evenementId)
    {
        // On récupère l'objet Evenement pour accéder à ses prix
        $evenement = Evenement::findOrFail($evenementId);
        
        $step2 = session('step2');

        // On passe l'objet Evenement à la vue pour afficher les prix
        return view('step2', compact('evenement', 'step2'));
    }

    /**
     * Étape 2: Traiter la sélection de catégorie et le prix.
     * @param \Illuminate\Http\Request $request
     * @param int $evenementId L'ID de l'événement.
     */
    public function postStep2(Request $request, $evenementId)
    {
        $data = $request->validate([
            'categorie' => 'required|in:Standard,VIP,Premium'
        ]);

        $evenement = Evenement::findOrFail($evenementId);

        switch ($data['categorie']) {
            case 'Standard':
                $prix = $evenement->prix_standard;
                break;
            case 'VIP':
                $prix = $evenement->prix_vip;
                break;
            case 'Premium':
                $prix = $evenement->prix_premium;
                break;
            default:
                $prix = 0;
                break;
        }

        $data['prix'] = $prix;
        
        session(['step2' => $data]);

        // Redirection vers l'étape 3
        return redirect()->route('step3', ['evenementId' => $evenementId]);
    }

    /**
     * Étape 3: Confirmation.
     * @param int $evenementId L'ID de l'événement.
     */
    public function step3($evenementId)
    {
        $step1 = session('step1');
        $step2 = session('step2');

        // On récupère l'objet Evenement pour l'envoyer à la vue
        $evenement = Evenement::findOrFail($evenementId);

        if (!isset($step1) || !isset($step2)) {
            return redirect()->route('step1', ['evenementId' => $evenementId]);
        }

        // On passe l'objet Evenement à la vue
        return view('step3', compact('step1', 'step2', 'evenement'));
    }

    /**
     * Étape 3: Traiter la confirmation et rediriger vers le paiement.
     */
    public function postStep3(Request $request)
    {
        // Traitez la logique de création du billet et de paiement
        // ...

        // Redirigez vers la page de paiement ou une page de succès
        return redirect()->route('paiement');
    }
}