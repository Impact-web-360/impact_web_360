<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;
    protected $fillable = [
    'nom',
    'prenom',
    'pays',
    'ville',
    'telephone',
    'whatsapp',
    ];

    public function article()
    {
        return $this->belongsToMany(Article::class, 'achat', 'id_client', 'id_article')
            ->withPivot('montant')
            ->withTimestamps();
    }

}
