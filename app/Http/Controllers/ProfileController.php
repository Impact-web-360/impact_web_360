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
            'nom' => 'required|string|max:255',
            'poste' => 'nullable|string|max:255',
            'image' => 'nullable|image|mimes:jpg,png,jpeg|max:2048',
            'facebook' => 'nullable|url',
            'instagram' => 'nullable|url',
            'linkedin' => 'nullable|url',
            'tiktok' => 'nullable|url',
        ]);

        $user = Auth::user();
        $user->nom = $request->input('nom');
        $user->poste = $request->input('poste');

        if ($request->hasFile('image')) {
            if ($user->image) {
                Storage::delete($user->image);
            }

            $path = $request->file('image')->store('photos', 'public');
            $user->image = $path;
        }

        $user->tiktok = $request->input('tiktok');
        $user->instagram = $request->input('instagram');
        $user->linkedin = $request->input('linkedin');
        $user->facebook = $request->input('facebook');

        $user->save();

        return back()->with('success', 'Profil mis à jour avec succès.');
    }

    public function updatePassword(Request $request)
    {
        $request->validate([
            'current_password' => 'required',
            'new_password' => 'required|string|min:8|confirmed',
        ]);

        dd($request->all());
        
        $user = Auth::user();

        if (!Hash::check($request->current_password, $user->password)) {
            return back()->withErrors(['current_password' => 'Mot de passe actuel incorrect.']);
        }

        $user->password = Hash::make($request->new_password);
        $user->save();

        return back()->with('success', 'Mot de passe mis à jour avec succès.');
    }
}
