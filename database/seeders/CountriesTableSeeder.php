<?php

namespace Database\Seeders;

use Eloquent;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CountriesTableSeeder extends Seeder
{
    /**
     * Run the database seeders.
     *
     * @return void
     */
    public function run()
    {
        Eloquent::unguard();

        $path = 'database/seeders/countries.sql';
        DB::unprepared(file_get_contents($path));
        $this->command->info('Country table seeded!');
    }
}
