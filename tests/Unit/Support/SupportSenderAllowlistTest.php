<?php

namespace Tests\Unit\Support;

use App\Services\Support\SupportSenderAllowlist;
use Tests\TestCase;

final class SupportSenderAllowlistTest extends TestCase
{
    public function test_allows_matrixinternet_and_codeweek_domains(): void
    {
        config()->set('support_gmail.allowed_sender_domains', ['matrixinternet.ie', 'codeweek.eu']);
        config()->set('support_gmail.allowed_sender_emails', []);

        $svc = new SupportSenderAllowlist();

        $this->assertTrue($svc->isAllowed('Bernard <codeweek@matrixinternet.ie>'));
        $this->assertTrue($svc->isAllowed('support@codeweek.eu'));
        $this->assertFalse($svc->isAllowed('hacker@evil.com'));
    }

    public function test_allows_explicit_email_allowlist(): void
    {
        config()->set('support_gmail.allowed_sender_domains', []);
        config()->set('support_gmail.allowed_sender_emails', ['trusted@example.com']);

        $svc = new SupportSenderAllowlist();

        $this->assertTrue($svc->isAllowed('trusted@example.com'));
        $this->assertFalse($svc->isAllowed('other@example.com'));
    }
}
