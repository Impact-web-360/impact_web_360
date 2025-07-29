<?php

namespace App\Http\Controllers;

use App\Models\Categorie;
use App\Models\Cours;
use Illuminate\Http\Request;

class CategorieController extends Controller
{
    public function index()
    {
        $categories = Categorie::all();
        return view('categories.index', compact('categories'));
    }

    public function create()
    {
        return view('categories.create');
    }

    public function store(Request $request)
    {
        $request->validate(['nom' => 'required']);
        Categorie::create($request->all());
        return redirect()->route('categories.index');
    }

    public function edit(Categorie $category)
    {
        return view('categories.edit', compact('category'));
    }

    public function update(Request $request, Categorie $category)
    {
        $request->validate(['nom' => 'required']);
        $category->update($request->all());
        return redirect()->route('categories.index');
    }

    public function destroy(Categorie $category)
    {
        $category->delete();
        return redirect()->route('categories.index');
    }
}
