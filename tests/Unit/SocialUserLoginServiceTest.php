<?php

namespace Tests\Unit;

use App\Services\SocialUserLoginService;
use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Laravel\Socialite\Contracts\User as SocialiteUser;
use Mockery;
use Tests\TestCase;

final class SocialUserLoginServiceTest extends TestCase
{
    use RefreshDatabase;

    protected function tearDown(): void
    {
        Mockery::close();
        parent::tearDown();
    }

    public function test_oauth_login_finds_user_by_provider_id_after_email_change(): void
    {
        $existing = User::factory()->create([
            'email' => 'new@school.cz',
            'provider' => 'google',
            'provider_id' => 'google-account-123',
            'email_verified_at' => now(),
        ]);

        $socialUser = $this->mockSocialUser(
            email: 'old@school.cz',
            id: 'google-account-123',
        );

        $user = app(SocialUserLoginService::class)->resolveOrCreateUser('google', $socialUser);

        $this->assertSame($existing->id, $user->id);
        $this->assertSame('new@school.cz', $user->email);
        $this->assertSame(1, User::count());
    }

    public function test_oauth_login_backfills_provider_id_for_legacy_email_match(): void
    {
        $existing = User::factory()->create([
            'email' => 'teacher@school.cz',
            'provider' => 'google',
            'provider_id' => null,
            'email_verified_at' => now(),
        ]);

        $socialUser = $this->mockSocialUser(
            email: 'teacher@school.cz',
            id: 'google-account-456',
        );

        $user = app(SocialUserLoginService::class)->resolveOrCreateUser('google', $socialUser);

        $this->assertSame($existing->id, $user->id);
        $this->assertSame('google-account-456', $user->provider_id);
        $this->assertSame(1, User::count());
    }

    public function test_oauth_login_creates_user_when_no_match_exists(): void
    {
        $socialUser = $this->mockSocialUser(
            email: 'brand-new@school.cz',
            id: 'google-account-789',
            name: 'Brand New',
        );

        $user = app(SocialUserLoginService::class)->resolveOrCreateUser('google', $socialUser);

        $this->assertSame('brand-new@school.cz', $user->email);
        $this->assertSame('google', $user->provider);
        $this->assertSame('google-account-789', $user->provider_id);
        $this->assertSame(1, User::count());
    }

    public function test_email_change_then_google_login_does_not_create_duplicate(): void
    {
        $user = User::factory()->create([
            'email' => 'old@school.cz',
            'provider' => 'google',
            'provider_id' => 'google-account-999',
            'email_verified_at' => now(),
        ]);

        $user->email = 'gabriela.svobodova@soslp.cz';
        $user->save();

        $socialUser = $this->mockSocialUser(
            email: 'old@school.cz',
            id: 'google-account-999',
        );

        $loggedIn = app(SocialUserLoginService::class)->resolveOrCreateUser('google', $socialUser);

        $this->assertSame($user->id, $loggedIn->id);
        $this->assertSame('gabriela.svobodova@soslp.cz', $loggedIn->email);
        $this->assertSame(1, User::count());
    }

    private function mockSocialUser(string $email, string $id, string $name = 'Test User'): SocialiteUser
    {
        $socialUser = Mockery::mock(SocialiteUser::class);
        $socialUser->shouldReceive('getEmail')->andReturn($email);
        $socialUser->shouldReceive('getId')->andReturn($id);
        $socialUser->shouldReceive('getName')->andReturn($name);
        $socialUser->shouldReceive('getNickname')->andReturn('test-user');

        return $socialUser;
    }
}
