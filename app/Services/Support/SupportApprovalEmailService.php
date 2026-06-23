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
        $headline = match ($case->case_type) {
            'profile_update' => 'Please review — name change',
            'account_restore' => 'Please review — account restore',
            'code_change' => 'Please review — proposed code fix (PR into dev)',
            default => 'Please review before we make changes',
        };

        return sprintf('%s #%d] %s', $prefix, $case->id, $headline);
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

        if ($case->case_type === 'code_change') {
            $plan = $this->codeChangePlan($case);
            if (($plan['cursor_prompt'] ?? '') !== '') {
                return [
                    'action' => 'code_change',
                    'payload' => [
                        'cursor_prompt' => $plan['cursor_prompt'],
                        'starting_ref' => $plan['starting_ref'] ?? (string) config('support_ai.code_change.dev_branch', 'dev'),
                        'change_summary' => $plan['change_summary'] ?? '',
                        'change_area' => $plan['change_area'] ?? null,
                    ],
                ];
            }
        }

        return ['action' => 'none', 'payload' => []];
    }

    /**
     * Read the code_change dry-run plan recorded during diagnostics.
     *
     * @return array<string, mixed>
     */
    private function codeChangePlan(SupportCase $case): array
    {
        $action = $case->actions()
            ->where('action_name', 'code_change')
            ->where('action_type', 'write')
            ->latest()
            ->first()?->output_json;

        $result = is_array($action) ? ($action['result'] ?? []) : [];

        return is_array($result) ? $result : [];
    }

    /**
     * @param array{action: string, payload: array<string, mixed>} $proposedAction
     */
    private function buildDryRunBody(SupportCase $case, array $proposedAction): string
    {
        $email = (string) ($case->target_email ?? '');
        $action = $proposedAction['action'] ?? 'none';

        $lines = [
            'CodeWeek Support — please review before we make changes',
            '',
            'Reference: Case #'.$case->id,
            'Account: '.($email !== '' ? $email : '(email not found in request)'),
        ];

        if ($case->subject) {
            $lines[] = 'Your request: '.$case->subject;
        }

        $warnings = $this->dryRunWarningLines($case);
        if ($warnings !== []) {
            $lines[] = '';
            $lines[] = 'Please note';
            $lines[] = str_repeat('─', 12);
            $lines = array_merge($lines, $warnings);
        }

        $lines[] = '';
        $lines[] = 'What will change if you approve';
        $lines[] = str_repeat('─', 28);
        $lines = array_merge($lines, $this->dryRunPlannedChangeLines($case, $proposedAction));

        if ($action !== 'none') {
            $lines[] = '';
            $lines[] = 'How to approve';
            $lines[] = str_repeat('─', 13);
            $lines[] = 'Reply to this email with exactly one word on the first line:';
            $lines[] = '';
            $lines[] = 'APPROVE';
            $lines[] = '';
            $lines[] = 'We will then apply the change and send you a short confirmation email.';
            $lines[] = 'Only messages from @matrixinternet.ie and @codeweek.eu can approve.';
        } else {
            $lines[] = '';
            $lines[] = 'No automatic change is available for this request.';
            $lines[] = 'Please review the case in Nova or handle it manually.';
        }

        $lines[] = '';
        $lines[] = '— CodeWeek Support Copilot';

        return implode("\n", $lines);
    }

    /**
     * @return list<string>
     */
    private function dryRunWarningLines(SupportCase $case): array
    {
        $diagnostics = $case->actions()->where('action_name', 'diagnostics')->latest()->first()?->output_json;
        $findings = is_array($diagnostics) ? (array) ($diagnostics['findings'] ?? []) : [];
        $lines = [];

        foreach ($findings as $finding) {
            $line = $this->humanizeDiagnosticFinding((string) $finding, $case->id);
            if ($line !== null) {
                $lines[] = '• '.$line;
            }
        }

        return $lines;
    }

    private function humanizeDiagnosticFinding(string $finding, int $caseId): ?string
    {
        $finding = strtolower(trim($finding));

        return match (true) {
            str_contains($finding, 'duplicate_risk') => 'More than one CodeWeek account uses this email. We will update the account that still needs this name change.',
            str_contains($finding, 'user_audit_completed') => null,
            str_contains($finding, 'ambiguous') => 'We could not tell which account to use. Case #'.$caseId.' may need manual review in Nova.',
            default => null,
        };
    }

    /**
     * @param array{action: string, payload: array<string, mixed>} $proposedAction
     * @return list<string>
     */
    private function dryRunPlannedChangeLines(SupportCase $case, array $proposedAction): array
    {
        $action = $proposedAction['action'] ?? 'none';
        $payload = $proposedAction['payload'] ?? [];
        $email = (string) ($case->target_email ?? $payload['email'] ?? '');

        if ($action === 'user_profile_update') {
            return $this->dryRunProfileChangeLines($case, $payload, $email);
        }

        if ($action === 'user_restore') {
            return [
                '',
                'We will reactivate the CodeWeek account'.($email !== '' ? ' for '.$email : '').'.',
                'The person can sign in again with their usual email and password.',
            ];
        }

        if ($action === 'code_change') {
            return $this->dryRunCodeChangeLines($payload);
        }

        return [
            '',
            'We could not determine an automatic change from this email.',
            'Check that the message includes lines like "Requested first name:" and "Requested last name:".',
        ];
    }

    /**
     * @param array<string, mixed> $payload
     * @return list<string>
     */
    private function dryRunCodeChangeLines(array $payload): array
    {
        $devBranch = (string) ($payload['starting_ref'] ?? config('support_ai.code_change.dev_branch', 'dev'));
        $summary = trim((string) ($payload['change_summary'] ?? ''));
        $prompt = trim((string) ($payload['cursor_prompt'] ?? ''));

        $lines = ['', 'We will ask the AI coding agent to make this change:'];
        if ($summary !== '') {
            $lines[] = '  • '.$summary;
        }
        if (($payload['change_area'] ?? null)) {
            $lines[] = '  • Area: '.$payload['change_area'];
        }

        $lines[] = '';
        $lines[] = 'Exactly what the agent will be instructed to do:';
        $lines[] = str_repeat('·', 20);
        foreach (preg_split('/\r\n|\r|\n/', $prompt) ?: [] as $promptLine) {
            $lines[] = '  '.$promptLine;
        }

        $lines[] = '';
        $lines[] = 'The agent works on a new branch and opens a Pull Request into "'.$devBranch.'"';
        $lines[] = 'for a developer to review. NOTHING is merged or deployed automatically.';

        return $lines;
    }

    /**
     * @param array<string, mixed> $payload
     * @return list<string>
     */
    private function dryRunProfileChangeLines(SupportCase $case, array $payload, string $email): array
    {
        $dryRun = $case->actions()
            ->where('action_name', 'user_profile_update')
            ->where('action_type', 'write')
            ->latest()
            ->first()?->output_json;

        $result = is_array($dryRun) ? ($dryRun['result'] ?? $dryRun) : [];
        $inner = is_array($result) ? $result : [];

        $lines = [
            '',
            'We will update the name shown on the CodeWeek account'.($email !== '' ? ' for '.$email : '').'.',
        ];

        if (isset($inner['before'], $inner['after']) && is_array($inner['before']) && is_array($inner['after'])) {
            $changeLines = $this->formatProfileNameChanges($inner['before'], $inner['after']);
            if ($changeLines !== []) {
                $lines[] = '';
                $lines = array_merge($lines, $changeLines);
            } elseif (($inner['note'] ?? '') === 'profile_already_matches_requested_values') {
                $lines[] = '';
                $lines[] = 'The account already has the requested name — approving will make no change.';
            }
        } else {
            $lines = array_merge($lines, $this->dryRunProfileChangeLinesFromPayload($payload));
        }

        $lines[] = '';
        $lines[] = 'The login email address will not change.';

        return $lines;
    }

    /**
     * @param array<string, mixed> $payload
     * @return list<string>
     */
    private function dryRunProfileChangeLinesFromPayload(array $payload): array
    {
        $lines = ['', 'Requested updates:'];

        if (!empty($payload['firstname'])) {
            $lines[] = '  • First name → '.$payload['firstname'];
        }
        if (!empty($payload['lastname'])) {
            $lines[] = '  • Last name → '.$payload['lastname'];
        }

        if (count($lines) === 2) {
            $lines[] = '  • (could not read name fields from the email — check the request text)';
        }

        return $lines;
    }

    private function completionHeadline(SupportCase $case, string $action, bool $succeeded): string
    {
        if (!$succeeded) {
            return 'Could not complete your request';
        }

        return match ($action) {
            'user_profile_update' => 'Done — name updated on CodeWeek account',
            'user_restore' => 'Done — CodeWeek account reactivated',
            'code_change' => 'Started — AI coding agent is preparing a PR into dev',
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

        if ($action === 'code_change') {
            $prUrl = (string) ($inner['pr_url'] ?? '');
            $agentId = (string) ($inner['agent_id'] ?? '');
            $lines = [
                'We started an AI coding agent to implement the approved fix.',
                'It will push to a new branch and open a Pull Request into the dev branch.',
            ];
            if ($prUrl !== '') {
                $lines[] = '';
                $lines[] = 'Pull request: '.$prUrl;
            } else {
                $lines[] = '';
                $lines[] = 'The pull request link will follow in a moment once the agent finishes.';
            }
            if ($agentId !== '') {
                $lines[] = 'Agent reference: '.$agentId;
            }
            $promoUrl = (string) ($inner['promotion_pr_url'] ?? '');
            if ($promoUrl !== '') {
                $lines[] = '';
                $lines[] = 'Release PR (dev → live, for when the fix is ready to deploy): '.$promoUrl;
            }
            $lines[] = '';
            $lines[] = 'A developer must review and merge the PR — nothing deploys automatically.';

            return $lines;
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
                if (str_contains(strtolower((string) $error), 'matched_user_ids')) {
                    continue;
                }
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
