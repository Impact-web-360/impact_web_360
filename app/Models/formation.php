<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Formation extends Model
{
    use HasFactory;

    protected $fillable = [
        'category_id',
        'title',
        'description',
        'mentor',
        'image',
        'price',
        'rating',
    ];

    public function categorie() // Le nom de la méthode reste 'categorie' pour correspondre à votre vue Blade
    {
        return $this->belongsTo(Categorie::class, 'category_id'); // Changé de Category::class à Categorie::class
    }
}