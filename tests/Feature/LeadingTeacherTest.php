<?php

namespace Tests\Feature;

use App\Http\Livewire\LeadingTeacherSignupForm;
use App\School;
use App\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Http\Response;
use Livewire;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Torann\GeoIP\Facades\GeoIP;

class LeadingTeacherTest extends TestCase
{

    use DatabaseMigrations;

    private $leading_teacher;


    public function setup(): void
    {
        parent::setUp();
        $this->seed('RolesAndPermissionsSeeder');
        $this->seed('LeadingTeacherRoleSeeder');

        $this->leading_teacher = create('App\Country', ['iso' => 'FR']);
        $this->leading_teacher = create('App\User')->assignRole('leading teacher');

    }


    /** @test */
    public function Leading_teacher_should_be_able_to_access_report_page()
    {

        $this->get(route('LT.report'))->assertStatus(403);

        $this->signIn($this->leading_teacher);
        $this->get(route('LT.report'))->assertStatus(200);


    }

    /** @test */
    public function report_page_is_restricted_to_authenticated_users()
    {

        $this->get(route('LT.signup'))->assertStatus(500);

        $this->signIn(create('App\User'));
        $this->get(route('LT.signup'))->assertStatus(200);


    }

    /** @test */
    public function should_become_leading_teacher_after_signup_()
    {
        //TODO: change to livewire testing

        $user = create('App\User');
        $this->signIn($user);

        $this->assertFalse($user->hasRole('leading teacher'));

        Livewire::test(LeadingTeacherSignupForm::class)
            ->set('first_name', 'Foo')
            ->set('last_name', 'Bar')
            ->set('country', 'Mars')
            ->set('twitter', null)
            ->call('submit');


        $this->assertTrue($user->hasRole('leading teacher'));


    }


}


