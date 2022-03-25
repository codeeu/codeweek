<?php

namespace Tests\Feature;

use App\Location;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Carbon;
use Tests\TestCase;

class LocationsTest extends TestCase
{
    use RefreshDatabase;


    public function setup() :void
    {
        parent::setUp();
        $this->seed('RolesAndPermissionsSeeder');


    }

    /** @test */
    public function user_should_get_locations_linked()
    {
        $this->withoutExceptionHandling();

        $user = create('App\User');

        create('App\Location', ['user_id' => $user->id], 3);

        $this->assertCount(3, $user->locations);

    }

    /** @test */
    public function it_should_extract_location_data()
    {
        $this->withoutExceptionHandling();

        $user = create('App\User');

        $event = create('App\Event', ['creator_id'=> $user->id]);

        $this->assertNull($event->extractedLocation);
        $this->assertEmpty($user->locations);

        $this->artisan('location:extraction');

        $this->assertCount(1, $user->fresh()->locations);
        $this->assertNotNull($event->fresh()->extractedLocation);

    }

    /** @test */
    public function it_should_avoid_duplicates()
    {
        $this->withoutExceptionHandling();

        $user = create('App\User');


        create('App\Event', ['creator_id'=> $user->id, 'latitude' => '111', 'longitude' => '222'], 3);
        $sameLocationFromOtherUsers = create('App\Event', ['latitude' => '111', 'longitude' => '222'], 10);

        $this->artisan('location:extraction');

        $this->assertDatabaseCount(Location::class,11);

        $this->assertCount(1, $user->fresh()->locations);


    }
}
