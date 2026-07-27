<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckRole
{
    public function handle(Request $request, Closure $next, $role)
    {
        // Cek apakah user sudah login
        if (!Auth::check()) {
            return redirect('/login');
        }

        // Cek apakah user memiliki role yang sesuai
        if (Auth::user()->role !== $role) {
            abort(403, 'Unauthorized access. Anda tidak memiliki akses ke halaman ini.');
        }

        return $next($request);
    }
}