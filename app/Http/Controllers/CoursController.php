<?php

// App/Http/Controllers/CoursController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CoursController extends Controller
{
    public function index(Request $request)
    {
        $user = Auth::user();

        // Récupérer toutes les formations de l'utilisateur, avec la progression
        $formations = $user->formations()->withPivot('progression')->get();

        // Séparer les cours terminés et en cours pour la partie "Continuer à regarder"
        $coursEnCours = $formations->filter(function ($formation) {
            return $formation->pivot->progression < 100;
        });

        $coursTermines = $formations->filter(function ($formation) {
            return $formation->pivot->progression == 100;
        });

        return view('cours', compact('formations'));

        
    }
    public function mesCours()
    {
        $user = Auth::user();
        $formations = $user->formations()->with('modules')->get();
        return view('Dashboard_utilisateur.cours', compact('formations'));
    }

}