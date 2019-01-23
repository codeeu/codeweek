<?php

use Illuminate\Database\Seeder;

class ProgrammingLanguageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        create('App\ResourceProgrammingLanguage', [
            'id' => 1,
            'position' => 10,
            'name' => 'Scratch',
        ]);
        create('App\ResourceProgrammingLanguage', [
            'id' => 2,
            'position' => 20,
            'name' => 'Java',
        ]);
        create('App\ResourceProgrammingLanguage', [
            'id' => 3,
            'position' => 30,
            'name' => 'Javascript',
        ]);
        create('App\ResourceProgrammingLanguage', [
            'id' => 4,
            'position' => 40,
            'name' => 'Python',
        ]);
        create('App\ResourceProgrammingLanguage', [
            'id' => 5,
            'position' => 50,
            'name' => 'Swift',
        ]);
        create('App\ResourceProgrammingLanguage', [
            'id' => 6,
            'position' => 60,
            'name' => 'Visual Programming',
        ]);
        create('App\ResourceProgrammingLanguage', [
            'id' => 7,
            'position' => 70,
            'name' => 'C++',
        ]);
        create('App\ResourceProgrammingLanguage', [
            'id' => 8,
            'position' => 80,
            'name' => 'CSS',
        ]);
        create('App\ResourceProgrammingLanguage', [
            'id' => 9,
            'position' => 90,
            'name' => 'HTML',
        ]);
        create('App\ResourceProgrammingLanguage', [
            'id' => 10,
            'position' => 100,
            'name' => 'HTML5',
        ]);
        create('App\ResourceProgrammingLanguage', [
            'id' => 11,
            'position' => 110,
            'name' => 'Raspberry Pi',
        ]);
        create('App\ResourceProgrammingLanguage', [
            'id' => 12,
            'position' => 120,
            'name' => 'Other',
        ]);

    }
}
