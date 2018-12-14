<?php

namespace Tests\Feature\Resources;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ResourceItemTest extends TestCase
{

    use DatabaseMigrations;
    private $admin;

    public function setup()
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
            "label" => "foobar",
            "description" => "description text",
            "source" => "http://foo.bar",
        ];

        $this->post('/api/resource/item', $request);

        $this->assertDatabaseHas('resource_items', [
            'label' => 'foobar'
        ]);
    }

    /** @test */
    public function resource_item_can_be_filtered_by_subject()
    {
        $this->withoutExceptionHandling();

        $this->signIn($this->admin);

        $item = create('App\ResourceItem');


        $item->subjects()->attach(create('App\ResourceSubject',[],2));

        $this->assertEquals(2,sizeof($item->fresh()->subjects));

    }

    /** @test */
    public function resource_item_can_be_filtered_by_category()
    {
        $this->withoutExceptionHandling();

        $this->signIn($this->admin);

        $item = create('App\ResourceItem');


        $item->categories()->attach(create('App\ResourceCategory',[],3));

        $this->assertEquals(3,sizeof($item->fresh()->categories));

    }

    /** @test */
    public function resource_item_can_be_filtered_by_level()
    {
        $this->withoutExceptionHandling();

        $this->signIn($this->admin);

        $item = create('App\ResourceItem');


        $item->levels()->attach(create('App\ResourceLevel',[],3));

        $this->assertEquals(3,sizeof($item->fresh()->levels));

    }

    /** @test */
    public function resource_item_can_be_filtered_by_type()
    {
        $this->withoutExceptionHandling();

        $this->signIn($this->admin);

        $item = create('App\ResourceItem');


        $item->types()->attach(create('App\ResourceType',[],4));

        $this->assertEquals(4,sizeof($item->fresh()->types));

    }

    /** @test */
    public function resource_item_can_be_filtered_by_programming_language()
    {
        $this->withoutExceptionHandling();

        $this->signIn($this->admin);

        $item = create('App\ResourceItem');


        $item->programmingLanguages()->attach(create('App\ResourceProgrammingLanguage',[],5));

        $this->assertEquals(5,sizeof($item->fresh()->programmingLanguages));

    }


}
