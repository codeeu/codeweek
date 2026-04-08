<?php

namespace App\Http\Controllers\Internal\Support;

use App\Jobs\Support\ExecuteApprovedSupportActionJob;
use App\Models\Support\SupportApproval;
use App\Services\Support\SupportActionLogger;
use App\Services\Support\SupportJson;
use Illuminate\Http\Request;

class ApprovalController
{
    public function __construct(private readonly SupportActionLogger $logger)
    {
    }

    public function pending()
    {
        $approvals = SupportApproval::query()
            ->where('status', 'pending')
            ->latest()
            ->limit(200)
            ->get()
            ->toArray();

        return SupportJson::json(SupportJson::ok('approvals_pending', [], [
            'approvals' => $approvals,
        ]));
    }

    public function approve(SupportApproval $approval, Request $request)
    {
        $data = $request->validate([
            'approved_by' => ['nullable', 'string'],
        ]);

        $approval->update([
            'status' => 'approved',
            'approved_by' => $data['approved_by'] ?? 'system',
            'approved_at' => now(),
        ]);

        $case = $approval->supportCase;
        $case->update(['status' => 'investigating']);

        $this->logger->log(
            case: $case,
            actionName: 'approval_approved',
            actionType: 'write',
            input: ['approval_id' => $approval->id],
            output: ['status' => 'approved'],
            succeeded: true,
            executedBy: 'human',
            approvedBy: $approval->approved_by,
            correlationId: $case->correlation_id,
        );

        ExecuteApprovedSupportActionJob::dispatch($approval->id);

        return SupportJson::json(SupportJson::ok('approval_approve', ['approval_id' => $approval->id], [
            'approval' => $approval->fresh()->toArray(),
        ]));
    }

    public function reject(SupportApproval $approval, Request $request)
    {
        $data = $request->validate([
            'rejected_reason' => ['nullable', 'string'],
            'approved_by' => ['nullable', 'string'],
        ]);

        $approval->update([
            'status' => 'rejected',
            'approved_by' => $data['approved_by'] ?? 'system',
            'rejected_reason' => $data['rejected_reason'] ?? null,
        ]);

        $case = $approval->supportCase;
        $case->update(['status' => 'escalated']);

        $this->logger->log(
            case: $case,
            actionName: 'approval_rejected',
            actionType: 'write',
            input: ['approval_id' => $approval->id, 'rejected_reason' => $approval->rejected_reason],
            output: ['status' => 'rejected'],
            succeeded: true,
            executedBy: 'human',
            approvedBy: $approval->approved_by,
            correlationId: $case->correlation_id,
        );

        return SupportJson::json(SupportJson::ok('approval_reject', ['approval_id' => $approval->id], [
            'approval' => $approval->fresh()->toArray(),
        ]));
    }
}

