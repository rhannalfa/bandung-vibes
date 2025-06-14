<?php

// database/migrations/..._create_paket_wisata_table.php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('paket_wisata', function (Blueprint $table) {
            $table->id();
            $table->string('nama_paket');
            $table->text('deskripsi_paket');
            $table->string('destinasi');
            $table->string('durasi')->nullable();
            $table->decimal('harga_paket', 10, 2);
            $table->string('gambar_utama')->nullable();
            $table->longText('gambar_lainnya')->nullable();
            $table->string('slug')->unique();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('paket_wisata');
    }
};
