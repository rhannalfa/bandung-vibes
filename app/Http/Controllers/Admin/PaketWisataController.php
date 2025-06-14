<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PaketWisata;
use Illuminate\Http\Request;
use Illuminate\Support\Str; // Untuk slug
use Illuminate\Support\Facades\Storage; // Untuk upload gambar

class PaketWisataController extends Controller
{
    /**
     * Menampilkan daftar semua paket wisata.
     */
    public function index()
    {
        $paketWisata = PaketWisata::latest()->paginate(10);
        return view('admin.paket-wisata.index', compact('paketWisata'));
    }

    /**
     * Menampilkan form untuk membuat paket wisata baru.
     */
    public function create()
    {
        return view('admin.paket-wisata.create');
    }

    /**
     * Menyimpan paket wisata baru ke database.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_paket' => 'required|string|max:255',
            'deskripsi_paket' => 'required|string',
            'destinasi' => 'required|string|max:255',
            'durasi' => 'nullable|string|max:255',
            'harga_paket' => 'required|numeric|min:0',
            // Perbaikan di sini: 'mimes:jpeg,png,jpg,gif,svg'
            'gambar_utama' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
            // Perbaikan di sini: 'mimes:jpeg,png,jpg,gif,svg'
            'gambar_lainnya.*' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
            'fasilitas' => 'nullable|string', // Validasi input sebagai string biasa
        ]);

        $data = $request->except(['_token', '_method']);
        $data['slug'] = Str::slug($request->nama_paket);

        // Proses Upload Gambar Utama
        if ($request->hasFile('gambar_utama')) {
            $imageName = time().'.'.$request->gambar_utama->extension();
            $data['gambar_utama'] = $request->gambar_utama->storeAs('paket-wisata', $imageName, 'public');
        } else {
            $data['gambar_utama'] = null;
        }

        // Proses Upload Gambar Lainnya
        $gambarLainPaths = [];
        if ($request->hasFile('gambar_lainnya')) {
            foreach ($request->file('gambar_lainnya') as $image) {
                if ($image->isValid()) {
                    $imageNameLain = uniqid('img_') . '.' . $image->extension();
                    $gambarLainPaths[] = $image->storeAs('paket-wisata/lainnya', $imageNameLain, 'public');
                }
            }
        }
        $data['gambar_lainnya'] = $gambarLainPaths; // Akan di-encode JSON oleh $casts

        // --- Proses Fasilitas ---
        // Memecah string dari textarea menjadi array, dan membersihkan baris kosong
        $data['fasilitas'] = array_filter(explode("\n", $request->input('fasilitas', '')));


        PaketWisata::create($data);

        return redirect()->route('admin.paket-wisata.index')->with('success', 'Paket wisata berhasil ditambahkan.');
    }

    /**
     * Menampilkan detail paket wisata (opsional).
     */
    public function show(PaketWisata $paket_wisatum) // Pastikan nama parameter cocok dengan route model binding
    {
        return view('admin.paket-wisata.show', compact('paket_wisatum'));
    }

    /**
     * Menampilkan form untuk mengedit paket wisata.
     */
    public function edit(PaketWisata $paket_wisatum)
    {
        return view('admin.paket-wisata.edit', compact('paket_wisatum'));
    }

    /**
     * Memperbarui data paket wisata di database.
     */
    public function update(Request $request, PaketWisata $paket_wisatum)
    {
        $request->validate([
            'nama_paket' => 'required|string|max:255',
            'deskripsi_paket' => 'required|string',
            'destinasi' => 'required|string|max:255',
            'durasi' => 'nullable|string|max:255',
            'harga_paket' => 'required|numeric|min:0',
            // Perbaikan di sini: 'mimes:jpeg,png,jpg,gif,svg'
            'gambar_utama' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
            // Perbaikan di sini: 'mimes:jpeg,png,jpg,gif,svg'
            'gambar_lainnya.*' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
            'fasilitas' => 'nullable|string', // Validasi sebagai string biasa
        ]);

        $data = $request->except(['_token', '_method']);
        $data['slug'] = Str::slug($request->nama_paket);

        // Proses Upload Gambar Utama
        if ($request->hasFile('gambar_utama')) {
            if ($paket_wisatum->gambar_utama && Storage::disk('public')->exists($paket_wisatum->gambar_utama)) {
                Storage::disk('public')->delete($paket_wisatum->gambar_utama);
            }
            $imageName = time().'.'.$request->gambar_utama->extension();
            $data['gambar_utama'] = $request->gambar_utama->storeAs('paket-wisata', $imageName, 'public');
        } else {
            $data['gambar_utama'] = $paket_wisatum->gambar_utama;
        }

        // Proses Upload Gambar Lainnya (menambahkan ke yang sudah ada)
        $gambarLainPaths = $paket_wisatum->gambar_lainnya ?: [];
        if ($request->hasFile('gambar_lainnya')) {
            foreach ($request->file('gambar_lainnya') as $image) {
                if ($image->isValid()) {
                    $imageNameLain = uniqid('img_') . '.' . $image->extension();
                    $gambarLainPaths[] = $image->storeAs('paket-wisata/lainnya', $imageNameLain, 'public');
                }
            }
        }
        $data['gambar_lainnya'] = $gambarLainPaths;


        // --- Proses Fasilitas ---
        $data['fasilitas'] = array_filter(explode("\n", $request->input('fasilitas', '')));


        $paket_wisatum->update($data);

        return redirect()->route('admin.paket-wisata.index')->with('success', 'Paket wisata berhasil diperbarui.');
    }

    /**
     * Menampilkan detail satu paket wisata untuk tampilan frontend.
     */
    public function showFrontend($slug)
    {
        // Mencari paket wisata berdasarkan slug.
        // firstOrFail() akan melempar 404 jika tidak ditemukan, bagus untuk UX.
        $paket = PaketWisata::where('slug', $slug)
                            ->with(['ulasan' => function($query) {
                                $query->with('user')->oldest(); // Urutkan ulasan dari terbaru, dan eager load user
                            }])
                            ->firstOrFail();

        // Mengirim objek $paket ke view
        // Perbaikan di sini: path view ke frontend.paket-wisata-detail
        return view('home.wisata.paket-wisata-detail', compact('paket'));
    }

    /**
     * Menghapus paket wisata dari database.
     */
    public function destroy(PaketWisata $paket_wisatum)
    {
        // Hapus gambar terkait jika ada
        if ($paket_wisatum->gambar_utama && Storage::exists('public/' . $paket_wisatum->gambar_utama)) {
            Storage::delete('public/' . $paket_wisatum->gambar_utama);
        }
        $paket_wisatum->delete();
        return redirect()->route('admin.paket-wisata.index')->with('success', 'Paket wisata berhasil dihapus.');
    }
}
