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

        $this->assertEquals($user->country->name, $country->name);


    }

    /** @test */
    public function a_user_should_have_right_avatar_path()
    {


        $user = create('App\User', ["avatar_path" => "avatars/foo/bar.png"]);


        $this->assertEquals("https://codeweek-s3.s3.amazonaws.com/avatars/foo/resized/80/bar.png", $user->avatar);


    }


}


