<?php

use Illuminate\Database\Seeder;

class CountrySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $countries = [
            ['iso' => 'AD', 'name' => 'Andorra'],
            ['iso' => 'AT', 'name' => 'Austria'],
            ['iso' => 'BE', 'name' => 'Belgium'],
            ['iso' => 'BG', 'name' => 'Bulgaria'],
            ['iso' => 'HR', 'name' => 'Croatia'],
            ['iso' => 'CY', 'name' => 'Cyprus'],
            ['iso' => 'CZ', 'name' => 'Czech Republic'],
            ['iso' => 'DK', 'name' => 'Denmark'],
            ['iso' => 'EE', 'name' => 'Estonia'],
            ['iso' => 'FI', 'name' => 'Finland'],
            ['iso' => 'FR', 'name' => 'France'],
            ['iso' => 'GF', 'name' => 'French Guiana'],
            ['iso' => 'PF', 'name' => 'French Polynesia'],
            ['iso' => 'TF', 'name' => 'French Southern Territories'],
            ['iso' => 'DE', 'name' => 'Germany'],
            ['iso' => 'GI', 'name' => 'Gibraltar'],
            ['iso' => 'GR', 'name' => 'Greece'],
            ['iso' => 'IE', 'name' => 'Ireland'],
            ['iso' => 'IT', 'name' => 'Italy'],
            ['iso' => 'LV', 'name' => 'Latvia'],
            ['iso' => 'LT', 'name' => 'Lithuania'],
            ['iso' => 'LU', 'name' => 'Luxembourg'],
            ['iso' => 'NL', 'name' => 'Netherlands'],
            ['iso' => 'PT', 'name' => 'Portugal'],
            ['iso' => 'SE', 'name' => 'Sweden'],
            ['iso' => 'ES', 'name' => 'Spain'],
        ];

        //dd($countries[0]["iso"]);

        foreach ($countries as $country) {
            factory(App\Country::class)->create($country);
        }


    }
}
