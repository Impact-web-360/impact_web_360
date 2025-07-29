<?php
namespace App\Http\Controllers;
use App\Models\Categorie; // Changé de Category à Categorie
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CategorieController extends Controller // 
{
    public function index()
    {
        $categories = Categorie::all(); // Changé de Category à Categorie
        return view('Dashboard.categories.index', compact('categories'));
    }

    public function create()
    {
        return view('Dashboard.categories.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:categories,name|max:255',
        ]);

        Categorie::create([ // Changé de Category à Categorie
            'name' => $request->name,
            'slug' => Str::slug($request->name),
        ]);

        return redirect()->route('Dashboard.categories.index')->with('success', 'Catégorie ajoutée avec succès!');
    }

    public function edit($id)
    {
        $categorie = Categorie::findOrFail($id);

        return view('Dashboard.categories.edit', compact('categorie'));
    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $categorie = Categorie::findOrFail($id);
        $categorie->name = $request->input('name');
        $categorie->save();

        return redirect()->route('Dashboard.categories.index')
                        ->with('success', 'Catégorie mise à jour avec succès.');
    }


    public function destroy(Categorie $categorie) // Changé de Category $category à Categorie $categorie
    {
        $categorie->delete(); // Changé $category à $categorie
        return redirect()->route('Dashboard.categories.index')->with('success', 'Catégorie supprimée avec succès!');
    }
}