<?php

namespace Tests\Feature;

use App\Event;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;

class UpdateEventTest extends TestCase
{
    use DatabaseMigrations;

    /** @test */
    public function event_can_be_updated_by_its_owner(): void
    {

        $this->seed('RolesAndPermissionsSeeder');
        $this->signIn();
        $this->withoutExceptionHandling();

        $event =  \App\Event::factory()->make();
        \App\Audience::factory()->count(3)->create();
        \App\Theme::factory()->count(3)->create();

        $event->theme = '1';
        $event->tags = 'tag:foo,tag:bar';
        $event->audience = '2, 3';
        $event->privacy = true;

        $this->post('/events', $event->toArray());

        $event = Event::where('title', $event->title)->first();

        $event->title = 'Changed';
        $event->description = 'Changed description.';
        $event->theme = '1,2';
        $event->audience = '1,2,3';
        $event->tags = 'foo,bar,joe';
        $event->privacy = true;

        $this->patch('/events/'.$event->id, $event->toArray());

        tap($event->fresh(), function ($t) {
            $this->assertEquals('Changed', $t->title);
            $this->assertEquals('Changed description.', $t->description);
            $this->assertCount(2, $t->themes);
            $this->assertCount(3, $t->audiences);
            $this->assertCount(3, $t->tags);
            $this->assertEquals('PENDING', $t->status);

        });

    }

    /** @test */
    public function event_can_be_updated_by_its_owner_when_approved(): void
    {

        $user = \App\User::factory()->create();
        \App\Audience::factory()->count(3)->create();
        \App\Theme::factory()->count(3)->create();

        $this->signIn($user);

        $event = \App\Event::factory()->create(['creator_id' => $user->id, 'status' => 'APPROVED']);

        $event->title = 'Initial Title';
        $event->description = 'Initial description.';
        $event->theme = '1,2';
        $event->audience = '1,2,3';
        $event->tags = 'foo,bar,joe';
        $event->privacy = true;
        $event->reported_at = null;

        $this->patch('/events/'.$event->id, $event->toArray());

        $event->title = 'Changed';
        $event->description = 'Changed description.';

        $this->patch('/events/'.$event->id, $event->toArray());

        tap($event->fresh(), function ($t) {
            $this->assertEquals('Changed', $t->title);
            $this->assertEquals('Changed description.', $t->description);
        });

    }

    /** @test */
    public function event_can_not_be_updated_by_visitor(): void
    {

        $this->signIn();

        $event = \App\Event::factory()->make(['creator_id' => auth()->id()]);
        \App\Audience::factory()->count(3)->create();
        \App\Theme::factory()->count(3)->create();

        $event->theme = '1';
        $event->tags = 'tag:foo,tag:bar';
        $event->audience = '2, 3';
        $event->privacy = true;

        $this->post('/events', $event->toArray());

        $otherUser = \App\User::factory()->create();
        $this->signIn($otherUser);

        $event = Event::where('title', $event->title)->first();

        $event->title = 'Changed';
        $event->description = 'Changed description.';
        $event->theme = '1,2';
        $event->audience = '1,2,3';
        $event->tags = 'foo,bar,joe';
        $event->privacy = true;

        $this->patch('/events/'.$event->id, $event->toArray())->assertStatus(403);

    }
}
