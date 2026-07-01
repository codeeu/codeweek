<?php

namespace App\Services\Support;

use App\Models\Support\SupportCase;

/**
 * Resolve the email-change request for a case (AI-first, parser fallback).
 */
class SupportEmailChangeRequestResolver
{
    public function __construct(
        private readonly SupportEmailChangeRequestParser $parser,
    ) {
    }

    /**
     * @return array{from_email: ?string, to_email: ?string, source: array{mode: string}}
     */
    public function resolve(SupportCase $case): array
    {
        return $this->aiEnabled()
            ? $this->resolveFromTriage($case)
            : $this->resolveFromParser($case);
    }

    /**
     * @return array{from_email: ?string, to_email: ?string, source: array{mode: string}}
     */
    private function resolveFromTriage(SupportCase $case): array
    {
        $triage = $this->triageOutput($case);

        $from = SupportEmailAddress::normalize((string) ($case->target_email ?: ($triage['current_email'] ?? '')));
        $to = SupportEmailAddress::normalize((string) ($triage['new_email'] ?? ''));

        return [
            'from_email' => $from,
            'to_email' => $to,
            'source' => ['mode' => 'ai'],
        ];
    }

    /**
     * @return array{from_email: ?string, to_email: ?string, source: array{mode: string}}
     */
    private function resolveFromParser(SupportCase $case): array
    {
        $parsed = $this->parser->parse((string) ($case->normalized_message ?? $case->raw_message ?? ''));

        return [
            'from_email' => $parsed['from_email'],
            'to_email' => $parsed['to_email'],
            'source' => ['mode' => 'deterministic'],
        ];
    }

    private function aiEnabled(): bool
    {
        return (bool) config('support_ai.enabled', false)
            && (bool) config('support_ai.triage.enabled', true);
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
}
