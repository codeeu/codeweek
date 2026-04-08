<?php

namespace App\Services\Support;

class ApprovalPolicyService
{
    /**
     * Return a policy decision for a support action.
     *
     * Context keys used by V1:
     * - ambiguity: bool
     * - privileged_roles_involved: bool
     * - dry_run_ok: bool|null
     * - confidence: float|null
     */
    public function decide(string $actionName, string $actionType, string $riskLevel, array $context = []): array
    {
        $ambiguity = (bool) ($context['ambiguity'] ?? false);
        $privileged = (bool) ($context['privileged_roles_involved'] ?? false);
        $dryRunOk = $context['dry_run_ok'] ?? null;
        $confidence = $context['confidence'] ?? null;

        if ($riskLevel === 'low') {
            return $this->allowed($riskLevel, 'low_risk_auto_allowed');
        }

        if ($riskLevel === 'high') {
            return $this->requiresApproval($riskLevel, 'high_risk_requires_approval');
        }

        // medium risk
        if ($ambiguity) {
            return $this->requiresApproval($riskLevel, 'ambiguous_target');
        }

        if ($privileged) {
            return $this->requiresApproval($riskLevel, 'privileged_roles_involved');
        }

        if ($dryRunOk === false) {
            return $this->requiresApproval($riskLevel, 'dry_run_not_acceptable');
        }

        if (is_numeric($confidence) && (float) $confidence < 0.80) {
            return $this->requiresApproval($riskLevel, 'confidence_below_threshold');
        }

        return $this->allowed($riskLevel, 'medium_risk_policy_passed');
    }

    private function allowed(string $riskLevel, string $reason): array
    {
        return [
            'allowed' => true,
            'requires_approval' => false,
            'risk_level' => $riskLevel,
            'reason' => $reason,
        ];
    }

    private function requiresApproval(string $riskLevel, string $reason): array
    {
        return [
            'allowed' => false,
            'requires_approval' => true,
            'risk_level' => $riskLevel,
            'reason' => $reason,
        ];
    }
}

