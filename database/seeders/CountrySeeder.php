<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class CountrySeeder extends Seeder
{
    /**
     * Run the database seeders.
     */
    public function run(): void
    {
        $countries = [
            ['iso' => 'AD', 'name' => 'Andorra', 'longitude' => '1.234', 'latitude' => '5.678'],
            ['iso' => 'AT', 'name' => 'Austria', 'longitude' => '1.234', 'latitude' => '5.678'],
            ['iso' => 'BE', 'name' => 'Belgium', 'longitude' => '1.234', 'latitude' => '5.678'],
            ['iso' => 'BG', 'name' => 'Bulgaria', 'longitude' => '1.234', 'latitude' => '5.678'],
            ['iso' => 'HR', 'name' => 'Croatia', 'longitude' => '1.234', 'latitude' => '5.678'],
            ['iso' => 'CY', 'name' => 'Cyprus', 'longitude' => '1.234', 'latitude' => '5.678'],
            ['iso' => 'CZ', 'name' => 'Czech Republic', 'longitude' => '1.234', 'latitude' => '5.678'],
            ['iso' => 'DK', 'name' => 'Denmark', 'longitude' => '1.234', 'latitude' => '5.678'],
            ['iso' => 'EE', 'name' => 'Estonia', 'longitude' => '1.234', 'latitude' => '5.678'],
            ['iso' => 'FI', 'name' => 'Finland', 'longitude' => '1.234', 'latitude' => '5.678'],
            ['iso' => 'FR', 'name' => 'France', 'longitude' => '1.234', 'latitude' => '5.678'],
            ['iso' => 'GF', 'name' => 'French Guiana', 'longitude' => '1.234', 'latitude' => '5.678'],
            ['iso' => 'PF', 'name' => 'French Polynesia', 'longitude' => '1.234', 'latitude' => '5.678'],
            ['iso' => 'TF', 'name' => 'French Southern Territories', 'longitude' => '1.234', 'latitude' => '5.678'],
            ['iso' => 'DE', 'name' => 'Germany', 'longitude' => '1.234', 'latitude' => '5.678'],
            ['iso' => 'GI', 'name' => 'Gibraltar', 'longitude' => '1.234', 'latitude' => '5.678'],
            ['iso' => 'GR', 'name' => 'Greece', 'longitude' => '1.234', 'latitude' => '5.678'],
            ['iso' => 'IE', 'name' => 'Ireland', 'longitude' => '1.234', 'latitude' => '5.678'],
            ['iso' => 'IT', 'name' => 'Italy', 'longitude' => '1.234', 'latitude' => '5.678'],
            ['iso' => 'LV', 'name' => 'Latvia', 'longitude' => '1.234', 'latitude' => '5.678'],
            ['iso' => 'LT', 'name' => 'Lithuania', 'longitude' => '1.234', 'latitude' => '5.678'],
            ['iso' => 'LU', 'name' => 'Luxembourg', 'longitude' => '1.234', 'latitude' => '5.678'],
            ['iso' => 'NL', 'name' => 'Netherlands', 'longitude' => '1.234', 'latitude' => '5.678'],
            ['iso' => 'PT', 'name' => 'Portugal', 'longitude' => '1.234', 'latitude' => '5.678'],
            ['iso' => 'SE', 'name' => 'Sweden', 'longitude' => '1.234', 'latitude' => '5.678'],
            ['iso' => 'ES', 'name' => 'Spain', 'longitude' => '1.234', 'latitude' => '5.678'],
        ];

        //dd($countries[0]["iso"]);

        foreach ($countries as $country) {
            factory(App\Country::class)->create($country);
        }

    }
}
