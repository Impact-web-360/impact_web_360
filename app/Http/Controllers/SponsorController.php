<?php

namespace App\Http\Controllers;

use App\Models\Sponsor;
use App\Models\Evenement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SponsorController extends Controller
{
    /**
     * Affiche la liste des sponsors avec la possibilité d'ajouter, modifier et supprimer.
     */
    public function index()
    {
        $sponsors = Sponsor::with('evenement')->get();
        $evenements = Evenement::all();
        return view('Dashboard.Sponsor.index', compact('sponsors', 'evenements'));
    }

    /**
     * Stocke un nouveau sponsor dans la base de données.
     */
    public function store(Request $request)
    {
        $request->validate([
            'evenement_id' => 'required|exists:evenements,id',
            'nom' => 'required|string|max:255',
            'promoteur' => 'required|string|max:255',
            'description' => 'required|string',
            'logo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $path = $request->file('logo')->store('sponsors', 'public');

        Sponsor::create([
            'evenement_id' => $request->evenement_id,
            'nom' => $request->nom,
            'promoteur' => $request->promoteur,
            'description' => $request->description,
            'logo' => $path,
        ]);

        return redirect()->route('sponsors.index')->with('success', 'Sponsor ajouté avec succès.');
    }

    /**
     * Affiche le formulaire de modification d'un sponsor.
     */
    public function edit(Sponsor $sponsor)
    {
        $evenements = Evenement::all();
        return view('Dashboard.Sponsor.edit', compact('sponsor', 'evenements'));
    }

    /**
     * Met à jour un sponsor existant.
     */
    public function update(Request $request, Sponsor $sponsor)
    {
        $request->validate([
            'evenement_id' => 'required|exists:evenements,id',
            'nom' => 'required|string|max:255',
            'promoteur' => 'required|string|max:255',
            'description' => 'required|string',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if ($request->hasFile('logo')) {
            if ($sponsor->logo) {
                Storage::disk('public')->delete($sponsor->logo);
            }
            $path = $request->file('logo')->store('sponsors', 'public');
            $sponsor->logo = $path;
        }

        $sponsor->evenement_id = $request->evenement_id;
        $sponsor->nom = $request->nom;
        $sponsor->promoteur = $request->promoteur;
        $sponsor->description = $request->description;
        $sponsor->save();

        return redirect()->route('sponsors.index')->with('success', 'Sponsor mis à jour avec succès.');
    }

    /**
     * Supprime un sponsor.
     */
    public function destroy(Sponsor $sponsor)
    {
        if ($sponsor->logo) {
            Storage::disk('public')->delete($sponsor->logo);
        }
        $sponsor->delete();

        return redirect()->route('sponsors.index')->with('success', 'Sponsor supprimé avec succès.');
    }

    public function showPublic()
    {
        // Récupère TOUS les sponsors pour la page publique
        $sponsors = Sponsor::all();

        // Retourne la vue 'sponsor.blade.php'
        return view('sponsor', compact('sponsors'));
    }
}