# Bandung Vibes


"Bandung Vibes" adalah aplikasi web berbasis Laravel yang dirancang untuk mengelola dan menampilkan paket-paket wisata menarik di Bandung. Proyek ini memfokuskan pada **pengelolaan data paket wisata** secara komprehensif, termasuk detail, harga, durasi, destinasi, fasilitas, dan galeri gambar dinamis, guna memberikan pengalaman pengguna yang intuitif dan menarik.

## Fitur Utama

### Manajemen Paket Wisata
* **CRUD** (Create, Read, Update, Delete) paket wisata melalui panel admin yang intuitif.
* Kolom data mencakup: **nama paket, deskripsi, destinasi, durasi, harga, gambar utama, gambar galeri (lainnya),** dan **fasilitas**.

### Tampilan Frontend yang Responsif
* Halaman daftar paket wisata yang **menarik** dan **mudah dinavigasi**.
* Halaman detail paket wisata dengan **informasi lengkap** dan **galeri gambar dinamis**.

### Pengelolaan Gambar Fleksibel
* Mendukung **gambar *dummy* dari *seeder*** (disimpan di `public/assets/images`).
* Mendukung **gambar yang diunggah melalui admin** (disimpan di `storage/app/public`).
* **Logika pintar di Blade** untuk memuat gambar dari sumber yang tepat, memastikan tampilan yang konsisten.

### Sistem Ulasan (Review)
* Pengguna yang **terautentikasi** dapat memberikan **rating bintang** dan **komentar** untuk setiap paket wisata.
* Menampilkan daftar ulasan yang komprehensif untuk setiap paket, menambah kredibilitas dan informasi bagi calon wisatawan.

### Struktur Data Terorganisir
* Menggunakan **Laravel Eloquent ORM** dengan `casts` untuk kolom array (seperti `gambar_lainnya` dan `fasilitas`), memastikan integritas dan kemudahan pengelolaan data.

### SEO-Friendly URLs
* Menggunakan **slug** untuk URL paket wisata agar lebih mudah dibaca, diingat, dan diindeks oleh mesin pencari.

## Teknologi yang Digunakan

* **Backend:**
    * PHP 8.x
    * Laravel 10.x
* **Database:**
    * MySQL (atau SQLite, PostgreSQL)
* **Frontend:**
    * Blade (Templating Engine Laravel)
    * Tailwind CSS (Framework CSS untuk styling cepat dan responsif)
    * JavaScript (ES6+)
    * Vite (Bundler aset untuk kompilasi CSS dan JS)
* **Lain-lain:**
    * Font Awesome (untuk ikon)
    * Google Fonts (Inter)

---

## Instalasi dan Setup Proyek

Ikuti langkah-langkah di bawah ini untuk menginstal dan menjalankan proyek "Bandung Vibes" di lingkungan lokal Anda.

### 1. Clone Repositori

```bash
git clone https://github.com/rhannalfa/bandung-vibes.git
cd bandung-vibes
````

### 2\. Instal Dependensi Composer

```bash
composer install
```

### 3\. Salin File `.env` dan Buat Kunci Aplikasi

```bash
cp .env.example .env
php artisan key:generate
```

### 4\. Konfigurasi Database

Buka file `.env` dan sesuaikan pengaturan database Anda:

```dotenv
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=bandung_vibes_db # Ganti dengan nama database Anda
DB_USERNAME=root             # Ganti dengan username database Anda
DB_PASSWORD=                 # Ganti dengan password database Anda
```

### 5\. Jalankan Migrasi Database dan Seeder

Ini akan membuat tabel-tabel database dan mengisi data *dummy*, termasuk paket wisata dan *path* gambarnya.

```bash
php artisan migrate:fresh --seed
```

> **Penting:** Perintah ini akan menghapus semua data dan struktur tabel yang ada, lalu menjalankannya ulang.

### 6\. Buat Symlink untuk Storage (Wajib untuk Gambar Upload)

```bash
php artisan storage:link
```

Ini membuat *symlink* dari `public/storage` ke `storage/app/public`, memungkinkan gambar yang diunggah melalui admin dapat diakses publik.

### 7\. Instal Dependensi NPM dan Kompilasi Aset Frontend

```bash
npm install
npm run dev  # Untuk mode pengembangan dengan hot-reloading
# atau
# npm run build # Untuk kompilasi aset produksi
```

> **Penting:** Jika Anda memiliki gambar *dummy* di `public/assets/images` yang langsung diakses oleh *seeder*, pastikan gambar tersebut secara fisik ada di lokasi `public/assets/images/paket-wisata/` dan `public/assets/images/paket-wisata/lainnya/` setelah menjalankan `npm run dev` / `npm run build`. Anda mungkin perlu menyalinnya secara manual ke `public` jika tidak ada *plugin* Vite/Mix yang mengelolanya.

### 8\. Jalankan Server Laravel

```bash
php artisan serve
```

Aplikasi akan tersedia di `http://127.0.0.1:8000` (atau port lain yang ditentukan).

