<?php

namespace App\Services\Support;

use App\Jobs\Support\ExecuteApprovedSupportActionJob;
use App\Models\Support\SupportApproval;
use App\Models\Support\SupportCase;
use App\Services\Support\Gmail\GmailMessage;
use App\Services\Support\Gmail\GmailOutboundService;
use Illuminate\Support\Str;

class SupportApprovalEmailService
{
    public function __construct(
        private readonly GmailOutboundService $gmail,
        private readonly SupportSenderAllowlist $allowlist,
        private readonly SupportProfileRequestParser $profileParser,
    ) {
    }

    public function approvalSubject(SupportCase $case): string
    {
        $prefix = (string) config('support_gmail.approval_subject_prefix', '[CW-SUPPORT');

        return sprintf('%s #%d] Support copilot - dry run review', $prefix, $case->id);
    }

    /**
     * Send dry-run summary and open a pending approval for email reply.
     */
    public function sendDryRunReview(SupportCase $case, ?string $toEmail = null): array
    {
        $to = SupportEmailAddress::normalize((string) ($toEmail ?: $case->forwarded_by_email ?: config('support_gmail.notify_email')));
        if ($to === null) {
            return SupportJson::fail('support_dry_run_email', ['case_id' => $case->id], 'no_recipient_email');
        }

        $proposedAction = $this->proposedActionForCase($case);
        $body = $this->buildDryRunBody($case, $proposedAction);

        $approval = SupportApproval::create([
            'support_case_id' => $case->id,
            'requested_action' => $proposedAction['action'] ?? 'none',
            'payload_json' => $proposedAction['payload'] ?? [],
            'risk_level' => $case->risk_level ?? 'medium',
            'status' => 'pending',
            'correlation_id' => $case->correlation_id,
            'notify_email' => $to,
        ]);

        $sent = $this->gmail->sendPlainText(
            to: $to,
            subject: $this->approvalSubject($case),
            body: $body,
        );

        $approval->update([
            'gmail_thread_id' => $sent['thread_id'] ?? null,
            'gmail_message_id' => $sent['id'] ?? null,
        ]);

        $case->update([
            'status' => 'awaiting_approval',
            'draft_reply_to' => $to,
            'draft_reply_subject' => $this->approvalSubject($case),
        ]);

        return SupportJson::ok('support_dry_run_email', ['case_id' => $case->id, 'to' => $to], [
            'approval_id' => $approval->id,
            'gmail_thread_id' => $approval->gmail_thread_id,
            'gmail_message_id' => $approval->gmail_message_id,
        ]);
    }

    /**
     * @return array<string, mixed>|null
     */
    public function processApprovalReply(GmailMessage $message, string $fromHeader): ?array
    {
        if (!$this->allowlist->isAllowed($fromHeader)) {
            return null;
        }

        if (!$this->isApprovalReply($message->rawBody)) {
            return null;
        }

        $approval = $this->findPendingApproval($message);
        if (!$approval) {
            return null;
        }

        $sender = SupportEmailAddress::fromHeader($fromHeader);
        $approval->update([
            'status' => 'approved',
            'approved_by' => $sender,
            'approved_at' => now(),
        ]);

        ExecuteApprovedSupportActionJob::dispatchSync($approval->id);

        return SupportJson::ok('support_email_approval', [
            'approval_id' => $approval->id,
            'gmail_message_id' => $message->id,
        ], [
            'approved_by' => $sender,
            'case_id' => $approval->support_case_id,
        ]);
    }

    private function findPendingApproval(GmailMessage $message): ?SupportApproval
    {
        if ($message->threadId) {
            $byThread = SupportApproval::query()
                ->where('status', 'pending')
                ->where('gmail_thread_id', $message->threadId)
                ->latest('id')
                ->first();
            if ($byThread) {
                return $byThread;
            }
        }

        $caseId = $this->extractCaseIdFromSubject($message->subject);
        if ($caseId === null) {
            return null;
        }

        return SupportApproval::query()
            ->where('status', 'pending')
            ->where('support_case_id', $caseId)
            ->latest('id')
            ->first();
    }

