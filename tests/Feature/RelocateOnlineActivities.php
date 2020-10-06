<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class RelocateOnlineActivities extends TestCase
{

    use DatabaseMigrations;
 /** @test */
  function it_should_relocate_event()
  {

      $france = create('App\Country',['iso'=>'FR',"longitude"=>2.824354, "latitude"=>46.980252]);

      $this->signIn(create('App\User'));

      $badPosition = create('App\Event', ["country_iso"=>"FR", "geoposition"=>"0,0"]);
      $goodPosition = create('App\Event', ["country_iso"=>"FR", "geoposition"=>"3,47"]);

      $this->artisan('relocate');

//      $this->assertNotEquals("0,0",$badPosition->fresh()->geoposition);
      $this->assertEquals("46.980252,2.824354",$badPosition->fresh()->geoposition);
      $this->assertEquals("3,47",$goodPosition->fresh()->geoposition);

  }

}
