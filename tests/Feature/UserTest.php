<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;

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

        $user = create('App\User', ['avatar_path' => 'avatars/foo/bar.png']);

        $this->assertEquals(config('codeweek.aws_url').'avatars/foo/bar.png', $user->avatar);

    }

    /** @test */
    public function a_user_with_null_avatar_should_have_default_avatar()
    {

        $user = create('App\User', ['avatar_path' => null]);

        $this->assertEquals(config('codeweek.aws_url').'avatars/default_avatar.png', $user->avatar);

    }

    /** @test */
    public function a_user_should_readable_name()
    {

        $user = create('App\User', ['firstname' => 'foo', 'lastname' => '', 'username' => '']);

        $this->assertEquals('foo', $user->getName());

    }

    /** @test */
    public function a_user_should_readable_name_with_first_and_lastname()
    {

        $user = create('App\User', ['firstname' => 'foo', 'lastname' => 'bar', 'username' => '']);

        $this->assertEquals('foo bar', $user->getName());

    }

    /** @test */
    public function a_user_should_readable_name_with_username()
    {

        $user = create('App\User', ['firstname' => 'foo', 'lastname' => 'bar', 'username' => 'woody']);

        $this->assertEquals('woody', $user->getName());

    }

    /** @test */
    public function a_user_should_readable_name_without_personal_info()
    {

        $user = create('App\User', ['firstname' => '', 'lastname' => '', 'username' => '', 'email' => 'foo@bar.com']);

        $this->assertEquals('foo@bar.com', $user->getName());

    }

    /** @test */
    public function a_user_should_be_seen_as_ambassador()
    {

        $this->seed('RolesAndPermissionsSeeder');

        $user = create('App\User')->assignRole('ambassador');

        $this->assertTrue($user->ambassador);

    }
}
