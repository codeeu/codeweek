<?php

namespace Tests\Feature;

use Carbon\Carbon;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UserProfileTest extends TestCase
{
    use RefreshDatabase;


    public $user;
    public function setup() :void
    {
        parent::setUp();
        $this->seed('RolesAndPermissionsSeeder');

        $superadmin = create('App\User');
        $superadmin->assignRole('super admin');

        $this->signIn($superadmin);

        $this->user = create('App\User', ['id'=>222]);


    }

    /** @test */
    public function it_should_display_user_name()
    {

        $response = $this->get('/badges/user/222');

        $response->assertSeeText($this->user->firstname);
        $response->assertSeeText($this->user->lastname);
    }

    /** @test */
    public function it_should_display_achievements()
    {

        $response = $this->get('/badges/user/222');
        $response->assertSeeText('Active Organiser ' . Carbon::now()->year);

    }
}
