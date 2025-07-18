<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class sponsor_reseau extends Model
{
    use HasFactory;
    protected $fillable = [
        'id_sponsor',
        'id_reseau',
    ];
}
