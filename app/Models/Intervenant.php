<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Intervenant extends Model
{
    use HasFactory;

    protected $fillable = [
        'evenement_id',
        'nom',
        'fonction',
        'biographie',
        'theme',
        'image',
        'whatsapp', // Ajouté
        'facebook', // Ajouté
        'instagram',// Ajouté
        'tiktok',   // Ajouté
        'linkedln', // Ajouté
        'snapchat', // Ajouté
        'x',        // Ajouté
    ];

    public function evenement()
    {
        return $this->belongsTo(Evenement::class);
    }
}