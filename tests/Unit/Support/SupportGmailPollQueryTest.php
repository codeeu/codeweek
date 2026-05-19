<?php

namespace Tests\Unit\Support;

use App\Services\Support\Gmail\SupportGmailPollQuery;
use Tests\TestCase;

final class SupportGmailPollQueryTest extends TestCase
{
    public function test_builds_query_with_subject_prefix(): void
    {
        config()->set('support_gmail.subject_prefix', '[CodeWeek Support]');
        config()->set('support_gmail.query', 'newer_than:90d');

        $this->assertSame(
            'subject:"[CodeWeek Support]" newer_than:90d',
            SupportGmailPollQuery::resolve(),
        );
    }

    public function test_skips_duplicate_subject_filter_when_query_already_has_one(): void
    {
        config()->set('support_gmail.subject_prefix', '[CodeWeek Support]');
        config()->set('support_gmail.query', 'subject:"[CodeWeek Support]" newer_than:7d');

        $this->assertSame(
            'subject:"[CodeWeek Support]" newer_than:7d',
            SupportGmailPollQuery::resolve(),
        );
    }
}
