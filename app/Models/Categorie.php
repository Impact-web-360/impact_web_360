<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str; // Assurez-vous que cette ligne est présente

class Categorie extends Model // Changé de Category à Categorie
{
    use HasFactory;

    protected $fillable = ['name', 'slug'];

    // Génère le slug automatiquement avant de sauvegarder
    protected static function booted()
    {
        static::creating(function ($categorie) { // 
            $categorie->slug = Str::slug($categorie->name);
        });

        static::updating(function ($categorie) { // 
            $categorie->slug = Str::slug($categorie->name);
        });
    }

    public function formations()
    {
        return $this->hasMany(Formation::class);
    }
}