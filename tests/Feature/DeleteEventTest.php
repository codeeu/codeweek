<?php

namespace Tests\Feature;

use PHPUnit\Framework\Attributes\Test;
use App\Mail\EventDeleted;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Support\Facades\Mail;
use Tests\TestCase;

class DeleteEventTest extends TestCase
{
    use DatabaseMigrations;

    protected function setUp(): void
    {
        parent::setUp();
        $this->seed('RolesAndPermissionsSeeder');

    }

    #[Test]
    public function event_can_be_deleted_by_admin(): void
    {

        Mail::fake();

        $this->withExceptionHandling();

        $superadmin = \App\User::factory()->create();
        $superadmin->assignRole('super admin');

        $this->signIn($superadmin);

        $event = \App\Event::factory()->create(['title' => 'foobar']);

        $this->post(route('event.delete', $event));

        // Assert a message was sent to the given users...
        Mail::assertQueued(EventDeleted::class, 1);

        $this->assertTrue($event->fresh()->trashed());

    }

    #[Test]
    public function event_can_be_deleted_by_event_creator(): void
    {

        $this->withExceptionHandling();

        $user = \App\User::factory()->create();

        $this->signIn($user);

        $event = \App\Event::factory()->create(['creator_id' => $user->id]);

        $this->post(route('event.delete', $event));

        // No message should be sent when a user delete its own event
        Mail::assertNotQueued(EventDeleted::class);

        $this->assertTrue($event->fresh()->trashed());

    }

    #[Test]
    public function event_can_be_deleted_by_ambassador_of_same_country(): void
    {

        $this->withExceptionHandling();

        $ambassador = \App\User::factory()->create(['country_iso' => 'FR']);
        $ambassador->assignRole('ambassador');

        $this->signIn($ambassador);

        $event = \App\Event::factory()->create(['status' => 'PENDING', 'country_iso' => 'FR']);

        $this->post(route('event.delete', $event));

        $this->assertTrue($event->fresh()->trashed());

    }

    #[Test]
    public function event_cant_be_approved_by_ambassador_of_other_country(): void
    {

        $this->withExceptionHandling();

        $ambassador = \App\User::factory()->create(['country_iso' => 'FR']);
        $ambassador->assignRole('ambassador');

        $this->signIn($ambassador);

        $event = \App\Event::factory()->create(['status' => 'PENDING', 'country_iso' => 'BE']);

        $this->post(route('event.delete', $event));

        $this->assertFalse($event->fresh()->trashed());

    }

    #[Test]
    public function event_cannot_be_deleted_by_logged_user_that_is_not_creator(): void
    {

        $this->withExceptionHandling();

        $user = \App\User::factory()->create();

        $this->signIn($user);

        $event = \App\Event::factory()->create(['title' => 'foobar']);

        $this->post(route('event.delete', $event));

        $this->assertFalse($event->fresh()->trashed());

    }
}
