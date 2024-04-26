<?php

namespace Tests\Feature;

use PHPUnit\Framework\Attributes\Test;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;

final class VolunteerTest extends TestCase
{
    use DatabaseMigrations;

    private $admin;

    protected function setUp(): void
    {
        parent::setUp();
        $this->seed('RolesAndPermissionsSeeder');

        $this->admin = \App\User::factory()->create()->assignRole('super admin');

    }

    #[Test]
    public function should_create_volunteer(): void
    {

        $this->withExceptionHandling();

        $this->signIn();

        //$volunteer = make('App\Volunteer', ['user_id' => auth()->user()->id]);

        $this->post('/volunteer');

        $this->assertDatabaseHas('volunteers', [
            'user_id' => auth()->user()->id,
        ]);

    }

    #[Test]
    public function should_list_pending_volunteers(): void
    {

        $this->signIn($this->admin);

        $volunteer = \App\Volunteer::factory()->create();

        $this->get('/volunteers')->assertSee($volunteer->user->lastname);

    }

    #[Test]
    public function should_promote_volunteer_to_ambassador(): void
    {

        $this->signIn($this->admin);

        $volunteer = \App\Volunteer::factory()->create();

        $this->assertFalse($volunteer->user->hasRole('ambassador'));

        $this->get('/volunteer/'.$volunteer->id.'/approve');

        $this->assertTrue($volunteer->fresh()->user->hasRole('ambassador'));
        $this->assertEquals($volunteer->fresh()->status, 'APPROVED');

    }

    #[Test]
    public function should_reject_volunteer(): void
    {

        $this->signIn($this->admin);

        $volunteer = \App\Volunteer::factory()->create();

        $this->assertFalse($volunteer->user->hasRole('ambassador'));

        $this->get('/volunteer/'.$volunteer->id.'/reject');

        $this->assertFalse($volunteer->fresh()->user->hasRole('ambassador'));
        $this->assertEquals('REJECTED', $volunteer->fresh()->status);

    }
}
