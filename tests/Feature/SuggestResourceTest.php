<?php

namespace Tests\Feature;

use App\Event;
use App\Mail\EventCreated;
use App\ResourceItem;
use Mail;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class SuggestResourceTest extends TestCase
{

    use DatabaseMigrations;


    /** @test */
    public function a_guest_can_not_suggest_resource()
    {

        $this->withExceptionHandling();

        $this->post('/resources/suggest')
            ->assertRedirect('/login');

    }

    /** @test */
    public function an_authenticated_user_can_suggest_resource()
    {

        $this->withoutExceptionHandling();
        $this->signIn();

        $resourceItem = make('App\ResourceItem');

        $this->post('/resources/suggest', $resourceItem->toArray());

        $ri = ResourceItem::where('name', $resourceItem->name)->first();

        $this->assertEquals($resourceItem->name, $ri->name);
        $this->assertEquals(0,$ri->active);

    }


}


