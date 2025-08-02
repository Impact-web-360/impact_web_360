<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use App\Models\Formation;

class CalendrierController extends Controller
{
    public function index(Request $request)
    {
        $user = Auth::user();

        // Si une date est passée dans la requête, utilisez-la, sinon utilisez la date actuelle
        $selectedDate = $request->input('date') ? Carbon::parse($request->input('date')) : Carbon::now();

        $startOfWeek = $selectedDate->startOfWeek(Carbon::MONDAY);
        $endOfWeek = $selectedDate->endOfWeek(Carbon::SUNDAY);

        // Récupérer TOUS les événements de l'utilisateur
        $events = $user->events;
            
        // Charger les formations et leur relation 'events' pour l'affichage des catégories
        $formations = $user->formations()->with('events')->get();
        
        return view('Dashboard_utilisateur.calendrier', compact('events', 'formations', 'startOfWeek', 'endOfWeek'));
    }
}