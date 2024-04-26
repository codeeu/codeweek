<?php

namespace Tests\Feature;

use PHPUnit\Framework\Attributes\Test;
use App\Event;
use App\Location;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

final class LocationsTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();
        $this->seed('RolesAndPermissionsSeeder');
        $this->seed('LeadingTeacherRoleSeeder');

    }

    #[Test]
    public function user_should_get_locations_linked(): void
    {
        $this->withoutExceptionHandling();

        $user = \App\User::factory()->create();

        \App\Location::factory()->count(3)->create(['user_id' => $user->id]);

        $this->assertCount(3, $user->locations);

    }

    #[Test]
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

    #[Test]
    public function it_should_avoid_duplicates(): void
    {
        $this->withoutExceptionHandling();

        $user = \App\User::factory()->create();

        \App\Event::factory()->count(3)->create(['status' => 'APPROVED', 'creator_id' => $user->id, 'latitude' => '11.123456789', 'longitude' => '22.987654321']);
        $sameLocationFromOtherUsers = \App\Event::factory()->count(10)->create(['status' => 'APPROVED', 'latitude' => '11.123456789', 'longitude' => '22.987654321']);

        $this->assertDatabaseCount(Event::class, 13);

        $this->artisan('location:extraction');

        $this->assertDatabaseCount(Location::class, 11);

        $this->assertCount(1, $user->fresh()->locations);

    }

    #[Test]
    public function it_should_avoid_duplicates_2(): void
    {
        $this->withoutExceptionHandling();

        $user = \App\User::factory()->create();

        \App\Event::factory()->count(30)->create(['creator_id' => $user->id, 'latitude' => '11.11', 'longitude' => '22.22', 'status' => 'APPROVED']);

        $this->artisan('location:extraction');

        $this->assertDatabaseCount(Location::class, 1);

        $this->assertCount(1, $user->fresh()->locations);

    }

    #[Test]
    public function adding_activity_should_create_location(): void
    {
        $this->withoutExceptionHandling();

        $user = \App\User::factory()->create();

        \App\Location::factory()->count(3)->create(['user_id' => $user->id]);

        $this->assertCount(3, $user->locations);

    }

    #[Test]
    public function it_should_redirect_user_to_add_page_when_user_has_no_locations(): void
    {
        $this->withoutExceptionHandling();

        $this->signIn();

        $this->get('/add')
            ->assertSeeText('Add your #EUCodeWeek activity');

    }

    #[Test]
    public function it_should_redirect_user_to_locations_page_when_user_has_stored_locations(): void
    {
        $this->withoutExceptionHandling();

        $user = \App\User::factory()->create();

        \App\Location::factory()->count(3)->create(['user_id' => $user->id]);

        $this->signIn($user);

        $this->get('/add')
            ->assertLocation(route('activities-locations'))
            ->assertDontSeeText('Add your #EUCodeWeek activity');

    }

    #[Test]
    public function it_should_not_redirect_user_to_locations_page_when_user_has_stored_locations_but_clicked_on_skip(): void
    {
        $this->withoutExceptionHandling();

        $user = \App\User::factory()->create();

        \App\Location::factory()->count(3)->create(['user_id' => $user->id]);

        $this->signIn($user);

        $this->get('/add?skip=1')
            ->assertSeeText('Add your #EUCodeWeek activity');

    }
}
