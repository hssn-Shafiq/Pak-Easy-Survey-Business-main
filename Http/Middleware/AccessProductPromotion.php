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

      

        // Check if user has referred a user in the last 7 days
        $referralCutoffDate = now()->subDays(7);
        $hasReferredInLast7Days = $user->referredUsers()->where('created_at', '>', $referralCutoffDate)->exists();

        if ($hasReferredInLast7Days) {
            return $next($request);
        }

        // User does not meet conditions, redirect or show an error
        return redirect()->route('customer')->with('error', 'You have not add any user last 7 days .Please add new user and than continue .');
    }
}

