<?php

namespace Tests\Unit\Support;

use App\Models\Support\SupportCase;
use App\Services\Support\SupportRoleRequestResolver;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

final class SupportRoleRequestResolverTest extends TestCase
{
    use RefreshDatabase;

    public function test_prefers_ai_triage_role_and_case_emails(): void
    {
        config(['support_ai.enabled' => true, 'support_ai.triage.enabled' => true]);

        $case = SupportCase::create([
            'source_channel' => 'gmail',
            'processing_mode' => 'automated',
            'subject' => 'add leading teachers',
            'raw_message' => 'Please grant the role to the people below.',
            'normalized_message' => 'Please grant the role to the people below.',
            'target_email' => 'a@example.com',
            'secondary_emails' => ['b@example.com', 'c@example.com'],
            'case_type' => 'role_add',
            'status' => 'diagnosed',
            'risk_level' => 'low',
            'correlation_id' => 'cid-ai',
        ]);

        $case->actions()->create([
            'action_name' => 'triage',
            'action_type' => 'classification',
            'input_json' => [],
            'output_json' => [
                'case_type' => 'role_add',
                'role_name' => 'leading teacher',
                'role_operation' => 'add',
            ],
            'succeeded' => true,
            'executed_by' => 'agent',
        ]);

        $resolved = app(SupportRoleRequestResolver::class)->resolve($case);

        $this->assertSame('leading teacher', $resolved['role']);
        $this->assertSame('add', $resolved['operation']);
        $this->assertSame(['a@example.com', 'b@example.com', 'c@example.com'], $resolved['emails']);
        $this->assertSame('ai', $resolved['source']['mode']);
        $this->assertSame('ai', $resolved['source']['role']);
        $this->assertSame('ai', $resolved['source']['emails']);
    }

    public function test_uses_deterministic_parser_when_ai_disabled(): void
    {
        config(['support_ai.enabled' => false]);

        $case = SupportCase::create([
            'source_channel' => 'gmail',
            'processing_mode' => 'automated',
            'subject' => 'add leading teachers',
            'raw_message' => "add role: leading teacher\nx@example.com\ny@example.com",
            'normalized_message' => "add role: leading teacher\nx@example.com\ny@example.com",
            'case_type' => 'role_add',
            'status' => 'diagnosed',
            'risk_level' => 'low',
            'correlation_id' => 'cid-fallback',
        ]);

        $resolved = app(SupportRoleRequestResolver::class)->resolve($case);

        $this->assertSame('leading teacher', $resolved['role']);
        $this->assertSame('add', $resolved['operation']);
        $this->assertSame(['x@example.com', 'y@example.com'], $resolved['emails']);
        $this->assertSame('deterministic', $resolved['source']['mode']);
        $this->assertSame('parser', $resolved['source']['role']);
        $this->assertSame('parser', $resolved['source']['emails']);
    }
}
