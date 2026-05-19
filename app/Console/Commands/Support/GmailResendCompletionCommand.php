<?php

namespace App\Console\Commands\Support;

use App\Models\Support\SupportApproval;
use App\Models\Support\SupportCase;
use App\Services\Support\SupportApprovalEmailService;
use Illuminate\Console\Command;

class GmailResendCompletionCommand extends Command
{
    protected $signature = 'support:gmail:resend-completion {case_id : Support case id}';

    protected $description = 'Resend the action completed/failed email for a support case (after APPROVE).';

    public function handle(SupportApprovalEmailService $approvalEmail): int
    {
        $case = SupportCase::findOrFail((int) $this->argument('case_id'));
        $approval = SupportApproval::query()
            ->where('support_case_id', $case->id)
            ->where('status', 'approved')
            ->latest('id')
            ->first();

        if (!$approval) {
            $this->error('No approved approval record for case #'.$case->id);

            return self::FAILURE;
        }

        $executed = $case->actions()->where('action_name', 'approved_action_executed')->latest()->first();
        $output = is_array($executed?->output_json) ? $executed->output_json : [];
        $succeeded = (bool) ($output['ok'] ?? false) || $case->status === 'verified';

        $payload = $approvalEmail->sendActionCompletion(
            $case,
            $approval,
            (string) $approval->requested_action,
            $output,
            $succeeded,
        );

        $this->line(json_encode($payload, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES));

        return ($payload['ok'] ?? false) ? self::SUCCESS : self::FAILURE;
    }
}
