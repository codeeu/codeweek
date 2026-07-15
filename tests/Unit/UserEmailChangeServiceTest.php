<?php

namespace Tests\Unit;

use App\Event;
use App\Excellence;
use App\Services\UserEmailChangeService;
use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\URL;
use Tests\TestCase;

final class UserEmailChangeServiceTest extends TestCase
{
    use RefreshDatabase;

    public function test_request_change_stores_pending_email_and_sends_confirmation(): void
    {
        $user = User::factory()->create([
            'email' => 'old@example.com',
            'email_display' => 'old@example.com',
            'provider' => null,
            'password' => bcrypt('correct-password'),
            'email_verified_at' => now(),
        ]);

        app(UserEmailChangeService::class)->requestChange(
            $user,
            'new@example.com',
            'correct-password',
        );

        $user->refresh();
        $this->assertSame('new@example.com', $user->pending_email);
        $this->assertNotNull($user->pending_email_token);
        $this->assertNotNull($user->pending_email_requested_at);
        $this->assertSame('old@example.com', $user->email);
    }

    public function test_request_change_rejects_incorrect_password(): void
    {
        $user = User::factory()->create([
            'email' => 'old@example.com',
            'provider' => null,
            'password' => bcrypt('correct-password'),
            'email_verified_at' => now(),
        ]);

        $this->expectException(\Illuminate\Validation\ValidationException::class);

        app(UserEmailChangeService::class)->requestChange(
            $user,
            'new@example.com',
            'wrong-password',
        );
    }

    public function test_request_change_rejects_email_already_in_use(): void
    {
        User::factory()->create(['email' => 'taken@example.com']);
        $user = User::factory()->create([
            'email' => 'old@example.com',
            'provider' => null,
            'password' => bcrypt('correct-password'),
            'email_verified_at' => now(),
        ]);

        $this->expectException(\Illuminate\Validation\ValidationException::class);

        app(UserEmailChangeService::class)->requestChange(
            $user,
            'taken@example.com',
            'correct-password',
        );
    }

    public function test_confirm_change_updates_login_email_and_keeps_linked_records(): void
    {
        $user = User::factory()->create([
            'email' => 'old@example.com',
            'email_display' => 'old@example.com',
            'provider' => null,
            'password' => bcrypt('correct-password'),
            'email_verified_at' => now(),
        ]);

        $event = Event::factory()->create([
            'creator_id' => $user->id,
            'user_email' => 'old@example.com',
        ]);

        $excellence = Excellence::factory()->create([
            'user_id' => $user->id,
            'edition' => 2025,
            'type' => 'Excellence',
        ]);

        $token = 'test-confirmation-token';
        $user->pending_email = 'new@example.com';
        $user->pending_email_token = hash('sha256', $token);
        $user->pending_email_requested_at = now();
        $user->save();

        $updated = app(UserEmailChangeService::class)->confirmChange((int) $user->id, $token);

        $this->assertSame('new@example.com', $updated->email);
        $this->assertSame('new@example.com', $updated->email_display);
        $this->assertNull($updated->pending_email);
        $this->assertNotNull($updated->email_verified_at);
        $this->assertSame($user->id, $event->fresh()->creator_id);
        $this->assertSame('new@example.com', $event->fresh()->user_email);
        $this->assertSame($user->id, $excellence->fresh()->user_id);
    }
}
