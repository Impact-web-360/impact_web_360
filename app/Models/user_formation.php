<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class user_formation extends Model
{
    use HasFactory;
    protected $fillable = [
        'id_user',
        'id_formation',
    ];
}