    private function extractCaseIdFromSubject(?string $subject): ?int
    {
        if ($subject === null) {
            return null;
        }

        if (preg_match('/\[CW-SUPPORT\s+#(\d+)\]/i', $subject, $m)) {
            return (int) $m[1];
        }

        return null;
    }

    public function isApprovalReply(string $body): bool
    {
        $keywords = config('support_gmail.approval_keywords', ['approve', 'yes', 'proceed']);
        $firstLine = strtolower(trim(Str::before(str_replace("\r\n", "\n", $body), "\n")));

        foreach ($keywords as $keyword) {
            $keyword = strtolower(trim((string) $keyword));
            if ($keyword === '') {
                continue;
            }
            if ($firstLine === $keyword || str_starts_with($firstLine, $keyword.' ')) {
                return true;
            }
        }

        return false;
    }

    /**
     * @return array{action: string, payload: array<string, mixed>}
     */
    private function proposedActionForCase(SupportCase $case): array
    {
        if ($case->case_type === 'account_restore' && $case->target_email) {
            return [
                'action' => 'user_restore',
                'payload' => ['email' => $case->target_email],
            ];
        }

        if ($case->case_type === 'profile_update' && $case->target_email) {
            $profile = $this->profileParser->parse((string) ($case->normalized_message ?? $case->raw_message ?? ''));
            if ($profile['firstname'] !== null || $profile['lastname'] !== null) {
                return [
                    'action' => 'user_profile_update',
                    'payload' => [
                        'email' => $case->target_email,
                        'firstname' => $profile['firstname'],
                        'lastname' => $profile['lastname'],
                    ],
                ];
            }
        }

        return ['action' => 'none', 'payload' => []];
    }

    /**
     * @param array{action: string, payload: array<string, mixed>} $proposedAction
     */
    private function buildDryRunBody(SupportCase $case, array $proposedAction): string
    {
        $lines = [
            'CodeWeek Support Copilot - dry run summary',
            '',
            'Case #'.$case->id,
            'Subject: '.$case->subject,
            'Type: '.($case->case_type ?? 'unknown'),
            'Risk: '.($case->risk_level ?? 'low'),
            'Target: '.($case->target_email ?? '(unknown)'),
            '',
        ];

        $diagnostics = $case->actions()->where('action_name', 'diagnostics')->latest()->first()?->output_json;
        if (is_array($diagnostics)) {
            $lines[] = 'Diagnostics findings: '.implode(', ', (array) ($diagnostics['findings'] ?? []));
            $lines[] = '';
        }

        foreach (['user_restore', 'user_profile_update'] as $writeAction) {
            $dryRun = $case->actions()->where('action_name', $writeAction)->where('action_type', 'write')->latest()->first()?->output_json;
            if (!is_array($dryRun)) {
                continue;
            }
            $result = $dryRun['result'] ?? $dryRun;
            if (is_array($result) && isset($result['before'], $result['after'])) {
                $lines[] = 'Planned profile/account changes (dry run):';
                $lines[] = 'Before: '.json_encode($result['before'], JSON_UNESCAPED_SLASHES);
                $lines[] = 'After:  '.json_encode($result['after'], JSON_UNESCAPED_SLASHES);
                $lines[] = '';
            } elseif (is_array($result)) {
                $lines[] = 'Planned changes (dry run):';
                $lines[] = json_encode($result['changes_planned'] ?? $result, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);
                $lines[] = '';
            }
        }

        $action = $proposedAction['action'] ?? 'none';
        if ($action !== 'none') {
            $lines[] = 'Proposed action: '.$action;
            $lines[] = 'Payload: '.json_encode($proposedAction['payload'] ?? [], JSON_UNESCAPED_SLASHES);
            $lines[] = '';
            $lines[] = 'To execute this change, reply to this email with a single line:';
            $lines[] = 'APPROVE';
            $lines[] = '';
            $lines[] = '(Only @matrixinternet.ie and @codeweek.eu senders are accepted.)';
        } else {
            $lines[] = 'No automated write action proposed. Review the case in Nova if needed.';
        }

        return implode("\n", $lines);
    }
}
