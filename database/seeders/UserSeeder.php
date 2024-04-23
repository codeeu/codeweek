<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeders.
     *
     * @return void
     */
    public function run()
    {

        create('App\User', [
            'firstname' => 'Super',
            'lastname' => 'Admin',
            'email' => \Config::get('codeweek.administrator'),
            'password' => bcrypt('secret'),
        ])->assignRole('super admin');

        create('App\Event', ['creator_id' => 1]);

        for ($i = 1; $i < 60; $i++) {
            create('App\User')->assignRole('ambassador');
        }

    }
}
