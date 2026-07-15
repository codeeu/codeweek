<?php

namespace Tests\Feature;

use App\Mail\PendingEmailChangeConfirmation;
use App\Mail\PendingEmailChangeNotification;
use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\URL;
use Tests\TestCase;

final class UserEmailChangeTest extends TestCase
{
    use RefreshDatabase;

    public function test_user_can_request_email_change_from_profile(): void
    {
        Mail::fake();

        $user = User::factory()->create([
            'email' => 'old@example.com',
            'provider' => null,
            'password' => bcrypt('correct-password'),
            'email_verified_at' => now(),
            'privacy' => 1,
        ]);

        $this->signIn($user);

        $profileResponse = $this->get(route('profile'));
        $profileResponse->assertOk();
        $this->assertStringContainsString('no-store', (string) $profileResponse->headers->get('Cache-Control'));

        preg_match('/name="_token" value="([^"]+)"/', $profileResponse->getContent(), $matches);
        $this->assertNotEmpty($matches[1] ?? null);

        $response = $this->post(route('user.email-change.request'), [
            '_token' => $matches[1],
            'new_email' => 'new@example.com',
            'current_password' => 'correct-password',
        ]);

        $response->assertRedirect();
        $response->assertSessionHas('email_change_status');

        $user->refresh();
        $this->assertSame('new@example.com', $user->pending_email);

        Mail::assertSent(PendingEmailChangeConfirmation::class, function ($mail) {
            return $mail->hasTo('new@example.com');
        });

        Mail::assertSent(PendingEmailChangeNotification::class, function ($mail) {
            return $mail->hasTo('old@example.com');
        });
    }

    public function test_user_can_confirm_email_change_via_signed_link(): void
    {
        Mail::fake();

        $user = User::factory()->create([
            'email' => 'old@example.com',
            'email_display' => 'old@example.com',
            'provider' => null,
            'password' => bcrypt('correct-password'),
            'email_verified_at' => now(),
        ]);

        $token = 'signed-link-token';
        $user->pending_email = 'new@example.com';
        $user->pending_email_token = hash('sha256', $token);
        $user->pending_email_requested_at = now();
        $user->save();

        $url = URL::temporarySignedRoute(
            'user.email-change.confirm',
            now()->addHour(),
            ['user' => $user->id, 'token' => $token],
        );

        $response = $this->get($url);

        $response->assertRedirect(route('login'));
        $response->assertSessionHas('flash');

        $user->refresh();
        $this->assertSame('new@example.com', $user->email);
        $this->assertNull($user->pending_email);
    }

    public function test_user_can_cancel_pending_email_change(): void
    {
        $user = User::factory()->create([
            'email' => 'old@example.com',
            'pending_email' => 'new@example.com',
            'pending_email_token' => hash('sha256', 'token'),
            'pending_email_requested_at' => now(),
            'email_verified_at' => now(),
        ]);

        $this->signIn($user);

        $response = $this->post(route('user.email-change.cancel'));

        $response->assertRedirect();
        $response->assertSessionHas('email_change_status');

        $user->refresh();
        $this->assertNull($user->pending_email);
        $this->assertNull($user->pending_email_token);
    }

    public function test_user_can_resend_pending_confirmation_email(): void
    {
        Mail::fake();

        $user = User::factory()->create([
            'email' => 'old@example.com',
            'pending_email' => 'new@example.com',
            'pending_email_token' => hash('sha256', 'old-token'),
            'pending_email_requested_at' => now()->subHour(),
            'email_verified_at' => now(),
        ]);

        $this->signIn($user);

        $response = $this->post(route('user.email-change.resend'));

        $response->assertRedirect();
        $response->assertSessionHas('email_change_status');

        Mail::assertSent(PendingEmailChangeConfirmation::class, function ($mail) {
            return $mail->hasTo('new@example.com');
        });

        Mail::assertNotSent(PendingEmailChangeNotification::class);
    }

    public function test_profile_update_still_cannot_change_login_email_directly(): void
    {
        $user = User::factory()->create([
            'email' => 'old@example.com',
            'email_verified_at' => now(),
        ]);

        $this->signIn($user);

        $this->patch(route('user.update'), [
            'firstname' => $user->firstname,
            'lastname' => $user->lastname,
            'privacy' => 1,
            'receive_emails' => 1,
            'email' => 'hacked@example.com',
        ]);

        $this->assertSame('old@example.com', $user->fresh()->email);
    }
}
