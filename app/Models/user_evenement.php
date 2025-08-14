<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User_evenement extends Model
{
    use HasFactory;
    protected $fillable = [
        'id_user',
        'id_evenement',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }

    public function evenement()
    {
        return $this->belongsTo(evenement::class, 'id_evenement');
    }
}
