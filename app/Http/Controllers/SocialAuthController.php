<?php

namespace App\Http\Controllers;

use Laravel\Socialite\Facades\Socialite;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class SocialAuthController extends Controller
{
    public function redirect($provider)
    {
        return Socialite::driver($provider)->redirect();
    }

    public function callback($provider)
{
    $socialite = Socialite::driver($provider);

    if (app()->environment('local')) {
        $socialite = $socialite->stateless(); // Hindari InvalidStateException
    }

    $socialUser = $socialite->user();

    $user = User::where('email', $socialUser->getEmail())->first();

    if (!$user) {
        // Kalau belum ada user, buat baru + anggap email verified
        $user = User::create([
            'name' => $socialUser->getName() ?? $socialUser->getNickname() ?? 'User',
            'email' => $socialUser->getEmail(),
            'email_verified_at' => now(), // ✅ Anggap email sudah verified
            'password' => bcrypt(Str::random(24)),
        ]);
    } else {
        // Kalau user sudah ada, pastikan email_verified_at terisi
        if (!$user->hasVerifiedEmail()) {
            $user->email_verified_at = now(); // ✅ Pastikan ini di-set
            $user->save();
        }
    }

    Auth::login($user);

    return redirect()->intended('/profile');
    }


    
}
