<?php

namespace Tests\Feature;

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

    /** @test */
    public function get_countries_with_events()
    {

        $country_without_event = create(\App\Country::class);
        $country_with_event = create(\App\Country::class);
        Log::info($country_with_event->iso);
        create(\App\Event::class, ['country_iso' => $country_with_event->iso, 'status' => 'APPROVED']);

        $this->assertCount(1, Country::withEvents());
        $this->assertEquals(Country::withEvents()[0]->name, $country_with_event->name);

    }

    /** @test */
    public function get_countries_with_coordinators()
    {

        $this->seed('RolesAndPermissionsSeeder');
        $this->seed('LeadingTeacherRoleSeeder');
        //        $countries = create('App\Country',[], 10);
        $france = create(\App\Country::class, ['iso' => 'FR']);
        $belgium = create(\App\Country::class, ['iso' => 'BE']);

        $ambassador_fr = create(\App\User::class, ['country_iso' => $france->iso])->assignRole('ambassador');
        $ambassador_be = create(\App\User::class, ['country_iso' => $belgium->iso])->assignRole('ambassador');
        $leading_teacher_be = create(\App\User::class, ['country_iso' => $belgium->iso])->assignRole('leading teacher');

        $this->assertCount(2, Country::withCoordinators());

    }
}
