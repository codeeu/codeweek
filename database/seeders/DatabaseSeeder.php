<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeders.
     */
    public function run(): void
    {

        $this->call(CountriesTableSeeder::class);
        $this->call(CitiesTableSeeder::class);

        // Roles, permissions, users
        $this->call(RolesAndPermissionsSeeder::class);
        $this->call(LeadingTeacherRoleSeeder::class);
        $this->call(UserSeeder::class);

        // Additional data
        $this->call(AudienceTableSeeder::class);
        $this->call(ThemeTableSeeder::class);
        $this->call(EventSeeder::class);
        $this->call(OldSeeder::class);
        // ... and so on

        // Resource seeders
        $this->call(ResourceEditorRoleSeeder::class);
        $this->call(DreamJobRoleModelSeeder::class);
        $this->call(DreamJobsPageSeeder::class);
        $this->call(HackathonsPageSeeder::class);

        $this->call(SchoolSeeder::class);


    }
}
