<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();
        // Panggil seeder AdminUserSeeder
        $this->call([
            AdminUserSeeder::class,
            // Jika Anda punya seeder untuk PaketWisata dan Transaksi, panggil juga di sini
            // PaketWisataSeeder::class,
            // TransaksiSeeder::class,
        ]);
        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);
    }
}
