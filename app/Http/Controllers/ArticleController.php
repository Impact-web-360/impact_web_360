<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary; // <-- LIGNE AJOUTÉE

class ArticleController extends Controller
{
    public function index()
    {
        $articles = Article::all();
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
                'type'        => 'required|string',
                'couleur'     => 'nullable|string',
                'taille'      => 'nullable|string',
            ]);

            if ($request->hasFile('image')) {
                // Remplacement de la logique de stockage local
                // L'image est uploadée sur Cloudinary et son URL est récupérée
                $uploadedFileUrl = Cloudinary::upload($request->file('image')->getRealPath())->getSecurePath();
                $data['image'] = $uploadedFileUrl;
            }

            $article = new Article();
            $article->nom         = $data['nom'];
            $article->description = $data['description'];
            $article->image       = $data['image'];
            $article->prix        = $data['prix'];
            $article->type        = $data['type'];
            $article->couleur     = $data['couleur'];
            $article->taille      = $data['taille'];
            $article->save();

            return redirect()->route('articles.index')->with('success', 'Article créé !');
        } catch (\Throwable $th) {
            Log::error("Erreur lors de l'ajout d'un article", ['message' => $th->getMessage()]);
            return redirect()->back()->withErrors('Une erreur est survenue.');
        }
    }

    public function edit($id)
    {
        $article = Article::findOrFail($id);
        return view('Dashboard.articles.edit', compact('article'));
    }

    public function update(Request $request, $id)
    {
        $article = Article::findOrFail($id);

        $data = $request->validate([
            'nom'         => 'required|string',
            'description' => 'required|string',
            'image'       => 'nullable|image',
            'prix'        => 'required|numeric|min:0',
            'type'        => 'required|string',
            'couleur'     => 'nullable|string',
            'taille'      => 'nullable|string',
        ]);

        if ($request->hasFile('image')) {
            // Remplacement de la logique de stockage local
            // L'image est uploadée sur Cloudinary et son URL est récupérée
            $uploadedFileUrl = Cloudinary::upload($request->file('image')->getRealPath())->getSecurePath();
            $data['image'] = $uploadedFileUrl;
        }

        $article->update($data);

        return redirect()->route('articles.index')->with('success', 'Article modifié avec succès !');
    }

    public function destroy($id)
    {
        $article = Article::findOrFail($id);
        $article->delete();
        return redirect()->route('articles.index')->with('success', 'Article supprimé avec succès !');
    }
}