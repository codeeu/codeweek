<?php

namespace Tests\Feature;

use App\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

final class CertificateBackendAccessTest extends TestCase
{
    use DatabaseMigrations;

    #[Test]
    public function guests_are_redirected_to_login(): void
    {
        $this->get(route('certificate_backend.index'))
            ->assertRedirect(route('login'));
    }

    #[Test]
    public function access_is_closed_to_everyone_when_the_allowlist_is_empty(): void
    {
        config(['codeweek.certificate_admin_emails' => []]);

        $this->signIn(User::factory()->create(['email' => 'someone@example.com']));

        $this->get(route('certificate_backend.index'))->assertForbidden();
    }

    #[Test]
    public function a_user_not_on_the_allowlist_is_forbidden(): void
    {
        config(['codeweek.certificate_admin_emails' => ['allowed@example.com']]);

        $this->signIn(User::factory()->create(['email' => 'other@example.com']));

        $this->get(route('certificate_backend.index'))->assertForbidden();
    }

    #[Test]
    public function a_user_on_the_allowlist_is_let_through(): void
    {
        config(['codeweek.certificate_admin_emails' => ['allowed@example.com', 'second@example.com']]);

        $this->signIn(User::factory()->create(['email' => 'second@example.com']));

        $this->get(route('certificate_backend.index'))->assertOk();
    }

    #[Test]
    public function the_allowlist_is_case_insensitive(): void
    {
        config(['codeweek.certificate_admin_emails' => ['Allowed@Example.com']]);

        $this->signIn(User::factory()->create(['email' => 'allowed@example.com']));

        $this->get(route('certificate_backend.index'))->assertOk();
    }
}
