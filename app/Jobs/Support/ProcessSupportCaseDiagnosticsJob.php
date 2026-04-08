<?php

namespace App\Jobs\Support;

use App\Models\Support\SupportCase;
use App\Models\Support\SupportCaseMessage;
use App\Services\Support\Agents\DiagnosticsAgentService;
use App\Services\Support\SupportActionLogger;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class ProcessSupportCaseDiagnosticsJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public function __construct(public int $supportCaseId)
    {
    }

    public function handle(DiagnosticsAgentService $diagnostics, SupportActionLogger $logger): void
    {
        $case = SupportCase::findOrFail($this->supportCaseId);
        $case->update(['status' => 'investigating']);

        $result = $diagnostics->diagnose($case);

        $logger->log(
            case: $case,
            actionName: 'diagnostics',
            actionType: 'read',
            input: ['support_case_id' => $case->id],
            output: $result,
            succeeded: true,
            executedBy: 'agent',
            correlationId: $case->correlation_id,
        );

        // Persist diagnostics snapshot as a message for UI/debugging (stable storage for later external orchestrator).
        SupportCaseMessage::create([
            'support_case_id' => $case->id,
            'message_type' => 'diagnostics_result',
            'recipient_email' => null,
            'subject' => null,
            'body' => json_encode($result, JSON_UNESCAPED_SLASHES),
            'correlation_id' => $case->correlation_id,
        ]);

        ProcessSupportCaseResolutionJob::dispatch($case->id);
    }
}

