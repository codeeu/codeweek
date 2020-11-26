<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeders.
     *
     * @return void
     */
    public function run()
    {

        $this->call(CountriesTableSeeder::class);
        $this->call(RolesAndPermissionsSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(AudienceTableSeeder::class);
        $this->call(ThemeTableSeeder::class);
        $this->call(ResourceSeeder::class);

        //$this->call(OldSeeder::class);
        //$this->call(EventSeeder::class);

    }
}
