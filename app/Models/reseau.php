<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class reseau extends Model
{
    use HasFactory;
    protected $fillable = [
     'libelle'
    ];

    public function users()
    {
        return $this->belongsToMany(User::class, 'user_reseaus', 'id_reseau', 'id_user')
            ->withPivot('link')
            ->withTimestamps();
    }
}
