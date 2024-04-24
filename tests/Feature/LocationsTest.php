<?php

namespace Tests\Feature;

use App\Event;
use App\Location;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class LocationsTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();
        $this->seed('RolesAndPermissionsSeeder');
        $this->seed('LeadingTeacherRoleSeeder');

    }

    /** @test */
    public function user_should_get_locations_linked(): void
    {
        $this->withoutExceptionHandling();

        $user = \App\User::factory()->create();

        create(\App\Location::class, ['user_id' => $user->id], 3);

        $this->assertCount(3, $user->locations);

    }

    /** @test */
    public function it_should_extract_location_data(): void
    {
        $this->withoutExceptionHandling();

        $user = \App\User::factory()->create();

        $event = \App\Event::factory()->create(['status' => 'APPROVED', 'creator_id' => $user->id]);

        $this->assertNull($event->extractedLocation);
        $this->assertEmpty($user->locations);

        $this->artisan('location:extraction');

        $this->assertCount(1, $user->fresh()->locations);
        $this->assertNotNull($event->fresh()->extractedLocation);

    }

    /** @test */
    public function it_should_avoid_duplicates(): void
    {
        $this->withoutExceptionHandling();

        $user = \App\User::factory()->create();

        \App\Event::factory()->create(['status' => 'APPROVED', 'creator_id' => $user->id, 'latitude' => '11.123456789', 'longitude' => '22.987654321'], 3);
        $sameLocationFromOtherUsers = \App\Event::factory()->create(['status' => 'APPROVED', 'latitude' => '11.123456789', 'longitude' => '22.987654321'], 10);

        $this->assertDatabaseCount(Event::class, 13);

        $this->artisan('location:extraction');

        $this->assertDatabaseCount(Location::class, 11);

        $this->assertCount(1, $user->fresh()->locations);

    }

    /** @test */
    public function it_should_avoid_duplicates_2(): void
    {
        $this->withoutExceptionHandling();

        $user = \App\User::factory()->create();

        \App\Event::factory()->create(['creator_id' => $user->id, 'latitude' => '11.11', 'longitude' => '22.22', 'status' => 'APPROVED'], 30);

        $this->artisan('location:extraction');

        $this->assertDatabaseCount(Location::class, 1);

        $this->assertCount(1, $user->fresh()->locations);

    }

    /** @test */
    public function adding_activity_should_create_location(): void
    {
        $this->withoutExceptionHandling();

        $user = \App\User::factory()->create();

        create(\App\Location::class, ['user_id' => $user->id], 3);

        $this->assertCount(3, $user->locations);

    }

    /** @test */
    public function it_should_redirect_user_to_add_page_when_user_has_no_locations(): void
    {
        $this->withoutExceptionHandling();

        $this->signIn();

        $this->get('/add')
            ->assertSeeText('Add your #EUCodeWeek activity');

    }

    /** @test */
    public function it_should_redirect_user_to_locations_page_when_user_has_stored_locations(): void
    {
        $this->withoutExceptionHandling();

        $user = \App\User::factory()->create();

        create(\App\Location::class, ['user_id' => $user->id], 3);

        $this->signIn($user);

        $this->get('/add')
            ->assertLocation(route('activities-locations'))
            ->assertDontSeeText('Add your #EUCodeWeek activity');

    }

    /** @test */
    public function it_should_not_redirect_user_to_locations_page_when_user_has_stored_locations_but_clicked_on_skip(): void
    {
        $this->withoutExceptionHandling();

        $user = \App\User::factory()->create();

        create(\App\Location::class, ['user_id' => $user->id], 3);

        $this->signIn($user);

        $this->get('/add?skip=1')
            ->assertSeeText('Add your #EUCodeWeek activity');

    }
}
