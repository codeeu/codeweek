<?php

namespace Database\Seeders\Resource;

use Illuminate\Database\Seeder;

class TypeSeeder extends Seeder
{
    /**
     * Run the database seeders.
     *
     * @return void
     */
    public function run(): void
    {
        create(\App\ResourceType::class, [
            'id' => 1,
            'name' => 'Tutorial',
            'position' => 10,
            'learn' => true,
            'teach' => true,
        ]);
        create(\App\ResourceType::class, [
            'id' => 2,
            'name' => 'Website',
            'position' => 20,
            'learn' => true,
            'teach' => true,
        ]);
        create(\App\ResourceType::class, [
            'id' => 3,
            'name' => 'Online Course',
            'position' => 30,
            'learn' => true,
            'teach' => true,
        ]);
        create(\App\ResourceType::class, [
            'id' => 4,
            'name' => 'Video',
            'position' => 40,
            'learn' => true,
            'teach' => true,
        ]);
        create(\App\ResourceType::class, [
            'id' => 5,
            'name' => 'Audio',
            'position' => 50,
            'learn' => true,
            'teach' => true,
        ]);
        create(\App\ResourceType::class, [
            'id' => 6,
            'name' => 'Application',
            'position' => 60,
            'learn' => true,
            'teach' => true,
        ]);
        create(\App\ResourceType::class, [
            'id' => 7,
            'name' => 'Game',
            'position' => 70,
            'learn' => true,
            'teach' => true,
        ]);
        create(\App\ResourceType::class, [
            'id' => 8,
            'name' => 'Graphic Material',
            'position' => 80,
            'learn' => true,
            'teach' => true,
        ]);
        create(\App\ResourceType::class, [
            'id' => 9,
            'name' => 'Presentation',
            'position' => 90,
            'learn' => true,
            'teach' => true,
        ]);
        create(\App\ResourceType::class, [
            'id' => 10,
            'name' => 'Toolkit',
            'position' => 100,
            'learn' => true,
            'teach' => true,
        ]);
        create(\App\ResourceType::class, [
            'id' => 11,
            'name' => 'Other',
            'position' => 110,
            'learn' => true,
            'teach' => true,
        ]);
        create(\App\ResourceType::class, [
            'id' => 12,
            'name' => 'Lesson Plan',
            'position' => 120,
            'learn' => false,
            'teach' => true,
        ]);
        create(\App\ResourceType::class, [
            'id' => 13,
            'name' => 'Guide',
            'position' => 130,
            'learn' => false,
            'teach' => true,
        ]);
    }
}
