<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class SchoolSeeder extends Seeder
{
    /**
     * Run the database seeders.
     *
     * @return void
     */
    public function run()
    {
        factory(App\School::class, 10)->create();
    }
}
