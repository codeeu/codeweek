<?php

namespace App\Http\Controllers\Internal\Support;

use App\Jobs\Support\ProcessSupportCaseTriageJob;
use App\Models\Support\SupportCase;
use App\Services\Support\CaseIntakeService;
use App\Services\Support\SupportActionLogger;
use App\Services\Support\SupportJson;
use Illuminate\Http\Request;

class IntakeController
{
    public function __construct(
        private readonly CaseIntakeService $intake,
        private readonly SupportActionLogger $logger,
    ) {
    }

    public function intake(Request $request)
    {
        $data = $request->validate([
            'subject' => ['nullable', 'string'],
            'raw_message' => ['required', 'string'],
            'source_channel' => ['nullable', 'string'],
            'processing_mode' => ['nullable', 'string'],
            'gmail_message_id' => ['nullable', 'string'],
            'gmail_thread_id' => ['nullable', 'string'],
            'forwarded_by_email' => ['nullable', 'string'],
            'original_sender_email' => ['nullable', 'string'],
            'assigned_to_email' => ['nullable', 'string'],
            'correlation_id' => ['nullable', 'string'],
        ]);

        $case = $this->intake->intake($data);

        $this->logger->log(
            case: $case,
            actionName: 'intake',
            actionType: 'read',
            input: $data,
            output: ['support_case_id' => $case->id],
            succeeded: true,
            executedBy: 'system',
            correlationId: $case->correlation_id,
        );

        ProcessSupportCaseTriageJob::dispatch($case->id);

        return SupportJson::json(SupportJson::ok('case_intake', ['support_case_id' => $case->id], [
            'support_case_id' => $case->id,
            'status' => $case->status,
            'correlation_id' => $case->correlation_id,
        ]));
    }
}

