<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Auth;

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
    public function boot()
{
    view()->share([
        'dialCodes' => [
            'FR' => '+33',
            'BE' => '+32',
            'CH' => '+41',
            // Ajouter tous les pays nécessaires...
        ],
        'countries' => [
            'FR' => 'France',
            'BE' => 'Belgique',
            'CH' => 'Suisse',
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
