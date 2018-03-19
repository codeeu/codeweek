<?php

namespace Tests\Feature;

use App\Event;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class CreateEventTest extends TestCase
{

    use DatabaseMigrations;


    /** @test */
    public function a_guest_can_not_create_event()
    {

        $this->withExceptionHandling();

        $this->get('/add')
            ->assertRedirect('/login');
       // $this->post('/events')
         //   ->assertRedirect('/login');

    }

    /** @test */
    public function an_authenticated_user_can_create_events()
    {
        $this->signIn();

        $event = make('App\Event');

        $event->theme = [1];
        $event->tags = "tag:foo,tag:bar";
        $event->audience = [2, 3];

        $this->post('/events', $event->toArray());

        $event = Event::where('title', $event->title)->first();

        $this->get($event->path())->assertSee($event->title);
        $this->get($event->path())->assertSee("tag:bar");
    }

    /** @test */
    public function event_should_have_a_title()
    {
        $this->publishEvent(['title' => null])->assertSessionHasErrors('title');

    }




    /** @test */
    public function event_should_have_a_description()
    {
        $this->publishEvent(['description' => null])->assertSessionHasErrors('description');

    }

    public function publishEvent($overrides = [])
    {
        $this->withExceptionHandling()->signIn();
        $event = make('App\Event', $overrides);
        return $this->post('/events', $event->toArray());

    }


}


