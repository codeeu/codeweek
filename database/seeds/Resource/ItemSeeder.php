<?php

use Illuminate\Database\Seeder;

class ItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $levels = App\ResourceLevel::all();
        $types = App\ResourceType::all();
        $subjects = App\ResourceSubject::all();
        $categories = App\ResourceCategory::all();
        $languages = App\ResourceLanguage::all();
        $programmmingLanguages = App\ResourceProgrammingLanguage::all();

        create('App\ResourceItem', [], 50);

        App\ResourceItem::all()->each(function ($item) use ($levels, $types, $subjects, $categories, $languages, $programmmingLanguages) {
            $item->levels()->attach(
                $levels->random(rand(1, 3))->pluck('id')->toArray()
            );

            $item->types()->attach(
                $types->random(rand(1, 3))->pluck('id')->toArray()
            );

            $item->subjects()->attach(
                $subjects->random(rand(1, 3))->pluck('id')->toArray()
            );

            $item->categories()->attach(
                $categories->random(rand(1, 3))->pluck('id')->toArray()
            );

            $item->languages()->attach(
                $languages->random(rand(1, 3))->pluck('id')->toArray()
            );

            $item->programmingLanguages()->attach(
                $programmmingLanguages->random(rand(1, 3))->pluck('id')->toArray()
            );
        });


    }
}
