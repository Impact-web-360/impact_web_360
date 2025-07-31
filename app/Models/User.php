<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'nom',
        'prenom',
        'ville',
        'description',
        'image',
        'pays',
        'type',
        'telephone',
        'theme',
        'biographie',
        'email',
        'password',
        'facebook',
        'wahtsapp',
        'linkedin',
        'instagram',
        'tiktok',
        'youtube',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];


    

    public function formations(): BelongsToMany
    {
        return $this->belongsToMany(Formation::class, 'user_formations')
                    ->withPivot('payment_status', 'payment_method', 'transaction_id', 'paid_amount')
                    ->withTimestamps();
    }

    public function hasAccessToFormation(int $formationId): bool
    {
        return $this->formations()->where('formation_id', $formationId)->wherePivot('payment_status', 'completed')->exists();
    }

    public function evenement()
    {
        return $this->belongsToMany(Evenement::class, 'user_evenement', 'id_user', 'id_evenement')
            ->withTimestamps();
    }

}


