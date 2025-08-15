<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\URL; // <-- AJOUTEZ CETTE LIGNE

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // AJOUTEZ CE BLOC DE CODE
        if (config('app.env') === 'production') {
            URL::forceScheme('https');
        }

        view()->share([
            'dialCodes' => [
                'FR' => '+33',
                'BE' => '+32',
                'CH' => '+41',
                'BJ' => '+229', // Bénin
                'BF' => '+226', // Burkina Faso
                'CV' => '+238', // Cap-Vert
                'GM' => '+220', // Gambie
                'GH' => '+233', // Ghana
                'GN' => '+224', // Guinée
                'GW' => '+245', // Guinée-Bissau
                'CI' => '+225', // Côte d'Ivoire
                'LR' => '+231', // Libéria
                'ML' => '+223', // Mali
                'MR' => '+222', // Mauritanie
                'NE' => '+227', // Niger
                'NG' => '+234', // Nigéria
                'SN' => '+221', // Sénégal
                'SL' => '+232', // Sierra Leone
                'TG' => '+228', // Togo
                // Ajouter tous les pays nécessaires...
            ],
            'countries' => [
                'FR' => 'France',
                'BE' => 'Belgique',
                'CH' => 'Suisse',
                'BJ' => 'Bénin',
                'BF' => 'Burkina Faso',
                'CV' => 'Cap-Vert',
                'GM' => 'Gambie',
                'GH' => 'Ghana',
                'GN' => 'Guinée',
                'GW' => 'Guinée-Bissau',
                'CI' => 'Côte d\'Ivoire',
                'LR' => 'Libéria',
                'ML' => 'Mali',
                'MR' => 'Mauritanie',
                'NE' => 'Niger',
                'NG' => 'Nigéria',
                'SN' => 'Sénégal',
                'SL' => 'Sierra Leone',
                'TG' => 'Togo',
                // ...
            ]
        ]);
        View::composer('*', function ($view) {
            if (Auth::check()) {
                $view->with('userTheme', Auth::user()->theme);
            } else {
                $view->with('userTheme', 'dark'); // Thème par défaut pour les non-connectés
            }
        });
    }
}