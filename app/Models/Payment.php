<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $fillable = [
        'user_id',
        'formation_id',
        'amount_xof',
        'amount_monero',
        'monero_address',
        'monero_payment_id',
        'status',
        'expires_at'
    ];
}
