<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AdminAccess
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle($request, Closure $next)
    {
        $allowedEmails  = 'hs1@gmail.com';

        if ($request->user()->email !== $allowedEmails) {
            abort(403, 'Unauthorized access.');
        }

        return $next($request);
    }
}
