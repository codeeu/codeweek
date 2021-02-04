<?php

namespace Tests\Feature;

use App\School;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Http\Response;
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

        // Sign-in as a user
        $user = create('App\User');
        $this->signIn($user);

        $this->assertFalse($user->hasRole('leading teacher'));

        $request = [
            "first_name" => "Foo",
            "last_name" => "Bar",
            "country" => "Mars",
            "twitter" => null,

        ];

        $this->post(route('LT.signup.store'), $request)
            ->assertStatus(Response::HTTP_OK);

        $this->assertTrue($user->hasRole('leading teacher'));


    }


}


