<?php

namespace Tests\Feature\Achievements\Achievements;

use App\Achievements\Events\UserEarnedExperience;
use App\User;
use Carbon\Carbon;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Support\Facades\Event;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

final class ExperienceTest extends TestCase
{
    use DatabaseMigrations;

    #[Test]
    public function an_announcement_is_made_when_experience_is_earned(): void
    {
        Event::fake();

        $user = \App\User::factory()->create();
        $user->getExperience()->awardExperience(100);

        Event::assertDispatched(UserEarnedExperience::class, function ($event) use ($user) {
            return $user->is($event->user) && $event->points == 100 && $event->totalPoints == 100;
        });

    }

    #[Test]
    public function a_user_is_awarded_experience(): void
    {

        $user = \App\User::factory()->create();

        $this->assertEquals(0, $user->getPoints());

        $user->awardExperience(100);

        $this->assertEquals(100, $user->getPoints());

        $user->awardExperience(100);

        $this->assertEquals(200, $user->getPoints());

    }

    #[Test]
    public function a_user_is_awarded_experience_for_specifi_years(): void
    {

        $user = \App\User::factory()->create();

        $this->assertEquals(0, $user->getPoints(2020));

        $user->awardExperience(100, 2020);

        $this->assertEquals(100, $user->getPoints(2020));

        $user->awardExperience(100, 2020);

        $this->assertEquals(200, $user->getPoints(2020));
        $this->assertEquals(0, $user->getPoints(2021));

    }

    #[Test]
    public function a_user_experience_can_be_stripped(): void
    {

        $user = \App\User::factory()->create();

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

    #[Test]
    public function a_user_earns_experience_when_an_activity_has_been_reported(): void
    {

        $user = \App\User::factory()->create();

        $event = \App\Event::factory()->create(['status' => 'PENDING', 'creator_id' => $user->id, 'reported_at' => null]);

        $event->update([
            'reported_at' => Carbon::now(),
        ]);

        $this->assertEquals(2, $user->getPoints());

    }

    #[Test]
    public function a_leading_teacher_earns_experience_when_an_activity_has_been_approved_with_his_tag(): void
    {

        $user = \App\User::factory()->create();

        $LT1 = \App\User::factory()->create(['tag' => 'FOO-TEST123-BAR']);

        $event = \App\Event::factory()->create(['leading_teacher_tag' => 'FOO-TEST123-BAR', 'status' => 'PENDING', 'creator_id' => $user->id, 'reported_at' => null]);

        $this->assertEquals(0, $LT1->getPoints());

        $event->update([
            'status' => 'APPROVED',
        ]);

        $this->assertEquals(2, $LT1->fresh()->getPoints());

    }

    #[Test]
    public function it_should_reset_points(): void
    {

        $user = \App\User::factory()->create();

        $user->awardExperience(1000);

        $this->assertEquals(1000, $user->getPoints());

        $user->resetExperience();

        $this->assertEquals(0, $user->getPoints());

    }
}
