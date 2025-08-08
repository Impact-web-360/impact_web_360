<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sponsor extends Model
{
    use HasFactory;
    protected $fillable = [
        'nom',
        'description',
        'logo',
        'promoteur',
         'facebook',
        'wahtsapp',
        'linkedin',
        'instagram',
        'tiktok',
        'youtube',

    ];
    public function evenement()
    {
        return $this->belongsToMany(Evenement::class, 'sponsor_evenement', 'id_sponsor', 'id_evenement')
            ->withTimestamps();
    }
}
