<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PrixCategorie extends Model
{
    use HasFactory;

    protected $fillable = [
        'categorie',
        'prix'
    ];

    // Définir les prix par défaut pour chaque catégorie
    public static function getPrixParCategorie($categorie)
    {
        $prix = [
            'VIP' => 150000,
            'Etudiant' => 50000,
            'Participant' => 100000
        ];

        return $prix[$categorie] ?? 100000; // Prix par défaut
    }
}
