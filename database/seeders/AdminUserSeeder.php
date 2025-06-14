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
            'name' => 'Raihan Alfarizi',
            'nickname' => 'rhannalfa',
            'email' => 'rhan@example.com',
            'password' => Hash::make('password'),
            'is_admin' => false,
            'email_verified_at' => Carbon::now(), // <-- Tambahkan baris ini juga jika user biasa otomatis verified
        ]);

        // User Biasa tanpa nickname
        User::create([
            'name' => 'Raka Alfiansyah',
            'nickname' => 'Vcols',
            'email' => 'vcols@example.com',
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

        User::create([
            'name' => 'Yulia Lestari Ningsih',
            'nickname' => 'Yulia LN',
            'email' => 'yulia@example.com',
            'password' => Hash::make('password'),
            'is_admin' => false,
            'email_verified_at' => Carbon::now(), // <-- Tambahkan baris ini juga
        ]);

        User::create([
            'name' => 'Shandy Muhammad ',
            'nickname' => 'Shandy',
            'email' => 'Shandy@example.com',
            'password' => Hash::make('password'),
            'is_admin' => false,
            'email_verified_at' => Carbon::now(), // <-- Tambahkan baris ini juga
        ]);

        User::create([
            'name' => 'Raditya Raihan',
            'nickname' => 'Radit Pro',
            'email' => 'radit@example.com',
            'password' => Hash::make('password'),
            'is_admin' => false,
            'email_verified_at' => Carbon::now(), // <-- Tambahkan baris ini juga
        ]);

        User::create([
            'name' => 'Rizka Aulia',
            'nickname' => 'Rizka A',
            'email' => 'rizka@example.com',
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
