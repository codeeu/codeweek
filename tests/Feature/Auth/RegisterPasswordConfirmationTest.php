<?php

namespace Tests\Feature\Auth;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

final class RegisterPasswordConfirmationTest extends TestCase
{
    use RefreshDatabase;

    public function test_registration_rejects_mismatched_password_confirmation(): void
    {
        $response = $this->post('/register', [
            'name' => 'Test User',
            'email' => 'mismatch@example.com',
            'password' => 'Xq7!vT2#Lm9@',
            'password_confirmation' => 'Xq7!vT2#Lm9@Z',
            'privacy' => '1',
        ]);

        $response->assertSessionHasErrors('password');
        $this->assertDatabaseMissing('users', ['email' => 'mismatch@example.com']);
    }
}
