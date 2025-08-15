<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Models\Evenement;
use App\Models\Intervenant;
use Illuminate\Support\Facades\Storage;

class IntervenantController extends Controller
{
public function store(Request $request)
{
    try {
        $data = $request->validate([
            'evenement_id' => 'required|exists:evenements,id',
            'nom'          => 'required|string|max:255',
            'fonction'     => 'required|string|max:255',
            'biographie'   => 'required|string',
            'theme'        => 'nullable|string|max:255',
            'image'        => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'whatsapp'     => 'nullable|url',
            'facebook'     => 'nullable|url',
            'instagram'    => 'nullable|url',
            'tiktok'       => 'nullable|url',
            'linkedln'     => 'nullable|url',
            'snapchat'     => 'nullable|url',
            'x'            => 'nullable|url',
        ]);

        Log::info('Données validées:', $data);

        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('intervenants', 'public');
            if (!$path) {
                Log::error("Échec du stockage de l'image");
                throw new \Exception("Échec du stockage de l'image");
            }
            $data['image'] = $path;
            Log::info('Image stockée:', ['path' => $path]);
        }

        $data['email'] = 'dummy_' . uniqid() . '@dummy.com';
        $data['password'] = Hash::make('password_dummy');
        $data['type'] = 'intervenant';

        $intervenant = User::create($data);
        Log::info('Intervenant créé:', $intervenant->toArray());

        $relation = UserEvenement::create([
            'id_user' => $intervenant->id,
            'id_evenement'   => $data['evenement_id'],
        ]);
        Log::info('Relation créée:', $relation->toArray());

        return redirect()->back()->with('success', 'Intervenant créé avec succès !');

    } catch (\Throwable $th) {
        Log::error("Erreur création intervenant", [
            'error' => $th->getMessage(),
            'trace' => $th->getTraceAsString()
        ]);
        return redirect()->back()
            ->withInput()
            ->withErrors(['error' => 'Erreur lors de la création: ' . $th->getMessage()]);
    }
}

    public function index()
    {
        $intervenants = Intervenant::with('evenement')->get();
        return view('intervenant', compact('intervenants'));
    }
    /**
     * Affiche la liste des intervenants pour l'administration.
     */
    public function add()
    {
        $intervenants = Intervenant::with('evenement')->get();
        return view('Dashboard.intervenants.index', compact('intervenants'));
    }

    /**
     * Affiche le formulaire de modification d'un intervenant.
     */
    public function edit(Intervenant $intervenant)
    {
        $evenements = Evenement::all();
        return view('Dashboard.intervenants.edit', compact('intervenant', 'evenements'));
    }

    /**
     * Met à jour un intervenant existant.
     */
    public function update(Request $request, Intervenant $intervenant)
    {
        $data = $request->validate([
            'evenement_id' => 'required|exists:evenements,id',
            'nom'          => 'required|string|max:255',
            'fonction'     => 'required|string|max:255',
            'biographie'   => 'required|string',
            'theme'        => 'nullable|string|max:255',
            'image'        => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'whatsapp'     => 'nullable|url',
            'facebook'     => 'nullable|url',
            'instagram'    => 'nullable|url',
            'tiktok'       => 'nullable|url',
            'linkedln'     => 'nullable|url',
            'snapchat'     => 'nullable|url',
            'x'            => 'nullable|url',
        ]);

        if ($request->hasFile('image')) {
            // Suppression de l'ancienne image
            if ($intervenant->image) {
                Storage::disk('public')->delete($intervenant->image);
            }
            // Enregistrement de la nouvelle image
            $path = $request->file('image')->store('intervenants', 'public');
            $data['image'] = $path;
        }

        $intervenant->update($data);

        return redirect()->route('intervenants.index')->with('success', 'Intervenant mis à jour avec succès.');
    }

    /**
     * Supprime un intervenant.
     */
    public function destroy(Intervenant $intervenant)
    {
        if ($intervenant->image) {
            Storage::disk('public')->delete($intervenant->image);
        }

        $intervenant->delete();

        return redirect()->route('intervenants.index')->with('success', 'Intervenant supprimé avec succès.');
    }

    public function show($id)
{
    $intervenant = Intervenant::with('evenement')->findOrFail($id);
    return view('biographie', compact('intervenant'));
}

}