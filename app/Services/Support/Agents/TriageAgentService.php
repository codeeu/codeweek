<?php

namespace App\Services\Support\Agents;

use App\Models\Support\SupportCase;
use Illuminate\Support\Str;

class TriageAgentService
{
    public function triage(SupportCase $case): array
    {
        $text = Str::lower((string) ($case->normalized_message ?? $case->raw_message ?? ''));

        // V1 heuristic placeholder (replace with LLM later, keep output schema stable).
        $caseType = 'unknown';
        $runbook = 'unknown';
        if (Str::contains($text, ['soft-deleted', 'deleted', 'restore account', 'account missing'])) {
            $caseType = 'account_restore';
            $runbook = 'restore_deleted_account';
        } elseif (Str::contains($text, ['duplicate', 'two accounts', 'split across'])) {
            $caseType = 'duplicate_account';
            $runbook = 'duplicate_account_investigation';
        } elseif (Str::contains($text, ['missing event', 'events missing'])) {
            $caseType = 'missing_events';
            $runbook = 'missing_events';
        } elseif (Str::contains($text, ['certificate', 'cert'])) {
            $caseType = 'certificate_issue';
            $runbook = 'missing_certificate';
        } elseif (Str::contains($text, ['role', 'permission'])) {
            $caseType = 'role_issue';
            $runbook = 'role_problem';
        }

        $targetEmail = $this->extractFirstEmail($text);
        $secondary = $this->extractAllEmails($text);
        $secondary = array_values(array_filter($secondary, fn ($e) => $targetEmail ? $e !== $targetEmail : true));

        $risk = Str::contains($text, ['password reset', 'merge', 'ownership', 'privileged']) ? 'high' : 'low';

        return [
            'case_type' => $caseType,
            'confidence' => 0.50,
            'target_email' => $targetEmail,
            'secondary_emails' => $secondary,
            'target_user_id' => null,
            'requested_action' => null,
            'risk_level' => $risk,
            'recommended_runbook' => $runbook,
            'needs_human_review' => $targetEmail === null,
            'reasoning_summary' => 'V1 heuristic triage (LLM integration pending).',
        ];
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

