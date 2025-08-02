<?php

namespace App\Http\Controllers;

use App\Models\emploie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class EmploieController extends Controller
{
    public function index()
    {
        $emploies = emploie::all();
        return view('Dashboard.emploies.index', compact('emploies'));
    }

    public function create()
    {
        return view('Dashboard.emploies.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'nom' => 'required|string|max:255',
            'localisation' => 'nullable|string|max:255',
            'logo' => 'nullable|image|max:2048',
            'promoteur' => 'required|string|max:255',
            'lien' => 'required|url',
            'type' => 'required|in:stage,freelance,temps plein,temps partiel,contrat,autre',
            'categorie' => 'required|in:marketing,communication,design,commerce,informatique,finance,ressources humaines,autre',
        ]);

        try {
            if ($request->hasFile('logo')) {
                $path = $request->file('logo')->store('emploies', 'public');
                $data['logo'] = $path;
            }

            emploie::create($data);

            return redirect()->route('emploies.index')->with('success', 'Emploi créé avec succès !');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors('Une erreur est survenue lors de la création de l\'emploi : ' . $e->getMessage())->withInput();
        }
    }

    public function edit($id)
    {
        $emploie = emploie::findOrFail($id);
        return view('Dashboard.emploies.edit', compact('emploie'));
    }

    public function update(Request $request, $id)
    {
        $emploie = emploie::findOrFail($id);

        try {
            $data = $request->validate([
                'nom' => 'required|string|max:255',
                'localisation' => 'nullable|string|max:255',
                'logo' => 'nullable|image|max:2048',
                'promoteur' => 'required|string|max:255',
                'lien' => 'required|url',
                'type' => 'required|in:stage,freelance,temps plein,temps partiel,contrat,autre',
                'categorie' => 'required|in:marketing,communication,design,commerce,informatique,finance,ressources humaines,autre',
            ]);

            if ($request->hasFile('logo')) {
                // Delete old logo if exists
                if ($emploie->logo) {
                    Storage::disk('public')->delete($emploie->logo);
                }
                
                $path = $request->file('logo')->store('emploies', 'public');
                $data['logo'] = $path;
            }

            $emploie->update($data);

            return redirect()->route('emploies.index')->with('success', 'Emploi mis à jour avec succès !');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors('Une erreur est survenue lors de la mise à jour de l\'emploi : ' . $e->getMessage())->withInput();
        }
    }

    public function destroy($id)
    {
        $emploie = emploie::findOrFail($id);
        
        try {
            // Delete logo if exists
            if ($emploie->logo) {
                Storage::disk('public')->delete($emploie->logo);
            }
            
            $emploie->delete();
            
            return redirect()->route('emploies.index')->with('success', 'Emploi supprimé avec succès !');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors('Une erreur est survenue lors de la suppression de l\'emploi : ' . $e->getMessage());
        }
    }
}
