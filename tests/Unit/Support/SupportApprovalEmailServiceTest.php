<?php

namespace Tests\Unit\Support;

use App\Services\Support\SupportApprovalEmailService;
use Tests\TestCase;

final class SupportApprovalEmailServiceTest extends TestCase
{
    public function test_detects_approval_reply_keywords(): void
    {
        config()->set('support_gmail.approval_keywords', ['approve', 'approved', 'yes', 'proceed']);

        $svc = app(SupportApprovalEmailService::class);

        $this->assertTrue($svc->isApprovalReply("APPROVE\n\nSome quoted text"));
        $this->assertTrue($svc->isApprovalReply("approved"));
        $this->assertTrue($svc->isApprovalReply("\n\napproved\n\nOn Tue wrote:"));
        $this->assertTrue($svc->isApprovalReply("yes"));
        $this->assertFalse($svc->isApprovalReply("maybe approve later"));
    }
}
