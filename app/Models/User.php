<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Models\Review;
use App\Models\Product;
use App\Models\UserStats;
use App\Models\Withdrawal;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'own_referral_code',
        'referral_code',
        'isAdmin',
        'our_bank',
        'bank_username',
        'sender_number',
        'TRX_number',
        'payment_status',
        'earnings',
        'payment_date_time',
        'admin_approvel_status',
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

    public function stats()
    {
        return $this->hasOne(UserStats::class);
    }

    public function userStats()
    {
        return $this->hasOne(UserStats::class);
    }

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }

    public function products()
    {
        return $this->hasMany(Product::class, 'referral_code');
    }

    public function withdrawals()
    {
        return $this->hasMany(Withdrawal::class);
    }
}
