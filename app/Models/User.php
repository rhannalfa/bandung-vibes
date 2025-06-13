<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail; // Pastikan ini diimpor jika Anda menggunakan verifikasi email

class User extends Authenticatable implements MustVerifyEmail // implements MustVerifyEmail jika Anda menggunakan verifikasi email
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'nickname',
        'email',
        'password',
        'is_admin',
        // Hapus 'role' jika Anda tidak menggunakan kolom 'role' secara eksplisit di database
        // dan hanya mengandalkan 'is_admin' untuk multi-login.
        // Jika Anda punya kolom 'role' di DB untuk tujuan lain, biarkan saja.
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
            'is_admin' => 'boolean',
            // Jika Anda memiliki kolom 'role' di DB dan ingin meng-cast-nya, tambahkan di sini juga
            // 'role' => 'string', // Contoh jika 'role' adalah string dan ingin di-cast
        ];
    }

    // Relasi: Satu user bisa memiliki banyak ulasan
    public function ulasan()
    {
        return $this->hasMany(Ulasan::class);
    }

        // Relasi Satu user bisa memiliki banyak pesanan
    public function pesanan()
    {
        return $this->hasMany(Pesanan::class);
    }
}
