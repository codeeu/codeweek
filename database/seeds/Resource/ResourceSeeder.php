<?php

use Illuminate\Database\Seeder;

class ResourceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $this->call(LevelSeeder::class);
        $this->call(TypeSeeder::class);
        $this->call(SubjectSeeder::class);
        $this->call(CategorySeeder::class);
        $this->call(LanguageSeeder::class);
        $this->call(ProgrammingLanguageSeeder::class);

    }
}
