<?php

namespace App\Console\Commands\Support;

use App\Models\Support\SupportApproval;
use App\Models\Support\SupportCase;
use App\Services\Support\Cursor\CursorAgentService;
use App\Services\Support\Cursor\GitHubPullRequestService;
use App\Services\Support\SupportActionLogger;
use App\Services\Support\SupportApprovalEmailService;
use App\Services\Support\SupportJson;
use Illuminate\Console\Command;

class AiPollAgentsCommand extends Command
{
    protected $signature = 'support:ai:poll-agents {--json}';

    protected $description = 'Poll in-flight Cursor code-change agents, capture PR links, report results, open dev->live PR.';

    public function handle(
        CursorAgentService $cursorAgent,
        GitHubPullRequestService $github,
        SupportApprovalEmailService $approvalEmail,
        SupportActionLogger $logger,
    ): int {
        if (!$cursorAgent->enabled()) {
            $this->maybeJson(['ok' => true, 'skipped' => 'code_change_disabled']);

            return self::SUCCESS;
        }

        $cases = SupportCase::query()
            ->where('status', 'action_executed')
            ->whereNotNull('cursor_agent_id')
            ->where('case_type', 'code_change')
            ->limit(25)
            ->get();

        $checked = 0;
        $finished = 0;

        foreach ($cases as $case) {
            $checked++;
            $status = $cursorAgent->getAgent((string) $case->cursor_agent_id);
            $inner = is_array($status['result'] ?? null) ? $status['result'] : [];

            if (!($status['ok'] ?? false)) {
                if ($this->timedOut($case)) {
                    $this->closeOut($case, $approvalEmail, $logger, false, ['errors' => ['agent_poll_timeout']]);
                    $finished++;
                }
                continue;
            }

            $agentStatus = $inner['status'] ?? null;
            $prUrl = $inner['pr_url'] ?? $case->cursor_pr_url;

            $case->update([
                'cursor_agent_status' => $agentStatus,
                'cursor_pr_url' => $prUrl,
            ]);

            if (!$cursorAgent->isFinished($agentStatus)) {
                if ($this->timedOut($case)) {
                    $this->closeOut($case, $approvalEmail, $logger, false, ['errors' => ['agent_poll_timeout'], 'result' => $inner]);
                    $finished++;
                }
                continue;
            }

            $succeeded = $cursorAgent->isSuccessful($agentStatus);
            $resultInner = $inner;

            if ($succeeded && $prUrl && (string) config('support_ai.live_promotion', 'pr_only') === 'pr_only') {
                $promotion = $github->openDevToLivePr(
                    title: 'Promote dev → '.config('support_ai.live_branch', 'master').' (support copilot)',
                    body: "Automated release PR opened by the support copilot.\n\nIncludes the fix from case #{$case->id} once merged into dev.\nA developer must review and merge to deploy.",
                );
                if (($promotion['ok'] ?? false)) {
                    $promoUrl = $promotion['result']['pr_url'] ?? null;
                    $case->update(['live_promotion_pr_url' => $promoUrl]);
                    $resultInner['promotion_pr_url'] = $promoUrl;
                }
            }

            $this->closeOut($case, $approvalEmail, $logger, $succeeded, [
                'ok' => $succeeded,
                'result' => $resultInner,
                'errors' => $succeeded ? [] : ['agent_failed'],
            ]);
            $finished++;
        }

        $this->maybeJson(['ok' => true, 'checked' => $checked, 'finished' => $finished]);

        return self::SUCCESS;
    }

    private function timedOut(SupportCase $case): bool
    {
        $maxMinutes = (int) config('support_ai.code_change.max_poll_minutes', 30);

        return $case->updated_at !== null && $case->updated_at->diffInMinutes(now()) > $maxMinutes;
    }

    /**
     * @param array<string, mixed> $result
     */
    private function closeOut(
        SupportCase $case,
        SupportApprovalEmailService $approvalEmail,
        SupportActionLogger $logger,
        bool $succeeded,
        array $result,
    ): void {
        $case->update(['status' => $succeeded ? 'verified' : 'escalated']);

        $approval = SupportApproval::query()
            ->where('support_case_id', $case->id)
            ->where('requested_action', 'code_change')
            ->where('status', 'approved')
            ->latest('id')
            ->first();

        $envelope = SupportJson::ok('code_change', ['case_id' => $case->id], (array) ($result['result'] ?? []));
        if (!$succeeded) {
            $envelope = SupportJson::fail('code_change', ['case_id' => $case->id], (array) ($result['errors'] ?? ['agent_failed']));
            $envelope['result'] = (array) ($result['result'] ?? []);
        }

        $logger->log(
            case: $case,
            actionName: 'code_change_completed',
            actionType: 'write',
            input: ['case_id' => $case->id, 'agent_id' => $case->cursor_agent_id],
            output: $envelope,
            succeeded: $succeeded,
            executedBy: 'system',
            correlationId: $case->correlation_id,
            errorMessage: $succeeded ? null : implode(';', (array) ($result['errors'] ?? [])),
        );

        if ($approval !== null) {
            try {
                $approvalEmail->sendActionCompletion($case, $approval, 'code_change', $envelope, $succeeded);
            } catch (\Throwable $e) {
                $logger->log(
                    case: $case,
                    actionName: 'support_completion_email',
                    actionType: 'notify',
                    input: ['case_id' => $case->id],
                    output: ['ok' => false, 'error' => $e->getMessage()],
                    succeeded: false,
                    executedBy: 'system',
                    correlationId: $case->correlation_id,
                    errorMessage: $e->getMessage(),
                );
            }
        }
    }

    /**
     * @param array<string, mixed> $payload
     */
    private function maybeJson(array $payload): void
    {
        if ($this->option('json')) {
            $this->line(json_encode($payload, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES));
        }
    }
}
