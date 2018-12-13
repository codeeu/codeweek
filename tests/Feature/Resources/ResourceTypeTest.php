<?php

namespace Tests\Feature\Resources;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ResourceTypeTest extends TestCase
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
    public function resource_item_can_be_filtered_by_type()
    {
        $this->withoutExceptionHandling();

        $this->signIn($this->admin);

        $item = create('App\ResourceItem');


        $item->types()->attach(create('App\ResourceType',[],4));

        $this->assertEquals(4,sizeof($item->fresh()->types));

    }
}
