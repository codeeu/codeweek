<?php

namespace Tests\Feature;

use Carbon\Carbon;
use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class MyEventsTest extends TestCase
{
    use DatabaseMigrations;

    /** @test */
    function a_user_can_see_his_events()
    {
        $this->signIn(create('App\User'));

        $myEvent = create('App\Event', ['creator_id' => auth()->id()]);
        $anotherEventNotByMe = create('App\Event');

        $this->get('/my')
            ->assertSee($myEvent->title)
            ->assertDontSee($anotherEventNotByMe->title);
    }

    /** @test */
    public function user_count_of_activities()
    {

        $this->signIn(create('App\User'));

        $myEvents = create('App\Event', ['status'=>'APPROVED','end_date' => Carbon::now(),'creator_id' => auth()->id()], 4);
        $myPastEvents = create('App\Event', ['status'=>'APPROVED','end_date' => Carbon::now()->subYear(),'creator_id' => auth()->id()], 6);
        $anotherEventNotByMe = create('App\Event');

        $this->assertEquals(4,auth()->user()->activities(Carbon::now()->year));
        $this->assertEquals(6,auth()->user()->activities(Carbon::now()->subYear()->year));

    }


}


