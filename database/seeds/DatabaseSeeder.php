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

        $this->call(CountriesTableSeeder::class);
        $this->call(RolesAndPermissionsSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(AudienceTableSeeder::class);
        $this->call(ThemeTableSeeder::class);
        //$this->call(OldSeeder::class);
        //$this->call(EventSeeder::class);

    }
}
