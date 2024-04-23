<?php

namespace Database\Seeders\Resource;

use Illuminate\Database\Seeder;

class LevelSeeder extends Seeder
{
    /**
     * Run the database seeders.
     */
    public function run(): void
    {
        //Create Levels
        create(\App\ResourceLevel::class, [
            'id' => 1,
            'name' => 'Beginner',
            'position' => 10,
            'learn' => true,
        ]);
        create(\App\ResourceLevel::class, [
            'id' => 2,
            'name' => 'Intermediate',
            'position' => 20,
            'learn' => true,
        ]);
        create(\App\ResourceLevel::class, [
            'id' => 3,
            'name' => 'Advanced',
            'position' => 30,
            'learn' => true,
        ]);

        create(\App\ResourceLevel::class, [
            'id' => 4,
            'name' => 'Pre-primary education',
            'position' => 10,
            'learn' => false,
            'teach' => true,
        ]);

        create(\App\ResourceLevel::class, [
            'id' => 5,
            'name' => 'Primary school (5-12)',
            'position' => 20,
            'learn' => false,
            'teach' => true,
        ]);

        create(\App\ResourceLevel::class, [
            'id' => 6,
            'name' => 'Lower secondary school (12-16)',
            'position' => 30,
            'learn' => false,
            'teach' => true,
        ]);

        create(\App\ResourceLevel::class, [
            'id' => 7,
            'name' => 'Upper secondary school (16-18)',
            'position' => 40,
            'learn' => false,
            'teach' => true,
        ]);

        create(\App\ResourceLevel::class, [
            'id' => 8,
            'name' => 'Higher Education',
            'position' => 50,
            'learn' => false,
            'teach' => true,
        ]);

        create(\App\ResourceLevel::class, [
            'id' => 9,
            'name' => 'Other',
            'position' => 60,
            'learn' => false,
            'teach' => true,
        ]);
    }
}
