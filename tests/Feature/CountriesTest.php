<?php

namespace Tests\Feature;

use PHPUnit\Framework\Attributes\Test;
use App\Country;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Support\Facades\Log;
use Tests\TestCase;

class CountriesTest extends TestCase
{
    use DatabaseMigrations;

    private $event;

    /*public function setup():void
    {
        parent::setUp();
        $this->event = create('App\Event');

        $this->event->audiences()->saveMany(factory('App\Audience', 3)->make());
        $this->event->themes()->saveMany(factory('App\Theme', 3)->make());
        $this->event->tags()->saveMany(factory('App\Tag', 3)->make());

    }*/

    #[Test]
    public function get_countries_with_events(): void
    {

        $country_without_event = \App\Country::factory()->create();
        $country_with_event = \App\Country::factory()->create();
        Log::info($country_with_event->iso);
        \App\Event::factory()->create(['country_iso' => $country_with_event->iso, 'status' => 'APPROVED']);

        $this->assertCount(1, Country::withEvents());
        $this->assertEquals(Country::withEvents()[0]->name, $country_with_event->name);

    }

    #[Test]
    public function get_countries_with_coordinators(): void
    {

        $this->seed('RolesAndPermissionsSeeder');
        $this->seed('LeadingTeacherRoleSeeder');
        //        $countries = create('App\Country',[], 10);
        $france = \App\Country::factory()->create(['iso' => 'FR']);
        $belgium = \App\Country::factory()->create(['iso' => 'BE']);

        $ambassador_fr = \App\User::factory()->create(['country_iso' => $france->iso])->assignRole('ambassador');
        $ambassador_be = \App\User::factory()->create(['country_iso' => $belgium->iso])->assignRole('ambassador');
        $leading_teacher_be = \App\User::factory()->create(['country_iso' => $belgium->iso])->assignRole('leading teacher');

        $this->assertCount(2, Country::withCoordinators());

    }
}
