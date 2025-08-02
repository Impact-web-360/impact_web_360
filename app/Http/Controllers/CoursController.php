<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Formation;
use Illuminate\Support\Facades\Auth;

class CoursController extends Controller
{

     public function index()
    {
        $user = Auth::user();
        
        // Charger les formations de l'utilisateur avec leurs modules
        $formations = $user->formations()->with('modules')->get();

        return view('Dashboard_utilisateur.cours', compact('formations'));
    }

    public function ajouterFormation(Formation $formation)
    {
        // Récupérer l'utilisateur connecté
        $user = Auth::user();

        // 1. Vérifier si la formation n'est pas déjà dans les cours de l'utilisateur.
        if ($user->formations->contains($formation->id)) {
            return redirect()->route('cours')->with('warning', 'Vous avez déjà cette formation dans vos cours.');
        }

        // 2. Attacher la formation à l'utilisateur.
        // C'est ici que l'ajout se fait réellement dans la base de données.
        $user->formations()->attach($formation->id);

        // 3. Rediriger vers la page "Mes cours" avec un message de succès.
        return redirect()->route('cours')->with('success', 'La formation a été ajoutée à vos cours avec succès !');
    }

    public function showFormation(Formation $formation)
    {
        // Chargez les modules associés à la formation
        $formation->load('modules');

        // Retournez une nouvelle vue (par exemple, 'formation-detail') avec la formation
        return view('Dashboard_utilisateur.formation-detail', compact('formation'));
    }

}