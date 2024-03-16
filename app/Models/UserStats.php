<?php

namespace App\Models;

use App\Models\User;
use App\Models\Review;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class UserStats extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 'own_referral_code', 'referral_by', 'total_referrals',
        'team_size', 'earnings','level', 'referral_status',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function referralByUser()
    {
        return $this->belongsTo(User::class, 'referral_by');
    }

    public function reviews()
{
    return $this->hasMany(Review::class, 'user_id', 'user_id');
}

}
