<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Models\Evenement;
use App\Models\Intervenant;
use Illuminate\Support\Facades\Storage;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;

class IntervenantController extends Controller
{
    public function store(Request $request)
    {
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

        try {
            if ($request->hasFile('image')) {
                // Upload de l'image sur Cloudinary
                $uploadedFileUrl = Cloudinary::upload($request->file('image')->getRealPath())->getSecurePath();
                $data['image'] = $uploadedFileUrl;
            }

            Intervenant::create($data);

            return redirect()->route('intervenants.index')->with('success', 'Intervenant ajouté avec succès !');
        } catch (\Throwable $th) {
            Log::error("Erreur lors de l'ajout d'un intervenant", ['message' => $th->getMessage()]);
            return redirect()->back()->withErrors('Une erreur est survenue.');
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
        return view('Dashboard.Intervenants.index', compact('intervenants'));
    }

    /**
     * Affiche le formulaire de modification d'un intervenant.
     */
    public function edit(Intervenant $intervenant)
    {
        $evenements = Evenement::all();
        return view('Dashboard.Intervenants.edit', compact('intervenant', 'evenements'));
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
            // Suppression de l'ancienne image sur Cloudinary
            if ($intervenant->image) {
                $publicId = basename($intervenant->image, '.' . pathinfo($intervenant->image, PATHINFO_EXTENSION));
                Cloudinary::destroy($publicId);
            }

            // Upload de la nouvelle image sur Cloudinary
            $uploadedFileUrl = Cloudinary::upload($request->file('image')->getRealPath())->getSecurePath();
            $data['image'] = $uploadedFileUrl;
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
            // Suppression de l'image sur Cloudinary
            $publicId = basename($intervenant->image, '.' . pathinfo($intervenant->image, PATHINFO_EXTENSION));
            Cloudinary::destroy($publicId);
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