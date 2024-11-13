<?php

namespace Database\Seeders\Resource;

use Illuminate\Database\Seeder;

class ResourceSeeder extends Seeder
{
    /**
     * Run the database seeders.
     */
    public function run(): void
    {

        $this->call(LevelSeeder::class);
        $this->call(TypeSeeder::class);
        $this->call(SubjectSeeder::class);
        $this->call(CategorySeeder::class);
        $this->call(LanguageSeeder::class);
        $this->call(ProgrammingLanguageSeeder::class);
        $this->call(ItemSeeder::class);

    }
}
