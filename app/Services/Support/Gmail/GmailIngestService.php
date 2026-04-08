<?php

namespace App\Services\Support\Gmail;

use App\Models\Support\SupportGmailCursor;
use App\Services\Support\CaseIntakeService;
use App\Services\Support\SupportActionLogger;
use App\Services\Support\SupportJson;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Cache;

class GmailIngestService
{
    public function __construct(
        private readonly GmailConnector $connector,
        private readonly CaseIntakeService $intake,
        private readonly SupportActionLogger $logger,
    ) {
    }

    /**
     * @return array{ingested: int, duplicates: int, cursor_updated: bool, warnings: string[]}
     */
    public function pollAndIngest(int $max = 25): array
    {
        if (!config('support_gmail.enabled')) {
            return ['ingested' => 0, 'duplicates' => 0, 'cursor_updated' => false, 'warnings' => []];
        }

        $lockName = (string) config('support_gmail.lock.name', 'support:gmail:poll');
        $ttlSeconds = (int) config('support_gmail.lock.ttl_seconds', 120);

        // If cache store doesn't support locks, this will throw; treat that as a hard fail
        // to avoid double-ingesting on multiple nodes silently.
        $lock = Cache::lock($lockName, $ttlSeconds);
        if (!$lock->get()) {
            return ['ingested' => 0, 'duplicates' => 0, 'cursor_updated' => false, 'warnings' => []];
        }

        $mailbox = (string) config('support_gmail.user', 'me');
        $label = config('support_gmail.label');
        $query = (string) config('support_gmail.query', 'newer_than:7d');

        try {
            $cursor = SupportGmailCursor::query()->firstOrCreate([
                'mailbox' => $mailbox,
                'label' => $label,
            ]);

            $correlationId = SupportJson::correlationId();

            $result = $this->connector->fetchNewMessages(
                mailbox: $mailbox,
                label: $label,
                query: $query,
                sinceHistoryId: $cursor->last_history_id,
                max: $max,
            );

            $ingested = 0;
            $duplicates = 0;

            foreach ($result['messages'] as $msg) {
                $case = $this->intake->intake([
                    'source_channel' => 'gmail',
                    'processing_mode' => 'poll',
                    'gmail_message_id' => $msg->id,
                    'gmail_thread_id' => $msg->threadId,
                    'subject' => $msg->subject ?? '(no subject)',
                    'raw_message' => $msg->rawBody,
                    'original_sender_email' => $msg->from,
                    'correlation_id' => $correlationId,
                ]);

                if ($case->wasRecentlyCreated) {
                    $ingested++;
                    $this->logger->log(
                        case: $case,
                        actionName: 'gmail_intake',
                        actionType: 'intake',
                        input: ['gmail_message_id' => $msg->id],
                        output: ['support_case_id' => $case->id],
                        succeeded: true,
                        executedBy: 'system:gmail_poll',
                        correlationId: $correlationId,
                    );
                } else {
                    $duplicates++;
                }
            }

            $cursor->last_polled_at = Carbon::now();
            if (!empty($result['next_history_id'])) {
                $cursor->last_history_id = $result['next_history_id'];
            }
            $cursor->save();

            return [
                'ingested' => $ingested,
                'duplicates' => $duplicates,
                'cursor_updated' => true,
                'warnings' => $result['warnings'] ?? [],
            ];
        } finally {
            optional($lock)->release();
        }
    }
}

