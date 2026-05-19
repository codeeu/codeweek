<?php

namespace Tests\Unit\Support;

use App\Jobs\Support\ProcessSupportCaseTriageJob;
use App\Models\Support\SupportGmailCursor;
use App\Services\Support\CaseIntakeService;
use App\Services\Support\Gmail\GmailConnector;
use App\Services\Support\Gmail\GmailIngestService;
use App\Services\Support\Gmail\GmailMessage;
use App\Services\Support\SupportActionLogger;
use App\Services\Support\SupportApprovalEmailService;
use App\Services\Support\SupportSenderAllowlist;
use Illuminate\Support\Facades\Bus;
use Illuminate\Support\Facades\Cache;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

final class GmailIngestServiceTest extends TestCase
{
    use RefreshDatabase;

    private function makeService(GmailConnector $connector): GmailIngestService
    {
        $approvalEmail = $this->createMock(SupportApprovalEmailService::class);
        $approvalEmail->method('processApprovalReply')->willReturn(null);

        return new GmailIngestService(
            connector: $connector,
            intake: app(CaseIntakeService::class),
            logger: app(SupportActionLogger::class),
            allowlist: app(SupportSenderAllowlist::class),
            approvalEmail: $approvalEmail,
            ingestFilter: app(\App\Services\Support\Gmail\SupportGmailIngestFilter::class),
        );
    }

    public function test_poll_and_ingest_creates_cases_and_dedupes(): void
    {
        Bus::fake();

        config()->set('support_gmail.enabled', true);
        config()->set('support_gmail.lock.name', 'test:support:gmail:poll');
        config()->set('support_gmail.lock.ttl_seconds', 30);
        config()->set('support_gmail.user', 'me');
        config()->set('support_gmail.label', 'Support-AI');
        config()->set('support_gmail.query', 'newer_than:7d');
        config()->set('support_gmail.allowed_sender_domains', ['matrixinternet.ie']);
        config()->set('support_gmail.subject_prefix', 'codeweek-support');

        $fakeConnector = new class implements GmailConnector {
            public function fetchNewMessages(
                string $mailbox,
                ?string $label,
                string $query,
                ?string $sinceHistoryId,
                int $max = 25,
            ): array {
                return [
                    'messages' => [
                        new GmailMessage('m1', 't1', 'codeweek-support ticket 1', 'sender@matrixinternet.ie', "Hello 1"),
                        new GmailMessage('m1', 't1', 'codeweek-support ticket 1', 'sender@matrixinternet.ie', "Hello 1 DUP"),
                        new GmailMessage('m2', 't2', 'codeweek-support ticket 2', 'other@matrixinternet.ie', "Hello 2"),
                    ],
                    'next_history_id' => '123',
                    'warnings' => [],
                ];
            }
        };

        $res = $this->makeService($fakeConnector)->pollAndIngest(25);

        $this->assertSame(2, $res['ingested']);
        $this->assertSame(1, $res['duplicates']);
        $this->assertSame(0, $res['skipped_untrusted']);
        $this->assertSame([], $res['warnings']);

        Bus::assertDispatched(ProcessSupportCaseTriageJob::class, 2);

        $cursor = SupportGmailCursor::query()->where('mailbox', 'me')->where('label', 'Support-AI')->first();
        $this->assertNotNull($cursor);
        $this->assertSame('123', $cursor->last_history_id);
        $this->assertNotNull($cursor->last_polled_at);
    }

    public function test_poll_skips_untrusted_senders(): void
    {
        config()->set('support_gmail.enabled', true);
        config()->set('support_gmail.lock.name', 'test:support:gmail:poll:untrusted');
        config()->set('support_gmail.lock.ttl_seconds', 30);
        config()->set('support_gmail.allowed_sender_domains', ['codeweek.eu']);

        $fakeConnector = new class implements GmailConnector {
            public function fetchNewMessages(
                string $mailbox,
                ?string $label,
                string $query,
                ?string $sinceHistoryId,
                int $max = 25,
            ): array {
                return [
                    'messages' => [
                        new GmailMessage('m1', 't1', 'Subj', 'notallowed@evil.com', 'body'),
                    ],
                    'next_history_id' => null,
                    'warnings' => [],
                ];
            }
        };

        $res = $this->makeService($fakeConnector)->pollAndIngest(25);

        $this->assertSame(0, $res['ingested']);
        $this->assertSame(1, $res['skipped_untrusted']);
    }

