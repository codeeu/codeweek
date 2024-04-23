<?php

namespace Database\Seeders\Resource;

use Illuminate\Database\Seeder;

class LevelSeeder extends Seeder
{
    /**
     * Run the database seeders.
     *
     * @return void
     */
    public function run()
    {
        //Create Levels
        create('App\ResourceLevel', [
            'id' => 1,
            'name' => 'Beginner',
            'position' => 10,
            'learn' => true,
        ]);
        create('App\ResourceLevel', [
            'id' => 2,
            'name' => 'Intermediate',
            'position' => 20,
            'learn' => true,
        ]);
        create('App\ResourceLevel', [
            'id' => 3,
            'name' => 'Advanced',
            'position' => 30,
            'learn' => true,
        ]);

        create('App\ResourceLevel', [
            'id' => 4,
            'name' => 'Pre-primary education',
            'position' => 10,
            'learn' => false,
            'teach' => true,
        ]);

        create('App\ResourceLevel', [
            'id' => 5,
            'name' => 'Primary school (5-12)',
            'position' => 20,
            'learn' => false,
            'teach' => true,
        ]);

        create('App\ResourceLevel', [
            'id' => 6,
            'name' => 'Lower secondary school (12-16)',
            'position' => 30,
            'learn' => false,
            'teach' => true,
        ]);

        create('App\ResourceLevel', [
            'id' => 7,
            'name' => 'Upper secondary school (16-18)',
            'position' => 40,
            'learn' => false,
            'teach' => true,
        ]);

        create('App\ResourceLevel', [
            'id' => 8,
            'name' => 'Higher Education',
            'position' => 50,
            'learn' => false,
            'teach' => true,
        ]);

        create('App\ResourceLevel', [
            'id' => 9,
            'name' => 'Other',
            'position' => 60,
            'learn' => false,
            'teach' => true,
        ]);
    }
}
