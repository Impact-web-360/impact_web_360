<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ticket extends Model
{
    use HasFactory;
    protected $fillable = [
        'prenom',
        'nom',
        'pays',
        'ville',
        'telephone',
        'email',
        'categorie',
        'promo_code'
    ];
}
