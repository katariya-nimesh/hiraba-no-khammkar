<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class EnsureUserIsAdmin
{
    public function handle(Request $request, Closure $next): Response
    {
        // Check if user is authenticated
        if (!Auth::check()) {
            Log::info('Admin middleware - User NOT authenticated');
            return redirect()->route('login');
        }

        Log::info('Admin middleware - User IS authenticated: ' . Auth::user()->email);

        // Verify the user is the admin
        if (Auth::user()->email !== env('ADMIN_EMAIL')) {
            Log::info('Admin middleware - User email does not match ADMIN_EMAIL');
            Auth::logout();
            return redirect()->route('login')->with('error', 'Unauthorized access');
        }

        return $next($request);
    }
}
