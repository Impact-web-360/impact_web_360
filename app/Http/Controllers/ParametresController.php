<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ParametresController extends Controller
{
    public function update(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'telephone' => 'required|string',
            'dob' => 'required|date',
        ]);

        $user = Auth::user();
        $user->email = $request->email;
        $user->telephone = $request->telephone;
        $user->dob = $request->dob;
        $user->save();

        return back()->with('success', 'Informations mises à jour avec succès.');
    }
}

