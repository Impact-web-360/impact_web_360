<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str; // Assurez-vous que cette ligne est présente

class Categorie extends Model // Changé de Category à Categorie
{
    use HasFactory;

    protected $fillable = ['name', 'slug'];

    // Par défaut, Eloquent cherche la table "categories" pour le modèle "Categorie"
    // Si votre table s'appelle différemment (ex: "categories_table"), vous devriez ajouter:
    // protected $table = 'categories_table';

    // Génère le slug automatiquement avant de sauvegarder
    protected static function booted()
    {
        static::creating(function ($categorie) { // $category à $categorie
            $categorie->slug = Str::slug($categorie->name);
        });

        static::updating(function ($categorie) { // $category à $categorie
            $categorie->slug = Str::slug($categorie->name);
        });
    }

    public function formations()
    {
        return $this->hasMany(Formation::class);
    }
}