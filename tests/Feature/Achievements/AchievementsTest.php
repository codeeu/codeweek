<?php

namespace Tests\Feature\Achievements;

use App\Achievements\Achievement;
use App\Event;
use App\User;
use Carbon\Carbon;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;

class AchievementsTest extends TestCase
{

    use RefreshDatabase;

    /** @test */
    public function a_user_can_be_assigned_any_achievement_badge()
    {
        // Given we have a user
        $user = factory(User::class)->create();

        // As well as a badge
        $achievement = factory(Achievement::class)->create();

        // If a badge is awarded to a user
        $achievement->awardTo($user);

        // Then it should be accessible through the ->achievements relationship
        $this->assertCount(1, $user->achievements);
        $this->assertTrue($user->achievements[0]->is($achievement));
    }


    /** @test */
    public function achievements_should_be_linked_to_user_when_reporting_events()
    {

        $this->withExceptionHandling();

        $this->signIn();

        Storage::fake('latex');

        $this->seed('RolesAndPermissionsSeeder');

        $user = auth()->user();

        $events = create('App\Event', ["creator_id" => $user->id, "reported_at" => null,"status" => "APPROVED", "start_date" => Carbon::now()], 5);

        $this->assertCount(0, $user->achievements);

        $this->assertEquals(0, auth()->user()->getExperience()->points);

        foreach ($events as $event){
            $this->reportEvent($event);
        }

        $this->assertEquals(10, $user->getExperience()->points);

        $this->assertCount(1, $user->fresh()->achievements);

        $this->assertEquals("Active Organiser 2021", $user->fresh()->achievements[0]->name);

        $more_events = create('App\Event', ["creator_id" => $user->id, "reported_at" => null,"status" => "APPROVED", "start_date" => Carbon::now()], 5);

        foreach ($more_events as $event){
            $this->reportEvent($event);
        }

        $this->assertEquals(20, $user->getExperience()->points);

        $this->assertCount(2, $user->fresh()->achievements);

        $this->assertEquals("Expert Organiser 2021", $user->fresh()->achievements[1]->name);


    }



//    /** @test */
//    public function achievements_can_be_seeded_for_all_users_as_a_console_command()
//    {
//
//        $this->seed('LeadingTeacherRoleSeeder');
//
//        $users = factory(User::class, 2)->create()->map(function($user){
//            return $user->assignRole('leading teacher');
//        });
//
//        $users[0]->getExperience()->update(["points" => 1001]);
//        $users[1]->getExperience()->update(["points" => 1001]);
//
//        $this->assertCount(0, $users[0]->achievements);
//        $this->assertCount(0, $users[1]->achievements);
//
//        $this->artisan('badges:sync-users-achievements');
//
//        $this->assertCount(1, $users[0]->fresh()->achievements);
//        $this->assertCount(1, $users[1]->fresh()->achievements);
//    }
    /**
     * @param $event
     */
    public function reportEvent($event): void
    {
        $request = [
            "participants_count" => 10,
            "average_participant_age" => 20,
            "percentage_of_females" => 30,
            "codeweek_for_all_participation_code" => "foobar",
            "name_for_certificate" => "sdsqdsq"
        ];
        $this->post('/event/report/' . $event->fresh()->id, $request);
    }
}
