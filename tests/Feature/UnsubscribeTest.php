<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

final class UnsubscribeTest extends TestCase
{
    use DatabaseMigrations;

    #[Test]
    public function should_unsubscribe_user(): void
    {
        $this->withoutExceptionHandling();
        //Create user
        $user = \App\User::factory()->create(['email' => 'dummy@foo.bar']);

        $this->assertEquals(1, $user->receive_emails);

        // Visit endpoint
        $this->get('/unsubscribe/'.$user->email.'/'.$user->magic_key);

        // Assert the receive_emails variable is false
        $this->assertEquals(0, $user->fresh()->receive_emails);

    }

    #[Test]
    public function should_not_unsubscribe_user(): void
    {
        //        $this->withoutExceptionHandling();
        //Create user
        $user = \App\User::factory()->create(['email' => 'dummy@foo.bar']);

        $this->assertTrue($user->receive_emails);

        // Visit endpoint
        $this->get('/unsubscribe/'.$user->email.'/222')->assertStatus(403);

        // Assert the receive_emails variable is false
        $this->assertTrue($user->receive_emails);

    }
}
