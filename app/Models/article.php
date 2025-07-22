<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class article extends Model
{
    use HasFactory;
    protected $fillable = [
        'nom',
        'description',
        'image',
        'prix',
    ];
    public function client()
    {
        return $this->belongsToMany(client::class, 'achat', 'id_article', 'id_client')
            ->withPivot('montant')
            ->withTimestamps();
    }

}
