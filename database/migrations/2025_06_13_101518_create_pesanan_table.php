<?php

// database/migrations/YYYY_MM_DD_HHMMSS_create_pesanan_table.php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('pesanan', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade'); // Siapa yang memesan
            $table->foreignId('paket_wisata_id')->constrained('paket_wisata')->onDelete('cascade'); // Paket yang dipesan
            $table->string('kode_pesanan')->unique(); // Kode unik untuk setiap pesanan (misal: INV-YYYYMMDD-XXXX)
            $table->date('tanggal_tour'); // Tanggal pelaksanaan tur
            $table->unsignedInteger('jumlah_dewasa'); // Jumlah peserta dewasa
            $table->unsignedInteger('jumlah_anak')->default(0); // Jumlah peserta anak-anak (opsional)
            $table->decimal('total_harga', 10, 2); // Total harga pesanan
            $table->string('status_pesanan')->default('pending_payment'); // Status pesanan: pending_payment, confirmed, cancelled, completed
            $table->string('nama_pemesan'); // Nama kontak pemesan
            $table->string('email_pemesan'); // Email kontak pemesan
            $table->string('telepon_pemesan')->nullable(); // Telepon kontak pemesan
            $table->text('catatan_tambahan')->nullable(); // Catatan atau permintaan khusus
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pesanan');
    }
};
