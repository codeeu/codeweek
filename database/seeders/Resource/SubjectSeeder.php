<?php

namespace Database\Seeders\Resource;

use Illuminate\Database\Seeder;

class SubjectSeeder extends Seeder
{
    /**
     * Run the database seeders.
     *
     * @return void
     */
    public function run()
    {
        create('App\ResourceSubject', [
            'id' => 1,
            'name' => 'Art',
            'position' => 10,
            'learn' => false,
            'teach' => true,
        ]);
        create('App\ResourceSubject', [
            'id' => 2,
            'name' => 'Biology',
            'position' => 20,
            'learn' => false,
            'teach' => true,
        ]);
        create('App\ResourceSubject', [
            'id' => 3,
            'name' => 'Chemistry',
            'position' => 30,
            'learn' => false,
            'teach' => true,
        ]);
        create('App\ResourceSubject', [
            'id' => 4,
            'name' => 'Computer Science',
            'position' => 40,
            'learn' => false,
            'teach' => true,
        ]);
        create('App\ResourceSubject', [
            'id' => 5,
            'name' => 'Culture',
            'position' => 50,
            'learn' => false,
            'teach' => true,
        ]);
        create('App\ResourceSubject', [
            'id' => 6,
            'name' => 'Economics',
            'position' => 60,
            'learn' => false,
            'teach' => true,
        ]);
        create('App\ResourceSubject', [
            'id' => 7,
            'name' => 'Foreign Languages',
            'position' => 70,
            'learn' => false,
            'teach' => true,
        ]);
        create('App\ResourceSubject', [
            'id' => 8,
            'name' => 'Geography',
            'position' => 80,
            'learn' => false,
            'teach' => true,
        ]);
        create('App\ResourceSubject', [
            'id' => 9,
            'name' => 'Geology',
            'position' => 90,
            'learn' => false,
            'teach' => true,
        ]);
        create('App\ResourceSubject', [
            'id' => 10,
            'name' => 'History',
            'position' => 100,
            'learn' => false,
            'teach' => true,
        ]);
        create('App\ResourceSubject', [
            'id' => 11,
            'name' => 'Language and Literature',
            'position' => 110,
            'learn' => false,
            'teach' => true,
        ]);
        create('App\ResourceSubject', [
            'id' => 12,
            'name' => 'Mathematics',
            'position' => 120,
            'learn' => false,
            'teach' => true,
        ]);
        create('App\ResourceSubject', [
            'id' => 20,
            'name' => 'Music',
            'position' => 125,
            'learn' => false,
            'teach' => true,
        ]);
        create('App\ResourceSubject', [
            'id' => 13,
            'name' => 'Natural Sciences',
            'position' => 130,
            'learn' => false,
            'teach' => true,
        ]);
        create('App\ResourceSubject', [
            'id' => 14,
            'name' => 'Physical Education',
            'position' => 140,
            'learn' => false,
            'teach' => true,
        ]);
        create('App\ResourceSubject', [
            'id' => 15,
            'name' => 'Physics',
            'position' => 150,
            'learn' => false,
            'teach' => true,
        ]);
        create('App\ResourceSubject', [
            'id' => 16,
            'name' => 'Coding',
            'position' => 35,
            'learn' => false,
            'teach' => true,
        ]);

        create('App\ResourceSubject', [
            'id' => 18,
            'name' => 'Programming',
            'position' => 160,
            'learn' => false,
            'teach' => true,
        ]);

        create('App\ResourceSubject', [
            'id' => 17,
            'name' => 'Special Education Needs',
            'position' => 170,
            'learn' => false,
            'teach' => true,
        ]);

        create('App\ResourceSubject', [
            'id' => 100,
            'name' => 'Other',
            'position' => 1000,
            'learn' => false,
            'teach' => true,
        ]);
    }
}
