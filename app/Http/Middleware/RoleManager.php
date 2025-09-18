<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class RoleManager
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, $role): Response
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        $authUserRole = Auth::user()->role;

        $roles = [
            'admin' => 0,
            'vendor' => 1,
            'customer' => 2,
        ];

        $redirectRoutes = [
            0 => 'admin.dashboard',
            1 => 'vendor.dashboard',
            2 => 'main',
        ];

        if ($roles[$role] === $authUserRole) {
            return $next($request);
        }
        return redirect()->route($redirectRoutes[$authUserRole] ?? 'login');
    }
}
