<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     */
    protected function redirectTo(Request $request): ?string
    {
        return $request->expectsJson() ? null : route('login');
    }

    public function handle($request, \Closure $next, ...$guards)
    {
        // ... other middleware logic ...

        $rememberToken = $request->cookie('laravel_remember');

        if ($rememberToken) {
            $user = User::where('remember_token', $rememberToken)->first();
            if ($user) {
                Auth::login($user);
            }
        }

        return $next($request);
    }
}
