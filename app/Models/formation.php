<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Str;

class Formation extends Model
{
    use HasFactory;

    protected $fillable = [
        'categorie_id','titre','description','duree_minutes','image','is_published','promoter','formateur'
    ];
    protected $casts = [
        'is_published' => 'boolean',
        'duree_minutes' => 'integer',
    ];
    public function categorie(): BelongsTo
    {
        return $this->belongsTo(Categorie::class);
    }

    public function modules(): HasMany
    {
        return $this->hasMany(Module::class)->orderBy('ordre');
    }
}