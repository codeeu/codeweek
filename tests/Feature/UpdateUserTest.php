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
            'name' => 'Changed'
        ]);

        tap($user->fresh(), function ($user) {
            $this->assertEquals('Changed', $user->name);
        });
    }
}
