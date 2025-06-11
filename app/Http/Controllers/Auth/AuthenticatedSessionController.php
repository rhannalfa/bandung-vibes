<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        $request->authenticate();

        $request->session()->regenerate();

        $user = Auth::user();

        // Bagian ini untuk verifikasi email (biarkan saja jika Anda menggunakannya)
        if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && !$user->hasVerifiedEmail()) {
            return redirect()->route('verification.notice');
        }

        // --- Bagian yang perlu diubah ---
        // Redirect berdasarkan role (menggunakan kolom 'is_admin')
        if ($user->is_admin) { // Jika user adalah admin
            return redirect()->intended(route('admin.dashboard')); // Arahkan ke dashboard admin
        } else { // Jika user bukan admin (user biasa)
            return redirect()->intended(route('home')); // Arahkan ke dashboard user biasa (biasanya '/dashboard')
        }
        // --- Akhir bagian yang diubah ---
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}