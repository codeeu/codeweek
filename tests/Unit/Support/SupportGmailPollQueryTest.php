<?php

namespace Tests\Unit\Support;

use App\Services\Support\Gmail\SupportGmailPollQuery;
use Tests\TestCase;

final class SupportGmailPollQueryTest extends TestCase
{
    public function test_builds_query_with_subject_prefix(): void
    {
        config()->set('support_gmail.subject_prefix', 'codeweek-support');
        config()->set('support_gmail.query', 'newer_than:90d');

        config()->set('support_gmail.notify_email', 'codeweek@matrixinternet.ie');

        $this->assertSame(
            '(subject:codeweek-support OR subject:"[CW-SUPPORT" -from:codeweek@matrixinternet.ie) newer_than:90d',
            SupportGmailPollQuery::resolve(),
        );
    }

    public function test_includes_approval_reply_subject_for_poll(): void
    {
        config()->set('support_gmail.subject_prefix', 'codeweek-support');
        config()->set('support_gmail.approval_subject_prefix', '[CW-SUPPORT');
        config()->set('support_gmail.query', 'newer_than:90d');

        $query = SupportGmailPollQuery::resolve();

        $this->assertStringContainsString('codeweek-support', $query);
        $this->assertStringContainsString('[CW-SUPPORT', $query);
        $this->assertStringContainsString(' OR ', $query);
    }

    public function test_skips_duplicate_subject_filter_when_query_already_has_one(): void
    {
        config()->set('support_gmail.subject_prefix', 'codeweek-support');
        config()->set('support_gmail.query', 'subject:codeweek-support newer_than:7d');

        $this->assertSame(
            'subject:codeweek-support newer_than:7d',
            SupportGmailPollQuery::resolve(),
        );
    }
}
