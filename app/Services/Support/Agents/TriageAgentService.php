<?php

namespace App\Services\Support\Agents;

use App\Models\Support\SupportCase;
use App\Services\Support\CertificateKpiRequestParser;
use App\Services\Support\SupportEmailChangeRequestParser;
use App\Services\Support\SupportProfileRequestParser;
use App\Services\Support\SupportRoleRequestParser;
use Illuminate\Support\Str;

class TriageAgentService
{
    public function __construct(
        private readonly SupportProfileRequestParser $profileParser,
        private readonly SupportEmailChangeRequestParser $emailChangeParser,
        private readonly CursorCliTriageProvider $aiProvider,
        private readonly SupportRoleRequestParser $roleParser,
        private readonly CertificateKpiRequestParser $certificateKpiParser,
    ) {
    }

    public function triage(SupportCase $case): array
    {
        $heuristic = $this->heuristicTriage($case);

        $ai = $this->aiProvider->triage($case);
        if ($ai === null) {
            return $heuristic;
        }

        return $this->mergeAiOverHeuristic($ai, $heuristic);
    }

    /**
     * AI result wins; fall back to the heuristic for any field the model left empty.
     *
     * @param array<string, mixed> $ai
     * @param array<string, mixed> $heuristic
     * @return array<string, mixed>
     */
    private function mergeAiOverHeuristic(array $ai, array $heuristic): array
    {
        $merged = $heuristic;

        foreach ($ai as $key => $value) {
            if ($value === null || $value === '' || $value === []) {
                continue;
            }
            $merged[$key] = $value;
        }

        // Preserve a known target/profile from the heuristic parser when AI omitted it.
        $merged['target_email'] = $ai['target_email'] ?? $heuristic['target_email'];
        $merged['triage_source'] = $ai['triage_source'] ?? 'cursor_cli';

        return $merged;
    }

