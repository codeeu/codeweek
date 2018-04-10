<?php

namespace Tests\Feature;

use App\School;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class UserTest extends TestCase
{

    use DatabaseMigrations;

    /** @test */
    public function a_user_belongs_to_a_country()
    {

        //$this->withExceptionHandling();
        $country = create('App\Country');

        $user = create('App\User', ['country_iso' => $country->iso]);

        $this->assertEquals($user->country->name,$country->name);




    }


}


