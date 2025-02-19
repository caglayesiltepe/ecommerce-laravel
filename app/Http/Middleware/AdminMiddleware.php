<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redis;
use Symfony\Component\HttpFoundation\Response;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(Request): (Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (!Auth::check()) {
            return redirect()->route('backoffice.login');
        }

        $userId = Auth::id();
        $userData = Redis::get('user_' . $userId);

        if (!$userData) {
            Auth::logout();
            return redirect()->route('backoffice.login');
        }

        $userData = json_decode($userData);

        if (!$userData || $userData->role != 1) {
            return redirect()->route('backoffice.login');
            // return redirect()->route('homepage');
        }

        view()->share('authUser', $userData);
        return $next($request);

    }
}

