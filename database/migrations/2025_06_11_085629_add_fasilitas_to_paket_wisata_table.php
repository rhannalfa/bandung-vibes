<?php

// database/migrations/YYYY_MM_DD_HHMMSS_add_fasilitas_to_paket_wisata_table.php
// (YYYY_MM_DD_HHMMSS adalah timestamp otomatis yang berbeda di setiap komputer)

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     * Ini akan menambahkan kolom 'fasilitas' ke tabel 'paket_wisata'.
     */
    public function up(): void
    {
        Schema::table('paket_wisata', function (Blueprint $table) {
            // Kolom untuk fasilitas (akan disimpan sebagai JSON array of strings)
            // Ditempatkan setelah 'gambar_lainnya' atau sesuaikan posisinya jika Anda punya kolom lain
            $table->longText('fasilitas')->nullable()->after('gambar_lainnya');
        });
    }

    /**
     * Reverse the migrations.
     * Ini akan menghapus kolom 'fasilitas' saat rollback.
     */
    public function down(): void
    {
        Schema::table('paket_wisata', function (Blueprint $table) {
            $table->dropColumn('fasilitas');
        });
    }
};
