<?php

namespace Tests\Feature;

use Carbon\Carbon;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;

class MyEventsTest extends TestCase
{
    use DatabaseMigrations;

    /** @test */
    public function a_user_can_see_his_events(): void
    {
        $this->signIn(User::factory()->create());

        $myEvent = \App\Event::factory()->create(['creator_id' => auth()->id()]);
        $anotherEventNotByMe = create(\App\Event::class);

        $this->get('/my')
            ->assertSee($myEvent->title)
            ->assertDontSee($anotherEventNotByMe->title);
    }

    /** @test */
    public function user_count_of_activities(): void
    {

        $this->signIn(User::factory()->create());

        $myEvents = \App\Event::factory()->create(['status' => 'APPROVED', 'end_date' => Carbon::now(), 'creator_id' => auth()->id()], 4);
        $myPastEvents = \App\Event::factory()->create(['status' => 'APPROVED', 'end_date' => Carbon::now()->subYear(), 'creator_id' => auth()->id()], 6);
        $anotherEventNotByMe = create(\App\Event::class);

        $this->assertEquals(4, auth()->user()->activities(Carbon::now()->year));
        $this->assertEquals(6, auth()->user()->activities(Carbon::now()->subYear()->year));

    }
}
