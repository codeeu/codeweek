<?php

use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        create('App\ResourceCategory', [
            'id' => 1,
            'label' => 'Coding',
            'position' => 10,
            'learn' => true,
            'teach' => true
        ]);
        create('App\ResourceCategory', [
            'id' => 2,
            'label' => 'Programming',
            'position' => 20,
            'learn' => true,
            'teach' => true
        ]);
        create('App\ResourceCategory', [
            'id' => 3,
            'label' => 'Computational Thinking',
            'position' => 30,
            'learn' => true,
            'teach' => true
        ]);
        create('App\ResourceCategory', [
            'id' => 4,
            'label' => 'Robotics',
            'position' => 40,
            'learn' => true,
            'teach' => true
        ]);
        create('App\ResourceCategory', [
            'id' => 5,
            'label' => 'Making',
            'position' => 50,
            'learn' => true,
            'teach' => true
        ]);
        create('App\ResourceCategory', [
            'id' => 6,
            'label' => 'Tinkering',
            'position' => 60,
            'learn' => true,
            'teach' => true
        ]);
        create('App\ResourceCategory', [
            'id' => 7,
            'label' => 'Computational Thinking',
            'position' => 70,
            'learn' => true,
            'teach' => true
        ]);
        create('App\ResourceCategory', [
            'id' => 8,
            'label' => 'Unplugged Activities',
            'position' => 80,
            'learn' => true,
            'teach' => true
        ]);
        create('App\ResourceCategory', [
            'id' => 9,
            'label' => 'Other',
            'position' => 90,
            'learn' => true,
            'teach' => true
        ]);
    }
}
