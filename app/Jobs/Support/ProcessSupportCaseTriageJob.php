<?php

namespace App\Jobs\Support;

use App\Models\Support\SupportCase;
use App\Services\Support\Agents\TriageAgentService;
use App\Services\Support\SupportActionLogger;
use App\Services\Support\SupportJson;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class ProcessSupportCaseTriageJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public function __construct(public int $supportCaseId)
    {
    }

    public function handle(TriageAgentService $triage, SupportActionLogger $logger): void
    {
        $case = SupportCase::findOrFail($this->supportCaseId);
        $case->update([
            'status' => 'triaged',
            'correlation_id' => SupportJson::correlationId($case->correlation_id),
        ]);

        $result = $triage->triage($case);

        $case->update([
            'case_type' => $result['case_type'] ?? null,
            'confidence' => $result['confidence'] ?? null,
            'risk_level' => $result['risk_level'] ?? 'low',
            'assigned_runbook' => $result['recommended_runbook'] ?? null,
            'target_email' => $result['target_email'] ?? null,
            'secondary_emails' => $result['secondary_emails'] ?? null,
            'needs_human_review' => (bool) ($result['needs_human_review'] ?? false),
        ]);

        $logger->log(
            case: $case,
            actionName: 'triage',
            actionType: 'classification',
            input: ['support_case_id' => $case->id],
            output: $result,
            succeeded: true,
            executedBy: 'agent',
            correlationId: $case->correlation_id,
        );

        ProcessSupportCaseDiagnosticsJob::dispatch($case->id);
    }
}

