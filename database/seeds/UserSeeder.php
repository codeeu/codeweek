<?php

use App\User;
use Illuminate\Database\Seeder;


class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        create('App\User', [
            'firstname' => 'Alain',
            'lastname' => 'Van Driessche',
            'email' => 'alainvd@gmail.com',
            'password' => bcrypt(str_random(10))
        ])->assignRole('super admin');


        create('App\Event', ['creator_id' => 1]);

        for ($i = 1; $i < 60; $i++) {
            create('App\User')->assignRole('ambassador');
        }

    }
}
