<?php

namespace Tests\Feature;

use PHPUnit\Framework\Attributes\Test;
use Carbon\Carbon;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;

class MyEventsTest extends TestCase
{
    use DatabaseMigrations;

    #[Test]
    public function a_user_can_see_his_events(): void
    {
        $this->signIn(\App\User::factory()->create());

        $myEvent = \App\Event::factory()->create(['creator_id' => auth()->id()]);
        $anotherEventNotByMe = \App\Event::factory()->create();

        $this->get('/my')
            ->assertSee($myEvent->title)
            ->assertDontSee($anotherEventNotByMe->title);
    }

    #[Test]
    public function user_count_of_activities(): void
    {

        $this->signIn(\App\User::factory()->create());

        $myEvents = \App\Event::factory()->count(4)->create(['status' => 'APPROVED', 'end_date' => Carbon::now(), 'creator_id' => auth()->id()]);
        $myPastEvents = \App\Event::factory()->count(6)->create(['status' => 'APPROVED', 'end_date' => Carbon::now()->subYear(), 'creator_id' => auth()->id()]);
        $anotherEventNotByMe = \App\Event::factory()->create();

        $this->assertEquals(4, auth()->user()->activities(Carbon::now()->year));
        $this->assertEquals(6, auth()->user()->activities(Carbon::now()->subYear()->year));

    }
}
