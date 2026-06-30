<?php

namespace Tests\Unit\Support;

use App\Models\Support\SupportApproval;
use App\Models\Support\SupportCase;
use App\Services\Support\Gmail\GmailOutboundService;
use App\Services\Support\SupportApprovalEmailService;
use App\Services\Support\SupportProfileRequestParser;
use App\Services\Support\SupportSenderAllowlist;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

final class SupportCompletionEmailCopyTest extends TestCase
{
    use RefreshDatabase;

    public function test_completion_body_uses_plain_language_for_profile_update(): void
    {
        $case = SupportCase::create([
            'source_channel' => 'manual',
            'processing_mode' => 'manual',
            'subject' => 'codeweek-support — fix my name',
            'raw_message' => 'test',
            'target_email' => 'teacher@school.eu',
            'status' => 'verified',
            'risk_level' => 'low',
            'correlation_id' => 'cid',
        ]);

        $approval = SupportApproval::create([
            'support_case_id' => $case->id,
            'requested_action' => 'user_profile_update',
            'payload_json' => ['email' => 'teacher@school.eu', 'firstname' => 'Anna', 'lastname' => 'Smith'],
            'risk_level' => 'low',
            'status' => 'approved',
            'approved_by' => 'admin@matrixinternet.ie',
            'approved_at' => now(),
        ]);

        config([
            'support_gmail.send_completion_email' => true,
            'support_gmail.allowed_sender_domains' => ['matrixinternet.ie'],
            'support_gmail.notify_email' => 'notify@matrixinternet.ie',
        ]);

        $capturedBody = null;
        $gmail = $this->createMock(GmailOutboundService::class);
        $gmail->method('sendPlainText')->willReturnCallback(function ($to, $subject, $body) use (&$capturedBody) {
            $capturedBody ??= $body;

            return ['id' => 'msg-1', 'thread_id' => 't1'];
        });

        $svc = new SupportApprovalEmailService(
            $gmail,
            app(SupportSenderAllowlist::class),
            app(SupportProfileRequestParser::class),
            app(\App\Services\Support\SupportRoleRequestResolver::class),
        );

        $svc->sendActionCompletion(
            $case,
            $approval,
            'user_profile_update',
            [
                'ok' => true,
                'result' => [
                    'before' => ['firstname' => 'Ann', 'lastname' => ''],
                    'after' => ['firstname' => 'Anna', 'lastname' => 'Smith'],
                ],
            ],
            true,
        );

        $this->assertNotNull($capturedBody);
        $this->assertStringContainsString('your request has been completed', $capturedBody);
        $this->assertStringContainsString('What we did', $capturedBody);
        $this->assertStringContainsString('First name: Ann → Anna', $capturedBody);
        $this->assertStringContainsString('Last name: (empty) → Smith', $capturedBody);
        $this->assertStringNotContainsString('user_profile_update', $capturedBody);
        $this->assertStringNotContainsString('COMPLETED', $capturedBody);
    }

    public function test_completion_body_for_role_add_uses_past_tense_per_account(): void
    {
        $case = SupportCase::create([
            'source_channel' => 'gmail',
            'processing_mode' => 'automated',
            'subject' => 'codeweek-support — add leading teacher role',
            'raw_message' => 'add role: leading teacher',
            'target_email' => 'a@example.com',
            'secondary_emails' => ['b@example.com', 'c@example.com'],
            'case_type' => 'role_add',
            'status' => 'verified',
            'risk_level' => 'low',
            'correlation_id' => 'cid-role',
        ]);

        $approval = SupportApproval::create([
            'support_case_id' => $case->id,
            'requested_action' => 'user_role_add',
            'payload_json' => ['operation' => 'add', 'role' => 'leading teacher', 'emails' => ['a@example.com', 'b@example.com', 'c@example.com']],
            'risk_level' => 'low',
            'status' => 'approved',
            'approved_by' => 'admin@matrixinternet.ie',
            'approved_at' => now(),
        ]);

        config([
            'support_gmail.send_completion_email' => true,
            'support_gmail.allowed_sender_domains' => ['matrixinternet.ie'],
            'support_gmail.notify_email' => 'notify@matrixinternet.ie',
        ]);

        $capturedBody = null;
        $gmail = $this->createMock(GmailOutboundService::class);
        $gmail->method('sendPlainText')->willReturnCallback(function ($to, $subject, $body) use (&$capturedBody) {
            $capturedBody ??= $body;

            return ['id' => 'msg-1', 'thread_id' => 't1'];
        });

        $svc = new SupportApprovalEmailService(
            $gmail,
            app(SupportSenderAllowlist::class),
            app(SupportProfileRequestParser::class),
            app(\App\Services\Support\SupportRoleRequestResolver::class),
        );

        $svc->sendActionCompletion(
            $case,
            $approval,
            'user_role_add',
            [
                'ok' => true,
                'result' => [
                    'role' => 'leading teacher',
                    'summary' => ['added' => 2, 'would_add' => 0, 'already_has_role' => 1, 'user_not_found' => 0, 'ambiguous' => 0],
                    'items' => [
                        ['email' => 'a@example.com', 'status' => 'added', 'user_id' => 1, 'matched_user_ids' => [1]],
                        ['email' => 'b@example.com', 'status' => 'added', 'user_id' => 2, 'matched_user_ids' => [2]],
                        ['email' => 'c@example.com', 'status' => 'already_has_role', 'user_id' => 3, 'matched_user_ids' => [3]],
                    ],
                ],
            ],
            true,
        );

        $this->assertNotNull($capturedBody);
        $this->assertStringContainsString('We added the role "leading teacher" to 2 CodeWeek accounts.', $capturedBody);
        $this->assertStringContainsString('a@example.com — role added', $capturedBody);
        $this->assertStringContainsString('c@example.com — already has this role', $capturedBody);
        $this->assertStringNotContainsString('will be added', $capturedBody);
    }

    public function test_completion_subject_for_account_restore(): void
    {
        $case = new SupportCase(['id' => 5]);
        $svc = app(SupportApprovalEmailService::class);

        $this->assertStringContainsString('account reactivated', $svc->completionSubject($case, true, 'user_restore'));
    }
}
