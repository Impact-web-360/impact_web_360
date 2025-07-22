<?php

namespace App\Http\Controllers;
use App\Models\Formation;
use App\Models\Categorie;
use Illuminate\Http\Request;

class FormationController extends Controller
{
    public function index() {
        $formations = Formation::with('categorie')->get();
        return view('Dashboard.formations.index', compact('formations'));
    }

    public function create() {
        $categories = Categorie::all();
        return view('Dashboard.formations.create', compact('categories'));
    }

    public function store(Request $request) {
        $request->validate([
            'titre' => 'required',
            'description' => 'required',
            'categorie_id' => 'required'
        ]);
        Formation::create($request->all());
        return redirect()->route('formations.index');
    }

    public function edit(Formation $formation) {
        $categories = Categorie::all();
        return view('Dashboard.formations.edit', compact('formation', 'categories'));
    }

    public function update(Request $request, Formation $formation) {
        $request->validate([
            'titre' => 'required',
            'description' => 'required',
            'categorie_id' => 'required'
        ]);
        $formation->update($request->all());
        return redirect()->route('formations.index');
    }

    public function destroy(Formation $formation) {
        $formation->delete();
        return redirect()->route('formations.index');
    }
}