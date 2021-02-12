<?php

namespace Tests\Feature;

use App\Helpers\EventHelper;
use App\User;
use Carbon\Carbon;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Torann\GeoIP\Facades\GeoIP;

class GeopositionTest extends TestCase
{
    /*
     * This tests have to use MySQL because of date functions.
     */

    use DatabaseMigrations;

    /** @test */
    public function it_should_get_closest_city()
    {


//        $user = $this->signIn();

//        GeoIP::shouldReceive('getClientIP')
//            ->once()
//            ->andReturn('text');


        //Good ones
        create('App\City', ['longitude' => 2.298088, 'latitude' => 48.855899, 'city' => 'Paris Foobar City']);
        create('App\City', ['longitude' => 22.123, 'latitude' => 24.123, 'city' => 'City far far away from me']);

        //Get geoposition
        $result = User::getGeoIPData();
        dd($result);
        //Closest city should be Foobar City



    }

}
