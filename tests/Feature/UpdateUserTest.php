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
            'name' => 'Changed',
            'email' => 'newmail@test.com',
            'bio' => 'Changed Bio',
            'twitter' => 'Changed Twitter',
            'website' => 'Changed Website',
            'country_iso' => 'AA'
        ]);

        tap($user->fresh(), function ($user) {
            $this->assertEquals('Changed', $user->name);
            $this->assertEquals('Changed Bio', $user->bio);
            $this->assertEquals('Changed Twitter', $user->twitter);
            $this->assertEquals('Changed Website', $user->website);
            $this->assertEquals('AA', $user->country_iso);
            $this->assertNotEquals('newmail@test.com', $user->email);
        });
    }
}
