<?php

namespace Tests\Feature\Achievements\Achievements;

use App\Achievements\Events\UserEarnedExperience;
use Carbon\Carbon;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Event;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;

class TagImpactTest extends TestCase
{

    use RefreshDatabase;

    /** @test */
    public function tag_impact_badge_should_be_awarded()
    {

        $this->signIn();

        $this->seed('RolesAndPermissionsSeeder');

        $user = auth()->user();

        $LT1 = create('App\User', ['tag' => 'tag_LT1']);

        $fifty_events = create('App\Event', ['status' => 'PENDING', 'creator_id' => $user->id, 'reported_at' => null, 'codeweek_for_all_participation_code' => 'tag_LT1'], 50);

        $this->assertCount(0, $user->achievements);

        foreach ($fifty_events as $event){
            $event->update([
                'status' => 'APPROVED'
            ]);
        }

        $this->assertEquals(100, $LT1->getExperience()->points);

        $this->assertCount(5, $LT1->fresh()->achievements);

        $this->assertEquals("Influencer " . Carbon::now()->year, $LT1->fresh()->achievements[0]->name);
//
//        $more_events = create('App\Event', ["creator_id" => $user->id, "reported_at" => null,"status" => "APPROVED", "start_date" => Carbon::now(), "end_date" => Carbon::now()], 5);
//
//        foreach ($more_events as $event){
//            $this->reportEvent($event);
//        }
//
//        $this->assertEquals(20, $user->getExperience()->points);
//
//        $this->assertCount(2, $user->fresh()->achievements);
//
//        $this->assertEquals("Expert Organiser 2021", $user->fresh()->achievements[1]->name);







    }


}
