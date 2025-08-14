<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Achat extends Model
{
    use HasFactory;
    protected $fillable = [
        'id_client',
        'id_article',
        'montant',
    ];

    public function article()
    {
        return $this->belongsTo(Client::class, 'id_article');
    }

    public function client()
    {
        return $this->belongsTo(Article::class, 'id_client');
    }
}

