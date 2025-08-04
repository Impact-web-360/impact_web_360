<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event; // Assurez-vous que le modèle Event est bien importé
use Carbon\Carbon; // Pour gérer facilement les dates
use App\Models\Formation;

class UtilisateurController extends Controller
{

    public function index()
    {
        $user = auth()->user();
        $userTheme = $user->theme ?? 'dark';

        $todayEvents = Event::whereDate('start_time', now())->get();
        $userFormations = auth()->user()->formations; 
        $todayTasks = $todayEvents;

        // Charger toutes les formations (ou filtrer si besoin)
        $formations = Formation::all();

        return view('Dashboard_utilisateur.tableau de bord', compact('userTheme', 'todayEvents', 'todayTasks', 'formations','userFormations'));
    }

}