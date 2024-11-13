<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class LeadingTeacherSeeder extends Seeder
{
    /**
     * Run the database seeders.
     */
    public function run(): void
    {

        $this->call(LeadingTeacherRoleSeeder::class);
        $this->call(CitiesTableSeeder::class);
        $this->call(LeadingTeacherExpertiseSeeder::class);

    }
}
