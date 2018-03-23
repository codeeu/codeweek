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
        DB::table('users')->insert([
            'name' => 'Alain Van Driessche',
            'email' => 'alainvd@gmail.com',
            'password' => bcrypt('secret'),
        ]);

        DB::table('users')->insert([
            'name' => 'Alain Van Driessche',
            'email' => 'alainvd@hotmail.com',
            'password' => bcrypt('secret'),
        ]);

        $admin = User::where('email','alainvd@gmail.com')->firstOrFail();
        $admin->assignRole('super admin');


    }
}
