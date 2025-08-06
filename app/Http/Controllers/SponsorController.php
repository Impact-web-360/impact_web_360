<?php

namespace App\Http\Controllers;

use App\Models\Sponsor;
use App\Models\sponsor_evenement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class SponsorController extends Controller
{
    public function index()
    {
        $sponsors = Sponsor::all();
        return view('Dashboard.Sponsor.index', compact('sponsors'));
    }

    public function store(Request $request)
    {
        try {
            $data = $request->validate([
                'nom' => 'required|string',
                'promoteur' => 'required|string',
                'description' => 'required|string',
                'logo' => 'required|image',
                'evenement_id' => 'required|exists:evenements,id',
            ]);

            if ($request->hasFile('logo')) {
                $path = $request->file('logo')->store('sponsors', 'public');
                $data['logo'] = $path;
            }

          $sponsor=Sponsor::create($data);

            sponsor_evenement::create([
                'id_sponsor' => $sponsor->id,
                'id_evenement' => $data['evenement_id'],
            ]);


            return redirect()->back()->with('success', 'Sponsor créé !');
        } catch (\Throwable $th) {
            Log::error("Erreur lors de l'ajout d'un sponsor", ['message' => $th->getMessage()]);
            return redirect()->back()->withErrors('Une erreur est survenue.');
        }
    }

    public function update(Request $request, $id)
    {
        $sponsor = Sponsor::findOrFail($id);

        $data = $request->validate([
            'nom' => 'required|string',
            'promoteur' => 'required|string',
            'description' => 'required|string',
            'logo' => 'nullable|image',
            'evenement_id' => 'required|exists:evenements,id',
        ]);

        if ($request->hasFile('logo')) {
            $path = $request->file('logo')->store('sponsors', 'public');
            $data['logo'] = $path;
        }

        $sponsor->update($data);

        return redirect()->back()->with('success', 'Sponsor modifié avec succès !');
    }

    public function destroy($id)
    {
        $sponsor = Sponsor::findOrFail($id);
        $sponsor->delete();

        return redirect()->back()->with('success', 'Sponsor supprimé avec succès !');
    }

    public function vue_sponsor()
    {
        $sponsors = Sponsor::all();
        return view('vue_sponsor', compact('sponsors'));
    }
}