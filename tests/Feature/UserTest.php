<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

final class UserTest extends TestCase
{
    use DatabaseMigrations;

    #[Test]
    public function a_user_belongs_to_a_country(): void
    {

        //$this->withExceptionHandling();
        $country = \App\Country::factory()->create();

        $user = \App\User::factory()->create(['country_iso' => $country->iso]);

        $this->assertEquals($user->country->name, $country->name);

    }

    #[Test]
    public function a_user_should_have_right_avatar_path(): void
    {

        $user = \App\User::factory()->create(['avatar_path' => 'avatars/foo/bar.png']);

        $this->assertEquals(config('codeweek.aws_url').'avatars/foo/bar.png', $user->avatar);

    }

    #[Test]
    public function a_user_with_null_avatar_should_have_default_avatar(): void
    {

        $user = \App\User::factory()->create(['avatar_path' => null]);

        $this->assertEquals(config('codeweek.aws_url').'avatars/default.png', $user->avatar);

    }

    #[Test]
    public function a_user_should_readable_name(): void
    {

        $user = \App\User::factory()->create(['firstname' => 'foo', 'lastname' => '', 'username' => '']);

        $this->assertEquals('foo', $user->getName());

    }

    #[Test]
    public function a_user_should_readable_name_with_first_and_lastname(): void
    {

        $user = \App\User::factory()->create(['firstname' => 'foo', 'lastname' => 'bar', 'username' => '']);

        $this->assertEquals('foo bar', $user->getName());

    }

    #[Test]
    public function a_user_should_readable_name_with_username(): void
    {

        $user = \App\User::factory()->create(['firstname' => 'foo', 'lastname' => 'bar', 'username' => 'woody']);

        $this->assertEquals('woody', $user->getName());

    }

    #[Test]
    public function a_user_should_readable_name_without_personal_info(): void
    {

        $user = \App\User::factory()->create(['firstname' => '', 'lastname' => '', 'username' => '', 'email' => 'foo@bar.com']);

        $this->assertEquals('foo@bar.com', $user->getName());

    }

    #[Test]
    public function a_user_should_be_seen_as_ambassador(): void
    {

        $this->seed('RolesAndPermissionsSeeder');

        $user = \App\User::factory()->create()->assignRole('ambassador');

        $this->assertTrue($user->ambassador);

    }
}
