<?php

namespace Tests\Feature;

use PHPUnit\Framework\Attributes\Test;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;

class UpdateUserTest extends TestCase
{
    use DatabaseMigrations;

    #[Test]
    public function a_user_can_be_updated_by_its_owner(): void
    {
        $user = \App\User::factory()->create();

        $this->signIn($user);
        $belgium = \App\Country::factory()->create(['iso' => 'BE']);

        $this->patch('user', [
            'firstname' => 'Changed firstname',
            'lastname' => 'Changed lastname',
            'email_display' => 'new@email.com',
            'bio' => 'Changed Bio',
            'twitter' => 'Changed Twitter',
            'website' => 'Changed Website',
            'country_iso' => null,
            'privacy' => 1,
            'receive_emails' => 0,
        ]);

        tap($user->fresh(), function ($user) {
            $this->assertEquals('Changed firstname', $user->firstname);
            $this->assertEquals('Changed lastname', $user->lastname);
            $this->assertEquals('Changed Bio', $user->bio);
            $this->assertEquals('Changed Twitter', $user->twitter);
            $this->assertEquals('Changed Website', $user->website);
            $this->assertNull($user->country_iso);
            $this->assertEquals(1, $user->privacy);
            $this->assertEquals('new@email.com', $user->email_display);
            $this->assertEquals(0, $user->receive_emails);

        });

        $this->patch('user', [
            'firstname' => 'Changed firstname',
            'lastname' => 'Changed lastname',
            'bio' => 'Changed Bio',
            'twitter' => 'Changed Twitter',
            'website' => 'Changed Website',
            'country_iso' => 'BE',
            'privacy' => 0,
            'receive_emails' => 1,
        ]);

        tap($user->fresh(), function ($user) {
            $this->assertEquals('BE', $user->country_iso);
            $this->assertEquals(0, $user->privacy);
            $this->assertEquals(1, $user->receive_emails);

        });
    }

    #[Test]
    public function a_user_cant_update_its_email(): void
    {
        $user = \App\User::factory()->create();

        $this->signIn($user);

        $this->patch('user', [
            'email' => 'newmail@test.com',
        ]);

        tap($user->fresh(), function ($user) {
            $this->assertNotEquals('newmail@test.com', $user->email);
        });
    }
}
