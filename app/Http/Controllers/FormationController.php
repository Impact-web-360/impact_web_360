<?php

namespace App\Http\Controllers;

use App\Models\Formation;
use App\Models\Categorie;
use App\Models\Module;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;

class FormationController extends Controller
{
    public function index()
    {
        $formations = Formation::with('categorie')->get();
        return view('Dashboard.formations.index', compact('formations'));
    }

    public function create()
    {
        $categories = Categorie::all();
        return view('Dashboard.formations.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'category_id' => 'required|exists:categories,id',
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'objectives' => 'nullable|array',
            'objectives.*' => 'nullable|string',
            'tools' => 'nullable|array',
            'tools.*' => 'nullable|string',
            'price' => 'required|numeric|min:0',
            'mentor' => 'nullable|string|max:255',
            'mentor_title' => 'nullable|string|max:255',
            'mentor_avatar' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'mentor_reviews_count' => 'nullable|integer|min:0',
            'mentor_bio' => 'nullable|string',
        ]);

        // Gérer l'upload de l'image principale sur Cloudinary
        if ($request->hasFile('image')) {
            $uploadedImageUrl = Cloudinary::upload($request->file('image')->getRealPath())->getSecurePath();
            $validatedData['image'] = $uploadedImageUrl;
        } else {
            $validatedData['image'] = null;
        }

        // Gérer l'upload de l'avatar du mentor sur Cloudinary
        if ($request->hasFile('mentor_avatar')) {
            $uploadedAvatarUrl = Cloudinary::upload($request->file('mentor_avatar')->getRealPath())->getSecurePath();
            $validatedData['mentor_avatar'] = $uploadedAvatarUrl;
        } else {
            $validatedData['mentor_avatar'] = null;
        }

        $validatedData['mentor_reviews_count'] = $validatedData['mentor_reviews_count'] ?? 0;

        Formation::create($validatedData);

        return redirect()->route('Dashboard.formations.index')->with('success', 'Formation ajoutée avec succès!');
    }

    public function edit($id)
    {
        $formation = Formation::findOrFail($id);
        $categories = Categorie::all();
        return view('Dashboard.formations.edit', compact('formation', 'categories'));
    }

    public function update(Request $request, $id)
    {
        $formation = Formation::findOrFail($id);

        $validatedData = $request->validate([
            'category_id' => 'required|exists:categories,id',
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'objectives' => 'nullable|array',
            'objectives.*' => 'nullable|string',
            'tools' => 'nullable|array',
            'tools.*' => 'nullable|string',
            'price' => 'required|numeric|min:0',
            'mentor' => 'nullable|string|max:255',
            'mentor_title' => 'nullable|string|max:255',
            'mentor_avatar' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'mentor_reviews_count' => 'nullable|integer|min:0',
            'mentor_bio' => 'nullable|string',
        ]);

        // Gestion de l'image principale
        if ($request->hasFile('image')) {
            if ($formation->image) {
                $publicId = basename($formation->image, '.' . pathinfo($formation->image, PATHINFO_EXTENSION));
                Cloudinary::destroy($publicId);
            }
            $uploadedImageUrl = Cloudinary::upload($request->file('image')->getRealPath())->getSecurePath();
            $validatedData['image'] = $uploadedImageUrl;
        } else {
            $validatedData['image'] = $formation->image;
        }

        // Gestion de l'avatar du mentor
        if ($request->hasFile('mentor_avatar')) {
            if ($formation->mentor_avatar) {
                $publicId = basename($formation->mentor_avatar, '.' . pathinfo($formation->mentor_avatar, PATHINFO_EXTENSION));
                Cloudinary::destroy($publicId);
            }
            $uploadedAvatarUrl = Cloudinary::upload($request->file('mentor_avatar')->getRealPath())->getSecurePath();
            $validatedData['mentor_avatar'] = $uploadedAvatarUrl;
        } else {
            $validatedData['mentor_avatar'] = $formation->mentor_avatar;
        }

        $formation->update($validatedData);

        return redirect()->route('Dashboard.formations.index')->with('success', 'Formation mise à jour avec succès!');
    }

    public function destroy(Formation $formation)
    {
        if ($formation->image) {
            $publicId = basename($formation->image, '.' . pathinfo($formation->image, PATHINFO_EXTENSION));
            Cloudinary::destroy($publicId);
        }
        if ($formation->mentor_avatar) {
            $publicId = basename($formation->mentor_avatar, '.' . pathinfo($formation->mentor_avatar, PATHINFO_EXTENSION));
            Cloudinary::destroy($publicId);
        }

        $formation->delete();

        return redirect()->route('Dashboard.formations.index')
            ->with('success', 'Formation supprimée avec succès!');
    }

    public function show($id)
    {
        $formation = Formation::findOrFail($id);
        $formation->load(['modules', 'categorie']);

        return view('Dashboard_utilisateur.details', compact('formation'));
    }

    public function showContenu($formationId)
    {
        $formation = Formation::findOrFail($formationId);
        $formation->load(['modules', 'categorie']);

        return view('Dashboard_utilisateur.formation_gratuite', compact('formation'));
    }
}