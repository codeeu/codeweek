<?php

namespace Tests\Unit\Support;

use App\Services\Support\Content\ContentActionRegistry;
use App\Services\Support\Content\ContentFieldResolver;
use App\Services\Support\Content\ContentUpdateService;
use Tests\TestCase;

final class ContentUpdateServiceTest extends TestCase
{
    private ContentUpdateService $service;

    protected function setUp(): void
    {
        parent::setUp();

        config()->set('support_ai.enabled', true);
        config()->set('support_ai.content.enabled', true);
        config()->set('support_ai.content.max_field_length', 100);

        $this->service = new ContentUpdateService(
            new ContentActionRegistry(),
            new ContentFieldResolver(),
        );
    }

    public function test_value_guard_accepts_plain_text(): void
    {
        $this->assertNull($this->service->validateValue('A normal heading, with punctuation!'));
    }

    public function test_value_guard_rejects_non_string(): void
    {
        $this->assertSame('value_not_text', $this->service->validateValue(42));
    }

    public function test_value_guard_rejects_urls(): void
    {
        $this->assertSame('value_contains_url', $this->service->validateValue('See https://example.com'));
        $this->assertSame('value_contains_url', $this->service->validateValue('visit www.example.org today'));
    }

    public function test_value_guard_rejects_markup(): void
    {
        $this->assertSame('value_contains_markup', $this->service->validateValue('Hello <script>alert(1)</script>'));
        $this->assertSame('value_contains_markup', $this->service->validateValue('<a href="x">link</a>'));
    }

    public function test_value_guard_rejects_over_length(): void
    {
        $this->assertSame('value_too_long', $this->service->validateValue(str_repeat('a', 101)));
    }

    public function test_plan_disabled_when_flag_off(): void
    {
        config()->set('support_ai.content.enabled', false);

        $plan = $this->service->plan('static_page', '1', ['title' => 'x']);

        $this->assertFalse($plan['ok']);
        $this->assertContains('content_edits_disabled', $plan['errors']);
    }

    public function test_plan_rejects_unknown_model(): void
    {
        $plan = $this->service->plan('not_a_model', '1', ['title' => 'x']);

        $this->assertFalse($plan['ok']);
        $this->assertContains('model_not_in_allowlist', $plan['errors']);
    }

    public function test_plan_rejects_empty_changes(): void
    {
        $plan = $this->service->plan('static_page', '1', []);

        $this->assertFalse($plan['ok']);
        $this->assertContains('no_changes_proposed', $plan['errors']);
    }

    public function test_registry_exposes_known_content_models(): void
    {
        $registry = new ContentActionRegistry();

        $this->assertTrue($registry->has('hackathons_page'));
        $this->assertFalse($registry->has('user'));
        $this->assertSame(\App\HackathonsPage::class, $registry->get('hackathons_page')['model']);
        $this->assertContains('home_slide', $registry->keys());
    }
}
