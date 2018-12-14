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
            'label' => 'Scratch',
        ]);
        create('App\ResourceProgrammingLanguage', [
            'id' => 2,
            'position' => 20,
            'label' => 'Java',
        ]);
        create('App\ResourceProgrammingLanguage', [
            'id' => 3,
            'position' => 30,
            'label' => 'Javascript',
        ]);
        create('App\ResourceProgrammingLanguage', [
            'id' => 4,
            'position' => 40,
            'label' => 'Python',
        ]);
        create('App\ResourceProgrammingLanguage', [
            'id' => 5,
            'position' => 50,
            'label' => 'Swift',
        ]);
        create('App\ResourceProgrammingLanguage', [
            'id' => 6,
            'position' => 60,
            'label' => 'Visual Programming',
        ]);
    }
}
