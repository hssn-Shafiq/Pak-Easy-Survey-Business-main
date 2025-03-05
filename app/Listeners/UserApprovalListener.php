<?php

namespace App\Listeners;

use App\Models\Referral;
use Illuminate\Auth\Events\Registered;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class UserApprovalListener
{
    public function handle(Registered $event)
    {
        $user = $event->user;

        // Check if the user's approval status is 'Approved'
        if ($user->admin_approvel_status === 'Approved') {
            // Update the referral record
            $referral = Referral::where('referred_user_id', $user->id)->first();
            if ($referral) {
                $referral->approval_status = 'Approved';
                $referral->save();
            }
        }
    }
}
