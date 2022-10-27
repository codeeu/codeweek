<?php

namespace Tests\Feature;

use App\Mail\EventDeleted;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Support\Facades\Mail;
use Tests\TestCase;


class DeleteEventTest extends TestCase
{

    use DatabaseMigrations;


    public function setup() :void
    {
        parent::setUp();
        $this->seed('RolesAndPermissionsSeeder');


    }

    /** @test */
    public function event_can_be_deleted_by_admin()
    {

        Mail::fake();

        $this->withExceptionHandling();

        $superadmin = create('App\User');
        $superadmin->assignRole('super admin');

        $this->signIn($superadmin);

        $event = create('App\Event', ['title' => 'foobar']);

        $this->post(route('event.delete', $event));

        // Assert a message was sent to the given users...
        Mail::assertQueued(EventDeleted::class, 1);

        $this->assertTrue($event->fresh()->trashed());


    }

    /** @test */
    public function event_can_be_deleted_by_event_creator()
    {

        $this->withExceptionHandling();

        $user = create('App\User');

        $this->signIn($user);

        $event = create('App\Event', ['creator_id'=> $user->id]);

        $this->post(route('event.delete', $event));

        // No message should be sent when a user delete its own event
        Mail::assertNotQueued(EventDeleted::class);

        $this->assertTrue($event->fresh()->trashed());


    }

    /** @test */
    public function event_can_be_deleted_by_ambassador_of_same_country()
    {

        $this->withExceptionHandling();

        $ambassador = create('App\User', ['country_iso' => 'FR']);
        $ambassador->assignRole('ambassador');

        $this->signIn($ambassador);

        $event = create('App\Event', ['status' => 'PENDING', 'country_iso' => 'FR']);

        $this->post(route('event.delete', $event));

        $this->assertTrue($event->fresh()->trashed());


    }

    /** @test */
    public function event_cant_be_approved_by_ambassador_of_other_country()
    {

        $this->withExceptionHandling();


        $ambassador = create('App\User', ['country_iso' => 'FR']);
        $ambassador->assignRole('ambassador');

        $this->signIn($ambassador);

        $event = create('App\Event', ['status' => 'PENDING', 'country_iso' => 'BE']);

        $this->post(route('event.delete', $event));

        $this->assertFalse($event->fresh()->trashed());


    }

    /** @test */
    public function event_cannot_be_deleted_by_logged_user_that_is_not_creator()
    {

        $this->withExceptionHandling();

        $user = create('App\User');

        $this->signIn($user);

        $event = create('App\Event', ['title' => 'foobar']);

        $this->post(route('event.delete', $event));

        $this->assertFalse($event->fresh()->trashed());


    }




}


