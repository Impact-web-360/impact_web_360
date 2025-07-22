<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Module extends Model
{
    use HasFactory;

    protected $fillable = [
        'titre',
        'fichier',
        'video',
        'formation_id',
    ];

    public function formation()
    {
        return $this->belongsTo(Formation::class);
    }
}