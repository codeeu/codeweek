<?php

namespace App\Services\Support\Cursor;

use App\Services\Support\SupportJson;
use Illuminate\Http\Client\PendingRequest;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

/**
 * Thin client for the Cursor Cloud Agents API (https://api.cursor.com).
 *
 * A cloud agent works on a connected GitHub repo, pushes to a `cursor/...`
 * branch off `startingRef`, and (optionally) opens a pull request when done.
 * We use it to land frontend fixes as PRs into the dev branch.
 */
class CursorAgentService
{
    public function enabled(): bool
    {
        return (bool) config('support_ai.enabled')
            && (bool) config('support_ai.code_change.enabled')
            && $this->apiKey() !== '';
    }

    /**
     * Launch a cloud agent to make a code change and open a PR into the dev branch.
     *
     * @return array<string, mixed> SupportJson envelope; result holds agent_id/status/pr_url when available.
     */
    public function launchCodeAgent(string $prompt, ?string $startingRef = null, ?bool $autoCreatePR = null): array
    {
        $input = ['starting_ref' => $startingRef ?? $this->devBranch()];

        if (!$this->enabled()) {
            return SupportJson::fail('cursor_launch_agent', $input, 'cursor_code_change_disabled');
        }

        $prompt = trim($prompt);
        if ($prompt === '') {
            return SupportJson::fail('cursor_launch_agent', $input, 'empty_prompt');
        }

        $body = [
            'prompt' => ['text' => $prompt],
            'model' => ['id' => (string) config('support_ai.code_change.model', 'composer-2')],
            'repos' => [[
                'url' => (string) config('support_ai.code_change.repo_url'),
                'startingRef' => $startingRef ?? $this->devBranch(),
            ]],
            'autoCreatePR' => $autoCreatePR ?? (bool) config('support_ai.code_change.auto_create_pr', true),
        ];

        try {
            $response = $this->client()->post('/v1/agents', $body);
        } catch (\Throwable $e) {
            Log::warning('Cursor launchCodeAgent request failed', ['error' => $e->getMessage()]);

            return SupportJson::fail('cursor_launch_agent', $input, 'request_failed: '.$e->getMessage());
        }

        if (!$response->successful()) {
            return SupportJson::fail('cursor_launch_agent', $input, 'http_'.$response->status().': '.$response->body());
        }

        $data = (array) $response->json();
        $agentId = $this->extractAgentId($data);

        if ($agentId === null) {
            return SupportJson::fail('cursor_launch_agent', $input, 'no_agent_id_in_response');
        }

        return SupportJson::ok('cursor_launch_agent', $input, [
            'agent_id' => $agentId,
            'status' => $this->extractStatus($data),
            'pr_url' => $this->extractPrUrl($data),
            'raw' => $data,
        ]);
    }

    /**
     * List cloud model IDs available to the API key (used by setup-check).
     *
     * @return array<string, mixed> SupportJson envelope; result.models is a list of ids.
     */
    public function listModels(): array
    {
        if ($this->apiKey() === '') {
            return SupportJson::fail('cursor_list_models', [], 'cursor_api_key_missing');
        }

        try {
            $response = $this->client()->get('/v1/models');
        } catch (\Throwable $e) {
            return SupportJson::fail('cursor_list_models', [], 'request_failed: '.$e->getMessage());
        }

        if (!$response->successful()) {
            return SupportJson::fail('cursor_list_models', [], 'http_'.$response->status());
        }

        $ids = [];
        foreach ((array) $response->json('items', []) as $item) {
            if (is_array($item) && isset($item['id']) && is_string($item['id'])) {
                $ids[] = $item['id'];
            }
        }

        return SupportJson::ok('cursor_list_models', [], ['models' => $ids]);
    }

    /**
     * Fetch the current status (and PR URL when finished) for an agent.
     *
     * @return array<string, mixed> SupportJson envelope.
     */
    public function getAgent(string $agentId): array
    {
        $input = ['agent_id' => $agentId];

        if ($this->apiKey() === '') {
            return SupportJson::fail('cursor_get_agent', $input, 'cursor_api_key_missing');
        }

        try {
            $response = $this->client()->get('/v1/agents/'.rawurlencode($agentId));
        } catch (\Throwable $e) {
            return SupportJson::fail('cursor_get_agent', $input, 'request_failed: '.$e->getMessage());
        }

        if (!$response->successful()) {
            return SupportJson::fail('cursor_get_agent', $input, 'http_'.$response->status().': '.$response->body());
        }

        $data = (array) $response->json();

        return SupportJson::ok('cursor_get_agent', $input, [
            'agent_id' => $this->extractAgentId($data) ?? $agentId,
            'status' => $this->extractStatus($data),
            'pr_url' => $this->extractPrUrl($data),
            'finished' => $this->isFinished($this->extractStatus($data)),
            'raw' => $data,
        ]);
    }

    public function isFinished(?string $status): bool
    {
        $status = strtoupper((string) $status);

        return in_array($status, ['FINISHED', 'COMPLETED', 'SUCCEEDED', 'DONE', 'FAILED', 'ERROR', 'CANCELLED', 'EXPIRED'], true);
    }

    public function isSuccessful(?string $status): bool
    {
        return in_array(strtoupper((string) $status), ['FINISHED', 'COMPLETED', 'SUCCEEDED', 'DONE'], true);
    }

    public function devBranch(): string
    {
        return (string) config('support_ai.code_change.dev_branch', 'dev');
    }

    private function client(): PendingRequest
    {
        $timeout = (int) config('support_ai.code_change.request_timeout_seconds', 30);

        return Http::baseUrl(rtrim((string) config('support_ai.code_change.api_base', 'https://api.cursor.com'), '/'))
            ->withBasicAuth($this->apiKey(), '')
            ->acceptJson()
            ->asJson()
            ->timeout(max(5, $timeout));
    }

    private function apiKey(): string
    {
        return trim((string) config('support_ai.cursor_api_key', ''));
    }

    /**
     * @param  array<string, mixed>  $data
     */
    private function extractAgentId(array $data): ?string
    {
        foreach ([$data['id'] ?? null, $data['agent']['id'] ?? null, $data['agentId'] ?? null] as $candidate) {
            if (is_string($candidate) && $candidate !== '') {
                return $candidate;
            }
        }

        return null;
    }

    /**
     * @param  array<string, mixed>  $data
     */
    private function extractStatus(array $data): ?string
    {
        foreach ([$data['status'] ?? null, $data['agent']['status'] ?? null, $data['run']['status'] ?? null] as $candidate) {
            if (is_string($candidate) && $candidate !== '') {
                return $candidate;
            }
        }

        return null;
    }

    /**
     * @param  array<string, mixed>  $data
     */
    private function extractPrUrl(array $data): ?string
    {
        $candidates = [
            $data['prUrl'] ?? null,
            $data['pullRequest']['url'] ?? null,
            $data['target']['prUrl'] ?? null,
            $data['target']['pullRequestUrl'] ?? null,
            $data['git']['prUrl'] ?? null,
            $data['agent']['prUrl'] ?? null,
            $data['agent']['target']['prUrl'] ?? null,
        ];

        foreach ($candidates as $candidate) {
            if (is_string($candidate) && str_contains($candidate, '://')) {
                return $candidate;
            }
        }

        return null;
    }
}
