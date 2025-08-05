<?php

namespace App\Http\Controllers;

use App\Models\Replay;
use App\Models\Evenement;
use Illuminate\Http\Request;

class ReplayController extends Controller
{
    /**
     * Display a listing of the resource.
     */
        public function index(int $evenementId = null)
    {
        // Si un ID d'événement est fourni, filtrer les replays par cet événement
        if ($evenementId) {
            $replays = Replay::where('id_evenement', $evenementId)->with('evenement')->latest()->get();
        } else {
            // Sinon, charger tous les replays
            $replays = Replay::with('evenement')->latest()->get();
        }

        return view('dashboard.replay.index', compact('replays'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $evenements = Evenement::all(); // On récupère tous les événements
        return view('dashboard.replay.create', compact('evenements'));
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'id_evenement'       => 'required|exists:evenements,id',
            'titre'              => 'required|string|max:255',
            'description'        => 'required|string', 
            'video'              => 'required|mimes:mp4,mov,avi,webm|max:51200',
            'presentateur_nom'   => 'required|string|max:255',
            'presentateur_poste' => 'required|string|max:255',
            'presentateur_image'   => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]); 

        // Upload vidéo
        $videoPath = $request->file('video')->store('replays/videos', 'public');

        // Upload image (si fournie)
        $imagePath = null;
        if ($request->hasFile('presentateur_image')) {
            $imagePath = $request->file('presentateur_image')->store('replays/images', 'public');
        }

            Replay::create([
                'id_evenement'         => $request->id_evenement,
                'titre'                => $request->titre,
                'description'          => $request->description,
                'video_path'           => $videoPath,
                'presentateur_nom'     => $request->presentateur_nom,
                'presentateur_poste'   => $request->presentateur_poste,
                'presentateur_image'   => $imagePath,
            ]);

            return redirect()->route('replay.index')->with('success', 'Replay ajouté avec succès.');    
        }


    /* Display the specified resource.
     */
    public function show(Replay $replay)
    {
        return view('dashboard.replay.show', compact('replay'));
        }
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Replay $replay)
    {
        $evenements = Evenement::all();
        return view('dashboard.replay.edit', compact('replay', 'evenements'));
        }
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Replay $replay)
    {
        $request->validate([
            'id_evenement'       => 'required|exists:evenements,id',
            'titre'              => 'required|string|max:255',
            'description'        => 'required|string',
            'video'              => 'nullable|mimes:mp4,mov,avi,webm|max:51200',
            'presentateur_nom'   => 'required|string|max:255',
            'presentateur_poste' => 'required|string|max:255',
            'presentateur_image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);
        
    if ($request->hasFile('video')) {
        $videoPath = $request->file('video')->store('replays/videos', 'public');
        $replay->video_path = $videoPath;
    }

    if ($request->hasFile('presentateur_image')) {
        $imagePath = $request->file('presentateur_image')->store('replays/images', 'public');
        $replay->presentateur_image = $imagePath;
    }

    $replay->titre = $request->titre;
    $replay->description = $request->description;
    $replay->id_evenement = $request->id_evenement;
    $replay->presentateur_nom = $request->presentateur_nom;
    $replay->presentateur_poste = $request->presentateur_poste;
    $replay->support_url = $request->support_url;

    $replay->save();

    return redirect()->route('replay.index')->with('success', 'Replay mis à jour avec succès');
}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Replay $replay)
    {
        $replay->delete();
        return redirect()->route('replay.index')->with('success', 'Replay supprimé avec succès.');      
        }
    /**
     * Display the replays for a specific event.
     */
    public function eventReplays(int $evenementId)
    {
        $evenement = Evenement::findOrFail($evenementId);
        $replays = Replay::where('id_evenement', $evenementId)->with('evenement')->latest()->get();
        return view('dashboard.replay.event_replays', compact('evenement', 'replays'));
        }
    /**
     * Display the replays for a specific event in the frontend.
     */
    public function eventReplaysFrontend(int $evenementId)
    {
        $evenement = Evenement::findOrFail($evenementId);
        $replays = Replay::where('id_evenement', $evenementId)->with('evenement')->latest()->get();
        return view('replays.event_replays', compact('evenement', 'replays'));

    }

    public function parEvenement($id)
{
    $evenement = Evenement::findOrFail($id);
    $replays = Replay::where('id_evenement', $id)->get();

    return view('replays_evenement', compact('evenement', 'replays'));
}

}