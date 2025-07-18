<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class user_reseau extends Model
{
    use HasFactory;
    protected $fillable = [
        'id_user',
        'id_reseau',
        'link'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }

    public function reseau()
    {
        return $this->belongsTo(Reseau::class, 'id_reseau');
    }
}
