<?php

namespace App\Services\Support\Agents;

use App\Models\Support\SupportCase;

interface TriageProvider
{
    /**
     * Classify a support case.
     *
     * @return array<string, mixed>|null Triage result in the stable schema, or
     *                                    null when the provider is unavailable
     *                                    (caller falls back to heuristics).
     */
    public function triage(SupportCase $case): ?array;
}
