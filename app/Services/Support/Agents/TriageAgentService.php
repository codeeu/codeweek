<?php

namespace App\Services\Support\Agents;

use App\Models\Support\SupportCase;
use App\Services\Support\SupportProfileRequestParser;
use Illuminate\Support\Str;

class TriageAgentService
{
    public function __construct(
        private readonly SupportProfileRequestParser $profileParser,
        private readonly CursorCliTriageProvider $aiProvider,
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

        // V1 heuristic placeholder (replace with LLM later, keep output schema stable).
        $caseType = 'unknown';
        $runbook = 'unknown';
        if (Str::contains($text, ['soft-deleted', 'deleted', 'restore account', 'account missing'])) {
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
        } elseif (Str::contains($text, ['certificate', 'cert'])) {
            $caseType = 'certificate_issue';
            $runbook = 'missing_certificate';
        } elseif (Str::contains($text, ['role', 'permission'])) {
            $caseType = 'role_issue';
            $runbook = 'role_problem';
        }

        $targetEmail = $profile['email'] ?? $this->extractFirstEmail($text);
        $secondary = $this->extractAllEmails($text);
        $secondary = array_values(array_filter($secondary, fn ($e) => $targetEmail ? $e !== $targetEmail : true));

        $risk = Str::contains($text, ['password reset', 'merge', 'ownership', 'privileged']) ? 'high' : 'low';
        if ($caseType === 'profile_update') {
            $risk = 'low';
        }

        $needsHuman = $targetEmail === null
            || ($caseType === 'profile_update' && $profile['firstname'] === null && $profile['lastname'] === null);

        return [
            'case_type' => $caseType,
            'confidence' => 0.50,
            'target_email' => $targetEmail,
            'secondary_emails' => $secondary,
            'target_user_id' => null,
            'requested_action' => $caseType === 'profile_update' ? 'user_profile_update' : null,
            'profile_firstname' => $profile['firstname'],
            'profile_lastname' => $profile['lastname'],
            'risk_level' => $risk,
            'recommended_runbook' => $runbook,
            'needs_human_review' => $needsHuman,
            'reasoning_summary' => 'V1 heuristic triage (LLM integration pending).',
            'change_summary' => null,
            'change_area' => null,
            'cursor_prompt' => null,
            'triage_source' => 'heuristic',
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

