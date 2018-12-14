<?php

use Illuminate\Database\Seeder;

class SubjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public
    function run()
    {
        create('App\ResourceSubject', [
            'id' => 1,
            'label' => 'Art',
            'position' => 10,
            'learn' => false,
            'teach' => true,
        ]);
        create('App\ResourceSubject', [
            'id' => 2,
            'label' => 'Biology',
            'position' => 20,
            'learn' => false,
            'teach' => true,
        ]);
        create('App\ResourceSubject', [
            'id' => 3,
            'label' => 'Chemistry',
            'position' => 30,
            'learn' => false,
            'teach' => true,
        ]);
        create('App\ResourceSubject', [
            'id' => 4,
            'label' => 'Computer Science',
            'position' => 40,
            'learn' => false,
            'teach' => true,
        ]);
        create('App\ResourceSubject', [
            'id' => 5,
            'label' => 'Culture',
            'position' => 50,
            'learn' => false,
            'teach' => true,
        ]);
        create('App\ResourceSubject', [
            'id' => 6,
            'label' => 'Economics',
            'position' => 60,
            'learn' => false,
            'teach' => true,
        ]);
        create('App\ResourceSubject', [
            'id' => 7,
            'label' => 'Foreign Languages',
            'position' => 70,
            'learn' => false,
            'teach' => true,
        ]);
        create('App\ResourceSubject', [
            'id' => 8,
            'label' => 'Geography',
            'position' => 80,
            'learn' => false,
            'teach' => true,
        ]);
        create('App\ResourceSubject', [
            'id' => 9,
            'label' => 'Geology',
            'position' => 90,
            'learn' => false,
            'teach' => true,
        ]);
        create('App\ResourceSubject', [
            'id' => 10,
            'label' => 'History',
            'position' => 100,
            'learn' => false,
            'teach' => true,
        ]);
        create('App\ResourceSubject', [
            'id' => 11,
            'label' => 'Language and Literature',
            'position' => 110,
            'learn' => false,
            'teach' => true,
        ]);
        create('App\ResourceSubject', [
            'id' => 12,
            'label' => 'Mathematics',
            'position' => 120,
            'learn' => false,
            'teach' => true,
        ]);
        create('App\ResourceSubject', [
            'id' => 13,
            'label' => 'Natural Sciences',
            'position' => 130,
            'learn' => false,
            'teach' => true,
        ]);
        create('App\ResourceSubject', [
            'id' => 14,
            'label' => 'Physical Education',
            'position' => 140,
            'learn' => false,
            'teach' => true,
        ]);
        create('App\ResourceSubject', [
            'id' => 15,
            'label' => 'Physics',
            'position' => 150,
            'learn' => false,
            'teach' => true,
        ]);
        create('App\ResourceSubject', [
            'id' => 16,
            'label' => 'Coding',
            'position' => 160,
            'learn' => false,
            'teach' => true,
        ]);
        create('App\ResourceSubject', [
            'id' => 17,
            'label' => 'Special Education Needs',
            'position' => 170,
            'learn' => false,
            'teach' => true,
        ]);
        create('App\ResourceSubject', [
            'id' => 18,
            'label' => 'Other',
            'position' => 180,
            'learn' => false,
            'teach' => true,
        ]);
    }
}
