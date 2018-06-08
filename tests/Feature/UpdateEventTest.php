<?php

namespace Tests\Feature;

use App\Event;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;

class UpdateEventTest extends TestCase
{

    use DatabaseMigrations;

    /** @test */
    function event_can_be_updated_by_its_owner()
    {

        $this->signIn();

        $event = make('App\Event');
        create('App\Audience',[] ,3);
        create('App\Theme', [],3);

        $event->theme = [1];
        $event->tags = "tag:foo,tag:bar";
        $event->audience = [2, 3];

        $this->post('/events', $event->toArray());

        $event = Event::where('title', $event->title)->first();

        $event->title = 'Changed';
        $event->description = 'Changed description.';



        $this->patch('/events/' . $event->id, $event->toArray());


        tap($event->fresh(), function ($t) {
            $this->assertEquals('Changed', $t->title);
            $this->assertEquals('Changed description.', $t->description);
        });

    }
}
