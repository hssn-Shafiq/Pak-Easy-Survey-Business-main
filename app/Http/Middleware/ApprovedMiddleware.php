<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ApprovedMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle($request, Closure $next)
    {
        if (!auth()->check() || auth()->user()->admin_approval_status !== 'approved') {
            return redirect('/customer')->with('message', 'Please get approved by the admin before accessing the customer page.');
        }

        return $next($request);
    }
}
