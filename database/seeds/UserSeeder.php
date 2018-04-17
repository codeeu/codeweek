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

        create('App\User',[
            'firstname' => 'Alain',
            'lastname' => 'Van Driessche',
            'email' => 'alainvd@gmail.com',
            'password' => bcrypt('secret')
        ])->assignRole('super admin');


        create('App\User',[
            'firstname' => 'Alain',
            'lastname' => 'Van Driessche',
            'email' => 'alainvd@hotmail.com',
            'password' => bcrypt('secret')
        ])->assignRole('ambassador');


        for($i = 1; $i < 60; $i++){
            create('App\User')->assignRole('ambassador');
        }

    }
}
