<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PrixCategorie extends Model
{
    use HasFactory;
    protected $fillable = ['categorie', 'prix'];
}
