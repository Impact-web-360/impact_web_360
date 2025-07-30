<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Formation extends Model
{
    use HasFactory;

    protected $fillable = [
        'category_id', 
        'title',
        'description',
        'image',
        'objectives',
        'tools',
        'students_enrolled',
        'reviews_count',
        'price',
        'rating', 
        'mentor',
        'mentor_title',
        'mentor_avatar',
        'mentor_rating',
        'mentor_reviews_count',
        'mentor_bio',
    ];

    protected $casts = [
        'objectives' => 'array',
        'tools' => 'array',
        'price' => 'decimal:2',
        'rating' => 'float', 
        'mentor_rating' => 'decimal:1',
    ];
   
    public function categorie() 
    {
        return $this->belongsTo(Categorie::class, 'category_id'); 
    }
    
    /**
     * Une formation a plusieurs modules.
     */
    public function modules(): HasMany
    {
        return $this->hasMany(Module::class)->orderBy('order');
    }

    /**
     * Accesseur pour calculer le nombre total de vidéos à partir des modules.
     * Si vous voulez le stocker en base, vous devrez ajuster.
     */
    public function getTotalVideosAttribute(): int
    {
        // Compte le nombre de modules qui ont une vidéo_path non nulle
        return $this->modules()->whereNotNull('video_path')->count();
    }
}