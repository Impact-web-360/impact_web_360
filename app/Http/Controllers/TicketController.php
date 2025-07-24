<?php

namespace App\Http\Controllers;

use App\Models\Ticket;
use Illuminate\Http\Request;

class TicketController extends Controller
{
    // Étape 1: Formulaire personnel
    public function step1()
    {
        $step1 = session('step1'); // On récupère les anciennes données s'il y en a
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

    // Étape 2: Sélection catégorie
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

    // Étape 3: Récapitulatif + Validation
    public function step3()
    {
        $step1 = session('step1');
        $step2 = session('step2');

        return view('step3', compact('step1', 'step2'));
    }

    public function store(Request $request)
    {
        $data = array_merge(
            session('step1'),
            session('step2')
        );

        Ticket::create($data);

        session()->forget(['step1', 'step2']);

        return redirect()->route('tickets.index')->with('success', 'Réservation confirmée!');
    }

    // CRUD
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
        return redirect()->route('Dashboard.Ticket.index')->with('success', 'Ticket supprimé avec succès!');
    }
}