<?php

namespace App\Http\Controllers;

use App\Models\Formation;
use App\Models\Categorie;
use Illuminate\Http\Request;

class ElearningController extends Controller
{
    /**
     * Affiche la page E-learning avec les formations et les catégories.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        // 1. Récupérer toutes les catégories pour le filtrage
        $categories = Categorie::all();

        // 2. Récupérer toutes les formations, en incluant leur catégorie
        $formations = Formation::with('categorie')->get();

        // 3. Passer les données à la vue
        return view('elearning', compact('formations', 'categories'));
    }
}