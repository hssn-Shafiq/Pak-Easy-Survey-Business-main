<?php

namespace App\Events;

use App\Models\User;
use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;


class UserRegistered
{
    use Dispatchable, SerializesModels;

    public $user;
    public $referralCode;

    public function __construct(User $user, $referralCode)
    {
        $this->user = $user;
        $this->referralCode = $referralCode;
    }
}
