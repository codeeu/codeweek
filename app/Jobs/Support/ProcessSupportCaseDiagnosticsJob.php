<?php

namespace App\Jobs\Support;

use App\Models\Support\SupportCase;
use App\Models\Support\SupportCaseMessage;
use App\Services\Support\Agents\DiagnosticsAgentService;
use App\Services\Support\Artisan\ArtisanCommandRunner;
use App\Services\Support\Content\ContentUpdateService;
use App\Services\Support\SupportActionLogger;
use App\Services\Support\SupportJson;
use App\Services\Support\UserProfileUpdateService;
use App\Services\Support\UserRestoreService;
use App\Services\Support\UserRoleAddService;
use App\Services\Support\UserEmailUpdateService;
use App\Services\Support\UserRoleRemoveService;
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
        UserRoleAddService $userRoleAdd,
        UserRoleRemoveService $userRoleRemove,
        UserEmailUpdateService $userEmailUpdate,
        ArtisanCommandRunner $artisanRunner,
        ContentUpdateService $contentUpdate,
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

        if ($case->case_type === 'email_change') {
            $dryRunResult = $userEmailUpdate->updateFromCase($case, dryRun: true);
            $logger->log(
                case: $case,
                actionName: 'user_email_update',
                actionType: 'write',
                input: ['dry_run' => true],
                output: $dryRunResult,
                succeeded: (bool) ($dryRunResult['ok'] ?? false),
                executedBy: 'agent',
                correlationId: $case->correlation_id,
            );
        }

        if ($case->case_type === 'role_remove') {
            $dryRunResult = $userRoleRemove->removeFromCase($case, dryRun: true);
            $logger->log(
                case: $case,
                actionName: 'user_role_remove',
                actionType: 'write',
                input: ['dry_run' => true],
                output: $dryRunResult,
                succeeded: (bool) ($dryRunResult['ok'] ?? false),
                executedBy: 'agent',
                correlationId: $case->correlation_id,
            );
        }

        if ($case->case_type === 'role_add') {
            $dryRunResult = $userRoleAdd->addFromCase($case, dryRun: true);
            $logger->log(
                case: $case,
                actionName: 'user_role_add',
                actionType: 'write',
                input: ['dry_run' => true],
                output: $dryRunResult,
                succeeded: (bool) ($dryRunResult['ok'] ?? false),
                executedBy: 'agent',
                correlationId: $case->correlation_id,
            );
        }

        if ($case->case_type === 'code_change') {
            $plan = $this->codeChangePlan($case);
            $logger->log(
                case: $case,
                actionName: 'code_change',
                actionType: 'write',
                input: ['dry_run' => true],
                output: $plan,
                succeeded: (bool) ($plan['ok'] ?? false),
                executedBy: 'agent',
                correlationId: $case->correlation_id,
            );
        }

        if ($case->case_type === 'artisan_command') {
            $triage = (array) ($case->actions()->where('action_name', 'triage')->latest()->first()?->output_json ?? []);
            $plan = $artisanRunner->planFromTriage($triage);
            $dryRun = ($plan['ok'] ?? false)
                ? $artisanRunner->dryRun((array) $plan['result'])
                : $plan;

            $logger->log(
                case: $case,
                actionName: 'artisan_command',
                actionType: 'write',
                input: ['dry_run' => true],
                output: ['plan' => $plan, 'dry_run' => $dryRun],
                succeeded: (bool) ($dryRun['ok'] ?? false) && (bool) ($plan['ok'] ?? false),
                executedBy: 'agent',
                correlationId: $case->correlation_id,
            );
        }

        if ($case->case_type === 'content_update') {
            $triage = (array) ($case->actions()->where('action_name', 'triage')->latest()->first()?->output_json ?? []);
            $plan = $contentUpdate->planFromTriage($triage);
            $logger->log(
                case: $case,
                actionName: 'content_update',
                actionType: 'write',
                input: ['dry_run' => true],
                output: $plan,
                succeeded: (bool) ($plan['ok'] ?? false),
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

    /**
     * Build the (read-only) plan for a code_change case from the triage output.
     * No code is touched here — this is the exact instruction we will hand the
     * Cursor cloud agent only after a human approves.
     *
     * @return array<string, mixed>
     */
    private function codeChangePlan(SupportCase $case): array
    {
        $triage = (array) ($case->actions()->where('action_name', 'triage')->latest()->first()?->output_json ?? []);

        $cursorPrompt = is_string($triage['cursor_prompt'] ?? null) ? trim($triage['cursor_prompt']) : '';
        $changeSummary = is_string($triage['change_summary'] ?? null) ? trim($triage['change_summary']) : '';
        $devBranch = (string) config('support_ai.code_change.dev_branch', 'dev');

        if ($cursorPrompt === '') {
            return SupportJson::fail('code_change', ['case_id' => $case->id], 'no_cursor_prompt_from_triage');
        }

        return SupportJson::ok('code_change', ['case_id' => $case->id], [
            'change_summary' => $changeSummary,
            'change_area' => $triage['change_area'] ?? null,
            'cursor_prompt' => $cursorPrompt,
            'starting_ref' => $devBranch,
            'pr_target_branch' => $devBranch,
            'note' => 'A Cursor cloud agent will implement this on a new branch and open a PR into '.$devBranch.'. Nothing deploys automatically.',
        ]);
    }
}

