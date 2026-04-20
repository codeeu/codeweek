<?php

namespace App\Console\Commands;

use App\MatchmakingProfile;
use App\Services\Matchmaking\ProfileAvatarResolver;
use Illuminate\Console\Command;

class MatchmakingSyncAvatars extends Command
{
    protected $signature = 'matchmaking:sync-avatars {--dry-run : Preview changes without saving}';

    protected $description = 'Sync matchmaking profile avatars from public image folders by matching filenames to profile names/slugs';

    public function handle(ProfileAvatarResolver $resolver): int
    {
        $dryRun = (bool) $this->option('dry-run');
        $profiles = MatchmakingProfile::query()->get();

        $updates = 0;
        $skipped = 0;
        $missing = 0;

        foreach ($profiles as $profile) {
            $resolved = $resolver->resolveForProfile($profile);
            if (empty($resolved)) {
                $missing++;
                continue;
            }

            if ($profile->avatar === $resolved) {
                $skipped++;
                continue;
            }

            $updates++;
            $displayName = $profile->organisation_name ?: trim(($profile->first_name ?? '') . ' ' . ($profile->last_name ?? ''));

            $this->line(sprintf(
                '[%s] %s (%s) -> %s',
                $dryRun ? 'DRY' : 'SET',
                $displayName ?: ('Profile #' . $profile->id),
                $profile->slug,
                $resolved
            ));

            if (!$dryRun) {
                $profile->avatar = $resolved;
                $profile->save();
            }
        }

        $this->newLine();
        $this->info("Profiles scanned: {$profiles->count()}");
        $this->info("Updated: {$updates}");
        $this->info("Already matched: {$skipped}");
        $this->info("No matching image found: {$missing}");

        return self::SUCCESS;
    }
}

