<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\User;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\File;

class LeadingTeacherSeeder extends Seeder
{
    /**
     * Run the database seeders.
     */
    public function run(): void
    {
        // Call related seeders first
        $this->call(LeadingTeacherRoleSeeder::class);
        $this->call(CitiesTableSeeder::class);
        $this->call(LeadingTeacherExpertiseSeeder::class);

        // Load JSON File
        $jsonPath = storage_path('app/leading_teachers.json');

        if (!File::exists($jsonPath)) {
            $this->command->error("❌ JSON file not found: $jsonPath");
            return;
        }

        // Decode JSON
        $jsonData = File::get($jsonPath);
        $teachers = json_decode($jsonData, true);

        if (!$teachers) {
            $this->command->error("❌ Invalid JSON structure.");
            return;
        }

        // Get the "leading teacher" role
        $role = Role::where('name', 'leading teacher')->first();
        if (!$role) {
            $this->command->error("❌ Role 'leading teacher' does not exist!");
            return;
        }

        // Insert Data
        $count = 0;
        foreach ($teachers as $teacherData) {
            // Create or update user
            $user = User::updateOrCreate(
                ['email' => $teacherData['email']], // Ensure uniqueness by email
                [
                    'firstname' => $teacherData['firstname'] ?? '',
                    'lastname' => $teacherData['lastname'] ?? '',
                    'email' => $teacherData['email'],
                    'country_iso' => $teacherData['country_iso'] ?? null,
                    'twitter' => $teacherData['twitter'] ?? null,
                    'website' => $teacherData['website'] ?? null,
                    'bio' => $teacherData['bio'] ?? null,
                    'avatar_path' => $teacherData['avatar_path'] ?? '/images/default-avatar.png',
                    'city_id' => $teacherData['city_id'] ?? null,
                    'email_verified_at' => $teacherData['email_verified_at'] ?? now(),
                ]
            );

            // Assign role if not already assigned
            if (!$user->hasRole('leading teacher')) {
                $user->assignRole($role);
            }

            $count++;
        }

        $this->command->info("✅ Imported $count leading teachers successfully!");
    }
}
