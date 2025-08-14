<?php

namespace App\Http\Controllers;

use App\Models\Categorie; 
use App\Models\Formation;
use App\Models\Module;
use Illuminate\Http\Request;

class DiscoverController extends Controller
{
    public function index(Request $request)
    {
        // 1. Récupérer toutes les catégories pour le menu de filtrage
        $categories = Categorie::all();

        // 2. Construire la requête pour les formations
        // Charge la relation 'categorie' pour chaque formation afin d'éviter les requêtes N+1
        $query = Formation::query()->with('categorie'); // Utilisez 'categorie' comme nom de relation

        // 3. Appliquer le filtre de catégorie si un paramètre 'category' est présent dans l'URL
        if ($request->has('category') && $request->input('category') !== 'tous') {
            $categorySlug = $request->input('category');
            // Filtrer les formations par le slug de la catégorie via la relation 'categorie'
            $query->whereHas('categorie', function ($q) use ($categorySlug) {
                $q->where('slug', $categorySlug);
            });
        }

        // 4. Récupérer les formations filtrées (ou toutes si pas de filtre)
        $formations = $query->get();

        return view('Dashboard_utilisateur.decouvrir', compact('categories', 'formations'));
    }
};