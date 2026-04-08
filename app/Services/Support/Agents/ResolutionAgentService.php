<?php

namespace App\Services\Support\Agents;

use App\Models\Support\SupportCase;

class ResolutionAgentService
{
    public function resolve(SupportCase $case, array $triage, array $diagnostics): array
    {
        $verified = $case->status === 'verified' || $case->status === 'resolved';

        $internal = implode("\n", array_filter([
            "Case #{$case->id}",
            "Type: ".($case->case_type ?? 'unknown'),
            "Risk: ".($case->risk_level ?? 'low'),
            "Status: ".($case->status ?? 'new'),
            "Target: ".($case->target_email ?? '(unknown)'),
            "Findings: ".implode(', ', $diagnostics['findings'] ?? []),
        ]));

        $colleague = $verified
            ? "I ran the standard checks and confirmed the issue has been resolved and verified."
            : "I ran the initial checks and captured the findings. The next step depends on review/approval if a change is needed.";

        return [
            'internal_summary' => $internal,
            'colleague_reply_draft' => $colleague,
            'end_user_reply_draft' => null,
            'case_resolution_summary' => $verified ? 'verified' : 'draft_ready',
        ];
    }
}

