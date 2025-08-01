<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

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

    public function showLanguageSettings()
    {
        $user = Auth::user();
        return view('Dashboard_utilisateur.langues', compact('user'));
    }

    // ...

    // app/Http/Controllers/ParametresController.php

    public function updateLanguage(Request $request)
    {
        // ... (votre code pour valider et enregistrer la langue) ...
        $user = Auth::user();
        $user->langue_de_travail = $request->input('language');
        $user->save();
        
        // On met à jour la locale de la session AVANT de rediriger.
        // Cela garantit que la redirection est faite avec la bonne langue.
        LaravelLocalization::setLocale($request->input('language'));

        // On utilise la méthode du package pour générer une URL avec le préfixe de la locale.
        // getLocalizedURL() s'assure que l'URL est cohérente avec la nouvelle langue.
        $redirectUrl = LaravelLocalization::getLocalizedURL(
            $request->input('language'),
            route('langues'),
            [],
            true
        );

        // On redirige vers cette nouvelle URL
        return redirect($redirectUrl)
            ->with('success', __('Your work language has been updated successfully.'));
    }
        
}



