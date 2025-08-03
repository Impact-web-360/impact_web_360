<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Reseau;
use App\Models\user_evenement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Hash;

class IntervenantController extends Controller
{
    public function index()
    {
        $intervenants = User::where('type', 'intervenant')->get();
        return view('Dashboard.Intervenants.index', compact('intervenants'));
    }

    public function store(Request $request)
    {
        try {
            $data = $request->validate([
                'nom'          => 'required|string',
                'theme'        => 'nullable|string',
                'description'  => 'required|string',
                'image'        => 'nullable|image',
                'evenement_id' => 'required|exists:evenements,id',
            ]);

            // Traitement image
            if ($request->hasFile('image')) {
                $path = $request->file('image')->store('intervenants', 'public');
                $data['image'] = $path;
            }

            // Données obligatoires pour User
            $data['email'] = 'dummy_' . uniqid() . '@dummy.com';
            $data['password'] = Hash::make('password_dummy');
            $data['type'] = 'intervenant';

            $intervenant = User::create($data);

            // Lier l'intervenant à un événement
            user_evenement::create([
                'id_intervenant' => $intervenant->id,
                'id_evenement'   => $data['evenement_id'],
            ]);

            return redirect()->back()->with('success', 'Intervenant créé avec succès !');

        } catch (\Throwable $th) {
            Log::error("Erreur création intervenant", ['error' => $th->getMessage()]);
            return redirect()->back()->withErrors(['error' => 'Erreur lors de la création.']);
        }
    }

    public function update(Request $request, $id)
    {
        try {
            $intervenant = User::findOrFail($id);

            $data = $request->validate([
                'nom'          => 'required|string',
                'theme'        => 'nullable|string',
                'description'  => 'required|string',
                'image'        => 'nullable|image',
                'evenement_id' => 'required|exists:evenements,id',
            ]);

            if ($request->hasFile('image')) {
                $path = $request->file('image')->store('intervenants', 'public');
                $data['image'] = $path;
            }

            $intervenant->update($data);

            // Mettre à jour la relation événement
            user_evenement::updateOrCreate(
                ['id_intervenant' => $intervenant->id],
                ['id_evenement' => $data['evenement_id']]
            );

            return redirect()->back()->with('success', 'Intervenant mis à jour !');

        } catch (\Throwable $th) {
            Log::error("Erreur mise à jour intervenant", ['error' => $th->getMessage()]);
            return redirect()->back()->withErrors(['error' => 'Erreur lors de la mise à jour.']);
        }
    }

    public function destroy($id)
    {
        try {
            $intervenant = User::findOrFail($id);

            // Supprimer la liaison avec événement
            user_evenement::where('id_intervenant', $id)->delete();

            $intervenant->delete();

            return redirect()->back()->with('success', 'Intervenant supprimé.');

        } catch (\Throwable $th) {
            Log::error("Erreur suppression intervenant", ['error' => $th->getMessage()]);
            return redirect()->back()->withErrors(['error' => 'Erreur lors de la suppression.']);
        }
    }
}
