<?php

namespace App\Console\Commands\Support;

use App\Jobs\Support\ProcessSupportCaseDiagnosticsJob;
use App\Jobs\Support\ProcessSupportCaseResolutionJob;
use App\Jobs\Support\ProcessSupportCaseTriageJob;
use App\Services\Support\CaseIntakeService;
use App\Services\Support\SupportApprovalEmailService;
use App\Services\Support\SupportJson;
use Illuminate\Console\Command;

class GmailTestCommand extends Command
{
    protected $signature = 'support:gmail:test
        {to? : Recipient for dry-run summary (default: SUPPORT_GMAIL_NOTIFY_EMAIL)}
        {--message= : Simulated support request body}
        {--from=codeweek@matrixinternet.ie : Simulated sender (must be allowlisted)}
        {--skip-email : Run pipeline only; do not send Gmail message}';

    protected $description = 'Run a simulated support case through the pipeline and email a dry-run summary.';

    public function handle(
        CaseIntakeService $intake,
        SupportApprovalEmailService $approvalEmail,
    ): int {
        if (!config('support_gmail.enabled')) {
            $this->error('SUPPORT_GMAIL_ENABLED is false.');

            return self::FAILURE;
        }

        $to = (string) ($this->argument('to') ?: config('support_gmail.notify_email'));
        $from = (string) $this->option('from');
        $message = (string) ($this->option('message') ?: 'Test: user account may be soft-deleted. Please restore test.user@example.com');

        $case = $intake->intake([
            'source_channel' => 'gmail',
            'processing_mode' => 'manual_test',
            'gmail_message_id' => 'test-'.SupportJson::correlationId(),
            'gmail_thread_id' => 'test-thread-'.time(),
            'subject' => trim((string) config('support_gmail.subject_prefix', '[CodeWeek Support]')).' [TEST] Support copilot dry run',
            'raw_message' => $message,
            'forwarded_by_email' => $from,
            'original_sender_email' => $from,
            'correlation_id' => SupportJson::correlationId(),
        ]);

        ProcessSupportCaseTriageJob::dispatchSync($case->id);
        ProcessSupportCaseDiagnosticsJob::dispatchSync($case->id);
        ProcessSupportCaseResolutionJob::dispatchSync($case->id);

        $case->refresh();

        $emailResult = null;
        if (!$this->option('skip-email')) {
            $emailResult = $approvalEmail->sendDryRunReview($case, $to);
        }

        $this->line(json_encode([
            'ok' => true,
            'tool' => 'support:gmail:test',
            'case' => [
                'id' => $case->id,
                'status' => $case->status,
                'case_type' => $case->case_type,
                'target_email' => $case->target_email,
            ],
            'email' => $emailResult,
            'instructions' => [
                'Check inbox: '.$to,
                'To approve a proposed action, reply with a single line: APPROVE',
                'Only @matrixinternet.ie and @codeweek.eu senders can approve.',
            ],
        ], JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES));

        return self::SUCCESS;
    }
}
