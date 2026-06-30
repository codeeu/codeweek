<?php

namespace App\Services\Support;

use App\Models\Support\SupportCase;

/**
 * Resolve the role-change request for a case, AI-first.
 *
 * Emails and role come from the triage result (Cursor AI when enabled, the
 * heuristic otherwise) which is stored on the case and the triage action.
 * The deterministic SupportRoleRequestParser is used only as a fallback when
 * the triage layer did not produce a usable value.
 */
class SupportRoleRequestResolver
{
    public function __construct(
        private readonly SupportRoleRequestParser $parser,
    ) {
    }

    /**
     * @return array{operation: string, role: ?string, emails: list<string>, source: array{role: string, emails: string}}
     */
    public function resolve(SupportCase $case): array
    {
        $parsed = $this->parser->parse((string) ($case->normalized_message ?? $case->raw_message ?? ''));
        $triage = $this->triageOutput($case);

        $aiRole = $this->stringOrNull($triage['role_name'] ?? null);
        $aiOperation = $this->stringOrNull($triage['role_operation'] ?? null);
        $aiEmails = $this->emailsFromCase($case);

        $role = $aiRole ?? $parsed['role'];
        $roleSource = $aiRole !== null ? 'ai' : ($parsed['role'] !== null ? 'parser' : 'none');

        $emails = $aiEmails !== [] ? $aiEmails : $parsed['emails'];
        $emailSource = $aiEmails !== [] ? 'ai' : ($parsed['emails'] !== [] ? 'parser' : 'none');

        $operation = in_array($aiOperation, ['add', 'remove'], true)
            ? $aiOperation
            : ($parsed['operation'] ?: 'add');

        return [
            'operation' => $operation,
            'role' => $role,
            'emails' => $emails,
            'source' => ['role' => $roleSource, 'emails' => $emailSource],
        ];
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
