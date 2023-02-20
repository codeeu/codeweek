<?php

namespace Tests\Feature;

use App\Helpers\TagsHelper;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class LeadingTeacherTagTest extends TestCase
{
    use DatabaseMigrations;

    private $leading_teacher;


    public function setup(): void
    {
        parent::setUp();
        $this->seed('RolesAndPermissionsSeeder');
        $this->seed('LeadingTeacherRoleSeeder');

        $this->leading_teacher = create('App\User', ['tag' => 'tag_LT1'])->assignRole('leading teacher');

    }

    // Events can be linked to one Leading Teacher

    /** @test */
    public function events_can_be_linked_to_a_leading_teacher()
    {

        $this->assertCount(0, $this->leading_teacher->leadingTeacherEvents);

        $event = create('App\Event', [
            'leading_teacher_id' => $this->leading_teacher->id,
            'country_iso' => 'BE',
            'status' => 'APPROVED'
        ]);

        $this->assertEquals($this->leading_teacher->id, $event->leadingTeacher->id);

        $this->assertCount(1, $this->leading_teacher->fresh()->leadingTeacherEvents);

    }

    /** @test */
    public function leading_teacher_is_linked_to_multiple_tags_non_case_sensitive()
    {
        //We have Leading Teacher with 0 tags
        $this->assertCount(0, $this->leading_teacher->tags);

        //We have tags
        $tag = create('App\Tag', ['name' => 'tag_LT1']);
        $tag2 = create('App\Tag', ['name' => 'TAg_lt1']);

        //We run a command
        TagsHelper::linkTagToLeadingTeacher($this->leading_teacher);

        //Ensure LT owns the tag
        $this->assertCount(2, $this->leading_teacher->fresh()->tags);

    }

    /** @test */
    public function leading_teachers_tags_are_linked()
    {
        $leading_teacher2 = create('App\User', ['tag' => 'tag_LT2'])->assignRole('leading teacher');

        //We have Leading Teacher with 0 tags
        $this->assertCount(0, $this->leading_teacher->tags);

        //We have tags
        create('App\Tag', ['name' => 'tag_LT1']);
        create('App\Tag', ['name' => 'TAg_lt1']);
        create('App\Tag', ['name' => 'TAg_lt2']);

        //We run a command
        $this->artisan('link:tags');

        //Assert tags are linked to the leading teachers
        $this->assertCount(2, $this->leading_teacher->fresh()->tags);
        $this->assertCount(1, $leading_teacher2->tags);

    }

    /**
     * @test
     */
    public function leading_teacher_tag_detection_is_using_the_name()
    {

        $tags = ["it-Altieri-123", "#it-Altieri-123", "# it-Altieri-123", "#coding@schools#ICMondaino#it-Altieri-123", "#it-Altieri123","IT-Altieri123", "#Altieri-it123", "#coding@schools #it-Altieri123",
            "#coding@schools #ICMondaino #it-Altieri-123","#it-Altieri-124","#coding@schools. #it-Altieri-123","@it-Altieri-123","#it-123-Altieri","#Altieri-123","#it-Altieri-123. #coding@schools",
            "#it-Altieri","#Altieri-it-123","°It-Altieri-123"];

        $leading_teacher = create('App\User', ['tag' => 'IT-ALTIERI-123']);

        //We have tags
        foreach ($tags as $tag){
            create('App\Tag', ['name' => $tag]);
        }


        //We run a command
        TagsHelper::linkTagToLeadingTeacher($leading_teacher);

        //Ensure LT owns the tag
        $this->assertCount(18, $leading_teacher->fresh()->tags);

    }

    // When we create an event with a LT tag, the experience is taken into account
    /**
     * @test
     */
    public function leading_teacher_receives_experience_when_tag_is_used()
    {

        $tags = ["it-Altieri-123", "#it-Altieri-123", "# it-Altieri-123", "#coding@schools#ICMondaino#it-Altieri-123", "#it-Altieri123","IT-Altieri123", "#Altieri-it123", "#coding@schools #it-Altieri123",
            "#coding@schools #ICMondaino #it-Altieri-123","#it-Altieri-124","#coding@schools. #it-Altieri-123","@it-Altieri-123","#it-123-Altieri","#Altieri-123","#it-Altieri-123. #coding@schools",
            "#it-Altieri","#Altieri-it-123","°It-Altieri-123"];

        $leading_teacher = create('App\User', ['tag' => 'IT-ALTIERI-123']);

        //We have tags
        foreach ($tags as $tag){
            create('App\Tag', ['name' => $tag]);
        }


        //We run a command
        TagsHelper::linkTagToLeadingTeacher($leading_teacher);

        //Ensure LT owns the tag
        $this->assertCount(18, $leading_teacher->fresh()->tags);

    }
}
