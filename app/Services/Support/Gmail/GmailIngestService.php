<?php

namespace App\Services\Support\Gmail;

use App\Jobs\Support\ProcessSupportCaseTriageJob;
use App\Models\Support\SupportGmailCursor;
use App\Services\Support\CaseIntakeService;
use App\Services\Support\SupportActionLogger;
use App\Services\Support\SupportApprovalEmailService;
use App\Services\Support\SupportEmailAddress;
use App\Services\Support\SupportJson;
use App\Services\Support\SupportSenderAllowlist;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Cache;

class GmailIngestService
{
    public function __construct(
        private readonly GmailConnector $connector,
        private readonly CaseIntakeService $intake,
        private readonly SupportActionLogger $logger,
        private readonly SupportSenderAllowlist $allowlist,
        private readonly SupportApprovalEmailService $approvalEmail,
    ) {
    }

    /**
     * @return array{
     *   ingested: int,
     *   duplicates: int,
     *   skipped_untrusted: int,
     *   approvals_processed: int,
     *   cursor_updated: bool,
     *   warnings: string[]
     * }
     */
    public function pollAndIngest(int $max = 25): array
    {
        if (!config('support_gmail.enabled')) {
            return $this->emptyResult();
        }

        $lockName = (string) config('support_gmail.lock.name', 'support:gmail:poll');
        $ttlSeconds = (int) config('support_gmail.lock.ttl_seconds', 120);

        $lock = Cache::lock($lockName, $ttlSeconds);
        if (!$lock->get()) {
            return $this->emptyResult();
        }

        $mailbox = (string) config('support_gmail.user', 'me');
        $label = config('support_gmail.label');
        $query = SupportGmailPollQuery::resolve();

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
            $skippedUntrusted = 0;
            $approvalsProcessed = 0;

            foreach ($result['messages'] as $msg) {
                if ($this->allowlist->isAllowed($msg->from)) {
                    $approvalResult = $this->approvalEmail->processApprovalReply($msg, (string) $msg->from);
                    if ($approvalResult !== null) {
                        $approvalsProcessed++;
                        continue;
                    }
                }

                if (!$this->allowlist->isAllowed($msg->from)) {
                    $skippedUntrusted++;
                    continue;
                }

                $requester = SupportEmailAddress::fromHeader($msg->from);

                $case = $this->intake->intake([
                    'source_channel' => 'gmail',
                    'processing_mode' => 'poll',
                    'gmail_message_id' => $msg->id,
                    'gmail_thread_id' => $msg->threadId,
                    'subject' => $msg->subject ?? '(no subject)',
                    'raw_message' => $msg->rawBody,
                    'original_sender_email' => $requester,
                    'forwarded_by_email' => $requester,
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

                    // Run pipeline synchronously so scheduler poll does not depend on queue workers.
                    ProcessSupportCaseTriageJob::dispatchSync($case->id);
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
                'skipped_untrusted' => $skippedUntrusted,
                'approvals_processed' => $approvalsProcessed,
                'cursor_updated' => true,
                'warnings' => $result['warnings'] ?? [],
            ];
        } finally {
            optional($lock)->release();
        }
    }

    /**
     * @return array{ingested: int, duplicates: int, skipped_untrusted: int, approvals_processed: int, cursor_updated: bool, warnings: string[]}
     */
    private function emptyResult(): array
    {
        return [
            'ingested' => 0,
            'duplicates' => 0,
            'skipped_untrusted' => 0,
            'approvals_processed' => 0,
            'cursor_updated' => false,
            'warnings' => [],
        ];
    }
}
