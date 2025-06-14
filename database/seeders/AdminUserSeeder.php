<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Carbon; // Penting: Tambahkan ini untuk Carbon

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // User Admin
        User::create([
            'name' => 'Admin Bandung Vibes',
            'nickname' => 'admin_bv',
            'email' => 'admin@example.com',
            'password' => Hash::make('password'),
            'is_admin' => true,
            'email_verified_at' => Carbon::now(), // <-- Tambahkan baris ini
        ]);

        // User Biasa (dengan nickname)
        User::create([
            'name' => 'Pengguna Aplikasi',
            'nickname' => 'pengguna_bv',
            'email' => 'user@example.com',
            'password' => Hash::make('password'),
            'is_admin' => false,
            'email_verified_at' => Carbon::now(), // <-- Tambahkan baris ini juga jika user biasa otomatis verified
        ]);

        // User Biasa tanpa nickname
        User::create([
            'name' => 'Pengguna Tanpa Nickname',
            'nickname' => null,
            'email' => 'tanpa_nickname@example.com',
            'password' => Hash::make('password'),
            'is_admin' => false,
            'email_verified_at' => Carbon::now(), // <-- Tambahkan baris ini juga
        ]);

        User::create([
            'name' => 'Rakhly Arief Putranto',
            'nickname' => 'Rakel',
            'email' => 'rakel@example.com',
            'password' => Hash::make('password'),
            'is_admin' => false,
            'email_verified_at' => Carbon::now(), // <-- Tambahkan baris ini juga
        ]);

        // Opsional: Jika Anda menggunakan UserFactory dan ingin mereka terverifikasi
        // Pastikan definisi factory Anda juga menambahkan 'email_verified_at'
        // User::factory(5)->create([
        //     'email_verified_at' => Carbon::now(),
        // ]);
    }
}
