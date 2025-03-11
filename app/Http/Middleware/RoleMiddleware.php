<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|array  $role
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle(Request $request, Closure $next, $role, $guard = null): Response
    {
        if (!Auth::guard($guard)->check()) {
            return redirect()->route('login');
        }

        $roles = is_array($role) ? $role : explode('|', $role);

        if (!Auth::guard($guard)->user()->hasAnyRole($roles)) {
            abort(403, 'You do not have the required permission to access this page.');
        }

        return $next($request);
    }
}
