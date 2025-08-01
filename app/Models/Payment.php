<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'formation_id',
        'amount_xof',
        'amount_monero',
        'monero_address',
        'monero_payment_id',
        'tx_hash',
        'status',
        'expires_at',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'expires_at' => 'datetime',
    ];

    /**
     * Get the user that owns the payment.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the formation that the payment is for.
     */
    public function formation()
    {
        return $this->belongsTo(Formation::class);
    }
    
    /**
     * Scope a query to only include pending payments.
     */
    public function scopePending($query)
    {
        return $query->where('status', 'pending');
    }

    /**
     * Scope a query to only include unexpired payments.
     */
    public function scopeUnexpired($query)
    {
        return $query->where('expires_at', '>', now());
    }
}