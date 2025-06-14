<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        // User::factory(10)->create();
        // Panggil seeder AdminUserSeeder
        $this->call([
            AdminUserSeeder::class,
            PaketWisataSeeder::class,
            // Jika Anda punya seeder untuk PaketWisata dan Transaksi, panggil juga di sini
            // PaketWisataSeeder::class,
            // TransaksiSeeder::class,
        ]);
        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);

         // Aktifkan kembali pengecekan foreign key
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
