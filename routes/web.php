<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SocialAuthController;
use App\Http\Controllers\WisataController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// Halaman utama
Route::get('/', [WisataController::class, 'home'])->name('home');

// Contoh halaman demo
Route::get('/demo', function () {
    return view('demo');
})->name('demo');

// Dashboard - hanya untuk user yang sudah login & email terverifikasi
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');


// Rute untuk daftar semua wisata
Route::get('/wisata', [WisataController::class, 'index'])->name('wisata.index');

// Rute untuk detail wisata tunggal
Route::get('/wisata/{id}', [WisataController::class, 'show'])->name('wisata.show');

// Group route untuk pengguna yang sudah login
Route::middleware('auth')->group(function () {
    // Profil
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Halaman verifikasi email (jika belum verifikasi)
    Route::get('/email/verify', function () {
        return view('auth.verify-email');
    })->middleware('auth')->name('verification.notice');

    // Kirim ulang email verifikasi
    Route::post('/email/verification-notification', function (Request $request) {
        $request->user()->sendEmailVerificationNotification();
        return back()->with('message', 'Link verifikasi telah dikirim!');
    })->middleware('throttle:6,1')->name('verification.send');
});

// Proses klik link verifikasi email (langsung login otomatis)
Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();

    // Login otomatis berdasarkan ID dari email verifikasi
    $user = User::find($request->route('id'));
    if ($user) {
        Auth::login($user);
    }

    return redirect('/dashboard');
})->middleware(['signed'])->name('verification.verify');

// Social Login (Google & Facebook)
Route::get('/auth/{provider}', [SocialAuthController::class, 'redirect']);
Route::get('/auth/{provider}/callback', [SocialAuthController::class, 'callback']);

// Route auth default dari Laravel Breeze
require __DIR__.'/auth.php';
