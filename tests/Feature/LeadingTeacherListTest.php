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

    private $user;
    private $leading_teacher;

    private $leading_teacher_admin;


    public function setup(): void
    {
        parent::setUp();
        $this->seed('RolesAndPermissionsSeeder');
        $this->seed('LeadingTeacherRoleSeeder');


        $this->leading_teacher = create('App\User')->assignRole('leading teacher');
        $this->user = create('App\User');


        $country = create('App\Country');
        $this->leading_teacher_admin = create('App\User',['country_iso' => $country->iso])->assignRole('leading teacher admin');


    }


    /** @test */
    public function Leading_teacher_admin_should_be_able_to_access_list_page()
    {

        $this->get(route('leading_teachers_list'))->assertStatus(302);
        $this->signIn($this->leading_teacher);
        $this->get(route('leading_teachers_list'))->assertStatus(403);
        $this->signIn($this->leading_teacher_admin);
        $this->get(route('leading_teachers_list'))->assertStatus(200);



    }

    /** @test */
    public function leading_teachers_should_be_listed()
    {

        $this->signIn($this->leading_teacher_admin);
        $page = $this->get(route('leading_teachers_list'));
            $page->assertStatus(200);

            $page->assertSee($this->leading_teacher->firstname)
            ->assertSee($this->leading_teacher->lastname)
            ->assertSee($this->leading_teacher->country->name);

            $page->assertDontSee($this->user->firstname)
            ->assertDontSee($this->user->lastname);

    }




}


