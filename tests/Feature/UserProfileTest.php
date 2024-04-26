<?php

namespace Tests\Feature;

use Carbon\Carbon;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class UserProfileTest extends TestCase
{
    use RefreshDatabase;

    public $user;

    protected function setUp(): void
    {
        parent::setUp();
        $this->seed('RolesAndPermissionsSeeder');

        $superadmin = \App\User::factory()->create();
        $superadmin->assignRole('super admin');

        $this->signIn($superadmin);

        $this->user = \App\User::factory()->create(['id' => 222]);

    }

    /** @test */
    public function it_should_display_user_name(): void
    {

        $response = $this->get('/badges/user/222');

        $response->assertSeeText($this->user->firstname);
        $response->assertSeeText($this->user->lastname);
    }

    /** @test */
    public function it_should_display_achievements(): void
    {

        $this->withoutExceptionHandling();
        $response = $this->get('/badges/user/222');
        $response->assertSee('Active Organiser '.Carbon::now()->year);

    }
}
