<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;

class UpdateUserTest extends TestCase
{

    use DatabaseMigrations;

    /** @test */
    function a_user_can_be_updated_by_its_owner()
    {
        $user = create(\App\User::class);

        $this->signIn($user);


        $this->patch('user', [
            'firstname' => 'Changed firstname',
            'lastname' => 'Changed lastname',
            'bio' => 'Changed Bio',
            'twitter' => 'Changed Twitter',
            'website' => 'Changed Website',
            'country_iso' => 'AA',
            'privacy' => 1
        ]);

        tap($user->fresh(), function ($user) {
            $this->assertEquals('Changed firstname', $user->firstname);
            $this->assertEquals('Changed lastname', $user->lastname);
            $this->assertEquals('Changed Bio', $user->bio);
            $this->assertEquals('Changed Twitter', $user->twitter);
            $this->assertEquals('Changed Website', $user->website);
            $this->assertEquals('AA', $user->country_iso);
            $this->assertEquals(1, $user->privacy);

        });

        $this->patch('user', [
            'firstname' => 'Changed firstname',
            'lastname' => 'Changed lastname',
            'bio' => 'Changed Bio',
            'twitter' => 'Changed Twitter',
            'website' => 'Changed Website',
            'country_iso' => 'AAA',
            'privacy' => 0
        ]);

        tap($user->fresh(), function ($user) {
            $this->assertEquals('AAA', $user->country_iso);
            $this->assertEquals(0, $user->privacy);

        });
    }

    /** @test */
    function a_user_cant_update_its_email()
    {
        $user = create(\App\User::class);

        $this->signIn($user);


        $this->patch('user', [
            'email' => 'newmail@test.com',
        ]);

        tap($user->fresh(), function ($user) {
            $this->assertNotEquals('newmail@test.com', $user->email);
        });
    }
}
