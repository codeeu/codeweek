<?php

namespace Tests\Feature\Achievements;

use App\Achievements\Events\UserEarnedExperience;
use Carbon\Carbon;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Event;
use Tests\TestCase;

class ExperienceTest extends TestCase
{

    use RefreshDatabase;

    /** @test */
    public function an_announcment_is_made_when_experience_is_earned()
    {
        Event::fake();

        $user = create('App\User');
        $user->getExperience()->awardExperience(100);


        Event::assertDispatched(UserEarnedExperience::class, function($event) use ($user) {
            return $user->is($event->user) && $event->points == 100 && $event->totalPoints == 100;
        });


    }

    /** @test */
    public function a_user_is_awarded_experience()
    {

        $user = create('App\User');

        $this->assertEquals(0, $user->getPoints());

        $user->awardExperience(100);

        $this->assertEquals(100, $user->getPoints());

        $user->awardExperience(100);

        $this->assertEquals(200, $user->getPoints());

    }

    /** @test */
    public function a_user_is_awarded_experience_for_specifi_years()
    {

        $user = create('App\User');

        $this->assertEquals(0, $user->getPoints(2020));

        $user->awardExperience(100, 2020);

        $this->assertEquals(100, $user->getPoints(2020));

        $user->awardExperience(100, 2020);

        $this->assertEquals(200, $user->getPoints(2020));
        $this->assertEquals(0, $user->getPoints(2021));

    }

    /** @test */
    public function a_user_experience_can_be_stripped()
    {

        $user = create('App\User');

        $user->awardExperience(1000);

        $this->assertEquals(1000, $user->getPoints());

        $user->stripExperience(100);

        $this->assertEquals(900, $user->getPoints());

        $user->stripExperience(10000);

        $this->assertEquals(0, $user->getPoints());

    }

//    /** @test */
//    public function a_user_earns_experience_when_an_activity_has_been_approved()
//    {
//
//
//        $user = create('App\User');
//
//        $event = create('App\Event', ['status' => 'PENDING', 'creator_id' => $user->id]);
//
//        $event->update([
//            'status' => "APPROVED"
//        ]);
//
//        $this->assertEquals(100, $user->getPoints());
//
//    }

    /** @test */
    public function a_user_earns_experience_when_an_activity_has_been_reported()
    {


        $user = create('App\User');

        $event = create('App\Event', ['status' => 'PENDING', 'creator_id' => $user->id, 'reported_at' => null]);

        $event->update([
            'reported_at' => Carbon::now()
        ]);

        $this->assertEquals(2, $user->getPoints());

    }

    /** @test */
    public function it_should_reset_points()
    {

        $user = create('App\User');

        $user->awardExperience(1000);

        $this->assertEquals(1000, $user->getPoints());

        $user->resetExperience();

        $this->assertEquals(0, $user->getPoints());

    }
}
