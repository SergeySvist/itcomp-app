<?php

namespace App\Http\Middleware;

use App\Exceptions\ApiUnauthorizedException;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, $role)
    {
        $user = Auth::user();
        if (!($user && $user->hasRoles($role)))
            throw new ApiUnauthorizedException();
        return $next($request);
    }

}
