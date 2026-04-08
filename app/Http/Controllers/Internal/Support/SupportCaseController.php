<?php

namespace App\Http\Controllers\Internal\Support;

use App\Models\Support\SupportCase;
use App\Services\Support\SupportActionLogger;
use App\Services\Support\SupportJson;
use Illuminate\Http\Request;

class SupportCaseController
{
    public function __construct(private readonly SupportActionLogger $logger)
    {
    }

    public function context(SupportCase $case)
    {
        $payload = SupportJson::ok('case_context', ['support_case_id' => $case->id], [
            'case' => $case->toArray(),
            'latest_actions' => $case->actions()->latest()->limit(50)->get()->toArray(),
            'latest_messages' => $case->messages()->latest()->limit(50)->get()->toArray(),
            'pending_approvals' => $case->approvals()->where('status', 'pending')->latest()->get()->toArray(),
        ]);

        return SupportJson::json($payload);
    }

    public function storeTriageResult(Request $request, SupportCase $case)
    {
        $data = $request->validate([
            'triage' => ['required', 'array'],
        ]);

        $triage = $data['triage'];

        $case->update([
            'case_type' => $triage['case_type'] ?? $case->case_type,
            'confidence' => $triage['confidence'] ?? $case->confidence,
            'risk_level' => $triage['risk_level'] ?? $case->risk_level,
            'assigned_runbook' => $triage['recommended_runbook'] ?? $case->assigned_runbook,
            'target_email' => $triage['target_email'] ?? $case->target_email,
            'secondary_emails' => $triage['secondary_emails'] ?? $case->secondary_emails,
            'needs_human_review' => (bool) ($triage['needs_human_review'] ?? $case->needs_human_review),
        ]);

        $this->logger->log(
            case: $case,
            actionName: 'store_triage_result',
            actionType: 'classification',
            input: $data,
            output: $triage,
            succeeded: true,
            executedBy: 'system',
            correlationId: $case->correlation_id,
        );

        return SupportJson::json(SupportJson::ok('store_triage_result', ['support_case_id' => $case->id], [
            'support_case_id' => $case->id,
            'case_type' => $case->case_type,
            'risk_level' => $case->risk_level,
        ]));
    }

    public function storeDiagnosticsResult(Request $request, SupportCase $case)
    {
        $data = $request->validate([
            'diagnostics' => ['required', 'array'],
        ]);

        $diagnostics = $data['diagnostics'];

        $this->logger->log(
            case: $case,
            actionName: 'store_diagnostics_result',
            actionType: 'read',
            input: $data,
            output: $diagnostics,
            succeeded: true,
            executedBy: 'system',
            correlationId: $case->correlation_id,
        );

        return SupportJson::json(SupportJson::ok('store_diagnostics_result', ['support_case_id' => $case->id], [
            'support_case_id' => $case->id,
        ]));
    }

    public function storeResolutionOutputs(Request $request, SupportCase $case)
    {
        $data = $request->validate([
            'resolution' => ['required', 'array'],
        ]);

        $resolution = $data['resolution'];

        $this->logger->log(
            case: $case,
            actionName: 'store_resolution_outputs',
            actionType: 'email_draft',
            input: $data,
            output: $resolution,
            succeeded: true,
            executedBy: 'system',
            correlationId: $case->correlation_id,
        );

        return SupportJson::json(SupportJson::ok('store_resolution_outputs', ['support_case_id' => $case->id], [
            'support_case_id' => $case->id,
        ]));
    }

    public function updateStatus(Request $request, SupportCase $case)
    {
        $data = $request->validate([
            'status' => ['required', 'string'],
        ]);

        $case->update(['status' => $data['status']]);

        $this->logger->log(
            case: $case,
            actionName: 'update_status',
            actionType: 'write',
            input: $data,
            output: ['status' => $case->status],
            succeeded: true,
            executedBy: 'system',
            correlationId: $case->correlation_id,
        );

        return SupportJson::json(SupportJson::ok('case_update_status', ['support_case_id' => $case->id], [
            'support_case_id' => $case->id,
            'status' => $case->status,
        ]));
    }
}

