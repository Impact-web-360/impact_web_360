<?php

namespace App\Http\Controllers;

use App\Models\CodePromo;
use App\Models\Ticket;
use Illuminate\Http\Request;

class TicketController extends Controller
{
    // Étape 1: Formulaire personnel
    public function step1()
    {
        $step1 = session('step1');
        return view('step1', compact('step1'));
    }

    public function postStep1(Request $request)
    {
        $data = $request->validate([
            'prenom' => 'required',
            'nom' => 'required',
            'pays' => 'required',
            'ville' => 'required',
            'telephone' => 'required',
            'email' => 'required|email',
        ]);

        session(['step1' => $data]);
        return redirect()->route('step2');
    }

    // Étape 2: Catégorie
    public function step2()
    {
        $step2 = session('step2');
        return view('step2', compact('step2'));
    }

    public function postStep2(Request $request)
    {
        $data = $request->validate([
            'categorie' => 'required|in:VIP,Etudiant,Participant'
        ]);

        session(['step2' => $data]);
        return redirect()->route('step3');
    }

    // Étape 3: Récapitulatif
    public function step3()
    {
        $step1 = session('step1');
        $step2 = session('step2');
        $reduction = session('reduction');

        return view('step3', compact('step1', 'step2', 'reduction'));
    }

    // 🆕 Valider code promo en AJAX
    public function validerCodePromo(Request $request)
    {
        $code = $request->input('code');
        $categorie = session('step2.categorie');

        if (!$categorie) {
            return response()->json(['success' => false, 'message' => 'Catégorie non sélectionnée']);
        }

        // Utiliser la méthode statique pour obtenir le prix
        $prixInitial = \App\Models\PrixCategorie::getPrixParCategorie($categorie);

        $promo = CodePromo::where('code', $code)
            ->where('actif', true)
            ->where(function ($query) {
                $query->whereNull('expiration')
                      ->orWhere('expiration', '>', now());
            })
            ->first();

        if (!$promo) {
            return response()->json(['success' => false, 'message' => 'Code promo invalide ou expiré.']);
        }

        $reduction = $promo->reduction;
        $prixReduit = $prixInitial - ($prixInitial * $reduction / 100);

        // Stocker la réduction
        session(['reduction' => [
            'code' => $code,
            'pourcentage' => $reduction,
            'prix_final' => $prixReduit
        ]]);

        return response()->json([
            'success' => true,
            'reduction' => $reduction,
            'prix' => $prixReduit
        ]);
    }

    // Enregistrement final
    public function store(Request $request)
    {
        $data = array_merge(
            session('step1'),
            session('step2')
        );

        // Utiliser la méthode statique pour obtenir le prix
        $prix = \App\Models\PrixCategorie::getPrixParCategorie($data['categorie']);

        // Si une réduction a déjà été enregistrée via session
        $reduction = session('reduction');
        if ($reduction) {
            $data['promo_code'] = $reduction['code'];
            $prix = $reduction['prix_final'];
        }

        // Ajouter le prix aux données
        $data['prix'] = $prix;

        Ticket::create($data);

        session()->forget(['step1', 'step2', 'reduction']);

        return redirect()->route('tickets.index')->with('success', 'Réservation confirmée!');
    }

    // CRUD standard
    public function index()
    {
        $tickets = Ticket::all();
        return view('Dashboard.Ticket.index', compact('tickets'));
    }

    public function edit(Ticket $ticket)
    {
        return view('tickets.edit', compact('ticket'));
    }

    public function update(Request $request, Ticket $ticket)
    {
        $ticket->update($request->all());
        return redirect()->route('tickets.index');
    }

    public function destroy(Ticket $ticket)
    {
        $ticket->delete();
        return redirect()->route('tickets.index')->with('success', 'Ticket supprimé avec succès!');
    }
}