-----

## Penggunaan Aplikasi

### Halaman Beranda / Daftar Paket Wisata

Akses `http://127.0.0.1:8000/paket-wisata` untuk melihat daftar paket wisata.

### Halaman Detail Paket Wisata

Klik salah satu paket dari daftar, atau akses langsung melalui *slug*, contoh: `http://127.0.0.1:8000/paket-wisata/pesona-lembang-tangkuban-perahu`.

### Panel Admin (Kelola Paket Wisata)

Akses `http://127.0.0.1:8000/admin/paket-wisata` (sesuaikan rute admin Anda jika berbeda). Anda mungkin perlu membuat pengguna admin dan mengimplementasikan otentikasi admin.

-----

## Struktur Folder Penting

  * `app/Models/PaketWisata.php`: Definisi model Eloquent untuk paket wisata.
  * `app/Http/Controllers/Admin/PaketWisataController.php`: Logika *backend* untuk manajemen paket wisata (CRUD).
  * `app/Http/Controllers/PaketWisataController.php`: (Jika ada) Logika *backend* untuk tampilan *frontend* (daftar & detail).
  * `database/seeders/PaketWisataSeeder.php`: Data *dummy* untuk mengisi tabel `paket_wisata`.
  * `resources/views/`: Direktori untuk file Blade *template* (`home/wisata/paket-wisata-detail.blade.php`, `admin/paket-wisata/index.blade.php`, dll.).
  * `public/assets/images/`: Direktori ini akan berisi gambar-gambar yang diakses langsung oleh *seeder* (static assets) setelah proses `npm run dev/build` atau disalin manual.
  * `storage/app/public/`: Direktori tempat gambar yang diunggah melalui panel admin akan disimpan. Diakses melalui *symlink* `public/storage`.
  * `routes/web.php`: Definisi rute web aplikasi.
  * `vite.config.js`: Konfigurasi untuk Vite, termasuk bagaimana aset *frontend* (CSS, JS, dan gambar jika disalin) diproses.

-----

## Catatan Penting Mengenai Gambar

Proyek ini menangani gambar dari dua sumber utama:

### 1\. Gambar dari Seeder (Aset Statis)

  * *Path* disimpan di *database* dengan format seperti `assets/images/paket-wisata/gambar.jpg`.
  * Secara fisik, file-file ini diharapkan berada di `public/assets/images/paket-wisata/` (atau sub-direktorinya).
  * Di Blade, gambar ini diakses menggunakan *helper* `{{ asset($path_gambar) }}`.
  * **Pastikan Anda menyalin file-file ini ke `public/assets/images` secara manual atau melalui konfigurasi aset bundler Anda (Vite/Laravel Mix).**

### 2\. Gambar yang Diunggah (Melalui Admin Panel)

  * *Path* disimpan di *database* dengan format relatif terhadap `storage/app/public/` (misalnya: `paket-wisata/nama-unik.jpg`).
  * Secara fisik, file-file ini berada di `storage/app/public/paket-wisata/`.
  * Di Blade, gambar ini diakses menggunakan *helper* `{{ Storage::url($path_gambar) }}`.
  * **Pastikan `php artisan storage:link` telah dijalankan untuk membuat *symlink* `public/storage`.**

### Logika di Blade

Dalam Blade *template* (`paket_terpopuler_bandung_blade` dan `detail_paket_wisata_blade`), terdapat fungsi *helper* PHP *inline* (`$getImageUrl`) yang secara cerdas menentukan apakah *path* gambar dimulai dengan `assets/images/` (lalu menggunakan `asset()`) atau tidak (lalu menggunakan `Storage::url()`). Ini memungkinkan satu kode untuk menangani kedua skenario sumber gambar.

-----

Dibuat dengan ❤️ oleh rhannalfa dan bantuan dari Gemini.
