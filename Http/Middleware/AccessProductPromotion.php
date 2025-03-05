<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AccessProductPromotion
{
    public function handle(Request $request, Closure $next)
    {
        $user = Auth::user();

        // Check if user is within first 7 days
        if ($user->created_at->diffInDays(now()) <= 7) {
            return $next($request);
        }

<<<<<<< HEAD:Http/Middleware/AccessProductPromotion.php
      
=======
>>>>>>> f9107805074084ddbe3d9734dd26fc7c9a85c378:app/Http/Middleware/AccessProductPromotion.php

        // Check if user has referred a user in the last 7 days
        $referralCutoffDate = now()->subDays(7);
        $hasReferredInLast7Days = $user->referredUsers()->where('created_at', '>', $referralCutoffDate)->exists();

        if ($hasReferredInLast7Days) {
            return $next($request);
        }

        // User does not meet conditions, redirect or show an error
<<<<<<< HEAD:Http/Middleware/AccessProductPromotion.php
        return redirect()->route('customer')->with('error', 'You have not add any user last 7 days .Please add new user and than continue .');
=======
        return redirect()->route('user')->with('error', 'You do not have access to this page.');
>>>>>>> f9107805074084ddbe3d9734dd26fc7c9a85c378:app/Http/Middleware/AccessProductPromotion.php
    }
}

