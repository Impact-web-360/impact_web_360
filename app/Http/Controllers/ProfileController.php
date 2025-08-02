<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;


class ProfileController extends Controller
{

    public function update(Request $request)
    {
        $request->validate([
            'nom' => 'nullable|string|max:255',
            'poste' => 'nullable|string|max:255',
            'image' => 'nullable|image|mimes:jpg,png,jpeg|max:2048',
            'facebook' => 'nullable|url',
            'instagram' => 'nullable|url',
            'linkedin' => 'nullable|url',
            'tiktok' => 'nullable|url',
            'youtube' => 'nullable|url',
            'whatsapp' => 'nullable|url',
        ]);

        $user = Auth::user();

        if ($request->filled('nom')) {
            $user->nom = $request->input('nom');
        }

        if ($request->filled('poste')) {
            $user->poste = $request->input('poste');
        }

        // Mise à jour de l'image seule
        if ($request->hasFile('image')) {
            // Supprime l'ancienne image si elle existe et n'est pas la photo par défaut
            if ($user->image && $user->image !== 'photos/default.svg') {
                Storage::disk('public')->delete($user->image);
            }

            $path = $request->file('image')->store('photos', 'public');
            $user->image = $path;  // Juste le chemin relatif, pas de 'storage/' devant !
        }


        // Réseaux sociaux
        foreach (['facebook', 'instagram', 'linkedin', 'tiktok', 'youtube', 'whatsapp'] as $field) {
            if ($request->filled($field)) {
                $user->$field = $request->input($field);
            }
        }

        $user->save();

        return back()->with('success', 'Profil mis à jour avec succès.');
    }


    public function updatePassword(Request $request)
    {
        $request->validate([
            'current_password' => 'required',
            'new_password' => 'required|string|min:8|confirmed',
        ]);



        $user = Auth::user();

        if (!Hash::check($request->current_password, $user->password)) {
            return back()->withErrors(['current_password' => 'Mot de passe actuel incorrect.']);
        }

        $user->password = Hash::make($request->new_password);
        $user->save();

        return back()->with('success', 'Mot de passe mis à jour avec succès.');
    }
}
