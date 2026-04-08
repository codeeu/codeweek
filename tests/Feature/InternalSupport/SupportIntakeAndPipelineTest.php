<?php

namespace Tests\Feature\InternalSupport;

use App\Models\Support\SupportCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class SupportIntakeAndPipelineTest extends TestCase
{
    use RefreshDatabase;

    public function test_intake_creates_case_and_runs_pipeline_sync(): void
    {
        putenv('SUPPORT_SERVICE_TOKEN=test-token');

        $res = $this->withHeaders([
            'X-Support-Service-Token' => 'test-token',
        ])->postJson('/api/internal/support/cases/intake', [
            'subject' => 'Account missing',
            'raw_message' => 'User says their account is missing and might be deleted. user@example.com',
            'source_channel' => 'gmail_forwarded',
            'processing_mode' => 'forwarded',
            'gmail_message_id' => 'mid-1',
            'gmail_thread_id' => 'tid-1',
            'forwarded_by_email' => 's@example.com',
        ]);

        $res->assertOk();
        $caseId = $res->json('result.support_case_id');
        $this->assertNotNull($caseId);

        $case = SupportCase::findOrFail($caseId);
        $this->assertSame('draft_ready', $case->status);
        $this->assertSame('account_restore', $case->case_type);
        $this->assertSame('user@example.com', $case->target_email);

        $this->assertDatabaseHas('support_case_actions', [
            'support_case_id' => $case->id,
            'action_name' => 'triage',
        ]);

        $this->assertDatabaseHas('support_case_messages', [
            'support_case_id' => $case->id,
            'message_type' => 'reply_draft',
        ]);
    }
}

