<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MediaController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'facebook' => 'nullable|url',
            'instagram' => 'nullable|url',
            'linkedin' => 'nullable|url',
            'tiktok' => 'nullable|url',
            'youtube' => 'nullable|url',
            'whatsapp' => 'nullable|url',
        ]);

        $user = Auth::user();

        $errors = [];
        $addedLinks = [];

        $fields = ['facebook', 'instagram', 'linkedin', 'tiktok', 'youtube', 'whatsapp'];

        foreach ($fields as $field) {
            $input = $request->input($field);

            if ($input) {
                if ($user->$field) {
                    $errors[] = "Le lien pour {$field} existe déjà.";
                } else {
                    $user->$field = $input;
                    $addedLinks[] = $field;
                }
            }
        }

        if (count($addedLinks) > 0) {
            $user->save();
        }

        $successMessage = '';
        $count = count($addedLinks);

        if ($count === 1) {
            $successMessage = "Le lien {$addedLinks[0]} a été ajouté avec succès.";
        } elseif ($count > 1) {
            $successMessage = "{$count} liens ont été ajoutés avec succès.";
        }

        if ($count > 0 && count($errors) > 0) {
            return back()->with('error', 'Une erreur est survenue.')->with('success', $successMessage);
        } elseif ($count > 0) {
            return back()->with('success', $successMessage);
        } elseif (count($errors) > 0) {
            return back()->with('error', 'Ce lien existe déja.');
        } else {
            return back()->withErrors(['Aucun lien n’a été soumis.']);
        }
    }
}
