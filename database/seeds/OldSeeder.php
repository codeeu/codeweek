<?php

use Illuminate\Database\Seeder;

class OldSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {



        $db     = \Config::get('database.connections.mysql.database');
        $user   = \Config::get('database.connections.mysql.username');
        $pass   = \Config::get('database.connections.mysql.password');

        exec("mysql -u " . $user . " -p" . $pass . " " . $db . " < database/sql/old.sql");

    }
}
