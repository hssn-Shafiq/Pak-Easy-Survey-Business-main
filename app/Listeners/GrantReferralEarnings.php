<?php


namespace App\Listeners;

use App\Events\UserRegistered;
use App\Models\User;
use App\Models\UserStats;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class GrantReferralEarnings implements ShouldQueue
{
    public function handle(UserRegistered $event)
    {
        $user = $event->user;
        $referralCode = $event->referralCode;

        $referringUser = User::where('own_referral_code', $referralCode)->first();

        if ($referringUser && $user->admin_approvel_status === 'Approved') {
            $userStats = UserStats::where('user_id', $user->id)->first();

            // Grant referral earnings to the parent user
            $referringUserParentStats = UserStats::where('user_id', $referringUser->id)->first();
            if ($referringUserParentStats) {
                $referringUserParentStats->increment('earnings', 150);

                // Grant earnings to the parent's parent
                $referringUserGrandParentStats = UserStats::where('user_id', $referringUserParentStats->referral_by)->first();
                if ($referringUserGrandParentStats) {
                    $referringUserGrandParentStats->increment('earnings', 50);
                }
            }

            // Update the user's referral_by field in user stats
            $userStats->update([
                'referral_by' => $referringUser->id,
            ]);

            // Update the user's level based on total referrals
            $totalReferrals = $referringUser->stats->total_referrals;
            $level = $this->calculateLevel($totalReferrals);
            $referringUser->stats->update(['level' => $level]);
        }
    }

    private function calculateLevel($totalReferrals)
    {
        if ($totalReferrals >= 0 && $totalReferrals <= 9) {
            return 0;
        } elseif ($totalReferrals >= 10 && $totalReferrals <= 29) {
            return 1;
        } elseif ($totalReferrals >= 30 && $totalReferrals < 59) {
            return 2;
        } elseif ($totalReferrals >= 60 && $totalReferrals < 99) {
            return 3;
        } elseif ($totalReferrals >= 100 && $totalReferrals < 129) {
            return 4;
        } elseif ($totalReferrals >= 130 && $totalReferrals < 159) {
            return 5;
        } elseif ($totalReferrals >= 160 && $totalReferrals < 199) {
            return 6;
        } elseif ($totalReferrals >= 200 && $totalReferrals < 249) {
            return 7;
        } elseif ($totalReferrals >= 250 && $totalReferrals < 299) {
            return 8;
        } elseif ($totalReferrals >= 300 && $totalReferrals < 399) {
            return 9;
        } elseif ($totalReferrals >= 400 && $totalReferrals < 499) {
            return 10;
        } elseif ($totalReferrals >= 500 && $totalReferrals < 599) {
            return 11;
        } elseif ($totalReferrals >= 600) {
            return 12;
        }
    }
}
