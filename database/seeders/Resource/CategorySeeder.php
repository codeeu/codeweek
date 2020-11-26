<?php

namespace Database\Seeders\Resource;

use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeders.
     *
     * @return void
     */
    public function run()
    {
        create('App\ResourceCategory', [
            'id' => 1,
            'name' => 'Coding',
            'position' => 10,
            'learn' => true,
            'teach' => true
        ]);
        create('App\ResourceCategory', [
            'id' => 2,
            'name' => 'Programming',
            'position' => 20,
            'learn' => true,
            'teach' => true
        ]);
        create('App\ResourceCategory', [
            'id' => 3,
            'name' => 'Computational Thinking',
            'position' => 30,
            'learn' => true,
            'teach' => true
        ]);
        create('App\ResourceCategory', [
            'id' => 4,
            'name' => 'Robotics',
            'position' => 40,
            'learn' => true,
            'teach' => true
        ]);
        create('App\ResourceCategory', [
            'id' => 5,
            'name' => 'Making',
            'position' => 50,
            'learn' => true,
            'teach' => true
        ]);
        create('App\ResourceCategory', [
            'id' => 6,
            'name' => 'Tinkering',
            'position' => 60,
            'learn' => true,
            'teach' => true
        ]);
        create('App\ResourceCategory', [
            'id' => 7,
            'name' => 'Unplugged Activities',
            'position' => 70,
            'learn' => true,
            'teach' => true
        ]);
        create('App\ResourceCategory', [
            'id' => 8,
            'name' => 'Other',
            'position' => 80,
            'learn' => true,
            'teach' => true
        ]);
    }
}
