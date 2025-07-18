<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class achat extends Model
{
    use HasFactory;
    protected $fillable = [
        'id_client',
        'id_article',
        'montant',
    ];
}
