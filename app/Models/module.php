<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Module extends Model
{
    use HasFactory;

    protected $fillable = [
        'formation_id',
        'title',
        'file_path',
        'video_path',
        'duration',
        'order',
    ];

    /**
     * Un module appartient à une formation.
     */
    public function formation(): BelongsTo
    {
        return $this->belongsTo(Formation::class);
    }
}