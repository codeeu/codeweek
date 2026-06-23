<?php

namespace App\Console\Commands\Support;

use App\Services\Support\Cursor\GitHubPullRequestService;
use Illuminate\Console\Command;

class AiPromoteDevToLiveCommand extends Command
{
    protected $signature = 'support:ai:promote-dev-to-live {--json}';

    protected $description = 'Open (or reuse) a dev -> live release PR for a human to review and merge. Never merges.';

    public function handle(GitHubPullRequestService $github): int
    {
        $live = (string) config('support_ai.live_branch', 'master');

        $payload = $github->openDevToLivePr(
            title: 'Promote dev → '.$live.' (support copilot)',
            body: "Release PR opened by the support copilot.\n\nReview the accumulated changes on dev and merge to deploy to live.\nNothing is merged automatically.",
        );

        $this->line(json_encode($payload, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES));

        return ($payload['ok'] ?? false) ? self::SUCCESS : self::FAILURE;
    }
}
