<?php

namespace App\Http\Controllers;

use App\Models\Evenement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary; // <-- AJOUTEZ CETTE LIGNE

class EvenementController extends Controller
{
    public function index()
    {
        $evenements = Evenement::all();
        return view('Dashboard.Evenement.index', compact('evenements'));
    }

    public function show($id)
    {
        $evenements = Evenement::with(['sponsors', 'intervenants'])->findOrFail($id);
        return response()->json($evenements);
    }

    public function store(Request $request)
    {
        try {
            $data = $request->validate([
                'nom'         => 'required|string',
                'promoteur'   => 'required|string',
                'description' => 'required|string',
                'image'       => 'required|image',
                'lieu'        => 'nullable|string',
                'theme'       => 'required|string',
                'heure'       => 'required',
                'nb_places'   => 'nullable|integer',
                'date_debut'  => 'required|date',
                'date_fin'    => 'nullable|date|after_or_equal:date_debut',
            ]);

            if ($request->hasFile('image')) {
                // Remplacement du stockage local par Cloudinary
                $uploadedFileUrl = Cloudinary::upload($request->file('image')->getRealPath())->getSecurePath();
                $data['image'] = $uploadedFileUrl;
            }
            
            $evenement = new Evenement();
            $evenement->nom         = $data['nom'];
            $evenement->promoteur   = $data['promoteur'];
            $evenement->description = $data['description'];
            $evenement->lieu        = $data['lieu'];
            $evenement->theme       = $data['theme'];
            $evenement->heure       = $data['heure'];
            $evenement->nb_places   = $data['nb_places'];
            $evenement->date_debut  = $data['date_debut'];
            $evenement->date_fin    = $data['date_fin'];
            $evenement->image       = $data['image'];
            $evenement->save();

            return redirect()->back()->with('success', 'Événement créé !');
        } catch (\Throwable $th) {
            Log::error("Erreur lors de l'ajout d'un événement", ['message' => $th->getMessage()]);
            return redirect()->back()->withErrors('Une erreur est survenue.');
        }
    }

    public function update(Request $request, $id)
    {
        $evenement = Evenement::findOrFail($id);

        $data = $request->validate([
            'nom'         => 'required|string',
            'promoteur'   => 'required|string',
            'description' => 'required|string',
            'image'       => 'nullable|image',
            'lieu'        => 'nullable|string',
            'theme'       => 'required|string',
            'heure'       => 'required',
            'nb_places'   => 'nullable|integer',
            'date_debut'  => 'required|date',
            'date_fin'    => 'nullable|date|after_or_equal:date_debut',
        ]);

        if ($request->hasFile('image')) {
            // Remplacement du stockage local par Cloudinary
            $uploadedFileUrl = Cloudinary::upload($request->file('image')->getRealPath())->getSecurePath();
            $data['image'] = $uploadedFileUrl;
        }

        $evenement->update($data);

        return redirect()->back()->with('success', 'Événement modifié avec succès !');
    }

    public function destroy($id)
    {
        $evenement = Evenement::findOrFail($id);
        $evenement->delete();
        return redirect()->back()->with('success', 'Événement supprimé avec succès !');
    }
}