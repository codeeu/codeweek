<?php

use Illuminate\Database\Seeder;

class TypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        create('App\ResourceType', [
            'id' => 1,
            'label' => 'Tutorial',
            'position' => 10,
            'learn' => true,
            'teach' => true
        ]);
        create('App\ResourceType', [
            'id' => 2,
            'label' => 'Website',
            'position' => 20,
            'learn' => true,
            'teach' => true
        ]);
        create('App\ResourceType', [
            'id' => 3,
            'label' => 'Online Course',
            'position' => 30,
            'learn' => true,
            'teach' => true
        ]);
        create('App\ResourceType', [
            'id' => 4,
            'label' => 'Video',
            'position' => 40,
            'learn' => true,
            'teach' => true
        ]);
        create('App\ResourceType', [
            'id' => 5,
            'label' => 'Audio',
            'position' => 50,
            'learn' => true,
            'teach' => true
        ]);
        create('App\ResourceType', [
            'id' => 6,
            'label' => 'Application',
            'position' => 60,
            'learn' => true,
            'teach' => true
        ]);
        create('App\ResourceType', [
            'id' => 7,
            'label' => 'Game',
            'position' => 70,
            'learn' => true,
            'teach' => true
        ]);
        create('App\ResourceType', [
            'id' => 8,
            'label' => 'Graphic Material',
            'position' => 80,
            'learn' => true,
            'teach' => true
        ]);
        create('App\ResourceType', [
            'id' => 9,
            'label' => 'Presentation',
            'position' => 90,
            'learn' => true,
            'teach' => true
        ]);
        create('App\ResourceType', [
            'id' => 10,
            'label' => 'Toolkit',
            'position' => 100,
            'learn' => true,
            'teach' => true
        ]);
        create('App\ResourceType', [
            'id' => 11,
            'label' => 'Other',
            'position' => 110,
            'learn' => true,
            'teach' => true
        ]);
        create('App\ResourceType', [
            'id' => 12,
            'label' => 'Lesson Plan',
            'position' => 120,
            'learn' => false,
            'teach' => true
        ]);
    }
}
