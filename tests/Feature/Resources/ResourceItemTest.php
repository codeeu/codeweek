<?php

namespace Tests\Feature\Resources;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Exception;

class ResourceItemTest extends TestCase
{

    use DatabaseMigrations;
    private $admin;

    public function setup():void
    {
        parent::setUp();
        $this->seed('RolesAndPermissionsSeeder');


        $this->admin = create('App\User');
        $this->admin->assignRole('super admin');

    }

    /** @test */
    public function resource_item_can_be_created()
    {
        $this->withoutExceptionHandling();

        $this->signIn($this->admin);

        $request = [
            "name" => "foobar",
            "description" => "description text",
            "source" => "http://foo.bar",
        ];

        $this->post('/api/resource/item', $request);

        $this->assertDatabaseHas('resource_items', [
            'name' => 'foobar'
        ]);
    }

    /** @test */
    public function resource_item_can_be_filtered_by_subject()
    {
        $this->withoutExceptionHandling();

        $this->signIn($this->admin);

        $item = create('App\ResourceItem');


        $item->subjects()->attach(create('App\ResourceSubject', [], 2));

        $this->assertEquals(2, sizeof($item->fresh()->subjects));

    }

    /** @test */
    public function resource_item_can_be_filtered_by_category()
    {
        $this->withoutExceptionHandling();

        $this->signIn($this->admin);

        $item = create('App\ResourceItem');


        $item->categories()->attach(create('App\ResourceCategory', [], 3));

        $this->assertEquals(3, sizeof($item->fresh()->categories));

    }

    /** @test */
    public function resource_item_can_be_filtered_by_level()
    {
        $this->withoutExceptionHandling();

        $this->signIn($this->admin);

        $item = create('App\ResourceItem');


        $item->levels()->attach(create('App\ResourceLevel', [], 3));

        $this->assertEquals(3, sizeof($item->fresh()->levels));

    }

    /** @test */
    public function resource_item_can_be_filtered_by_type()
    {
        $this->withoutExceptionHandling();

        $this->signIn($this->admin);

        $item = create('App\ResourceItem');


        $item->types()->attach(create('App\ResourceType', [], 4));

        $this->assertEquals(4, sizeof($item->fresh()->types));

    }

    /** @test */
    public function resource_item_can_be_filtered_by_programming_language()
    {
        $this->withoutExceptionHandling();

        $this->signIn($this->admin);

        $item = create('App\ResourceItem');

        $item->programmingLanguages()->attach(create('App\ResourceProgrammingLanguage', [], 5));

        $this->assertEquals(5, sizeof($item->fresh()->programmingLanguages));

    }

    /** @test */
    public function resource_item_can_be_filtered_by_language()
    {
        $this->withoutExceptionHandling();

        $this->signIn($this->admin);

        $item = create('App\ResourceItem');


        $item->languages()->attach(create('App\ResourceLanguage', [], 7));

        $this->assertEquals(7, sizeof($item->fresh()->languages));

    }

    /** @test */
    public function resource_item_can_attach_types_by_name()
    {
        $this->withoutExceptionHandling();

        $this->signIn($this->admin);

        $this->seed('TypeSeeder');

        $item = create('App\ResourceItem');


        $item->attachTypes("Tutorial; Website; Presentation; Other; Application; Online course; Video; Game; Graphic material; Audio; Toolkit; Lesson Plan");


        $types = $item->fresh()->types;

        //dd($types->pluck('id'));

        $expected = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12];
        $this->assertEquals($expected, $types->pluck('id')->toArray());

    }

    /** @test */
    public function resource_item_can_attach_categories_by_name()
    {
        $this->withoutExceptionHandling();


        $this->seed('CategorySeeder');

        $this->signIn($this->admin);

        $item = create('App\ResourceItem');


        $item->attachCategories("Coding; Programming; Computational thinking; Robotics; Making; Tinkering; Unplugged activities; Other");


        $categories = $item->fresh()->categories;

        //dd($types->pluck('id'));

        $expected = [1, 2, 3, 4, 5, 6, 7, 8];
        $this->assertEquals($expected, $categories->pluck('id')->toArray());

    }

    /** @test */
    public function resource_item_can_attach_programming_languages_by_name()
    {
        $this->withoutExceptionHandling();

        $this->signIn($this->admin);


        $this->seed('ProgrammingLanguageSeeder');

        $item = create('App\ResourceItem');


        $item->attachProgrammingLanguages("C++; CSS; HTML; HTML5; Java; JavaScript; Python; Raspberry Pi; Swift; Visual Programming; All targeted programming languages; Other");


        $programmingLanguages = $item->fresh()->programmingLanguages;

        $expected = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12];
        $this->assertEquals($expected, $programmingLanguages->pluck('id')->toArray());

    }

    /** @test */
    public function resource_item_can_attach_levels_by_name()
    {
        $this->withoutExceptionHandling();

        $this->signIn($this->admin);

        $this->seed('LevelSeeder');

        $item = create('App\ResourceItem');

        $item->attachLevels("Beginner; Intermediate; Advanced;");

        $levels = $item->fresh()->levels;

        $expected = [1, 2, 3];
        $this->assertEquals($expected, $levels->pluck('id')->toArray());

    }

    /** @test */
    public function resource_item_can_attach_languages_by_name()
    {
        $this->withoutExceptionHandling();

        $this->signIn($this->admin);

        $this->seed('LanguageSeeder');

        $item = create('App\ResourceItem');

        $item->attachLanguages("English; French; Russian; Portuguese; Spanish; Norwegian; Slovenian; Romanian; German; Polish; Danish; Croatian; Dutch; Slovak; Czech; Greek; Italian; Swedish; Finnish; Hungarian; Turkish; Mandarin; Estonian;");

        $languages = $item->fresh()->languages;


        $expected = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23];
        $this->assertEquals($expected, $languages->pluck('id')->toArray());

    }

    /** @test */
    public function resource_item_can_attach_languages_globally()
    {
        $this->withoutExceptionHandling();

        $this->signIn($this->admin);

        $this->seed('LanguageSeeder');

        $item = create('App\ResourceItem');

        $item->attachLanguages("All targeted languages;");

        $languages = $item->fresh()->languages;

        $expected = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25];
        $this->assertEquals($expected, $languages->pluck('id')->toArray());

    }

    /** @test */
    public function resource_item_should_fault_for_unknown_types()
    {
        $this->withoutExceptionHandling();

        $this->signIn($this->admin);

        $item = create('App\ResourceItem');

        $this->expectException(Exception::class);

        $item->attachTypes("Unknown Tag;");


    }

    /** @test */
    public function no_duplicates_resource_items_allowed()
    {
        $this->withoutExceptionHandling();

        $this->signIn($this->admin);

        $this->seed('LanguageSeeder');

        $item = create('App\ResourceItem');

        $item->attachLanguages("English; French; English;");

        $languages = $item->fresh()->languages;

        $expected = [1, 2];
        $this->assertEquals($expected, $languages->pluck('id')->toArray());


    }


}
