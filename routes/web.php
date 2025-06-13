<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SocialAuthController;
use App\Http\Controllers\WisataController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\PaketWisataController;
use App\Http\Controllers\Admin\TransaksiController;
use App\Http\Controllers\Admin\UlasanController;
use App\Http\Controllers\Admin\PesananController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// Halaman utama
Route::get('/', [WisataController::class, 'home'])->name('home');

Route::get('/wisata/bandung', function () {
    // Path view disesuaikan dengan struktur folder yang baru
    return view('components.wisata.bandungKota');
});
// Dashboard - hanya untuk user yang sudah login & email terverifikasi
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/paket-wisata/{slug}', [PaketWisataController::class, 'showFrontend'])->name('detail-paket');

// --- Rute untuk Ulasan (membutuhkan autentikasi) ---
Route::middleware(['auth'])->group(function () {
    // Rute untuk menyimpan ulasan untuk paket wisata tertentu
    // paket-wisata/{paket_wisata}/ulasan
    // Gunakan parameter {paket_wisata} untuk Route Model Binding ke ID
    Route::post('/paket-wisata/{paket_wisata}/ulasan', [UlasanController::class, 'store'])->name('ulasan.store');
});

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


    //Route Pesanan
    //Menampilkan form pemesanan untuk paket wisata tertentu
    Route::get('/paket-wisata/{paket_wisata}/pesan', [PesananController::class, 'create'])->name('pesanan.create');
    // Memproses pengiriman form pemesanan
    Route::post('/paket-wisata/{paket_wisata}/pesan', [PesananController::class, 'store'])->name('pesanan.store');
    // Halaman sukses pemesanan
    Route::get('/pesanan/sukses/{kode_pesanan}', [PesananController::class, 'success'])->name('pesanan.success');

    //My-Order
    Route::get('/my-orders', [PesananController::class, 'history'])->name('pesanan.history');
    Route::get('/pesanan/pembayaran-berhasil/{kode_pesanan}', [PesananController::class, 'paymentSuccessConfirmation'])->name('pesanan.payment.success');
    Route::put('/pesanan/{pesanan}/batalkan', [PesananController::class, 'cancel'])->name('pesanan.cancel');
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

Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {
    // Dashboard Admin
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // Pengelolaan Paket Wisata (menggunakan Route Resource untuk CRUD)
    Route::resource('paket-wisata', PaketWisataController::class);

    // Riwayat Transaksi Pembayaran
    Route::get('transaksi', [TransaksiController::class, 'index'])->name('transaksi.index');
    Route::get('transaksi/{transaksi}', [TransaksiController::class, 'show'])->name('transaksi.show'); // Opsional: detail transaksi

    //Ulasan
    Route::get('ulasan', [UlasanController::class, 'index'])->name('ulasan.index');
    Route::get('ulasan/{ulasan}', [UlasanController::class, 'show'])->name('ulasan.show');

    //Pesanan
    Route::get('pesanan', [PesananController::class, 'indexAdmin'])->name('pesanan.index');
    Route::get('pesanan/{pesanan}', [PesananController::class, 'showAdmin'])->name('pesanan.show');
    Route::put('pesanan/{pesanan}/update-status', [PesananController::class, 'updateStatus'])->name('pesanan.updateStatus');
});
