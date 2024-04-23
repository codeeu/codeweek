<?php

namespace Database\Seeders;

use Eloquent;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CitiesTableSeeder extends Seeder
{
    /**
     * Run the database seeders.
     *
     * @return void
     */
    public function run(): void
    {
        Eloquent::unguard();

        $path = 'database/seeders/cities.sql';
        DB::unprepared(file_get_contents($path));
        $this->command->info('Cities table seeded!');
    }
}
