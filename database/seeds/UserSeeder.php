<?php

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
            'avatar' => 'none',
            'provider' => 'none',
            'password' => bcrypt('secret'),
        ]);
    }
}
