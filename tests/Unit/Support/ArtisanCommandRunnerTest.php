<?php

namespace Tests\Unit\Support;

use App\Services\Support\Artisan\ArtisanActionRegistry;
use App\Services\Support\Artisan\ArtisanCommandRunner;
use Tests\TestCase;

final class ArtisanCommandRunnerTest extends TestCase
{
    private ArtisanCommandRunner $runner;

    protected function setUp(): void
    {
        parent::setUp();

        config()->set('support_ai.enabled', true);
        config()->set('support_ai.artisan.enabled', true);
        config()->set('support_ai.artisan.allow_raw_fallback', true);
        config()->set('support_ai.artisan.denylist', [
            'migrate:fresh', 'db:wipe', 'tinker', 'down',
        ]);

        $this->runner = new ArtisanCommandRunner(new ArtisanActionRegistry());
    }

    public function test_disabled_when_flag_off(): void
    {
        config()->set('support_ai.artisan.enabled', false);

        $plan = $this->runner->plan('support:user-restore', ['email' => 'a@b.com']);

        $this->assertFalse($plan['ok']);
        $this->assertContains('artisan_actions_disabled', $plan['errors']);
    }

    public function test_registry_command_builds_validated_tokens(): void
    {
        $plan = $this->runner->plan('support:certificate-kpi-report', [
            'start' => '17.03.2026',
            'end' => '07.07.2026',
            '--json' => true,
        ]);

        $this->assertTrue($plan['ok']);
        $this->assertSame('registry', $plan['result']['mode']);
        $this->assertFalse($plan['result']['is_write']);
        $this->assertSame(
            ['support:certificate-kpi-report', '17.03.2026', '07.07.2026', '--json'],
            $plan['result']['tokens']
        );
    }

    public function test_registry_command_builds_validated_tokens_for_participation_code_update(): void
    {
        $plan = $this->runner->plan('support:event-participation-code-update', [
            'old_code' => 'cw25-E6CDg',
            'new_code' => 'cw26-wNc6o',
            '--year' => '2026',
            '--month' => '6',
            '--json' => true,
        ]);

        $this->assertTrue($plan['ok']);
        $this->assertSame('registry', $plan['result']['mode']);
        $this->assertTrue($plan['result']['is_write']);
        $this->assertTrue($plan['result']['supports_dry_run']);
        $this->assertSame(
            ['support:event-participation-code-update', 'cw25-E6CDg', 'cw26-wNc6o', '--year=2026', '--month=6', '--json'],
            $plan['result']['tokens']
        );
    }

    public function test_registry_command_builds_validated_tokens_for_user_restore(): void
    {
        $plan = $this->runner->plan('support:user-restore', ['email' => 'user@example.com', '--json' => true]);

        $this->assertTrue($plan['ok']);
        $this->assertSame('registry', $plan['result']['mode']);
        $this->assertTrue($plan['result']['is_write']);
        $this->assertTrue($plan['result']['supports_dry_run']);
        $this->assertSame(['support:user-restore', 'user@example.com', '--json'], $plan['result']['tokens']);
        $this->assertSame('php artisan support:user-restore user@example.com --json', $plan['result']['display']);
    }

    public function test_registry_command_rejects_invalid_email(): void
    {
        $plan = $this->runner->plan('support:user-restore', ['email' => 'not-an-email']);

        $this->assertFalse($plan['ok']);
        $this->assertContains('invalid_argument:email', $plan['errors']);
    }

    public function test_registry_command_requires_required_argument(): void
    {
        $plan = $this->runner->plan('support:user-restore', []);

        $this->assertFalse($plan['ok']);
        $this->assertContains('missing_argument:email', $plan['errors']);
    }

    public function test_unknown_command_is_rejected(): void
    {
        $plan = $this->runner->plan('queue:flush', []);

        $this->assertFalse($plan['ok']);
        $this->assertContains('command_not_in_allowlist', $plan['errors']);
    }

    public function test_raw_fallback_allows_safe_command(): void
    {
        $plan = $this->runner->plan(null, [], 'cache:clear');

        $this->assertTrue($plan['ok']);
        $this->assertSame('raw', $plan['result']['mode']);
        $this->assertTrue($plan['result']['is_write']);
        $this->assertFalse($plan['result']['supports_dry_run']);
        $this->assertSame('php artisan cache:clear', $plan['result']['display']);
    }

    public function test_raw_fallback_strips_php_artisan_prefix(): void
    {
        $plan = $this->runner->plan(null, [], 'php artisan view:clear');

        $this->assertTrue($plan['ok']);
        $this->assertSame(['view:clear'], $plan['result']['tokens']);
    }

    public function test_raw_fallback_blocks_denylisted_command(): void
    {
        $plan = $this->runner->plan(null, [], 'migrate:fresh');

        $this->assertFalse($plan['ok']);
        $this->assertContains('denylisted_command:migrate:fresh', $plan['errors']);
    }

    public function test_raw_fallback_rejects_shell_metacharacters(): void
    {
        foreach (['cache:clear && rm -rf /', 'cache:clear; ls', 'cache:clear | cat', 'cache:clear `whoami`'] as $evil) {
            $plan = $this->runner->plan(null, [], $evil);
            $this->assertFalse($plan['ok'], $evil);
            $this->assertContains('shell_metacharacters_rejected', $plan['errors'], $evil);
        }
    }

    public function test_raw_fallback_can_be_disabled(): void
    {
        config()->set('support_ai.artisan.allow_raw_fallback', false);

        $plan = $this->runner->plan(null, [], 'cache:clear');

        $this->assertFalse($plan['ok']);
        $this->assertContains('raw_fallback_disabled', $plan['errors']);
    }

    public function test_plan_from_triage_prefers_registry_command(): void
    {
        $plan = $this->runner->planFromTriage([
            'artisan_command_name' => 'support:user-audit',
            'artisan_args' => ['email' => 'user@example.com'],
            'artisan_raw_command' => 'cache:clear',
        ]);

        $this->assertTrue($plan['ok']);
        $this->assertSame('support:user-audit', $plan['result']['command']);
        $this->assertFalse($plan['result']['is_write']);
    }
}
