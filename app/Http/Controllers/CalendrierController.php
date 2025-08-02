<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use App\Models\Formation;

class CalendrierController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        // Charger les formations et leur relation 'events' en même temps
        $formations = $user->formations()->with('events')->get();
        $events = $user->events; // Ou $user->events()->with('formation')->get();

        $startOfWeek = Carbon::now()->startOfWeek(Carbon::MONDAY);
        $endOfWeek = Carbon::now()->endOfWeek(Carbon::SUNDAY);

        return view('Dashboard_utilisateur.calendrier', compact('events', 'formations', 'startOfWeek', 'endOfWeek'));
    }
}