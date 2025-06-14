<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\PaketWisata;
use Illuminate\Support\Str;

class PaketWisataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Opsional: Hapus semua data yang ada di tabel sebelum menambahkan yang baru.
        // Sangat direkomendasikan jika Anda selalu menjalankan migrate:fresh --seed
        PaketWisata::truncate();

        // --- Paket Wisata Bandung Utara ---
        PaketWisata::create([
            'nama_paket' => 'Pesona Lembang & Tangkuban Perahu',
            'deskripsi_paket' => 'Nikmati udara sejuk pegunungan Lembang, keajaiban geologi Tangkuban Perahu, dan keseruan Farmhouse Lembang dalam satu hari penuh. Ideal untuk keluarga.',
            'destinasi' => 'Tangkuban Perahu, Farmhouse Lembang, Floating Market, The Great Asia Africa',
            'durasi' => '1 Hari',
            'harga_paket' => 385000.00,
            // PATH BARU: Jalur relatif ke direktori 'public' (misal: public/assets/images/paket-wisata)
            'gambar_utama' => 'assets/images/paket-wisata/lembang-tangkuban-perahu.jpg',
            'slug' => Str::slug('Pesona Lembang & Tangkuban Perahu'),
            'gambar_lainnya' => json_encode([
                // PATH BARU: Jalur relatif ke direktori 'public'
                'assets/images/paket-wisata/lainnya/lembang_1.jpg',
                'assets/images/paket-wisata/lainnya/lembang_2.jpg',
            ]),
            'fasilitas' => json_encode([
                'Transportasi AC (Avanza/Xenia/Hiace)',
                'Driver merangkap Pemandu Wisata',
                'Tiket masuk seluruh destinasi',
                'Biaya parkir dan tol',
                'Air mineral',
            ]),
        ]);

        // --- Paket Wisata Bandung Selatan ---
        PaketWisata::create([
            'nama_paket' => 'Petualangan Ciwidey & Kawah Putih',
            'deskripsi_paket' => 'Jelajahi keindahan alam Bandung Selatan, mulai dari Kawah Putih yang memukau hingga Glamping Lakeside yang ikonik. Cocok untuk pecinta alam.',
            'destinasi' => 'Kawah Putih, Glamping Lakeside, Perkebunan Teh Rancabali, Ranca Upas',
            'durasi' => '1 Hari',
            'harga_paket' => 450000.00,
            // PATH BARU: Jalur relatif ke direktori 'public'
            'gambar_utama' => 'assets/images/paket-wisata/ciwidey-kawah-putih.jpg',
            'slug' => Str::slug('Petualangan Ciwidey & Kawah Putih'),
            'gambar_lainnya' => json_encode([
                // PATH BARU: Jalur relatif ke direktori 'public'
                'assets/images/paket-wisata/lainnya/ciwidey_1.jpg',
                'assets/images/paket-wisata/lainnya/ciwidey_2.jpg',
            ]),
            'fasilitas' => json_encode([
                'Transportasi AC',
                'Pemandu Lokal',
                'Tiket masuk Kawah Putih',
                'Biaya parkir',
            ]),
        ]);

        // --- Paket Wisata Kota Bandung ---
        PaketWisata::create([
            'nama_paket' => 'Jelajah Sejarah & Kuliner Kota',
            'deskripsi_paket' => 'Susuri jejak sejarah Kota Bandung, kunjungi ikon-ikon kota, dan nikmati beragam kuliner khas Bandung yang menggugah selera.',
            'destinasi' => 'Gedung Sate, Museum Konferensi Asia-Afrika, Jalan Braga, Alun-Alun Bandung',
            'durasi' => '1 Hari',
            'harga_paket' => 275000.00,
            // PATH BARU: Jalur relatif ke direktori 'public'
            'gambar_utama' => 'assets/images/paket-wisata/sejarah-kuliner-kota.jpg',
            'slug' => Str::slug('Jelajah Sejarah & Kuliner Kota'),
            'gambar_lainnya' => json_encode([
                // PATH BARU: Jalur relatif ke direktori 'public'
                'assets/images/paket-wisata/lainnya/kota_1.jpg',
                'assets/images/paket-wisata/lainnya/kota_2.jpg',
            ]),
            'fasilitas' => json_encode([
                'Transportasi AC',
                'Pemandu Wisata',
                'Tiket masuk museum',
                'Makan siang (opsional, biaya tambahan)',
            ]),
        ]);

        // --- Paket Wisata Lainnya ---
        PaketWisata::create([
            'nama_paket' => 'Relaksasi Ciater & Sari Ater',
            'deskripsi_paket' => 'Nikmati ketenangan dan relaksasi di pemandian air panas alami Ciater, cocok untuk melepas penat bersama keluarga.',
            'destinasi' => 'Pemandian Air Panas Ciater, Kebun Teh Ciater',
            'durasi' => '1 Hari',
            'harga_paket' => 320000.00,
            // PATH BARU: Jalur relatif ke direktori 'public'
            'gambar_utama' => 'assets/images/paket-wisata/ciater-sari-ater.jpeg',
            'slug' => Str::slug('Relaksasi Ciater & Sari Ater'),
            'gambar_lainnya' => json_encode([
                // PATH BARU: Jalur relatif ke direktori 'public'
                'assets/images/paket-wisata/lainnya/ciater_1.jpg',
                'assets/images/paket-wisata/lainnya/ciater_2.jpg',
            ]),
            'fasilitas' => json_encode([
                'Transportasi AC',
                'Tiket masuk Pemandian',
                'Air mineral',
            ]),
        ]);

        PaketWisata::create([
            'nama_paket' => 'Trip Instagramable Bandung',
            'deskripsi_paket' => 'Kunjungi spot-spot paling ikonik dan instagramable di Bandung untuk feed media sosial yang menarik dan liburan tak terlupakan.',
            'destinasi' => 'Orchid Forest Cikole, The Lodge Maribaya, Dago Dreampark',
            'durasi' => '1 Hari',
            'harga_paket' => 410000.00,
            // PATH BARU: Jalur relatif ke direktori 'public'
            'gambar_utama' => 'assets/images/paket-wisata/instagramable-bandung.jpg',
            'slug' => Str::slug('Trip Instagramable Bandung'),
            'gambar_lainnya' => json_encode([]), // Tanpa gambar lainnya
            'fasilitas' => json_encode([
                'Transportasi AC',
                'Tiket masuk semua destinasi',
                'Pemandu foto (opsional)',
            ]),
        ]);
    }
}
