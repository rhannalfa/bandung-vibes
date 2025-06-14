<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Ulasan;
use App\Models\User;
use App\Models\PaketWisata;

class UlasanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        // 1. Get all non-admin users and available tour packages.
        $regularUsers = User::where('is_admin', false)->get();
        $paketWisata = PaketWisata::all();

        // Safety Check: Ensure there are users and packages to review.
        if ($regularUsers->isEmpty() || $paketWisata->isEmpty()) {
            $this->command->info('Skipping Ulasan seeding: No non-admin users or tour packages found.');
            return;
        }

        // 2. Iterate through each non-admin user and create exactly one review for them.
        foreach ($regularUsers as $user) {
            // Check if this user already has a review to avoid duplicates if seeder is run multiple times.
            // This is an extra precaution, migrate:fresh is the best practice.
            if (Ulasan::where('user_id', $user->id)->exists()) {
                continue;
            }

            // Create one review using the factory.
            // We explicitly set the user_id and assign a random tour package.
            Ulasan::factory()->create([
                'user_id' => $user->id,
                'paket_wisata_id' => $paketWisata->random()->id,
            ]);
        }

        $this->command->info("Seeding completed. Each of the " . $regularUsers->count() . " non-admin users now has one review.");
    }
}