    public function test_poll_skips_when_lock_is_held(): void
    {
        config()->set('support_gmail.enabled', true);
        config()->set('support_gmail.lock.name', 'test:support:gmail:poll:held');
        config()->set('support_gmail.lock.ttl_seconds', 30);

        $lock = Cache::lock('test:support:gmail:poll:held', 30);
        $this->assertTrue($lock->get());

        $connector = new class implements GmailConnector {
            public function fetchNewMessages(
                string $mailbox,
                ?string $label,
                string $query,
                ?string $sinceHistoryId,
                int $max = 25,
            ): array {
                throw new \RuntimeException('connector_should_not_be_called');
            }
        };

        $res = $this->makeService($connector)->pollAndIngest(25);
        $this->assertSame(0, $res['ingested']);
        $this->assertFalse($res['cursor_updated']);

        $lock->release();
    }

    public function test_poll_skips_system_outbound_and_processes_approve_reply(): void
    {
        config()->set('support_gmail.enabled', true);
        config()->set('support_gmail.lock.name', 'test:support:gmail:poll:approve');
        config()->set('support_gmail.lock.ttl_seconds', 30);
        config()->set('support_gmail.notify_email', 'codeweek@matrixinternet.ie');
        config()->set('support_gmail.allowed_sender_domains', ['matrixinternet.ie']);
        config()->set('support_gmail.subject_prefix', 'codeweek-support');

        $approvalEmail = $this->createMock(SupportApprovalEmailService::class);
        $approvalEmail->expects($this->once())
            ->method('processApprovalReply')
            ->willReturn(['ok' => true, 'tool' => 'support_email_approval']);

        $fakeConnector = new class implements GmailConnector {
            public function fetchNewMessages(
                string $mailbox,
                ?string $label,
                string $query,
                ?string $sinceHistoryId,
                int $max = 25,
            ): array {
                return [
                    'messages' => [
                        new GmailMessage(
                            'bot1',
                            't-bot',
                            '[CW-SUPPORT #20] Support copilot - dry run review',
                            'codeweek@matrixinternet.ie',
                            'dry run body',
                        ),
                        new GmailMessage(
                            'approve1',
                            't-approve',
                            'Re: [CW-SUPPORT #20] Support copilot - dry run review',
                            'bernard@matrixinternet.ie',
                            "APPROVE\n",
                        ),
                    ],
                    'next_history_id' => null,
                    'warnings' => [],
                ];
            }
        };

        $svc = new GmailIngestService(
            connector: $fakeConnector,
            intake: app(CaseIntakeService::class),
            logger: app(SupportActionLogger::class),
            allowlist: app(SupportSenderAllowlist::class),
            approvalEmail: $approvalEmail,
            ingestFilter: app(\App\Services\Support\Gmail\SupportGmailIngestFilter::class),
        );

        $res = $svc->pollAndIngest(25);

        $this->assertSame(1, $res['approvals_processed']);
        $this->assertSame(1, $res['skipped_system']);
        $this->assertSame(0, $res['ingested']);
    }

    public function test_poll_passes_through_connector_warnings(): void
    {
        config()->set('support_gmail.enabled', true);
        config()->set('support_gmail.lock.name', 'test:support:gmail:poll:warnings');
        config()->set('support_gmail.lock.ttl_seconds', 30);
        config()->set('support_gmail.user', 'me');
        config()->set('support_gmail.label', 'Missing-Label');
        config()->set('support_gmail.query', 'newer_than:7d');

        $fakeConnector = new class implements GmailConnector {
            public function fetchNewMessages(
                string $mailbox,
                ?string $label,
                string $query,
                ?string $sinceHistoryId,
                int $max = 25,
            ): array {
                return [
                    'messages' => [],
                    'next_history_id' => null,
                    'warnings' => [
                        'Configured Gmail label "Missing-Label" was not found; polling without label filter.',
                    ],
                ];
            }
        };

        $res = $this->makeService($fakeConnector)->pollAndIngest(25);

        $this->assertSame(
            ['Configured Gmail label "Missing-Label" was not found; polling without label filter.'],
            $res['warnings'],
        );
    }
}
