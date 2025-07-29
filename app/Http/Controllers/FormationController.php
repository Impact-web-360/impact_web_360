<?php

namespace App\Http\Controllers;

use App\Models\Formation;
use App\Models\Categorie;
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
        $request->validate([
            'title' => 'required|max:255',
            'category_id' => 'required|exists:categories,id',
            'mentor' => 'required|max:255',
            'description' => 'nullable',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'price' => 'required|numeric|min:0',
            'rating' => 'nullable|numeric|min:0|max:5',
        ]);

        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('formations', 'public');
        }

        Formation::create([
            'title' => $request->title,
            'category_id' => $request->category_id,
            'mentor' => $request->mentor,
            'description' => $request->description,
            'image' => $imagePath,
            'price' => $request->price,
            'rating' => $request->rating ?? 0.0,
        ]);

        return redirect()->route('Dashboard.formations.index')->with('success', 'Formation ajoutée avec succès!');
    }

    public function edit($id)
    {
        $formation = Formation::findOrFail($id);
<<<<<<< HEAD
        $categories = Categorie::all();
=======
        $categories = Categorie::all(); 
>>>>>>> 92ab3102f836a5301231ea7de0eb1fda6b15425e
        return view('Dashboard.formations.edit', compact('formation', 'categories'));
    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|max:255',
            'category_id' => 'required|exists:categories,id',
            'mentor' => 'required|max:255',
            'description' => 'nullable',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'price' => 'required|numeric|min:0',
            'rating' => 'nullable|numeric|min:0|max:5',
        ]);

        $imagePath = $formation->image;
        if ($request->hasFile('image')) {
            // Supprime l'ancienne image si elle existe
            if ($formation->image && Storage::disk('public')->exists($formation->image)) {
                Storage::disk('public')->delete($formation->image);
            }
            $imagePath = $request->file('image')->store('formations', 'public');
        } elseif ($request->input('clear_image')) {
            if ($formation->image && Storage::disk('public')->exists($formation->image)) {
                Storage::disk('public')->delete($formation->image);
            }
            $imagePath = null;
        }
        $formation = Formation::findOrFail($id);

        $formation->update([
            'title' => $request->title,
            'category_id' => $request->category_id,
            'mentor' => $request->mentor,
            'description' => $request->description,
            'image' => $imagePath,
            'price' => $request->price,
            'rating' => $request->rating ?? 0.0,
        ]);

        return redirect()->route('Dashboard.formations.index')->with('success', 'Formation mise à jour avec succès!');
    }


    public function destroy(Formation $formation)
    {
        if ($formation->image && Storage::disk('public')->exists($formation->image)) {
            Storage::disk('public')->delete($formation->image);
        }

        $formation->delete();
<<<<<<< HEAD

        return redirect()->route('Dashboard.formations.index')
            ->with('success', 'Formation supprimée avec succès!');
=======
        $formation = Formation::findOrFail($id);
        return redirect()->route('Dashboard.formations.index')->with('success', 'Formation supprimée avec succès!');
>>>>>>> 92ab3102f836a5301231ea7de0eb1fda6b15425e
    }
}
