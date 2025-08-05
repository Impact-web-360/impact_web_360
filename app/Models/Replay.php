<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Replay extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_evenement',
        'titre',
        'description',
        'video_path', // Chemin du fichier vidéo
        'presentateur_nom',
        'presentateur_poste',
        'presentateur_image',
    ];

    // Relation vers Evenement
    public function evenement()
    {
        return $this->belongsTo(Evenement::class, 'id_evenement');
    }
}
