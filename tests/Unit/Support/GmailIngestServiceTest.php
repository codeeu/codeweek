<?php

namespace Tests\Unit\Support;

use App\Models\Support\SupportGmailCursor;
use App\Services\Support\CaseIntakeService;
use App\Services\Support\Gmail\GmailConnector;
use App\Services\Support\Gmail\GmailIngestService;
use App\Services\Support\Gmail\GmailMessage;
use App\Services\Support\SupportActionLogger;
use Illuminate\Support\Facades\Cache;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

final class GmailIngestServiceTest extends TestCase
{
    use RefreshDatabase;

    public function test_poll_and_ingest_creates_cases_and_dedupes(): void
    {
        config()->set('support_gmail.enabled', true);
        config()->set('support_gmail.lock.name', 'test:support:gmail:poll');
        config()->set('support_gmail.lock.ttl_seconds', 30);
        config()->set('support_gmail.user', 'me');
        config()->set('support_gmail.label', 'Support-AI');
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
                    'messages' => [
                        new GmailMessage('m1', 't1', 'Subj 1', 'sender@example.com', "Hello 1"),
                        new GmailMessage('m1', 't1', 'Subj 1', 'sender@example.com', "Hello 1 DUP"),
                        new GmailMessage('m2', 't2', 'Subj 2', 'sender2@example.com', "Hello 2"),
                    ],
                    'next_history_id' => '123',
                    'warnings' => [],
                ];
            }
        };

        $svc = new GmailIngestService(
            connector: $fakeConnector,
            intake: app(CaseIntakeService::class),
            logger: app(SupportActionLogger::class),
        );

        $res = $svc->pollAndIngest(25);

        $this->assertSame(2, $res['ingested']);
        $this->assertSame(1, $res['duplicates']);
        $this->assertSame([], $res['warnings']);

        $cursor = SupportGmailCursor::query()->where('mailbox', 'me')->where('label', 'Support-AI')->first();
        $this->assertNotNull($cursor);
        $this->assertSame('123', $cursor->last_history_id);
        $this->assertNotNull($cursor->last_polled_at);
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

        $svc = new GmailIngestService(
            connector: $connector,
            intake: app(CaseIntakeService::class),
            logger: app(SupportActionLogger::class),
        );

        $res = $svc->pollAndIngest(25);
        $this->assertSame(['ingested' => 0, 'duplicates' => 0, 'cursor_updated' => false, 'warnings' => []], $res);

        $lock->release();
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

        $svc = new GmailIngestService(
            connector: $fakeConnector,
            intake: app(CaseIntakeService::class),
            logger: app(SupportActionLogger::class),
        );

        $res = $svc->pollAndIngest(25);

        $this->assertSame(
            ['Configured Gmail label "Missing-Label" was not found; polling without label filter.'],
            $res['warnings'],
        );
    }
}

