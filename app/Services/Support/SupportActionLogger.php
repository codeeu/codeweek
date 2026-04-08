<?php

namespace App\Services\Support;

use App\Models\Support\SupportCase;
use App\Models\Support\SupportCaseAction;

class SupportActionLogger
{
    public function log(
        SupportCase $case,
        string $actionName,
        string $actionType,
        array $input,
        ?array $output,
        bool $succeeded,
        string $executedBy,
        bool $requiresApproval = false,
        ?string $approvedBy = null,
        ?string $errorMessage = null,
        ?string $correlationId = null,
    ): SupportCaseAction {
        return SupportCaseAction::create([
            'support_case_id' => $case->id,
            'action_name' => $actionName,
            'action_type' => $actionType,
            'input_json' => $this->redact($input),
            'output_json' => $output === null ? null : $this->redact($output),
            'succeeded' => $succeeded,
            'requires_approval' => $requiresApproval,
            'approved_by' => $approvedBy,
            'executed_by' => $executedBy,
            'error_message' => $errorMessage,
            'correlation_id' => $correlationId,
        ]);
    }

    private function redact(array $payload): array
    {
        // Minimal V1: remove obvious secrets if they slip in.
        $redacted = $payload;
        foreach (['token', 'authorization', 'password', 'secret', 'api_key'] as $key) {
            if (array_key_exists($key, $redacted)) {
                $redacted[$key] = '[redacted]';
            }
        }
        return $redacted;
    }
}

