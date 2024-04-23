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
        create(LeadingTeacherExpertise::class, [
            'id' => 1,
            'position' => 10,
            'name' => 'Teacher Trainer',
        ]);
        create(LeadingTeacherExpertise::class, [
            'id' => 2,
            'position' => 20,
            'name' => 'Community Organiser',
        ]);
        create(LeadingTeacherExpertise::class, [
            'id' => 3,
            'position' => 30,
            'name' => 'Expert in unplugged programming',
        ]);
        create(LeadingTeacherExpertise::class, [
            'id' => 4,
            'position' => 40,
            'name' => 'Expert in Scratch',
        ]);
        create(LeadingTeacherExpertise::class, [
            'id' => 5,
            'position' => 50,
            'name' => 'Expert in Robotics',
        ]);
        create(LeadingTeacherExpertise::class, [
            'id' => 6,
            'position' => 60,
            'name' => 'Expert in programming (Python, C++, SQL, etc.)',
        ]);
        create(LeadingTeacherExpertise::class, [
            'id' => 7,
            'position' => 70,
            'name' => 'Expert in remote/hybrid teaching',
        ]);
        create(LeadingTeacherExpertise::class, [
            'id' => 8,
            'position' => 80,
            'name' => 'Expert in use of remote teaching platforms',
        ]);

    }
}
