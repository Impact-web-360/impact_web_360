<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

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
}
}
