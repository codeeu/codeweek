<?php

namespace Tests\Feature;

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

    /** @test */
    public function it_should_get_distinct_emails(): void
    {
        $nullUser = create(\App\User::class, ['email' => null]);
        $user1 = create(\App\User::class, ['email' => 'foo@bar']);
        $user2 = create(\App\User::class, ['email' => 'xyz@bar']);

        create(\App\Event::class, [
            'creator_id' => $nullUser->id,
            'user_email' => 'foo@bar',
        ], 6);

        create(\App\Event::class, [
            'creator_id' => $nullUser->id,
            'user_email' => 'xyz@bar',
        ], 6);

        $emails = EventHelper::getDistinctEmailsWithUsersHavingNullEmail();

        $this->assertEquals(['foo@bar', 'xyz@bar'], $emails);

    }

    /** @test */
    public function it_should_get_active_user_for_specific_email(): void
    {

        Mail::fake();

        $user1 = create(\App\User::class, ['email' => 'foo@bar', 'id' => 100]);
        $user2 = create(\App\User::class, ['email' => 'foo@bar', 'deleted_at' => Carbon::now(), 'id' => 200]);

        $user = UserHelper::getActiveUserByEmail('foo@bar');

        $this->assertEquals(100, $user->id);

        Mail::assertNothingQueued();

    }

    /** @test */
    public function it_should_assign_activities_to_a_user(): void
    {

        $user1 = create(\App\User::class, ['email' => 'foo@bar', 'id' => 100]);

        $this->assertEquals(count($user1->events), 0);
        create(\App\Event::class, [
            'user_email' => 'foo@bar',
        ], 10);

        EventHelper::reassignActivities($user1);

        $this->assertEquals(count($user1->fresh()->events), 10);

    }

    /** @test */
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
