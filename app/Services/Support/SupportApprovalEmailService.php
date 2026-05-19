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

    public function completionSubject(SupportCase $case, bool $succeeded, string $action = ''): string
    {
        $prefix = (string) config('support_gmail.approval_subject_prefix', '[CW-SUPPORT');
        $headline = $this->completionHeadline($case, $action, $succeeded);

        return sprintf('%s #%d] %s', $prefix, $case->id, $headline);
    }

    /**
     * Follow-up email after APPROVE is processed (success or failure).
     *
     * @param  array<string, mixed>  $result
     */
    public function sendActionCompletion(
        SupportCase $case,
        SupportApproval $approval,
        string $action,
        array $result,
        bool $succeeded,
    ): array {
        if (!config('support_gmail.send_completion_email', true)) {
            return SupportJson::ok('support_completion_email', ['case_id' => $case->id], ['skipped' => true]);
        }

        $recipients = $this->completionRecipients($case, $approval);
        if ($recipients === []) {
            return SupportJson::fail('support_completion_email', ['case_id' => $case->id], 'no_recipient_email');
        }

        $body = $this->buildCompletionBody($case, $approval, $action, $result, $succeeded);
        $subject = $this->completionSubject($case, $succeeded, $action);
        $sentTo = [];

        foreach ($recipients as $to) {
            $sent = $this->gmail->sendPlainText(
                to: $to,
                subject: $subject,
                body: $body,
                threadId: $approval->gmail_thread_id,
            );
            $sentTo[] = ['to' => $to, 'gmail_message_id' => $sent['id'] ?? null];
        }

        return SupportJson::ok('support_completion_email', ['case_id' => $case->id], [
            'succeeded' => $succeeded,
            'sent_to' => $sentTo,
            'gmail_thread_id' => $approval->gmail_thread_id,
        ]);
    }

    /**
     * @return list<string>
     */
    private function completionRecipients(SupportCase $case, SupportApproval $approval): array
    {
        $candidates = [
            SupportEmailAddress::normalize((string) config('support_gmail.notify_email')),
            SupportEmailAddress::normalize((string) $approval->notify_email),
            SupportEmailAddress::normalize((string) $approval->approved_by),
            SupportEmailAddress::normalize((string) $case->forwarded_by_email),
        ];

        $out = [];
        foreach ($candidates as $email) {
            if ($email === null || $email === '') {
                continue;
            }
            if (!$this->allowlist->isAllowed($email)) {
                continue;
            }
            $out[$email] = $email;
        }

        return array_values($out);
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
        $keywords = config('support_gmail.approval_keywords', ['approve', 'approved', 'yes', 'proceed']);
        $lines = explode("\n", str_replace("\r\n", "\n", $body));

        foreach (array_slice($lines, 0, 8) as $line) {
            $line = strtolower(trim($line));
            if ($line === '') {
                continue;
            }
            foreach ($keywords as $keyword) {
                $keyword = strtolower(trim((string) $keyword));
                if ($keyword === '') {
                    continue;
                }
                if ($line === $keyword || str_starts_with($line, $keyword.' ')) {
                    return true;
                }
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
            $lines[] = 'You will receive a follow-up email when the action has run (completed or failed).';
            $lines[] = '';
            $lines[] = '(Only @matrixinternet.ie and @codeweek.eu senders are accepted.)';
        } else {
            $lines[] = 'No automated write action proposed. Review the case in Nova if needed.';
        }

        return implode("\n", $lines);
    }

    private function completionHeadline(SupportCase $case, string $action, bool $succeeded): string
    {
        if (!$succeeded) {
            return 'Could not complete your request';
        }

        return match ($action) {
            'user_profile_update' => 'Done — name updated on CodeWeek account',
            'user_restore' => 'Done — CodeWeek account reactivated',
            default => 'Done — your approved request was completed',
        };
    }

    /**
     * @param  array<string, mixed>  $result
     */
    private function buildCompletionBody(
        SupportCase $case,
        SupportApproval $approval,
        string $action,
        array $result,
        bool $succeeded,
    ): string {
        $email = (string) ($case->target_email ?: ($approval->payload_json['email'] ?? ''));
        $approvedBy = (string) ($approval->approved_by ?? '');
        $approvedAt = $approval->approved_at?->timezone('UTC')->format('j M Y, H:i').' UTC';

        $lines = [
            $succeeded
                ? 'CodeWeek Support — your request has been completed'
                : 'CodeWeek Support — we could not complete your request',
            '',
            'Reference: Case #'.$case->id,
        ];

        if ($case->subject) {
            $lines[] = 'Original email subject: '.$case->subject;
        }

        $lines[] = '';
        $lines[] = 'What we did';
        $lines[] = str_repeat('─', 12);
        $lines[] = '';

        if ($succeeded) {
            $lines = array_merge($lines, $this->completionSuccessLines($case, $action, $result, $email));
        } else {
            $lines = array_merge($lines, $this->completionFailureLines($action, $result, $email, $case->id));
        }

        if ($email !== '') {
            $lines[] = '';
            $lines[] = 'Account email: '.$email;
        }

        if ($approvedBy !== '') {
            $lines[] = 'Approved by: '.$approvedBy.($approvedAt ? ' on '.$approvedAt : '');
        }

        $lines[] = '';
        if ($succeeded) {
            $lines[] = 'No further action is needed. The supporter can sign in with their usual email and password.';
            $lines[] = 'You do not need to reply to this email.';
        } else {
            $lines[] = 'The change was not applied automatically. Please review this case in Nova or ask the technical team for help.';
            $lines[] = 'When escalating, include reference Case #'.$case->id.'.';
        }

        $lines[] = '';
        $lines[] = '— CodeWeek Support Copilot';

        return implode("\n", $lines);
    }

    /**
     * @param  array<string, mixed>  $result
     * @return list<string>
     */
    private function completionSuccessLines(SupportCase $case, string $action, array $result, string $email): array
    {
        $inner = is_array($result['result'] ?? null) ? $result['result'] : [];
        $note = is_string($inner['note'] ?? null) ? $inner['note'] : '';

        if ($action === 'user_profile_update') {
            $lines = [
                'We updated the name shown on the CodeWeek account'.($email !== '' ? ' for '.$email : '').'.',
            ];

            if (isset($inner['before'], $inner['after']) && is_array($inner['before']) && is_array($inner['after'])) {
                $changeLines = $this->formatProfileNameChanges($inner['before'], $inner['after']);
                if ($changeLines !== []) {
                    $lines[] = '';
                    $lines = array_merge($lines, $changeLines);
                }
            }

            if ($note === 'profile_already_matches_requested_values') {
                $lines[] = '';
                $lines[] = 'The account already had the requested name — no change was required.';
            }

            return $lines;
        }

        if ($action === 'user_restore') {
            if ($note === 'user_already_active') {
                return [
                    'The CodeWeek account'.($email !== '' ? ' for '.$email : '').' was already active.',
                    'No restore was needed.',
                ];
            }

            return [
                'We reactivated the CodeWeek account'.($email !== '' ? ' for '.$email : '').'.',
                'The person can sign in again with their usual email and password.',
            ];
        }

        return [
            'The approved request for case #'.$case->id.' was completed successfully.',
        ];
    }

    /**
     * @param  array<string, mixed>  $before
     * @param  array<string, mixed>  $after
     * @return list<string>
     */
    private function formatProfileNameChanges(array $before, array $after): array
    {
        $lines = [];

        foreach (['firstname' => 'First name', 'lastname' => 'Last name'] as $field => $label) {
            $old = $before[$field] ?? null;
            $new = $after[$field] ?? null;
            if ($old === $new) {
                continue;
            }
            $lines[] = '  • '.$label.': '.$this->displayNameValue($old).' → '.$this->displayNameValue($new);
        }

        return $lines;
    }

    private function displayNameValue(mixed $value): string
    {
        if ($value === null || $value === '') {
            return '(empty)';
        }

        return (string) $value;
    }

    /**
     * @param  array<string, mixed>  $result
     * @return list<string>
     */
    private function completionFailureLines(string $action, array $result, string $email, int $caseId): array
    {
        $errors = array_values(array_filter((array) ($result['errors'] ?? [])));
        $lines = [
            'We were not able to apply the approved change'.($email !== '' ? ' for '.$email : '').'.',
            '',
            'Reason:',
        ];

        if ($errors === []) {
            $lines[] = '  • An unexpected error occurred. Please check the case in Nova.';
        } else {
            foreach ($errors as $error) {
                $lines[] = '  • '.$this->humanizeError((string) $error, $action, $caseId);
            }
        }

        return $lines;
    }

    private function humanizeError(string $code, string $action, int $caseId): string
    {
        $code = strtolower(trim($code));

        return match (true) {
            str_contains($code, 'no_matching_user') => 'We could not find a CodeWeek account with that email address.',
            str_contains($code, 'ambiguous_user') => 'More than one account matched this email. A team member must review Case #'.$caseId.' manually.',
            str_contains($code, 'invalid_email') => 'The email address on the request was not valid.',
            str_contains($code, 'no_profile_fields') => 'The request did not include a first or last name to update.',
            str_contains($code, 'dry_run_mode') => 'The system is in preview-only mode and could not apply live changes.',
            str_contains($code, 'unsupported_approved_action') => 'This type of request cannot be run automatically yet.',
            str_contains($code, 'approval_required') => 'This action still requires a separate approval step in the system.',
            $action === 'user_restore' && str_contains($code, 'verification') => 'The account was changed but we could not confirm it is fully active. Please verify in Nova.',
            default => 'Technical detail: '.$code,
        };
    }
}
