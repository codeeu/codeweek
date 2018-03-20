<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UserSeeder::class);
        $this->call(CountriesTableSeeder::class);
        $this->call(AudienceTableSeeder::class);
        $this->call(ThemeTableSeeder::class);
        $this->call(EventSeeder::class);
        $this->call(SchoolSeeder::class);
    }
}
