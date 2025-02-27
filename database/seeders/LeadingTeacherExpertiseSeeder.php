<?php

namespace Database\Seeders;

use App\LeadingTeacherExpertise;
use Illuminate\Database\Seeder;

class LeadingTeacherExpertiseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Ensure data is seeded only if it doesn't already exist
        $expertises = [
            ['position' => 10, 'name' => 'Teacher Trainer'],
            ['position' => 20, 'name' => 'Community Organiser'],
            ['position' => 30, 'name' => 'Expert in unplugged programming'],
            ['position' => 40, 'name' => 'Expert in Scratch'],
            ['position' => 50, 'name' => 'Expert in Robotics'],
            ['position' => 60, 'name' => 'Expert in programming (Python, C++, SQL, etc.)'],
            ['position' => 70, 'name' => 'Expert in remote/hybrid teaching'],
            ['position' => 80, 'name' => 'Expert in use of remote teaching platforms'],
        ];

        foreach ($expertises as $expertise) {
            LeadingTeacherExpertise::updateOrCreate(
                ['name' => $expertise['name']],  // Check for existing entry by name
                ['position' => $expertise['position']]
            );
        }

        $this->command->info("✅ Leading teacher expertises seeded successfully!");
    }
}
