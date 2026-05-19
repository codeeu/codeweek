<?php

namespace Tests\Unit\Support;

use App\Models\Support\SupportCase;
use App\Services\Support\Gmail\GmailOutboundService;
use App\Services\Support\SupportApprovalEmailService;
use App\Services\Support\SupportProfileRequestParser;
use App\Services\Support\SupportSenderAllowlist;
use Tests\TestCase;

final class SupportDryRunEmailCopyTest extends TestCase
{
    public function test_dry_run_email_uses_plain_language(): void
    {
        $case = SupportCase::create([
            'source_channel' => 'gmail',
            'processing_mode' => 'automated',
            'subject' => 'codeweek-support — update last name Hanna to Hannaa',
            'raw_message' => 'Requested last name: Hannaa',
            'normalized_message' => 'Requested last name: Hannaa',
            'target_email' => 'teacher@school.eu',
            'case_type' => 'profile_update',
            'status' => 'diagnosed',
            'risk_level' => 'low',
            'correlation_id' => 'cid',
        ]);

        $case->actions()->create([
            'action_name' => 'diagnostics',
            'action_type' => 'read',
            'input_json' => [],
            'output_json' => ['findings' => ['user_audit_completed', 'duplicate_risk_high']],
            'succeeded' => true,
            'executed_by' => 'system',
        ]);

        $case->actions()->create([
            'action_name' => 'user_profile_update',
            'action_type' => 'write',
            'input_json' => [],
            'output_json' => [
                'ok' => true,
                'result' => [
                    'before' => ['firstname' => 'Bernard', 'lastname' => 'Hanna'],
                    'after' => ['firstname' => 'Bernard', 'lastname' => 'Hannaa'],
                ],
            ],
            'succeeded' => true,
            'executed_by' => 'system',
        ]);

        $capturedBody = null;
        $gmail = $this->createMock(GmailOutboundService::class);
        $gmail->method('sendPlainText')->willReturnCallback(function ($to, $subject, $body) use (&$capturedBody) {
            $capturedBody = $body;

            return ['id' => 'msg-1', 'thread_id' => 't1'];
        });

        config([
            'support_gmail.notify_email' => 'notify@matrixinternet.ie',
            'support_gmail.allowed_sender_domains' => ['matrixinternet.ie'],
        ]);

        $svc = new SupportApprovalEmailService(
            $gmail,
            app(SupportSenderAllowlist::class),
            app(SupportProfileRequestParser::class),
        );

        $svc->sendDryRunReview($case, 'admin@matrixinternet.ie');

        $this->assertNotNull($capturedBody);
        $this->assertStringContainsString('please review before we make changes', $capturedBody);
        $this->assertStringContainsString('What will change if you approve', $capturedBody);
        $this->assertStringContainsString('Last name: Hanna → Hannaa', $capturedBody);
        $this->assertStringContainsString('More than one CodeWeek account uses this email', $capturedBody);
        $this->assertStringNotContainsString('duplicate_risk_high', $capturedBody);
        $this->assertStringNotContainsString('user_profile_update', $capturedBody);
        $this->assertStringNotContainsString('Payload:', $capturedBody);
    }

    public function test_dry_run_subject_for_profile_update(): void
    {
        $case = new SupportCase(['id' => 164, 'case_type' => 'profile_update']);
        $svc = app(SupportApprovalEmailService::class);

        $this->assertStringContainsString('Please review — name change', $svc->approvalSubject($case));
    }
}
