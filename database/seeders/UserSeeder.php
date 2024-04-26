<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeders.
     */
    public function run(): void
    {

        User::factory()->create([
            'firstname' => 'Super',
            'lastname' => 'Admin',
            'email' => \Config::get('codeweek.administrator'),
            'password' => bcrypt('secret'),
        ])->assignRole('super admin');

        Event::factory()->create(['creator_id' => 1]);

        for ($i = 1; $i < 60; $i++) {
            create(\App\User::class)->assignRole('ambassador');
        }

    }
}
