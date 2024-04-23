<?php

namespace Tests\Feature;

use App\Event;
use App\Mail\EventRejected;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Support\Facades\Mail;
use Tests\TestCase;

class RejectEventTest extends TestCase
{
    use DatabaseMigrations;

    protected function setUp(): void
    {
        parent::setUp();
        $this->seed('RolesAndPermissionsSeeder');

    }

    /** @test */
    public function event_can_be_rejected_by_admin(): void
    {

        Mail::fake();

        $this->withExceptionHandling();

        $superadmin = create(\App\User::class);
        $superadmin->assignRole('super admin');

        $this->signIn($superadmin);

        $event = create(\App\Event::class, ['status' => 'PENDING']);

        $this->assertEquals($event->fresh()->status, 'PENDING');

        $this->post(route('event.reject', $event));

        $this->assertEquals($event->fresh()->status, 'REJECTED');
        $this->assertEquals($superadmin->id, $event->fresh()->approved_by);

    }

    /** @test */
    public function email_should_be_sent_to_event_email_when_event_is_rejected(): void
    {

        $event = $this->createEvent();

        $event->reject();

        // Assert a message was sent to the given users...
        Mail::assertQueued(EventRejected::class, function ($mail) use ($event) {
            return $mail->hasTo($event->user_email);
        });

    }

    /** @test */
    public function rejection_reasons_should_be_recorded(): void
    {

        $event = $this->createEvent();

        $this->assertCount(0, $event->moderations()->get());

        $event->reject();

        $this->assertCount(1, $event->moderations()->get());

        $event->reject();

        $this->assertCount(2, $event->moderations()->get());

    }

    /** @test */
    public function latest_rejection_message_should_be_accessible(): void
    {

        $event = $this->createEvent();

        $this->assertCount(0, $event->moderations()->get());

        $event->reject('not the data we need');

        $this->assertEquals('REJECTED', $event->LatestModeration->status);
        $this->assertEquals('not the data we need', $event->LatestModeration->message);

        sleep(1);

        $event->reject('data is still wrong');

        $this->assertEquals('data is still wrong', $event->fresh()->LatestModeration->fresh()->message);

    }

    /** @test */
    public function empty_rejection_should_be_treated(): void
    {

        $event = $this->createEvent();

        $event->reject();

        $this->assertEquals('REJECTED', $event->LatestModeration->status);
        $this->assertEquals('', $event->LatestModeration->message);

    }

    /** @test */
    public function updating_rejected_event_should_set_status_back_to_pending(): void
    {

        $eventA = $this->createEvent();

        $eventA->reject();

        $this->assertEquals('REJECTED', $eventA->LatestModeration->status);
        $this->assertEquals('', $eventA->LatestModeration->message);

        $event = Event::where('title', $eventA->title)->first();

        create(\App\Audience::class, [], 3);
        create(\App\Theme::class, [], 3);
        $event->title = 'Changed';
        $event->description = 'Changed description.';
        $event->theme = '1,2';
        $event->audience = '1,2,3';
        $event->tags = 'foo,bar,joe';
        $event->privacy = true;

        $this->patch('/events/'.$event->id, $event->toArray());

        tap($event->fresh(), function ($t) {
            $this->assertEquals('PENDING', $t->status);
            $this->assertEquals('Changed description.', $t->description);

        });

    }

    /**
     * @return \Illuminate\Database\Eloquent\Collection|\Illuminate\Database\Eloquent\Model|mixed
     */
    public function createEvent()
    {
        $this->withExceptionHandling();

        Mail::fake();

        $superadmin = create(\App\User::class);
        $superadmin->assignRole('super admin');

        $this->signIn($superadmin);

        $event = create(\App\Event::class, ['status' => 'PENDING', 'user_email' => 'foo@bar.com']);

        return $event;
    }
}
