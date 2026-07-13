<?php

namespace Tests\Feature\Auth;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Str;
use Tests\TestCase;

final class PasswordLengthValidationTest extends TestCase
{
    use RefreshDatabase;

    public function test_registration_rejects_password_longer_than_72_characters(): void
    {
        $response = $this->post('/register', [
            'name' => 'Test User',
            'email' => 'long-password@example.com',
            'password' => Str::repeat('Aa1!', 19), // 76 chars
            'password_confirmation' => Str::repeat('Aa1!', 19),
            'privacy' => '1',
        ]);

        $response->assertSessionHasErrors('password');
        $this->assertDatabaseMissing('users', ['email' => 'long-password@example.com']);
    }

    public function test_login_rejects_password_longer_than_72_characters(): void
    {
        $response = $this->post('/login', [
            'email' => 'user@example.com',
            'password' => Str::repeat('x', 73),
        ]);

        $response->assertSessionHasErrors('password');
    }

    public function test_registration_page_renders_password_fields(): void
    {
        $response = $this->get('/register');

        $response->assertOk();
        $response->assertSee('name="password"', false);
        $response->assertSee('name="password_confirmation"', false);
    }

    public function test_registration_accepts_password_at_max_length(): void
    {
        $password = Str::repeat('Aa1!', 18); // 72 chars, meets complexity rules
        $this->assertSame(72, strlen($password));

        $response = $this->post('/register', [
            'name' => 'Test User',
            'email' => 'max-length@example.com',
            'password' => $password,
            'password_confirmation' => $password,
            'privacy' => '1',
        ]);

        $response->assertSessionDoesntHaveErrors(['password']);
    }
}
