<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;

class LinkLeadingTeachersToActivitiesTest extends TestCase
{
    use DatabaseMigrations;

    /**
     * @test
     */
    public function it_should_link_activities_to_LT()
    {

        $this->seed('RolesAndPermissionsSeeder');
        $this->seed('LeadingTeacherRoleSeeder');

        $leading_teacher = create(\App\User::class, ['tag' => 'BE-ASL-123'])->assignRole('leading teacher');

        //Create an activity without leading teacher tag
        $event = create(\App\Event::class, ['status' => 'APPROVED']);

        //Create a tag and link it to the activity
        $single = create(\App\Tag::class, ['name' => 'BE-ASL-123']);
        $event->tags()->save($single);

        $this->assertCount(0, $leading_teacher->taggedActivities);

        //Run the command
        $this->artisan('link:lt');

        //Activity should be linked
        $this->assertCount(1, $leading_teacher->fresh()->taggedActivities);

    }
}
