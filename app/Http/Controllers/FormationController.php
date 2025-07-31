<?php

namespace App\Http\Controllers;

use App\Models\Formation;
use App\Models\Categorie;
use App\Models\Module;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class FormationController extends Controller
{
    public function index()
    {
        $formations = Formation::with('categorie')->get();
        return view('Dashboard.formations.index', compact('formations'));
    }

    public function create()
    {
        $categories = Categorie::all(); // Changé de Category à Categorie
        return view('Dashboard.formations.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([ // Capturez les données validées
            'category_id' => 'required|exists:categories,id',
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'objectives' => 'nullable|array',
            'objectives.*' => 'nullable|string', // Pour valider chaque élément du tableau
            'tools' => 'nullable|array',
            'tools.*' => 'nullable|string', // Pour valider chaque élément du tableau
            'price' => 'required|numeric|min:0',
            'mentor' => 'nullable|string|max:255',
            'mentor_title' => 'nullable|string|max:255',
            'mentor_avatar' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'mentor_reviews_count' => 'nullable|integer|min:0',
            'mentor_bio' => 'nullable|string',
        ]);

        // Gérer l'upload de l'image principale
        if ($request->hasFile('image')) {
            $validatedData['image'] = $request->file('image')->store('formations', 'public');
        } else {
            $validatedData['image'] = null; // Assurez-vous que le champ est null si pas d'image
        }

        // Gérer l'upload de l'avatar du mentor
        if ($request->hasFile('mentor_avatar')) {
            $validatedData['mentor_avatar'] = $request->file('mentor_avatar')->store('mentors/avatars', 'public');
        } else {
            $validatedData['mentor_avatar'] = null; // Assurez-vous que le champ est null si pas d'avatar
        }

        // Les champs 'objectives' et 'tools' seront déjà des tableaux grâce à $validatedData
        // S'assurer que les valeurs par défaut sont appliquées si non fournies
        $validatedData['mentor_reviews_count'] = $validatedData['mentor_reviews_count'] ?? 0;

        Formation::create($validatedData); // Crée la formation avec toutes les données validées

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
        $formation = Formation::findOrFail($id); // Récupérez la formation en premier !

        $validatedData = $request->validate([
            'category_id' => 'required|exists:categories,id',
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'objectives' => 'nullable|array',
            'objectives.*' => 'nullable|string', // Pour valider chaque élément du tableau
            'tools' => 'nullable|array',
            'tools.*' => 'nullable|string', // Pour valider chaque élément du tableau
            'price' => 'required|numeric|min:0',
            'mentor' => 'nullable|string|max:255',
            'mentor_title' => 'nullable|string|max:255',
            'mentor_avatar' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'mentor_reviews_count' => 'nullable|integer|min:0',
            'mentor_bio' => 'nullable|string',
        ]);

        // Gestion de l'image principale
        if ($request->hasFile('image')) {
            if ($formation->image && Storage::disk('public')->exists($formation->image)) {
                Storage::disk('public')->delete($formation->image);
            }
            $validatedData['image'] = $request->file('image')->store('formations', 'public');
        } elseif (isset($validatedData['clear_image']) && $validatedData['clear_image']) {
            if ($formation->image && Storage::disk('public')->exists($formation->image)) {
                Storage::disk('public')->delete($formation->image);
            }
            $validatedData['image'] = null;
        } else {
            $validatedData['image'] = $formation->image; // Conserver l'ancienne image si rien de nouveau
        }

        // Gestion de l'avatar du mentor
        if ($request->hasFile('mentor_avatar')) {
            if ($formation->mentor_avatar && Storage::disk('public')->exists($formation->mentor_avatar)) {
                Storage::disk('public')->delete($formation->mentor_avatar);
            }
            $validatedData['mentor_avatar'] = $request->file('mentor_avatar')->store('mentors/avatars', 'public');
        } elseif (isset($validatedData['clear_mentor_avatar']) && $validatedData['clear_mentor_avatar']) {
            if ($formation->mentor_avatar && Storage::disk('public')->exists($formation->mentor_avatar)) {
                Storage::disk('public')->delete($formation->mentor_avatar);
            }
            $validatedData['mentor_avatar'] = null;
        } else {
            $validatedData['mentor_avatar'] = $formation->mentor_avatar; // Conserver l'ancien avatar
        }

        // Mettre à jour la formation avec toutes les données validées
        $formation->update($validatedData);

        return redirect()->route('Dashboard.formations.index')->with('success', 'Formation mise à jour avec succès!');
    }

    public function destroy(Formation $formation)
    {
        if ($formation->image && Storage::disk('public')->exists($formation->image)) {
            Storage::disk('public')->delete($formation->image);
        }
        if ($formation->mentor_avatar && Storage::disk('public')->exists($formation->mentor_avatar)) {
            Storage::disk('public')->delete($formation->mentor_avatar);
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

    
};
