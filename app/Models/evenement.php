<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Evenement extends Model
{
    // Pour pouvoir utiliser Evenement::create($data)
    protected $fillable = [
        'nom',
        'promoteur',
        'description',
        'lieu',
        'theme',
        'heure',
        'nb_places',
        'date_debut',
        'date_fin',
        'image',
    ];
}

