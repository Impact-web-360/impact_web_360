<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class EventController extends Controller
{
    public function store(Request $request)
    {
        // Validation des données
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'formation_id' => 'required|exists:formations,id',
            'start_date' => 'required|date',
            'start_time' => 'required|date_format:H:i',
            'end_date' => 'required|date|after_or_equal:start_date',
            'end_time' => 'required|date_format:H:i|after:start_time',
            'color' => 'nullable|string|max:7',
        ]);
        
        // Combinaison des dates et heures
        $startTime = Carbon::parse($validatedData['start_date'] . ' ' . $validatedData['start_time']);
        $endTime = Carbon::parse($validatedData['end_date'] . ' ' . $validatedData['end_time']);

        // Création de l'événement
        Event::create([
            'user_id' => Auth::id(),
            'formation_id' => $validatedData['formation_id'],
            'title' => $validatedData['title'],
            'description' => $validatedData['description'],
            'start_time' => $startTime,
            'end_time' => $endTime,
            'color' => $validatedData['color'],
        ]);
        
        return redirect()->route('calendrier')->with('success', 'Événement ajouté avec succès !');
    }
}