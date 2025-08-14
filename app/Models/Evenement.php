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
        'facebook',
        'whatsapp',
        'instagram',
        'tiktok',
    ];

    public function user()
    {
        return $this->belongsToMany(User::class, 'user_evenement', 'id_evenement', 'id_user')
            ->withTimestamps();
    }
}

