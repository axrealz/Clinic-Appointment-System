<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next, $role): Response
    {
        // Check if user is logged in
        if (!auth()->check()) {
            return redirect('/login');
        }

        // Check if user has the correct role
        if (auth()->user()->role !== $role) {
            abort(403, 'UNAUTHORIZED ACCESS');
        }

        return $next($request);
    }
}