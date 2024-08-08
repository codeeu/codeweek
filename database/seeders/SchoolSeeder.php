<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class SchoolSeeder extends Seeder
{
    /**
     * Run the database seeders.
     */
    public function run(): void
    {
        factory(App\School::class, 10)->create();
    }
}
