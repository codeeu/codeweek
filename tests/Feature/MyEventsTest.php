<?php

namespace Tests\Feature;

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


}


