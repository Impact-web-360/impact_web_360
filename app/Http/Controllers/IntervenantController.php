<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Reseau;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Hash;

class IntervenantController extends Controller
{
    public function index()
    {
        $intervenants = User::where('type', 'intervenant')->get();
        return view('Dashboard.Intervenant.index', compact('intervenants'));
    }

    public function store(Request $request)
    {
        try {
            $data = $request->validate([
                'nom'         => 'required|string',
                'theme'       => 'nullable|string',
                'description' => 'required|string',
                'image'       => 'required|image',
                'reseaux.nom.*'  => 'nullable|string',
                'reseaux.lien.*' => 'nullable|url',
            ]);

            // Traitement image
            if ($request->hasFile('image')) {
                $path = $request->file('image')->store('intervenants', 'public');
                $data['image'] = $path;
            }

            // Dummy email et password
            $data['email'] = 'dummy_' . uniqid() . '@dummy.com';
            $data['password'] = Hash::make('password_dummy');
            $data['type'] = 'intervenant';

            $intervenant = User::create($data);

            // Traitement des réseaux sociaux
            $reseaux = $request->input('reseaux', []);
            foreach ($reseaux['nom'] ?? [] as $index => $nom) {
                $lien = $reseaux['lien'][$index] ?? null;
                if (!empty($nom) && !empty($lien)) {
                    $reseau = Reseau::firstOrCreate(['nom' => $nom]);
                    $intervenant->reseaus()->attach($reseau->id, ['lien' => $lien]);
                }
            }

            return redirect()->back()->with('success', 'Intervenant créé avec succès !');
        } catch (\Throwable $th) {
            Log::error("Erreur création intervenant", ['error' => $th->getMessage()]);
            return redirect()->back()->withErrors('Erreur lors de la création.');
        }
    }

    public function update(Request $request, $id)
    {
        $intervenant = User::findOrFail($id);

        $data = $request->validate([
            'nom'         => 'required|string',
            'theme'       => 'nullable|string',
            'description' => 'required|string',
            'image'       => 'nullable|image',
            'reseaux.nom.*'  => 'nullable|string',
            'reseaux.lien.*' => 'nullable|url',
        ]);

        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('intervenants', 'public');
            $data['image'] = $path;
        }

        $intervenant->update($data);

        // Synchro réseaux sociaux
        $intervenant->reseaus()->detach();
        $reseaux = $request->input('reseaux', []);
        foreach ($reseaux['nom'] ?? [] as $index => $nom) {
            $lien = $reseaux['lien'][$index] ?? null;
            if (!empty($nom) && !empty($lien)) {
                $reseau = Reseau::firstOrCreate(['nom' => $nom]);
                $intervenant->reseaus()->attach($reseau->id, ['lien' => $lien]);
            }
        }

        return redirect()->back()->with('success', 'Intervenant mis à jour !');
    }

    public function destroy($id)
    {
        $intervenant = User::findOrFail($id);
        $intervenant->reseaus()->detach();
        $intervenant->delete();

        return redirect()->back()->with('success', 'Intervenant supprimé.');
    }
}