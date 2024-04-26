<?php

namespace Tests\Feature;

use PHPUnit\Framework\Attributes\Test;
use App\Helpers\EventHelper;
use App\Helpers\UserHelper;
use App\Mail\UserCreated;
use Carbon\Carbon;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Support\Facades\Mail;
use Tests\TestCase;

class NullEmails extends TestCase
{
    use DatabaseMigrations;

    #[Test]
    public function it_should_get_distinct_emails(): void
    {
        $nullUser = \App\User::factory()->create(['email' => null]);
        $user1 = \App\User::factory()->create(['email' => 'foo@bar']);
        $user2 = \App\User::factory()->create(['email' => 'xyz@bar']);

        \App\Event::factory()->create([
            'creator_id' => $nullUser->id,
            'user_email' => 'foo@bar',
        ], 6);

        \App\Event::factory()->create([
            'creator_id' => $nullUser->id,
            'user_email' => 'xyz@bar',
        ], 6);

        $emails = EventHelper::getDistinctEmailsWithUsersHavingNullEmail();

        $this->assertEquals(['foo@bar', 'xyz@bar'], $emails);

    }

    #[Test]
    public function it_should_get_active_user_for_specific_email(): void
    {

        Mail::fake();

        $user1 = \App\User::factory()->create(['email' => 'foo@bar', 'id' => 100]);
        $user2 = \App\User::factory()->create(['email' => 'foo@bar', 'deleted_at' => Carbon::now(), 'id' => 200]);

        $user = UserHelper::getActiveUserByEmail('foo@bar');

        $this->assertEquals(100, $user->id);

        Mail::assertNothingQueued();

    }

    #[Test]
    public function it_should_assign_activities_to_a_user(): void
    {

        $user1 = \App\User::factory()->create(['email' => 'foo@bar', 'id' => 100]);

        $this->assertEquals(count($user1->events), 0);
        \App\Event::factory()->create([
            'user_email' => 'foo@bar',
        ], 10);

        EventHelper::reassignActivities($user1);

        $this->assertEquals(count($user1->fresh()->events), 10);

    }

    #[Test]
    public function it_should_create_user(): void
    {

        Mail::fake();

        $user = UserHelper::getActiveUserByEmail('foo@bar');

        $this->assertEquals('foo@bar', $user->email);

        // Assert a message was sent with the user email
        Mail::assertQueued(UserCreated::class, function ($mail) use ($user) {
            return $mail->hasTo($user->email);
        });

    }
}
