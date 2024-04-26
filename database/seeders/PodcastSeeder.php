<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class PodcastSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $this->call([
            PodcastGuestSeeder::class,
            PodcastResourceSeeder::class,
        ]);
    }
}
