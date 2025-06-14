<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth; // Tambahkan ini

class IsAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Periksa apakah user terautentikasi dan apakah mereka adalah admin
        if (Auth::check() && Auth::user()->is_admin) {
            return $next($request);
        }

        // Jika tidak, abort dengan error 403 (Forbidden)
        abort(403, 'Anda tidak memiliki akses ke halaman ini. Hanya admin yang diizinkan.');
        // Atau Anda bisa redirect ke halaman lain, misalnya halaman login:
        // return redirect()->route('login');
    }
}