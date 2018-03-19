<?php

use Illuminate\Database\Seeder;

class AudienceTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('audiences')->insert([
            'id' => 1,
            'name' => 'Pre-school children'
        ]);
        DB::table('audiences')->insert([
            'id' => 2,
            'name' => 'Elementary school students'
        ]);
        DB::table('audiences')->insert([
            'id' => 3,
            'name' => 'High school students'
        ]);
        DB::table('audiences')->insert([
            'id' => 4,
            'name' => 'Graduate students'
        ]);
        DB::table('audiences')->insert([
            'id' => 5,
            'name' => 'Post graduate students'
        ]);
        DB::table('audiences')->insert([
            'id' => 6,
            'name' => 'Employed adults'
        ]);
        DB::table('audiences')->insert([
            'id' => 7,
            'name' => 'Unemployed adults'
        ]);
        DB::table('audiences')->insert([
            'id' => 8,
            'name' => 'Other (see description)'
        ]);
    }
}


