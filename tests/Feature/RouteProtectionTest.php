<?php

namespace Tests\Feature;

use App\Audience;
use App\Theme;
use Carbon\Carbon;
use Spatie\Permission\Exceptions\UnauthorizedException;
use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class RouteProtectionTest extends TestCase
{
    use DatabaseMigrations;

    private $admin;
    private $ambassador;
    private $school_manager;
    private $event_owner;

    public function setup()
    {
        parent::setUp();
        $this->seed('RolesAndPermissionsSeeder');

        $this->admin = create('App\User');
        $this->admin->assignRole('super admin');

        $this->ambassador = create('App\User');
        $this->ambassador->assignRole('ambassador');

        $this->school_manager = create('App\User');
        $this->school_manager->assignRole('school manager');

        $this->event_owner = create('App\User');
        $this->event_owner->assignRole('event owner');

    }


    /** @test */
    public function only_admin_can_access_activities()
    {

        $this->withExceptionHandling();

        $rejected = [$this->event_owner, $this->ambassador, $this->school_manager];
        $allowed = [$this->admin];

        $this->check_route('/activities', $allowed, $rejected);

    }

    /** @test */
    public function only_admin_an_ambassadors_can_access_pending_events_list()
    {

        $this->withExceptionHandling();

        $rejected = [$this->event_owner, $this->school_manager];
        $allowed = [$this->admin, $this->ambassador];

        $this->check_route('/pending', $allowed, $rejected);

    }

    /** @test */
    public function only_admin_can_access_pending_events_by_countries()
    {

        $this->withExceptionHandling();

        $country = create('App\Country');

        $rejected = [$this->event_owner, $this->school_manager,  $this->ambassador];
        $allowed = [$this->admin];

        $this->check_route('/pending/' . $country->iso, $allowed, $rejected);

    }

    private function check_route($route, $allowed, $restricted)
    {

        foreach ($restricted as $restricted_user) {
            $this->signIn($restricted_user);
            $this->get($route)->assertStatus(403);
        }

        foreach ($allowed as $allowed_user) {
            $this->signIn($allowed_user);
            $this->get($route)->assertStatus(200);
        }




    }


}


