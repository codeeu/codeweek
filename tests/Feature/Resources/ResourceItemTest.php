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
}
