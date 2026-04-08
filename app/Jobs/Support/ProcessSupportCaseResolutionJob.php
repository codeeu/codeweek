<?php

namespace App\Jobs\Support;

use App\Models\Support\SupportCase;
use App\Models\Support\SupportCaseMessage;
use App\Services\Support\Agents\ResolutionAgentService;
use App\Services\Support\SupportActionLogger;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class ProcessSupportCaseResolutionJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public function __construct(public int $supportCaseId)
    {
    }

    public function handle(ResolutionAgentService $resolution, SupportActionLogger $logger): void
    {
        $case = SupportCase::findOrFail($this->supportCaseId);

        $triage = $case->actions()->where('action_name', 'triage')->latest()->first()?->output_json ?? [];
        $diagnostics = $case->actions()->where('action_name', 'diagnostics')->latest()->first()?->output_json ?? [];

        $result = $resolution->resolve($case, (array) $triage, (array) $diagnostics);

        $logger->log(
            case: $case,
            actionName: 'resolution',
            actionType: 'email_draft',
            input: ['support_case_id' => $case->id],
            output: $result,
            succeeded: true,
            executedBy: 'agent',
            correlationId: $case->correlation_id,
        );

        SupportCaseMessage::create([
            'support_case_id' => $case->id,
            'message_type' => 'internal_summary',
            'recipient_email' => null,
            'subject' => null,
            'body' => (string) ($result['internal_summary'] ?? ''),
            'correlation_id' => $case->correlation_id,
        ]);

        SupportCaseMessage::create([
            'support_case_id' => $case->id,
            'message_type' => 'reply_draft',
            'recipient_email' => $case->forwarded_by_email,
            'subject' => $case->subject,
            'body' => (string) ($result['colleague_reply_draft'] ?? ''),
            'correlation_id' => $case->correlation_id,
        ]);

        $case->update(['status' => 'draft_ready']);
    }
}

