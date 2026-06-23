<?php

namespace Tests\Unit\Support;

use App\Services\Support\Cursor\CursorAgentService;
use Illuminate\Support\Facades\Http;
use Tests\TestCase;

final class CursorAgentServiceTest extends TestCase
{
    protected function setUp(): void
    {
        parent::setUp();

        config()->set('support_ai.enabled', true);
        config()->set('support_ai.code_change.enabled', true);
        config()->set('support_ai.cursor_api_key', 'test-key');
        config()->set('support_ai.code_change.api_base', 'https://api.cursor.com');
        config()->set('support_ai.code_change.repo_url', 'https://github.com/codeeu/codeweek');
        config()->set('support_ai.code_change.dev_branch', 'dev');
        config()->set('support_ai.code_change.model', 'composer-2');
    }

    public function test_launch_code_agent_posts_and_parses_agent_id(): void
    {
        Http::fake([
            'api.cursor.com/v1/agents' => Http::response([
                'id' => 'bc_abc123',
                'status' => 'RUNNING',
            ], 200),
        ]);

        $result = app(CursorAgentService::class)->launchCodeAgent('Fix the footer link', 'dev');

        $this->assertTrue($result['ok']);
        $this->assertSame('bc_abc123', $result['result']['agent_id']);

        Http::assertSent(function ($request) {
            $body = $request->data();

            return $request->url() === 'https://api.cursor.com/v1/agents'
                && $body['prompt']['text'] === 'Fix the footer link'
                && $body['repos'][0]['startingRef'] === 'dev'
                && $body['autoCreatePR'] === true;
        });
    }

    public function test_launch_is_disabled_when_flag_off(): void
    {
        config()->set('support_ai.code_change.enabled', false);

        $result = app(CursorAgentService::class)->launchCodeAgent('whatever', 'dev');

        $this->assertFalse($result['ok']);
        $this->assertContains('cursor_code_change_disabled', $result['errors']);
    }

    public function test_get_agent_extracts_pr_url_and_finished_state(): void
    {
        Http::fake([
            'api.cursor.com/v1/agents/bc_abc123' => Http::response([
                'id' => 'bc_abc123',
                'status' => 'FINISHED',
                'target' => ['prUrl' => 'https://github.com/codeeu/codeweek/pull/42'],
            ], 200),
        ]);

        $result = app(CursorAgentService::class)->getAgent('bc_abc123');

        $this->assertTrue($result['ok']);
        $this->assertTrue($result['result']['finished']);
        $this->assertSame('https://github.com/codeeu/codeweek/pull/42', $result['result']['pr_url']);
    }
}
