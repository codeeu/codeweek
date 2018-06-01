<?php

namespace Tests\Feature;

use App\School;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Torann\GeoIP\Facades\GeoIP;

class VolunteerTest extends TestCase
{

    use DatabaseMigrations;

    private $admin;


    public function setup()
    {
        parent::setUp();
        $this->seed('RolesAndPermissionsSeeder');

        $this->admin = create('App\User')->assignRole('super admin');


    }

    /** @test */
    public function should_create_volunteer()
    {

        $this->withExceptionHandling();

        $this->signIn();

        //$volunteer = make('App\Volunteer', ['user_id' => auth()->user()->id]);

        $this->post('/volunteer');

        $this->assertDatabaseHas('volunteers', [
            'user_id' => auth()->user()->id
        ]);


    }

    /** @test */
    public function should_list_pending_volunteers()
    {

        $this->signIn($this->admin);

        $volunteer = create('App\Volunteer');

        $this->get('/volunteers')->assertSee($volunteer->user->lastname);

    }

    /** @test */
    public function should_promote_volunteer_to_ambassador()
    {

        $this->signIn($this->admin);

        $volunteer = create('App\Volunteer');

        $this->assertFalse($volunteer->user->hasRole('ambassador'));

        $this->get('/volunteer/' . $volunteer->id . '/approve');

        $this->assertTrue($volunteer->fresh()->user->hasRole('ambassador'));
        $this->assertEquals($volunteer->fresh()->status,'APPROVED');

    }

    /** @test */
    public function should_reject_volunteer()
    {

        $this->signIn($this->admin);

        $volunteer = create('App\Volunteer');

        $this->assertFalse($volunteer->user->hasRole('ambassador'));

        $this->get('/volunteer/' . $volunteer->id . '/reject');

        $this->assertFalse($volunteer->fresh()->user->hasRole('ambassador'));
        $this->assertEquals('REJECTED',$volunteer->fresh()->status);


    }


}


