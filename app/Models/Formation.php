<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsToMany; // Ajoutez ceci

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

    public function categorie(): BelongsTo // Spécifiez le type de retour
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
     * Note: Si vous aviez une colonne 'total_videos' dans la DB comme dans la migration précédente,
     * cet accesseur peut remplacer son besoin si le calcul est toujours dynamique.
     * Sinon, vous devrez le mettre à jour lors de l'ajout/suppression de modules.
     */
    public function getTotalVideosAttribute(): int
    {
        return $this->modules()->whereNotNull('video_path')->count();
    }

    /**
     * Les utilisateurs qui ont acheté cette formation.
     * Cette relation est cruciale pour le suivi des paiements.
     */
    public function users(): BelongsToMany // Spécifiez le type de retour
    {
        // Assurez-vous que 'user_formations' est bien le nom de votre table pivot.
        // Les withPivot sont essentiels pour récupérer les colonnes de la table pivot.
        return $this->belongsToMany(User::class, 'user_formations')
                    ->withPivot('status', 'paid_at', 'amount_paid', 'auto_renewal_enabled', 'fedapay_transaction_id')
                    ->withTimestamps();
    }

    public function events()
    {
        return $this->hasMany(Event::class, 'formation_id');
    }
}