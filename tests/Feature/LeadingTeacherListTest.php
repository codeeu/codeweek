<?php

namespace Tests\Feature;

use App\Http\Livewire\LeadingTeacherSignupForm;
use App\LeadingTeacherExpertise;
use App\ResourceSubject;
use App\School;
use App\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Http\Response;
use Livewire;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Torann\GeoIP\Facades\GeoIP;

class LeadingTeacherListTest extends TestCase
{

    use DatabaseMigrations;

    private $leading_teacher;
    private $leading_teacher_admin;


    public function setup(): void
    {
        parent::setUp();
        $this->seed('RolesAndPermissionsSeeder');
        $this->seed('LeadingTeacherRoleSeeder');

        $this->leading_teacher = create('App\User')->assignRole('leading teacher');

        $this->leading_teacher_admin = create('App\User')->assignRole('leading teacher admin');

    }


    /** @test */
    public function Leading_teacher_should_be_able_to_access_report_page()
    {

        $this->get(route('LT.report'))->assertStatus(403);

        $this->signIn($this->leading_teacher);
        $this->get(route('LT.report'))->assertStatus(200);


    }

    /** @test */
    public function should_become_leading_teacher_after_signup_()
    {

        $this->get(route('LT.signup'))->assertStatus(302);

        $user = create('App\User');
        $this->signIn($user);

        $this->assertFalse($user->leadingTeacher);

        $city = create('App\City', ["id"=>1004436363,"city" => "FooBarCity"]);
        $level1 = create('App\ResourceLevel', ["id"=>80,"teach" => true]);
        $level2 = create('App\ResourceLevel', ["id"=>85,"teach" => true]);
        $subject1 = create('App\ResourceSubject',["id"=>511]);
        $subject2 = create('App\ResourceSubject',["id"=>512]);
        $subject3 = create('App\ResourceSubject',["id"=>400]);
        $expertise1 = create('App\LeadingTeacherExpertise', ["id" => 101]);
        $expertise2 = create('App\LeadingTeacherExpertise', ["id" => 102]);


        Livewire::test(LeadingTeacherSignupForm::class)
            ->set('first_name', 'Foo')
            ->set('last_name', 'Bar')
            ->set('selectedCountry', 'Mars')
            ->set('twitter', null)
            ->set('selectedLevels', [$level1->id, $level2->id])
            ->set('selectedSubjects', [$subject1->id, $subject2->id, $subject3->id])
            ->set('selectedExpertises', [$expertise1->id, $expertise2->id])
            ->set('selectedCity', 1004436363)
            ->set('isLeadingTeacher', true)
            ->set('privacy', true)
            ->call('submit');



        $this->assertEquals([101, 102], $user->expertises()->pluck('id')->toArray());
        $this->assertEquals([80,85], $user->levels()->pluck('id')->toArray());
        $this->assertEquals([511,512,400], $user->subjects()->pluck('id')->toArray());
        $this->assertEquals('Foo Bar', $user->fullName);
        $this->assertEquals('FooBarCity', $user->city->name);


        $this->assertTrue($user->leadingTeacher);

    }


}


