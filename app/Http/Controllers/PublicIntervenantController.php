<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\evenement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PublicIntervenantController extends Controller
{
    public function index()
    {
        // Récupérer tous les intervenants avec leurs événements associés
        $intervenants = User::where('type', 'intervenant')
            ->with(['evenements' => function($query) {
                $query->select('evenements.id', 'evenements.titre');
            }])
            ->latest()
            ->get();

        return view('intervenant', compact('intervenants'));
    }

    public function show($id)
    {
        $intervenant = User::where('type', 'intervenant')
            ->with(['evenements'])
            ->findOrFail($id);

        return view('intervenant.show', compact('intervenant'));
    }
}
