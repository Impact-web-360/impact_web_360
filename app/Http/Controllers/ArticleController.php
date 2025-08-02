<?php

namespace App\Http\Controllers;

use App\Models\article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class ArticleController extends Controller
{
    public function index()
    {
        $articles = article::all();
        return view('Dashboard.articles.index', compact('articles'));
    }

    public function create()
    {
        return view('Dashboard.articles.create');
    }

    public function store(Request $request)
    {
        try {
            $data = $request->validate([
                'nom'         => 'required|string',
                'description' => 'required|string',
                'image'       => 'required|image',
                'prix'        => 'required|numeric|min:0',
            ]);

            if ($request->hasFile('image')) {
                $path = $request->file('image')->store('articles', 'public');
                // stocke "articles/xyz.jpg" en DB
                $data['image'] = $path;
            }

            $article = new article();
            $article->nom         = $data['nom'];
            $article->description = $data['description'];
            $article->image       = $data['image'];
            $article->prix        = $data['prix'];
            $article->save();

            return redirect()->route('articles.index')->with('success', 'Article créé !');
        } catch (\Throwable $th) {
            Log::error("Erreur lors de l'ajout d'un article", ['message' => $th->getMessage()]);
            return redirect()->back()->withErrors('Une erreur est survenue.');
        }
    }

    public function edit($id)
    {
        $article = article::findOrFail($id);
        return view('Dashboard.articles.edit', compact('article'));
    }

    public function update(Request $request, $id)
    {
        $article = article::findOrFail($id);

        $data = $request->validate([
            'nom'         => 'required|string',
            'description' => 'required|string',
            'image'       => 'nullable|image',
            'prix'        => 'required|numeric|min:0',
        ]);

        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('articles', 'public');
            // stocke "articles/xyz.jpg" en DB
            $data['image'] = $path;
        }

        $article->update($data);

        return redirect()->route('articles.index')->with('success', 'Article modifié avec succès !');
    }

    public function destroy($id)
    {
        $article = article::findOrFail($id);
        $article->delete();
        return redirect()->route('articles.index')->with('success', 'Article supprimé avec succès !');
    }
}
