<?php

namespace Database\Seeders\Resource;

use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeders.
     */
    public function run(): void
    {
        create(\App\ResourceCategory::class, [
            'id' => 1,
            'name' => 'Coding',
            'position' => 10,
            'learn' => true,
            'teach' => true,
        ]);
        create(\App\ResourceCategory::class, [
            'id' => 2,
            'name' => 'Programming',
            'position' => 20,
            'learn' => true,
            'teach' => true,
        ]);
        create(\App\ResourceCategory::class, [
            'id' => 3,
            'name' => 'Computational Thinking',
            'position' => 30,
            'learn' => true,
            'teach' => true,
        ]);
        create(\App\ResourceCategory::class, [
            'id' => 4,
            'name' => 'Robotics',
            'position' => 40,
            'learn' => true,
            'teach' => true,
        ]);
        create(\App\ResourceCategory::class, [
            'id' => 5,
            'name' => 'Making',
            'position' => 50,
            'learn' => true,
            'teach' => true,
        ]);
        create(\App\ResourceCategory::class, [
            'id' => 6,
            'name' => 'Tinkering',
            'position' => 60,
            'learn' => true,
            'teach' => true,
        ]);
        create(\App\ResourceCategory::class, [
            'id' => 7,
            'name' => 'Unplugged Activities',
            'position' => 70,
            'learn' => true,
            'teach' => true,
        ]);
        create(\App\ResourceCategory::class, [
            'id' => 8,
            'name' => 'Other',
            'position' => 80,
            'learn' => true,
            'teach' => true,
        ]);
    }
}
