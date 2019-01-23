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


        $item = create('App\ResourceItem', [
            'name' => 'Hopscotch',
            'description' => 'Application for young children. Users can learn how to build applications or their own versions of popular App Store games like "Crossy Road" and "Subway Surfers".',
            'source' => 'https://www.gethopscotch.com/',
            'thumbnail' => 'https://static1.squarespace.com/static/5980df7bebbd1ad69ea06814/t/59e6165780bd5e92ef8117d3/1536670159811/?format=1500w',
            'learn' => true,
        ]);

        $item->types()->attach([2, 6, 7]);
        $item->categories()->attach([1]);
        $item->programmingLanguages()->attach([6]);
        $item->levels()->attach([1]);
        $item->languages()->attach([1]);

        $item = create('App\ResourceItem', [
            'name' => 'Coder Dojo',
            'description' => 'Official website of CoderJojo, a worldwide community of coding enthousiasts with local and regional clubs. Offers resources, information on how to start a club or how to find one nearby.',
            'source' => 'https://coderdojo.com/',
            'thumbnail' => 'https://coderdojo.com/_nuxt/img/coderdojo.761bb66.svg',
            'learn' => true,
        ]);

        $item->types()->attach([1,2]);
        $item->categories()->attach([1,5]);
        $item->programmingLanguages()->attach([6,8,9]);
        $item->levels()->attach([1]);
        $item->languages()->attach([1]);

        $item = create('App\ResourceItem', [
            'name' => 'Coder DoJo Kata',
            'description' => 'Kata is the CoderDojo community resource sharing platform. It is a tool for members of the CoderDojo Community to discover and share resources that they have found valuable in running their Dojos. It provides resources for both organisers and learners shared by other members of the CoderDojo community.',
            'source' => 'http://kata.coderdojo.com/wiki/Kata',
            'thumbnail' => 'http://kata.coderdojo.com/skins/CoderDojoKata/images/logo.png',
            'learn' => true,
        ]);

        $item->types()->attach([1,3,4]);
        $item->categories()->attach([1]);
        $item->programmingLanguages()->attach([3,9]);
        $item->levels()->attach([1]);
        $item->languages()->attach([1]);

        $item = create('App\ResourceItem', [
            'name' => 'Run Marco!',
            'description' => 'Online platform environment with instructions on how to create web and mobile applications.',
            'source' => 'https://www.brainpop.com/games/runmarco/',
            'thumbnail' => 'http://teacherstechtoolbox.com/wp-content/uploads/2015/10/All-Can-Code-Run-Marco.png',
            'learn' => true,
        ]);

        $item->types()->attach([2,3,6]);
        $item->categories()->attach([1]);
        //$item->programmingLanguages()->attach([]);
        $item->levels()->attach([1]);
        $item->languages()->attach([1]);

        $item = create('App\ResourceItem', [
            'name' => 'Catrobat',
            'description' => 'Website with a collection of resources and tutorials on how to create interactive stories and games.',
            'source' => 'https://share.catrob.at/pocketcode/',
            'thumbnail' => 'https://share.catrob.at/images/logo/logo_icon.png',
            'learn' => true,
        ]);

        $item->types()->attach([1,2,6]);
        $item->categories()->attach([1]);
        $item->programmingLanguages()->attach([6,12]);
        $item->levels()->attach([1]);
        $item->languages()->attach([1]);


        $item = create('App\ResourceItem', [
            'name' => 'Apple - Everyone can code',
            'description' => 'Website supported by Apple, introducing the Swift programming language. Provides a course with a tutorial and a free book about Swift to download.',
            'source' => 'https://www.apple.com/uk/everyone-can-code/',
            'thumbnail' => 'https://image.freepik.com/free-icon/apple-logo_318-40184.jpg',
            'learn' => true,
        ]);

        $item->types()->attach([2,3]);
        $item->categories()->attach([1]);
        $item->programmingLanguages()->attach([5]);
        $item->levels()->attach([1]);
        $item->languages()->attach([1]);

        $item = create('App\ResourceItem', [
            'name' => 'Javascript Cheat Sheet for Beginners',
            'description' => 'Online guide about Javascript, its most basic functions and commands. ',
            'source' => 'https://websitesetup.org/javascript-cheat-sheet/',
            'thumbnail' => '',
            'learn' => true,
        ]);

        $item->types()->attach([1,3]);
        $item->categories()->attach([1]);
        $item->programmingLanguages()->attach([3]);
        $item->levels()->attach([1]);
        $item->languages()->attach([1]);

        $item = create('App\ResourceItem', [
            'name' => 'Guru - Javascript tutorials',
            'description' => 'Website dedicated to Javascript tutorials for beginners, providing a variety of resources and exercises to practice.',
            'source' => 'https://www.guru99.com/interactive-javascript-tutorials.html',
            'thumbnail' => '',
            'learn' => true,
        ]);

        $item->types()->attach([1,2,3]);
        $item->categories()->attach([1]);
        $item->programmingLanguages()->attach([3]);
        $item->levels()->attach([1]);
        $item->languages()->attach([1]);

        /*

         $item = create('App\ResourceItem', [
            'name' => '',
            'description' => '',
            'source' => '',
            'thumbnail' => '',
            'learn' => true,
        ]);

        $item->types()->attach([]);
        $item->categories()->attach([1]);
        $item->programmingLanguages()->attach([]);
        $item->levels()->attach([1]);
        $item->languages()->attach([1]);

        */


    }
}
