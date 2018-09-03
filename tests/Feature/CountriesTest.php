<?php

namespace Tests\Feature;

use App\Country;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;

use Illuminate\Foundation\Testing\DatabaseMigrations;


class CountriesTest extends TestCase
{
    use DatabaseMigrations;


    private $event;

    /*public function setup()
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

        $country_without_event = create('App\Country');
        $country_with_event = create('App\Country');
        create('App\Event', ["country_iso" => $country_with_event->iso,"status" => "APPROVED"]);

        $this->assertCount(1,Country::withEvents());
        $this->assertEquals(Country::withEvents()[0]->name, $country_with_event->name);


    }


}
