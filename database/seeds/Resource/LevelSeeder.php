<?php

use Illuminate\Database\Seeder;

class LevelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Create Levels
        create('App\ResourceLevel', [
            'id' => 1,
            'label' => 'Beginner',
            'position' => 10,
            'learn' => true
        ]);
        create('App\ResourceLevel', [
            'id' => 2,
            'label' => 'Intermediate',
            'position' => 20,
            'learn' => true
        ]);
        create('App\ResourceLevel', [
            'id' => 3,
            'label' => 'Advanced',
            'position' => 30,
            'learn' => true
        ]);

        create('App\ResourceLevel', [
            'id' => 4,
            'label' => 'Pre-primary education',
            'position' => 10,
            'learn' => false,
            'teach'=> true
        ]);

        create('App\ResourceLevel', [
            'id' => 5,
            'label' => 'Primary school (5-12)',
            'position' => 20,
            'learn' => false,
            'teach'=> true
        ]);

        create('App\ResourceLevel', [
            'id' => 6,
            'label' => 'Lower secondary school (12-16)',
            'position' => 30,
            'learn' => false,
            'teach'=> true
        ]);


        create('App\ResourceLevel', [
            'id' => 7,
            'label' => 'Upper secondary school (16-18)',
            'position' => 40,
            'learn' => false,
            'teach'=> true
        ]);

        create('App\ResourceLevel', [
            'id' => 8,
            'label' => 'Higher Education',
            'position' => 50,
            'learn' => false,
            'teach'=> true
        ]);

        create('App\ResourceLevel', [
            'id' => 9,
            'label' => 'Other',
            'position' => 60,
            'learn' => false,
            'teach'=> true
        ]);
    }
}
