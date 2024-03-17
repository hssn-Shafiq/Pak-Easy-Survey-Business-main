<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CheckApproved
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    // App\Http\Middleware\CheckApproved.php
    public function handle($request, Closure $next)
    {
        if (Auth::user()->admin_approvel_status !== 'Approved') {
            return redirect('/')->with('error', 'You are not authorized to access this page.');
        }

        return $next($request);
    }
}
