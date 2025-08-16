<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sponsor extends Model
{
    use HasFactory;

    protected $fillable = [
        'evenement_id',
        'nom',
        'promoteur',
        'description',
        'logo',
    ];

    // Relation avec Evenement
    public function evenement()
    {
        return $this->belongsTo(Evenement::class);
    }
}
