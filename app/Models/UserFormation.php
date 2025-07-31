<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class UserFormation extends Model
{
    use HasFactory;

    // Spécifiez explicitement le nom de la table si elle ne suit pas les conventions de nommage de Laravel (singulier du nom de la classe)
    protected $table = 'user_formations';

    protected $fillable = [
        'user_id',
        'formation_id',
        'status',
        'paid_at',
        'amount_paid',
        'auto_renewal_enabled',
        'fedapay_transaction_id',
    ];

    protected $casts = [
        'paid_at' => 'datetime', // Caste la colonne en objet Carbon pour une manipulation facile des dates
        'auto_renewal_enabled' => 'boolean',
        'amount_paid' => 'decimal:2',
    ];

    /**
     * Une entrée UserFormation appartient à un Utilisateur.
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Une entrée UserFormation appartient à une Formation.
     */
    public function formation(): BelongsTo
    {
        return $this->belongsTo(Formation::class);
    }
}