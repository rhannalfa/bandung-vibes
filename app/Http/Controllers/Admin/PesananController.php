<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PaketWisata;
use App\Models\Pesanan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Carbon\Carbon;

class PesananController extends Controller
{
    /**
     * Menampilkan form pemesanan untuk paket wisata tertentu.
     */
    public function create(PaketWisata $paket_wisata)
    {
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'Anda harus login untuk memesan paket wisata.');
        }
        return view('home.pesanan.create', compact('paket_wisata'));
    }

    /**
     * Memproses dan menyimpan pesanan baru.
     */
    public function store(Request $request, PaketWisata $paket_wisata)
    {
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'Anda harus login untuk memesan paket wisata.');
        }

        $request->validate([
            'tanggal_tour' => 'required|date|after_or_equal:today',
            'jumlah_dewasa' => 'required|integer|min:1',
            'jumlah_anak' => 'nullable|integer|min:0',
            'nama_pemesan' => 'required|string|max:255',
            'email_pemesan' => 'required|email|max:255',
            'telepon_pemesan' => 'nullable|string|max:20',
            'catatan_tambahan' => 'nullable|string|max:1000',
        ]);

        $harga_dewasa = $paket_wisata->harga_paket;
        $harga_anak = $paket_wisata->harga_paket * 0.75; // Asumsi harga anak 75% dari dewasa

        $jumlah_dewasa = $request->input('jumlah_dewasa');
        $jumlah_anak = $request->input('jumlah_anak', 0);

        $total_harga = ($jumlah_dewasa * $harga_dewasa) + ($jumlah_anak * $harga_anak);

        $kode_pesanan = 'INV-' . Carbon::now()->format('Ymd') . '-' . Str::random(6);

        $pesanan = Pesanan::create([
            'user_id' => Auth::id(),
            'paket_wisata_id' => $paket_wisata->id,
            'kode_pesanan' => $kode_pesanan,
            'tanggal_tour' => $request->input('tanggal_tour'),
            'jumlah_dewasa' => $jumlah_dewasa,
            'jumlah_anak' => $jumlah_anak,
            'total_harga' => $total_harga,
            'status_pesanan' => 'pending_payment',
            'nama_pemesan' => $request->input('nama_pemesan'),
            'email_pemesan' => $request->input('email_pemesan'),
            'telepon_pemesan' => $request->input('telepon_pemesan'),
            'catatan_tambahan' => $request->input('catatan_tambahan'),
        ]);

        return redirect()->route('pesanan.success', $pesanan->kode_pesanan)->with('success', 'Pesanan Anda berhasil dibuat! Silakan lanjutkan pembayaran.');
    }

    /**
     * Menampilkan halaman sukses setelah pemesanan.
     */
    public function success($kode_pesanan)
    {
        $pesanan = Pesanan::where('kode_pesanan', $kode_pesanan)->firstOrFail();
        if (Auth::id() != $pesanan->user_id) {
            abort(403, 'Unauthorized action.');
        }
        return view('home.pesanan.success', compact('pesanan'));
    }

    /**
     * Menampilkan riwayat pesanan untuk user yang sedang login.
     *
     * @return \Illuminate\View\View
     */
    public function history()
    {
        // Memastikan user sudah login
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'Anda harus login untuk melihat riwayat pesanan.');
        }

        // Ambil semua pesanan user yang sedang login, eager load paket wisata terkait
        // Urutkan dari yang terbaru (latest())
        $pesananHistory = Pesanan::where('user_id', Auth::id())
                                 ->with('paketWisata')
                                 ->latest()
                                 ->paginate(10); // Gunakan paginasi jika daftar pesanan bisa panjang

        return view('home.pesanan.history', compact('pesananHistory'));
    }




    /**
     * Menampilkan halaman konfirmasi pembayaran berhasil dan memperbarui status pesanan.
     * Ini bisa dipicu oleh callback payment gateway atau simulasi.
     *
     * @param string $kode_pesanan Kode unik pesanan.
     * @return \Illuminate\View\View|\Illuminate\Http\RedirectResponse
     */
    public function paymentSuccessConfirmation($kode_pesanan)
    {
        $pesanan = Pesanan::where('kode_pesanan', $kode_pesanan)->firstOrFail();

        // Pastikan hanya user yang bersangkutan yang bisa melihat halaman ini
        if (Auth::id() != $pesanan->user_id) {
            abort(403, 'Unauthorized action.');
        }

        // Perbarui status pesanan jika masih pending payment
        if ($pesanan->status_pesanan == 'pending_payment') {
            $pesanan->status_pesanan = 'confirmed'; // Atau 'completed', sesuaikan dengan flow Anda
            $pesanan->save();
            // Opsional: Kirim notifikasi email ke user dan admin
        } elseif ($pesanan->status_pesanan == 'cancelled') {
            // Jika pesanan sudah dibatalkan, jangan lanjutkan. Redirect atau tampilkan error.
            return redirect()->route('pesanan.history')->with('error', 'Pesanan ini sudah dibatalkan.');
        }

        // Kirim objek pesanan ke view
        return view('home.pesanan.pembayaran_berhasil', compact('pesanan'));
    }

    /**
     * Membatalkan pesanan yang statusnya masih 'pending_payment'.
     *
     * @param Pesanan $pesanan Otomatis diisi oleh Route Model Binding
     * @return \Illuminate\Http\RedirectResponse
     */
    public function cancel(Pesanan $pesanan)
    {
        // Pastikan user yang membatalkan adalah pemilik pesanan
        if (Auth::id() != $pesanan->user_id) {
            abort(403, 'Unauthorized action.');
        }

        // Hanya izinkan pembatalan jika statusnya masih pending_payment
        if ($pesanan->status_pesanan == 'pending_payment') {
            $pesanan->status_pesanan = 'cancelled';
            $pesanan->save();
            return redirect()->back()->with('success', 'Pesanan Anda berhasil dibatalkan.');
        }

        return redirect()->back()->with('error', 'Pesanan tidak dapat dibatalkan pada status ini.');
    }


    // --- Metode untuk Admin (Manajemen Pesanan) ---

    /**
     * Menampilkan daftar semua pesanan untuk admin.
     * Admin bisa melihat semua pesanan dari semua user.
     * @return \Illuminate\View\View
     */
    public function indexAdmin()
    {
        // Eager load user dan paket wisata terkait untuk setiap pesanan
        $pesanan = Pesanan::with(['user', 'paketWisata'])
                          ->latest() // Urutkan dari yang terbaru
                          ->paginate(10); // Gunakan paginasi

        return view('admin.pesanan.index', compact('pesanan'));
    }

    /**
     * Menampilkan detail pesanan spesifik untuk admin.
     * @param \App\Models\Pesanan $pesanan
     * @return \Illuminate\View\View
     */
    public function showAdmin(Pesanan $pesanan)
    {
        // Eager load user dan paket wisata
        $pesanan->load('user', 'paketWisata');
        return view('admin.pesanan.show', compact('pesanan'));
    }

    /**
     * Memperbarui status pesanan oleh admin.
     * Metode ini dipanggil dari form di halaman detail pesanan admin.
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Pesanan $pesanan
     * @return \Illuminate\Http\RedirectResponse
     */
    public function updateStatus(Request $request, Pesanan $pesanan)
    {
        // Validasi input status
        $request->validate([
            'status_pesanan' => 'required|in:pending_payment,confirmed,cancelled,completed',
        ]);

        // Perbarui status
        $pesanan->status_pesanan = $request->input('status_pesanan');
        $pesanan->save();

        return redirect()->route('admin.pesanan.index')->with('success', 'Status pesanan berhasil diperbarui.');
    }
}
