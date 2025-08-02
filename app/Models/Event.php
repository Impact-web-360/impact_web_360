<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'formation_id', // <-- Assurez-vous d'avoir ce champ dans la migration
        'title',
        'description',
        'start_time',
        'end_time',
        'color',
    ];

    // ...

    public function formation()
    {
        return $this->belongsTo(Formation::class);
    }
}