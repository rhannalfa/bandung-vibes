<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;
use App\Models\PaketWisata;

class UlasanFactory extends Factory
{
    public function definition(): array
    {
        $nonAdminUserIds = User::where('is_admin', false)->pluck('id');
        $daftarKomentarPositif = [
            'Perjalanan yang sangat menyenangkan! Semua destinasi dikunjungi tepat waktu dan pemandunya sangat ramah. Saya benar-benar menikmati setiap momennya.',
            'Luar biasa! Dari awal penjemputan sampai akhir tur, semuanya terorganisir dengan sangat baik. Kami bisa menikmati liburan dengan tenang tanpa pusing.',
            'Sangat menikmati seluruh rangkaian tur ini. Pilihan tempat wisatanya keren-keren, banyak spot foto bagus. Recommended banget!',
            'Pengalaman yang tak akan terlupakan. Semuanya berjalan lancar dan bahkan melebihi ekspektasi. Terima kasih banyak, saya sangat menikmati perjalanan ini.',
            'Menikmati banget perjalanan hari ini. Mobilnya nyaman, drivernya sopan, dan kami diberi waktu yang cukup di setiap lokasi. Sempurna!',
            'Ini baru liburan! Saya bisa santai dan menikmati pemandangan tanpa repot. Semua sudah diatur dengan baik. Pasti akan ikut tur lagi lain waktu.',
            'Hatur nuhun Bandung Vibes! Perjalanannya seru pisan, membuat liburan di Bandung jadi lebih bermakna. Saya dan keluarga sangat menikmati semua rangkaian turnya.',
            'Awalnya ragu, tapi ternyata keputusuan yang tepat. Saya sangat menikmati trip ini, pelayanannya profesional dan memuaskan. Top!',
        ];

        return [
            'user_id' => $this->faker->randomElement($nonAdminUserIds),
            'paket_wisata_id' => PaketWisata::inRandomOrder()->first()->id,
            'rating' => $this->faker->numberBetween(4, 5), // Rating tinggi
            'komentar' => $this->faker->randomElement($daftarKomentarPositif), // Cara yang lebih bersih
            'created_at' => $this->faker->dateTimeBetween('-1 month', 'now'),
            'updated_at' => now(),
        ];
    }
}