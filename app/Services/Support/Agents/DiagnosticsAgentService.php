<?php

namespace App\Services\Support\Agents;

use App\Models\Support\SupportCase;
use App\Services\Support\EventAuditService;
use App\Services\Support\SupportJson;
use App\Services\Support\UserAuditService;

class DiagnosticsAgentService
{
    public function __construct(
        private readonly UserAuditService $userAudit,
        private readonly EventAuditService $eventAudit,
    ) {
    }

    public function diagnose(SupportCase $case): array
    {
        $findings = [];
        $recommendedTool = null;
        $recommendedVerification = null;

        if ($case->target_email) {
            $ua = $this->userAudit->audit($case->target_email);
            $findings[] = 'user_audit_completed';
            if (($ua['duplicate_risk'] ?? 'none') === 'high') {
                $findings[] = 'duplicate_risk_high';
            }
        } else {
            $ua = null;
        }

        if ($case->case_type === 'missing_events' && $case->target_email) {
            $ea = $this->eventAudit->audit($case->target_email);
            $findings[] = 'event_audit_completed';
            $recommendedTool = 'event_audit';
            $recommendedVerification = null;
        } else {
            $ea = null;
        }

        return [
            'findings' => $findings,
            'likely_root_cause' => 'unknown_v1',
            'recommended_action' => 'review_findings',
            'recommended_tool' => $recommendedTool,
            'recommended_verification' => $recommendedVerification,
            'confidence' => 0.50,
            'needs_approval' => false,
            'tool_outputs' => [
                'user_audit' => $ua ?? new \stdClass(),
                'event_audit' => $ea ?? new \stdClass(),
            ],
        ];
    }
}

