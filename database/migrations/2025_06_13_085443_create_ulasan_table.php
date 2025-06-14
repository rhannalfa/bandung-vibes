<?php

// database/migrations/YYYY_MM_DD_HHMMSS_create_ulasan_table.php

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
        Schema::create('ulasan', function (Blueprint $table) {
            $table->id();
            // Foreign key ke tabel users (siapa yang memberikan ulasan)
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            // Foreign key ke tabel paket_wisata (ulasan untuk paket wisata mana)
            $table->foreignId('paket_wisata_id')->constrained('paket_wisata')->onDelete('cascade');
            $table->integer('rating')->unsigned(); // Rating bintang (misal: 1 sampai 5)
            $table->text('komentar')->nullable(); // Komentar/ulasan teks
            $table->timestamps(); // created_at dan updated_at

            // Menambahkan unique constraint agar satu user hanya bisa memberi 1 ulasan per paket wisata (opsional)
            // $table->unique(['user_id', 'paket_wisata_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ulasan');
    }
};
