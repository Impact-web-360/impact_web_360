<?php

// app/Http/Controllers/ThemeController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ThemeController extends Controller
{
    public function update(Request $request)
    {
        $validatedData = $request->validate([
            'theme' => 'required|string|in:dark,light,sepia,system,contrast,blue',
        ]);

        $user = Auth::user();
        $user->theme = $validatedData['theme'];
        $user->save();

        return redirect()->route('themes')->with('success', 'Votre thème a été mis à jour avec succès.');
    }
}