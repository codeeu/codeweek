<?php

namespace App\Services\Support;

use App\Models\Support\SupportCase;

/**
 * Resolve the role-change request for a case.
 *
 * AI-first by design: when Cursor triage is enabled we trust the triage result
 * (role + emails) exclusively. The triage result is itself already "AI over
 * heuristic" — if the AI call fails for a run, TriageAgentService keeps the
 * heuristic values, so this path degrades gracefully without re-parsing here.
 *
 * The deterministic SupportRoleRequestParser is used ONLY when AI triage is not
 * enabled.
 */
class SupportRoleRequestResolver
{
    public function __construct(
        private readonly SupportRoleRequestParser $parser,
    ) {
    }

    /**
     * @return array{operation: string, role: ?string, emails: list<string>, source: array{mode: string, role: string, emails: string}}
     */
    public function resolve(SupportCase $case): array
    {
        return $this->aiEnabled()
            ? $this->resolveFromTriage($case)
            : $this->resolveFromParser($case);
    }

    /**
     * @return array{operation: string, role: ?string, emails: list<string>, source: array{mode: string, role: string, emails: string}}
     */
    private function resolveFromTriage(SupportCase $case): array
    {
        $triage = $this->triageOutput($case);

        $role = $this->stringOrNull($triage['role_name'] ?? null);
        $operation = $this->stringOrNull($triage['role_operation'] ?? null);
        $emails = $this->emailsFromCase($case);

        return [
            'operation' => in_array($operation, ['add', 'remove'], true) ? $operation : 'add',
            'role' => $role,
            'emails' => $emails,
            'source' => [
                'mode' => 'ai',
                'role' => $role !== null ? 'ai' : 'none',
                'emails' => $emails !== [] ? 'ai' : 'none',
            ],
        ];
    }

    /**
     * @return array{operation: string, role: ?string, emails: list<string>, source: array{mode: string, role: string, emails: string}}
     */
    private function resolveFromParser(SupportCase $case): array
    {
        $parsed = $this->parser->parse((string) ($case->normalized_message ?? $case->raw_message ?? ''));

        return [
            'operation' => $parsed['operation'] ?: 'add',
            'role' => $parsed['role'],
            'emails' => $parsed['emails'],
            'source' => [
                'mode' => 'deterministic',
                'role' => $parsed['role'] !== null ? 'parser' : 'none',
                'emails' => $parsed['emails'] !== [] ? 'parser' : 'none',
            ],
        ];
    }

    private function aiEnabled(): bool
    {
        return (bool) config('support_ai.enabled', false)
            && (bool) config('support_ai.triage.enabled', true);
    }

    /**
     * @return list<string>
     */
    private function emailsFromCase(SupportCase $case): array
    {
        $candidates = [];
        if ($case->target_email) {
            $candidates[] = (string) $case->target_email;
        }
        foreach ((array) ($case->secondary_emails ?? []) as $email) {
            $candidates[] = (string) $email;
        }

        $out = [];
        foreach ($candidates as $email) {
            $normalized = SupportEmailAddress::normalize($email);
            if ($normalized !== null) {
                $out[$normalized] = $normalized;
            }
        }

        return array_values($out);
    }

    /**
     * @return array<string, mixed>
     */
    private function triageOutput(SupportCase $case): array
    {
        $output = $case->actions()
            ->where('action_name', 'triage')
            ->latest()
            ->first()?->output_json;

        return is_array($output) ? $output : [];
    }

    private function stringOrNull(mixed $value): ?string
    {
        if (!is_string($value)) {
            return null;
        }
        $value = trim($value);

        return $value === '' ? null : $value;
    }
}
