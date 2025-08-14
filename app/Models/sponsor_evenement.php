<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sponsor_evenement extends Model
{
    use HasFactory;
    protected $fillable = [
        'id_sponsor',
        'id_evenement',
    ];

    public function sponsor()
    {
        return $this->belongsTo(sponsor::class, 'id_sponsor');
    }

    public function evenement()
    {
        return $this->belongsTo(Evenement::class, 'id_evenement');
    }
}
