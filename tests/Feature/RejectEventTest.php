<?php

namespace Tests\Feature;

use App\Event;
use App\Mail\EventApproved;
use App\Mail\EventRejected;
use App\Queries\EventsQuery;
use App\School;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Support\Facades\Mail;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class RejectEventTest extends TestCase
{

    use DatabaseMigrations;


    public function setup() :void
    {
        parent::setUp();
        $this->seed('RolesAndPermissionsSeeder');


    }

    /** @test */
    public function event_can_be_rejected_by_admin()
    {

        Mail::fake();

        $this->withExceptionHandling();


        $superadmin = create('App\User');
        $superadmin->assignRole('super admin');

        $this->signIn($superadmin);

        $event = create('App\Event', ['status' => 'PENDING']);

        $this->assertEquals($event->fresh()->status, 'PENDING');

        $this->post(route('event.reject', $event));

        $this->assertEquals($event->fresh()->status, 'REJECTED');
        $this->assertEquals($superadmin->id, $event->fresh()->approved_by);

    }

    /** @test */
    public function email_should_be_sent_to_event_email_when_event_is_rejected()
    {

        $event = $this->createEvent();

        $event->reject();

        // Assert a message was sent to the given users...
        Mail::assertQueued(EventRejected::class, function ($mail) use ($event) {
            return $mail->hasTo($event->user_email);
        });



    }

    /** @test */
    public function rejection_reasons_should_be_recorded()
    {

        $event = $this->createEvent();

        $this->assertCount(0, $event->moderations()->get());

        $event->reject();

        $this->assertCount(1, $event->moderations()->get());

        $event->reject();

        $this->assertCount(2, $event->moderations()->get());



    }

    /** @test */
    public function latest_rejection_message_should_be_accessible()
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
    public function empty_rejection_should_be_treated()
    {

        $event = $this->createEvent();

        $event->reject();

        $this->assertEquals('REJECTED', $event->LatestModeration->status);
        $this->assertEquals('', $event->LatestModeration->message);

    }

    /** @test */
    public function updating_rejected_event_should_set_status_back_to_pending()
    {

        $eventA = $this->createEvent();

        $eventA->reject();

        $this->assertEquals('REJECTED', $eventA->LatestModeration->status);
        $this->assertEquals('', $eventA->LatestModeration->message);

        $event = Event::where('title', $eventA->title)->first();

        create('App\Audience',[] ,3);
        create('App\Theme', [],3);
        $event->title = 'Changed';
        $event->description = 'Changed description.';
        $event->theme = "1,2";
        $event->audience = "1,2,3";
        $event->tags = "foo,bar,joe";
        $event->privacy = true;

        $this->patch('/events/' . $event->id, $event->toArray());


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

        $superadmin = create('App\User');
        $superadmin->assignRole('super admin');

        $this->signIn($superadmin);

        $event = create('App\Event', ['status' => 'PENDING', 'user_email' => 'foo@bar.com']);
        return $event;
    }

}


