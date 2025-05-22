<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RoleMiddleware
{
    public function handle(Request $request, Closure $next, ...$roles)
    {
        if (!Auth::check()) {
            abort(403); // If the user is not authenticated, deny access
        }

        $userRole = Auth::user()->role;

        // Check if the user has the required role
        if (!$userRole || !in_array($userRole->name, $roles)) {
            abort(403); // Access denied if the user doesn't have the right role
        }

        return $next($request);
    }
}

