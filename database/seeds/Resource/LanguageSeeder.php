<?php

use Illuminate\Database\Seeder;

class LanguageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        create('App\ResourceLanguage', [
            'id' => 1,
            'name' => 'English',
            'position' => 10
        ]);

        create('App\ResourceLanguage', [
            'id' => 2,
            'name' => 'French',
            'position' => 20
        ]);

        create('App\ResourceLanguage', [
            'id' => 3,
            'name' => 'Spanish',
            'position' => 30
        ]);
    }
}
