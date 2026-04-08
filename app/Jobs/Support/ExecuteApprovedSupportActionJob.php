<?php

namespace App\Jobs\Support;

use App\Models\Support\SupportApproval;
use App\Models\Support\SupportCase;
use App\Services\Support\SupportActionLogger;
use App\Services\Support\UserRestoreService;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class ExecuteApprovedSupportActionJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public function __construct(public int $supportApprovalId)
    {
    }

    public function handle(UserRestoreService $userRestore, SupportActionLogger $logger): void
    {
        $approval = SupportApproval::findOrFail($this->supportApprovalId);
        $case = SupportCase::findOrFail($approval->support_case_id);

        if ($approval->status !== 'approved') {
            $logger->log(
                case: $case,
                actionName: 'execute_approved_action',
                actionType: 'write',
                input: ['approval_id' => $approval->id],
                output: ['skipped' => true, 'reason' => 'approval_not_approved'],
                succeeded: false,
                executedBy: 'system',
                correlationId: $case->correlation_id,
                errorMessage: 'approval_not_approved',
            );
            return;
        }

        $action = $approval->requested_action;
        $payload = (array) ($approval->payload_json ?? []);

        $result = null;
        if ($action === 'user_restore') {
            $result = $userRestore->restore(
                case: $case,
                email: (string) ($payload['email'] ?? ''),
                dryRun: false,
                confidence: isset($payload['confidence']) ? (float) $payload['confidence'] : null,
            );
        } else {
            $result = [
                'ok' => false,
                'tool' => $action,
                'input' => $payload,
                'result' => new \stdClass(),
                'warnings' => [],
                'errors' => ['unsupported_approved_action'],
            ];
        }

        $ok = (bool) ($result['ok'] ?? false);
        $case->update(['status' => $ok ? 'verified' : 'escalated']);

        $logger->log(
            case: $case,
            actionName: 'approved_action_executed',
            actionType: 'write',
            input: ['approval_id' => $approval->id, 'action' => $action],
            output: $result,
            succeeded: $ok,
            executedBy: 'system',
            approvedBy: $approval->approved_by,
            correlationId: $case->correlation_id,
            errorMessage: $ok ? null : implode(';', (array) ($result['errors'] ?? [])),
        );
    }
}

