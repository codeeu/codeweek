<?php

namespace Tests\Feature\Achievements\Achievements;

use App\Achievements\Events\UserEarnedExperience;
use Carbon\Carbon;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Event;
use Tests\TestCase;

class InfluenceTest extends TestCase
{

    use RefreshDatabase;

    /** @test */
    public function user_influence_should_be_counted()
    {


        $user = create('App\User');

        $LT1 = create('App\User', ['id' => 100, 'tag' => 'tag_LT1']);

        $events2020 = create('App\Event', ['status' => 'APPROVED', 'creator_id' => $user->id, 'reported_at' => null, 'codeweek_for_all_participation_code' => 'tag_LT1', 'created_at' => Carbon::now()->setYear(2020)], 10);
        $events2021 = create('App\Event', ['status' => 'APPROVED', 'creator_id' => $user->id, 'reported_at' => null, 'codeweek_for_all_participation_code' => 'tag_LT1', 'created_at' => Carbon::now()->setYear(2021)], 20);

        $InfluenceCount2020 = $LT1->influence(2020);
        $InfluenceCount2021 = $LT1->influence(2021);


        $this->assertEquals(20, $InfluenceCount2020);
        $this->assertEquals(40, $InfluenceCount2021);


    }




}