    private function heuristicTriage(SupportCase $case): array
    {
        $rawText = (string) ($case->normalized_message ?? $case->raw_message ?? '');
        $text = Str::lower($rawText);
        $profile = $this->profileParser->parse($rawText);
        $emailChange = $this->emailChangeParser->parse($rawText);
        $roleRequest = $this->roleParser->parse($rawText);
        $certificateKpi = $this->certificateKpiParser->parse($rawText);
        $hasEmailChangeRequest = $emailChange['from_email'] !== null && $emailChange['to_email'] !== null;
        $hasRoleAddRequest = $roleRequest['role'] !== null
            && $roleRequest['operation'] === 'add'
            && $roleRequest['emails'] !== [];
        $hasRoleRemoveRequest = $roleRequest['role'] !== null
            && $roleRequest['operation'] === 'remove'
            && $roleRequest['emails'] !== [];
        $hasRoleRequest = $hasRoleAddRequest || $hasRoleRemoveRequest;

        // V1 heuristic placeholder (replace with LLM later, keep output schema stable).
        $caseType = 'unknown';
        $runbook = 'unknown';
        if ($hasRoleRemoveRequest) {
            $caseType = 'role_remove';
            $runbook = 'remove_user_role';
        } elseif ($hasRoleAddRequest) {
            $caseType = 'role_add';
            $runbook = 'add_user_role';
        } elseif ($hasEmailChangeRequest) {
            $caseType = 'email_change';
            $runbook = 'update_user_email';
        } elseif (Str::contains($text, ['soft-deleted', 'deleted', 'restore account', 'account missing'])) {
            $caseType = 'account_restore';
            $runbook = 'restore_deleted_account';
        } elseif (Str::contains($text, [
            'update profile',
            'profile name',
            'your details',
            'first name',
            'last name',
            'change name',
            'rename profile',
        ]) || ($profile['firstname'] !== null || $profile['lastname'] !== null)) {
            $caseType = 'profile_update';
            $runbook = 'update_user_profile';
        } elseif (Str::contains($text, ['duplicate', 'two accounts', 'split across'])) {
            $caseType = 'duplicate_account';
            $runbook = 'duplicate_account_investigation';
        } elseif (Str::contains($text, ['missing event', 'events missing'])) {
            $caseType = 'missing_events';
            $runbook = 'missing_events';
        } elseif ($certificateKpi['looks_like_kpi_request'] && $certificateKpi['start'] && $certificateKpi['end']) {
            $caseType = 'artisan_command';
            $runbook = 'certificate_kpi_report';
        } elseif (Str::contains($text, ['certificate', 'cert'])) {
            $caseType = 'certificate_issue';
            $runbook = 'missing_certificate';
        } elseif (Str::contains($text, ['role', 'permission'])) {
            $caseType = 'role_issue';
            $runbook = 'role_problem';
        }

        if ($hasRoleRequest) {
            $targetEmail = $roleRequest['emails'][0];
            $secondary = array_values(array_slice($roleRequest['emails'], 1));
        } elseif ($hasEmailChangeRequest) {
            $targetEmail = $emailChange['from_email'];
            $secondary = [$emailChange['to_email']];
        } else {
            $targetEmail = $profile['email'] ?? $this->extractFirstEmail($text);
            $secondary = $this->extractAllEmails($text);
            $secondary = array_values(array_filter($secondary, fn ($e) => $targetEmail ? $e !== $targetEmail : true));
        }

        $risk = Str::contains($text, ['password reset', 'merge', 'ownership', 'privileged']) ? 'high' : 'low';
        if ($caseType === 'profile_update') {
            $risk = 'low';
        }
        if ($caseType === 'email_change') {
            $risk = 'medium';
        }
        if ($caseType === 'artisan_command' && $runbook === 'certificate_kpi_report') {
            $risk = 'low';
        }
        if ($hasRoleRequest && $this->roleLooksPrivileged((string) $roleRequest['role'])) {
            $risk = 'high';
        }

        $needsHuman = $targetEmail === null
            || ($caseType === 'profile_update' && $profile['firstname'] === null && $profile['lastname'] === null);

        $requestedAction = match ($caseType) {
            'profile_update' => 'user_profile_update',
            'role_add' => 'user_role_add',
            'role_remove' => 'user_role_remove',
            'email_change' => 'user_email_update',
            default => null,
        };

        return [
            'case_type' => $caseType,
            'confidence' => 0.50,
            'target_email' => $targetEmail,
            'secondary_emails' => $secondary,
            'target_user_id' => null,
            'requested_action' => $requestedAction,
            'profile_firstname' => $profile['firstname'],
            'profile_lastname' => $profile['lastname'],
            'role_name' => $hasRoleRequest ? $roleRequest['role'] : null,
            'role_operation' => $hasRoleRequest ? $roleRequest['operation'] : null,
            'current_email' => $hasEmailChangeRequest ? $emailChange['from_email'] : null,
            'new_email' => $hasEmailChangeRequest ? $emailChange['to_email'] : null,
            'risk_level' => $risk,
            'recommended_runbook' => $runbook,
            'needs_human_review' => $needsHuman,
            'reasoning_summary' => 'V1 heuristic triage (LLM integration pending).',
            'change_summary' => null,
            'change_area' => null,
            'cursor_prompt' => null,
            'artisan_command_name' => ($caseType === 'artisan_command' && $runbook === 'certificate_kpi_report')
                ? 'support:certificate-kpi-report'
                : null,
            'artisan_args' => ($caseType === 'artisan_command' && $runbook === 'certificate_kpi_report')
                ? [
                    'start' => (string) $certificateKpi['start'],
                    'end' => (string) $certificateKpi['end'],
                    '--json' => true,
                ]
                : [],
            'artisan_raw_command' => null,
            'triage_source' => 'heuristic',
        ];
    }

    private function roleLooksPrivileged(string $roleName): bool
    {
        return (bool) preg_match('/\b(admin|administrator|super|owner|root|staff)\b/i', $roleName);
    }

    private function extractFirstEmail(string $text): ?string
    {
        $all = $this->extractAllEmails($text);
        return $all[0] ?? null;
    }

    private function extractAllEmails(string $text): array
    {
        preg_match_all('/[a-z0-9._%+\\-]+@[a-z0-9.\\-]+\\.[a-z]{2,}/i', $text, $m);
        $emails = array_map(fn ($e) => Str::lower(trim($e)), $m[0] ?? []);
        return array_values(array_unique($emails));
    }
}

