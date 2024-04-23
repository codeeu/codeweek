<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;

class RouteProtectionTest extends TestCase
{
    use DatabaseMigrations;

    private $admin;

    private $ambassador;

    private $school_manager;

    private $event_owner;

    private $leading_teacher;

    protected function setUp(): void
    {
        parent::setUp();
        $this->seed('RolesAndPermissionsSeeder');
        $this->seed('LeadingTeacherRoleSeeder');

        $this->admin = create(\App\User::class);
        $this->admin->assignRole('super admin');

        $this->ambassador = create(\App\User::class);
        $this->ambassador->assignRole('ambassador');

        $this->school_manager = create(\App\User::class);
        $this->school_manager->assignRole('school manager');

        $this->event_owner = create(\App\User::class);
        $this->event_owner->assignRole('event owner');

        $this->leading_teacher = create(\App\User::class);
        $this->leading_teacher->assignRole('leading teacher');

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

        $country = create(\App\Country::class);

        $rejected = [$this->event_owner, $this->school_manager,  $this->ambassador];
        $allowed = [$this->admin];

        $this->check_route('/pending/'.$country->iso, $allowed, $rejected);

    }

    /** @test */
    public function only_leading_teacher_can_access_report_form()
    {

        $this->withExceptionHandling();

        $rejected = [$this->event_owner, $this->school_manager,  $this->ambassador];
        $allowed = [$this->leading_teacher];

        $this->check_route('/leading-teachers/report', $allowed, $rejected);

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
