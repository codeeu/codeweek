<?php

namespace Tests\Feature;

use App\Event;
use App\Mail\EventCreated;
use Mail;
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

    }

    /** @test */
    public function an_authenticated_user_can_create_events()
    {
        $this->signIn();

        $event = make('App\Event');
        create('App\Audience',[] ,3);
        create('App\Theme', [],3);

        $event->theme = "1";
        $event->tags = "tag:foo,tag:bar";
        $event->audience = "2, 3";

        $this->post('/events', $event->toArray());

        $event = Event::where('title', $event->title)->first();

        $this->get($event->path())->assertSee($event->title);
        $this->get($event->path())->assertSee("tag:foo");
        $this->get($event->path())->assertSee("tag:bar");
        $this->get($event->path())->assertSee($event->codeweek_for_all_participation_code);
    }

    /** @test */
    public function an_authenticated_user_can_create_events_with_existing_codeweek4all_code()
    {
        $this->signIn();

        $event = make('App\Event');
        create('App\Audience',[] ,3);
        create('App\Theme', [],3);

        $event->theme = "1";

        $event->audience = "2, 3";

        $event->codeweek_for_all_participation_code="my_custom_code";

        $this->post('/events', $event->toArray());

        $event = Event::where('title', $event->title)->first();

        $this->get($event->path())->assertSee($event->title);

        $this->get($event->path())->assertSee("my_custom_code");
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

    /** @test */
    public function ambassadors_should_be_notified()
    {
        $this->seed('RolesAndPermissionsSeeder');
        $this->signIn();

        Mail::fake();

        $belgium = create('App\Country',['iso'=>'BE']);
        create('App\Audience',[] ,3);
        create('App\Theme', [],3);

        $ambassador_be = create('App\User', ['country_iso' => $belgium->iso])->assignRole('ambassador');

        $event = make('App\Event');

        $event->country_iso = $belgium->iso;
        $event->theme = "1";
        $event->tags = "tag:foo,tag:bar";
        $event->audience = "2, 3";

        $this->post('/events', $event->toArray());

        Mail::assertQueued(\App\Mail\EventCreated::class, 1);


    }

    public function publishEvent($overrides = [])
    {
        $this->withExceptionHandling()->signIn();
        $event = make('App\Event', $overrides);
        return $this->post('/events', $event->toArray());

    }


}


