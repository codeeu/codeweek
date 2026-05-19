<?php

namespace App\Jobs\Support;

use App\Models\Support\SupportCase;
use App\Models\Support\SupportCaseMessage;
use App\Services\Support\Agents\DiagnosticsAgentService;
use App\Services\Support\SupportActionLogger;
use App\Services\Support\UserProfileUpdateService;
use App\Services\Support\UserRestoreService;
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

    public function handle(
        DiagnosticsAgentService $diagnostics,
        SupportActionLogger $logger,
        UserRestoreService $userRestore,
        UserProfileUpdateService $userProfileUpdate,
    ): void {
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

        if ($case->case_type === 'account_restore' && $case->target_email) {
            $dryRunResult = $userRestore->restore($case, (string) $case->target_email, dryRun: true);
            $logger->log(
                case: $case,
                actionName: 'user_restore',
                actionType: 'write',
                input: ['email' => $case->target_email, 'dry_run' => true],
                output: $dryRunResult,
                succeeded: (bool) ($dryRunResult['ok'] ?? false),
                executedBy: 'agent',
                correlationId: $case->correlation_id,
            );
        }

        if ($case->case_type === 'profile_update' && $case->target_email) {
            $dryRunResult = $userProfileUpdate->updateFromCase($case, dryRun: true);
            $logger->log(
                case: $case,
                actionName: 'user_profile_update',
                actionType: 'write',
                input: ['email' => $case->target_email, 'dry_run' => true],
                output: $dryRunResult,
                succeeded: (bool) ($dryRunResult['ok'] ?? false),
                executedBy: 'agent',
                correlationId: $case->correlation_id,
            );
        }

        // Persist diagnostics snapshot as a message for UI/debugging (stable storage for later external orchestrator).
        SupportCaseMessage::create([
            'support_case_id' => $case->id,
            'message_type' => 'diagnostics_result',
            'recipient_email' => null,
            'subject' => null,
            'body' => json_encode($result, JSON_UNESCAPED_SLASHES),
            'correlation_id' => $case->correlation_id,
        ]);

        ProcessSupportCaseResolutionJob::dispatchSync($case->id);
    }
}

