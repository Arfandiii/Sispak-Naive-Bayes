<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, $role): Response
    {
        if (!Auth::check() || Auth::user()->role !== $role) {
            // Jika user adalah admin dan mencoba mengakses /dashboard, redirect ke /admin/dashboard
            if (Auth::user()->role === 'admin' && $request->is('dashboard')) {
                return redirect()->route('admin.dashboard');
            }
            // abort(403, 'Unauthorized access');
            // Menampilkan halaman 403 kustom
            return response()->view('errors.403', [], 403);
        }

        return $next($request);
    }
}
