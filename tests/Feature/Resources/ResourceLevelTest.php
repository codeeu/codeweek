<?php

namespace Tests\Feature\Resources;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ResourceLevelTest extends TestCase
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
    public function resource_level_can_be_created()
    {
        $this->withoutExceptionHandling();

        $this->signIn($this->admin);

        $request = [
            "label" => "foo",
            "position" => 20,
        ];

        $this->post('/api/resource/level', $request);

        $this->assertDatabaseHas('resource_levels', [
            'label' => 'foo'
        ]);
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
}
