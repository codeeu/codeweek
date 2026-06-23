<?php

namespace App\Services\Support\Cursor;

use App\Services\Support\SupportJson;
use Illuminate\Http\Client\PendingRequest;
use Illuminate\Support\Facades\Http;

/**
 * Opens a dev -> live promotion pull request via the GitHub REST API.
 *
 * This NEVER merges. It only opens (or reuses) a PR from the dev branch into
 * the live branch so a human can review and merge, which triggers the Forge
 * auto-deploy. Token-gated: degrades to a no-op when no token is configured.
 */
class GitHubPullRequestService
{
    public function enabled(): bool
    {
        return $this->token() !== '' && $this->repo() !== '';
    }

    /**
     * Open (or reuse) a PR from dev into live.
     *
     * @return array<string, mixed> SupportJson envelope.
     */
    public function openDevToLivePr(string $title, string $body): array
    {
        $dev = (string) config('support_ai.code_change.dev_branch', 'dev');
        $live = (string) config('support_ai.live_branch', 'master');
        $input = ['head' => $dev, 'base' => $live, 'repo' => $this->repo()];

        if ((string) config('support_ai.live_promotion', 'pr_only') !== 'pr_only') {
            return SupportJson::fail('github_open_pr', $input, 'live_promotion_disabled');
        }

        if (!$this->enabled()) {
            return SupportJson::fail('github_open_pr', $input, 'github_token_or_repo_missing');
        }

        $existing = $this->findOpenPr($dev, $live);
        if ($existing !== null) {
            return SupportJson::ok('github_open_pr', $input, ['pr_url' => $existing, 'reused' => true]);
        }

        try {
            $response = $this->client()->post('/repos/'.$this->repo().'/pulls', [
                'title' => $title,
                'head' => $dev,
                'base' => $live,
                'body' => $body,
            ]);
        } catch (\Throwable $e) {
            return SupportJson::fail('github_open_pr', $input, 'request_failed: '.$e->getMessage());
        }

        if (!$response->successful()) {
            return SupportJson::fail('github_open_pr', $input, 'http_'.$response->status().': '.$response->body());
        }

        $url = (string) ($response->json('html_url') ?? '');

        return SupportJson::ok('github_open_pr', $input, ['pr_url' => $url, 'reused' => false]);
    }

    private function findOpenPr(string $head, string $base): ?string
    {
        $owner = explode('/', $this->repo())[0] ?? '';

        try {
            $response = $this->client()->get('/repos/'.$this->repo().'/pulls', [
                'state' => 'open',
                'base' => $base,
                'head' => $owner.':'.$head,
            ]);
        } catch (\Throwable) {
            return null;
        }

        if (!$response->successful()) {
            return null;
        }

        $first = $response->json('0');

        return is_array($first) ? ($first['html_url'] ?? null) : null;
    }

    private function client(): PendingRequest
    {
        return Http::baseUrl('https://api.github.com')
            ->withToken($this->token())
            ->withHeaders([
                'Accept' => 'application/vnd.github+json',
                'X-GitHub-Api-Version' => '2022-11-28',
            ])
            ->timeout(30);
    }

    private function token(): string
    {
        return trim((string) config('support_ai.github_token', ''));
    }

    private function repo(): string
    {
        return trim((string) config('support_ai.github_repo', ''));
    }
}
