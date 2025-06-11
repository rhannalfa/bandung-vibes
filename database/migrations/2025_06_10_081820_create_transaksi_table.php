<?php

// database/migrations/YYYY_MM_DD_HHMMSS_create_transaksi_table.php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('transaksi', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->foreignId('paket_wisata_id')->constrained('paket_wisata')->onDelete('cascade'); // Pastikan tabel paket_wisata sudah/akan dibuat
            $table->integer('jumlah_peserta');
            $table->decimal('total_harga', 10, 2);
            $table->string('status_pembayaran')->default('pending'); // 'pending', 'sukses', 'gagal'
            $table->string('kode_transaksi')->unique()->nullable(); // Opsional
            $table->string('metode_pembayaran')->nullable(); // Opsional
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('transaksi');
    }
};
