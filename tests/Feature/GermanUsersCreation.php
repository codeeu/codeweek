<?php

namespace Tests\Feature;

use App\Event;
use App\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;

class GermanUsersCreation extends TestCase
{
    use DatabaseMigrations;

    /** @test */
    public function it_should_create_user_and_change_owner(): void
    {

        $events = create(\App\Event::class, ['user_email' => 'foo@bar.com', 'organizer' => 'ACME', 'codeweek_for_all_participation_code' => 'cw20-baden'], 10);
        $events = create(\App\Event::class, ['user_email' => 'foo@bar.com', 'organizer' => 'ACME', 'codeweek_for_all_participation_code' => 'cw20-bonn'], 7);
        $events = create(\App\Event::class, ['user_email' => 'foo@bar.com', 'organizer' => 'ACME', 'codeweek_for_all_participation_code' => 'cw20-hamburg'], 9);

        $this->assertEmpty(User::where('email', '=', 'foo@bar.com')->get());

        $this->artisan('clean:germany');

        $user = User::where('email', '=', 'foo@bar.com')->first();
        $this->assertNotEmpty($user);

        $this->assertEquals(26, $user->events->count());

    }

    /** @test */
    public function it_should_find_user_and_change_owner(): void
    {

        $user = create(\App\User::class, ['email' => 'foo@bar.com']);
        $events = create(\App\Event::class, ['user_email' => 'foo@bar.com', 'creator_id' => 555, 'organizer' => 'ACME', 'codeweek_for_all_participation_code' => 'cw20-baden'], 10);

        $this->assertNotEmpty(Event::where('creator_id', 555)->get());
        $this->assertEmpty(Event::where('creator_id', $user->id)->get());

        $this->artisan('clean:germany');

        $this->assertEmpty(Event::where('creator_id', 555)->get());
        $this->assertNotEmpty(Event::where('creator_id', $user->id)->get());

    }
}
