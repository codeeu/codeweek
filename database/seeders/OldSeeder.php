<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class OldSeeder extends Seeder
{
    /**
     * Run the database seeders.
     */
    public function run(): void
    {

        $db = \Config::get('database.connections.mysql.database');
        $user = \Config::get('database.connections.mysql.username');
        $pass = \Config::get('database.connections.mysql.password');

        exec('mysql -u '.$user.' -p'.$pass.' '.$db.' < database/sql/old.sql');

    }
}
