<?php

namespace Tests\Feature\Achievements;

use App\Achievements\Achievement;
use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
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
//    public function an_achievement_badge_is_unlocked_once_a_user_experience_points_pass_1000()
//    {
//        $user = factory(User::class)->create();
//
//        $user->getExperience()->awardExperience(1001);
//
//        $this->assertCount(1, $user->achievements);
//    }

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
}
