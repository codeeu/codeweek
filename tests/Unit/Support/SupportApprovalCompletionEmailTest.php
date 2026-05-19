<?php

namespace Tests\Unit\Support;

use App\Models\Support\SupportApproval;
use App\Models\Support\SupportCase;
use App\Services\Support\Gmail\GmailOutboundService;
use App\Services\Support\SupportApprovalEmailService;
use App\Services\Support\SupportProfileRequestParser;
use App\Services\Support\SupportSenderAllowlist;
use Tests\TestCase;

final class SupportApprovalCompletionEmailTest extends TestCase
{
    public function test_completion_subject_reflects_success_or_failure(): void
    {
        $case = new SupportCase(['id' => 10]);
        $svc = app(SupportApprovalEmailService::class);

        $this->assertStringContainsString('action completed', $svc->completionSubject($case, true));
        $this->assertStringContainsString('action failed', $svc->completionSubject($case, false));
        $this->assertStringContainsString('#10', $svc->completionSubject($case, true));
    }

    public function test_send_action_completion_calls_gmail(): void
    {
        config(['support_gmail.send_completion_email' => true]);

        $case = SupportCase::create([
            'source_channel' => 'manual',
            'processing_mode' => 'manual',
            'subject' => 'test',
            'raw_message' => 'test',
            'status' => 'verified',
            'risk_level' => 'low',
            'correlation_id' => 'cid',
        ]);

        $approval = SupportApproval::create([
            'support_case_id' => $case->id,
            'requested_action' => 'user_profile_update',
            'payload_json' => ['email' => 'u@example.com'],
            'risk_level' => 'low',
            'status' => 'approved',
            'approved_by' => 'admin@matrixinternet.ie',
            'notify_email' => 'notify@matrixinternet.ie',
            'gmail_thread_id' => 'thread-1',
        ]);

        $gmail = $this->createMock(GmailOutboundService::class);
        config()->set('support_gmail.allowed_sender_domains', ['matrixinternet.ie']);
        config()->set('support_gmail.notify_email', 'notify@matrixinternet.ie');

        $gmail->expects($this->exactly(2))
            ->method('sendPlainText')
            ->willReturnCallback(function (string $to) {
                $this->assertContains($to, ['notify@matrixinternet.ie', 'admin@matrixinternet.ie']);

                return ['id' => 'msg-'.$to, 'thread_id' => 'thread-1'];
            });

        $svc = new SupportApprovalEmailService(
            $gmail,
            app(SupportSenderAllowlist::class),
            app(SupportProfileRequestParser::class),
        );

        $payload = $svc->sendActionCompletion(
            $case,
            $approval,
            'user_profile_update',
            [
                'ok' => true,
                'result' => [
                    'before' => ['firstname' => 'A'],
                    'after' => ['firstname' => 'B'],
                ],
                'errors' => [],
            ],
            true,
        );

        $this->assertTrue($payload['ok']);
    }
}
