<?php

namespace Tests\Feature\Achievements\Achievements;

use Carbon\Carbon;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Event;
use Tests\TestCase;

class InfluenceTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function user_influence_should_be_counted()
    {

        $user = create(\App\User::class);

        $LT1 = create(\App\User::class, ['id' => 100, 'tag' => 'BE-TESTME-123']);

        $events2020 = create(\App\Event::class, ['leading_teacher_tag' => 'BE-TESTME-123', 'status' => 'APPROVED', 'creator_id' => $user->id, 'reported_at' => null, 'created_at' => Carbon::now()->setYear(2020)], 10);
        $events2021 = create(\App\Event::class, ['leading_teacher_tag' => 'BE-TESTME-123', 'status' => 'APPROVED', 'creator_id' => $user->id, 'reported_at' => null, 'created_at' => Carbon::now()->setYear(2021)], 20);

        $InfluenceCount2020 = $LT1->influence(2020);
        $InfluenceCount2021 = $LT1->influence(2021);

        $this->assertEquals(20, $InfluenceCount2020);
        $this->assertEquals(40, $InfluenceCount2021);

    }

    // When we create an event with a LT tag, the experience is taken into account

    /**
     * @test
     */
    public function leading_teacher_receives_experience_when_event_is_approved()
    {

        //        $tag = create('App\Tag', ['name' => 'TI-testme-234']);

        $leading_teacher = create(\App\User::class, ['tag' => 'IT-TESTME-123']);

        $event = create(\App\Event::class, [
            'status' => 'PENDING',
            'leading_teacher_tag' => 'IT-TESTME-123',
            'created_at' => Carbon::now()->setYear(2022),
        ]);

        $this->assertEquals(0, $leading_teacher->influence(2022));

        $event->update(['status' => 'APPROVED']);

        $this->assertEquals(2, $leading_teacher->fresh()->influence(2022));

    }
}
