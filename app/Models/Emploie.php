<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Emploie extends Model
{
    use HasFactory;

    protected $fillable = [
        'nom',
        'logo',
        'localisation',
        'promoteur',
        'lien',
        'type',
        'categorie',
    ];
}
