<?php

namespace App\Console\Commands;

use App\Imports\MatchmakingProfileImport;
use App\MatchmakingProfile;
use App\Services\Matchmaking\ProfileAvatarResolver;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;
use Maatwebsite\Excel\Facades\Excel;

class MatchmakingApplyDeaUpdateJuly2026 extends Command
{
    protected $signature = 'matchmaking:apply-dea-update-2026-07
                            {--dry-run : Preview without writing}
                            {--skip-import : Only remove old CityLab / sync avatars}';

    protected $description = 'Apply Dea matchmaking update: add Sophia Drakaki, replace CityLab org with the completed registration, sync avatars';

    public function handle(ProfileAvatarResolver $resolver): int
    {
        $dryRun = (bool) $this->option('dry-run');

        $cityLabs = MatchmakingProfile::query()
            ->where(function ($q) {
                $q->whereRaw('LOWER(TRIM(COALESCE(organisation_name, \'\'))) = ?', ['citylab'])
                    ->orWhereRaw('LOWER(TRIM(COALESCE(organisation_name, \'\'))) like ?', ['citylab%'])
                    ->orWhereRaw('LOWER(TRIM(COALESCE(organisation_name, \'\'))) like ?', ['% citylab%'])
                    ->orWhereRaw('LOWER(TRIM(COALESCE(email, \'\'))) like ?', ['%@citylab.gr']);
            })
            ->where('type', MatchmakingProfile::TYPE_ORGANISATION)
            ->get();

        $this->info('Existing CityLab organisation profiles: '.$cityLabs->count());
        foreach ($cityLabs as $profile) {
            $this->line(sprintf(
                '  #%d %s <%s> slug=%s',
                $profile->id,
                $profile->organisation_name,
                $profile->email,
                $profile->slug
            ));
        }

        if (! $dryRun) {
            foreach ($cityLabs as $profile) {
                $profile->delete();
                $this->warn("Removed CityLab organisation #{$profile->id}");
            }
        } else {
            $this->line('[DRY] Would remove '.$cityLabs->count().' CityLab organisation profile(s)');
        }

        if (! $this->option('skip-import')) {
            $indiv = base_path('database/seeders/data/matchmaking/sophia-drakaki-individual.xlsx');
            $org = base_path('database/seeders/data/matchmaking/citylab-organisation-updated.xlsx');

            foreach ([$indiv, $org] as $path) {
                if (! is_file($path)) {
                    $this->error("Missing import file: {$path}");

                    return self::FAILURE;
                }
            }

            if ($dryRun) {
                $this->line('[DRY] Would import: '.$org);
                $this->line('[DRY] Would import: '.$indiv);
            } else {
                // Organisation first, then individual (same org name must not collide).
                Log::info('[MatchmakingApplyDeaUpdateJuly2026] Importing updated CityLab');
                Excel::import(new MatchmakingProfileImport, $org);
                $this->info('Imported updated CityLab organisation registration');

                Log::info('[MatchmakingApplyDeaUpdateJuly2026] Importing Sophia Drakaki');
                Excel::import(new MatchmakingProfileImport, $indiv);
                $this->info('Imported Sophia Drakaki individual registration');
            }
        }

        $targets = MatchmakingProfile::query()
            ->where(function ($q) {
                $q->where(function ($inner) {
                    $inner->where('type', MatchmakingProfile::TYPE_VOLUNTEER)
                        ->whereRaw('LOWER(TRIM(last_name)) = ?', ['drakaki']);
                })->orWhere(function ($inner) {
                    $inner->where('type', MatchmakingProfile::TYPE_ORGANISATION)
                        ->whereRaw('LOWER(TRIM(COALESCE(organisation_name, \'\'))) = ?', ['citylab']);
                });
            })
            ->get();

        if ($targets->isEmpty() && ! $dryRun) {
            $this->warn('No Sophia/CityLab profiles found after import to sync avatars.');
        }

        foreach ($targets as $profile) {
            $resolved = $resolver->resolveForProfile($profile);
            $label = $profile->type === MatchmakingProfile::TYPE_VOLUNTEER
                ? trim(($profile->first_name ?? '').' '.($profile->last_name ?? ''))
                : (string) ($profile->organisation_name ?: ('Profile #'.$profile->id));
            if ($label === '') {
                $label = 'Profile #'.$profile->id;
            }

            if (empty($resolved)) {
                $this->warn("No avatar match for {$label}");
                continue;
            }

            if ($profile->avatar === $resolved) {
                $this->line("Avatar already set for {$label}: {$resolved}");
                continue;
            }

            if ($dryRun) {
                $this->line("[DRY] Would set avatar for {$label} -> {$resolved}");
            } else {
                $profile->avatar = $resolved;
                $profile->save();
                $this->info("Set avatar for {$label} -> {$resolved}");
            }
        }

        $this->newLine();
        $this->info('Done. On production, run: php artisan matchmaking:apply-dea-update-2026-07');

        return self::SUCCESS;
    }
}
