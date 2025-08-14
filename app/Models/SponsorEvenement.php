<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SponsorEvenement extends Model
{
    use HasFactory;
    protected $fillable = [
        'id_sponsor',
        'id_evenement',
    ];

    public function sponsor()
    {
        return $this->belongsTo(Sponsor::class, 'id_sponsor');
    }

    public function evenement()
    {
        return $this->belongsTo(Evenement::class, 'id_evenement');
    }
}
