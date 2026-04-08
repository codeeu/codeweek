<?php

namespace App\Http\Controllers\Internal\Support;

use App\Models\Support\SupportCase;
use App\Services\Support\EventAuditService;
use App\Services\Support\SupportActionLogger;
use App\Services\Support\SupportJson;
use App\Services\Support\UserAuditService;
use App\Services\Support\UserRestoreService;
use Illuminate\Http\Request;

class ToolController
{
    public function __construct(
        private readonly SupportActionLogger $logger,
        private readonly UserAuditService $userAudit,
        private readonly UserRestoreService $userRestore,
        private readonly EventAuditService $eventAudit,
    ) {
    }

    public function userAudit(Request $request)
    {
        $data = $request->validate([
            'support_case_id' => ['required', 'integer'],
            'email' => ['required', 'string'],
        ]);

        $case = SupportCase::findOrFail((int) $data['support_case_id']);
        $result = $this->userAudit->audit($data['email']);
        $payload = SupportJson::ok('user_audit', ['email' => $data['email']], $result);

        $this->logger->log(
            case: $case,
            actionName: 'user_audit',
            actionType: 'read',
            input: $data,
            output: $payload,
            succeeded: true,
            executedBy: 'system',
            correlationId: $case->correlation_id,
        );

        return SupportJson::json($payload);
    }

    public function userRestore(Request $request)
    {
        $data = $request->validate([
            'support_case_id' => ['required', 'integer'],
            'email' => ['required', 'string'],
            'dry_run' => ['required', 'boolean'],
            'confidence' => ['nullable', 'numeric'],
        ]);

        $case = SupportCase::findOrFail((int) $data['support_case_id']);
        $payload = $this->userRestore->restore(
            case: $case,
            email: $data['email'],
            dryRun: (bool) $data['dry_run'],
            confidence: isset($data['confidence']) ? (float) $data['confidence'] : null,
        );

        $this->logger->log(
            case: $case,
            actionName: 'user_restore',
            actionType: 'write',
            input: $data,
            output: $payload,
            succeeded: (bool) ($payload['ok'] ?? false),
            executedBy: 'system',
            requiresApproval: in_array('approval_required', $payload['errors'] ?? [], true),
            correlationId: $case->correlation_id,
            errorMessage: ($payload['ok'] ?? false) ? null : implode(';', (array) ($payload['errors'] ?? [])),
        );

        return SupportJson::json($payload, ($payload['ok'] ?? false) ? 200 : 422);
    }

    public function eventAudit(Request $request)
    {
        $data = $request->validate([
            'support_case_id' => ['required', 'integer'],
            'identifier' => ['required', 'string'],
        ]);

        $case = SupportCase::findOrFail((int) $data['support_case_id']);
        $payload = $this->eventAudit->audit($data['identifier']);

        $this->logger->log(
            case: $case,
            actionName: 'event_audit',
            actionType: 'read',
            input: $data,
            output: $payload,
            succeeded: (bool) ($payload['ok'] ?? false),
            executedBy: 'system',
            correlationId: $case->correlation_id,
            errorMessage: ($payload['ok'] ?? false) ? null : implode(';', (array) ($payload['errors'] ?? [])),
        );

        return SupportJson::json($payload, ($payload['ok'] ?? false) ? 200 : 422);
    }
}

