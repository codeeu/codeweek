<?php

namespace App\Console\Commands;

use App\MatchmakingProfile;
use Carbon\Carbon;
use Illuminate\Console\Command;

class MatchmakingServiceReport extends Command
{
    protected $signature = 'matchmaking:report {--format=text : Output format: text or json }';

    protected $description = 'Matching service report: volunteers/organisations registered, distribution (Individual/Organisation, languages, org types, areas), and usage (form time, registrations over time)';

    public function handle(): int
    {
        $format = $this->option('format');

        $report = [
            'generated_at' => now()->toIso8601String(),
            'volunteers_registered' => $this->volunteersRegistered(),
            'distribution' => $this->distribution(),
            'usage' => $this->usage(),
            'notes' => [
                'code4europe' => 'Source (e.g. Code4Europe vs other) is not stored in the current schema; all registered profiles are included.',
                'most_consulted' => 'Profile view / consultation counts are not tracked in the current schema. To report most consulted individuals/organisations, add view/click tracking.',
            ],
        ];

        if ($format === 'json') {
            $this->line(json_encode($report, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES));
            return self::SUCCESS;
        }

        $this->printTextReport($report);
        return self::SUCCESS;
    }

    private function volunteersRegistered(): array
    {
        $total = MatchmakingProfile::query()->count();
        $individuals = MatchmakingProfile::query()->where('type', MatchmakingProfile::TYPE_VOLUNTEER)->count();
        $organisations = MatchmakingProfile::query()->where('type', MatchmakingProfile::TYPE_ORGANISATION)->count();

        return [
            'total_registered_to_date' => $total,
            'profile_individual' => $individuals,
            'profile_organisation' => $organisations,
            'note' => 'All registrations in the matchmaking database. Code4Europe vs other source is not stored.',
        ];
    }

    private function distribution(): array
    {
        $individuals = MatchmakingProfile::query()
            ->where('type', MatchmakingProfile::TYPE_VOLUNTEER)
            ->get(['id', 'languages']);

        $languageCounts = [];
        foreach ($individuals as $p) {
            $langs = $p->languages;
            if (is_array($langs)) {
                foreach ($langs as $lang) {
                    $lang = is_string($lang) ? trim($lang) : (string) $lang;
                    if ($lang !== '') {
                        $languageCounts[$lang] = ($languageCounts[$lang] ?? 0) + 1;
                    }
                }
            }
        }
        arsort($languageCounts);

        $orgs = MatchmakingProfile::query()
            ->where('type', MatchmakingProfile::TYPE_ORGANISATION)
            ->get(['id', 'organisation_type', 'country']);

        $orgTypeCounts = [];
        $areaCounts = [];
        foreach ($orgs as $p) {
            $types = $p->organisation_type;
            if (is_array($types)) {
                foreach ($types as $t) {
                    $t = is_string($t) ? trim($t) : (string) $t;
                    if ($t !== '') {
                        $orgTypeCounts[$t] = ($orgTypeCounts[$t] ?? 0) + 1;
                    }
                }
            }
            $country = $p->country ? trim($p->country) : null;
            if ($country !== null && $country !== '') {
                $areaCounts[$country] = ($areaCounts[$country] ?? 0) + 1;
            }
        }
        arsort($orgTypeCounts);
        arsort($areaCounts);

        return [
            'profile_individual' => [
                'total' => $individuals->count(),
                'language_distribution' => $languageCounts,
            ],
            'profile_organisation' => [
                'total' => $orgs->count(),
                'organisation_type_breakdown' => $orgTypeCounts,
                'areas_of_operation' => $areaCounts,
            ],
        ];
    }

    private function usage(): array
    {
        $withTime = MatchmakingProfile::query()
            ->whereNotNull('start_time')
            ->whereNotNull('completion_time')
            ->get(['start_time', 'completion_time']);

        $secondsList = [];
        foreach ($withTime as $p) {
            $start = $p->start_time instanceof \DateTimeInterface ? $p->start_time : Carbon::parse($p->start_time);
            $end = $p->completion_time instanceof \DateTimeInterface ? $p->completion_time : Carbon::parse($p->completion_time);
            if ($end > $start) {
                $secondsList[] = $end->diffInSeconds($start);
            }
        }

        $avgSeconds = count($secondsList) > 0 ? (int) round(array_sum($secondsList) / count($secondsList)) : null;
        $minSeconds = count($secondsList) > 0 ? min($secondsList) : null;
        $maxSeconds = count($secondsList) > 0 ? max($secondsList) : null;

        $registrationsOverTime = MatchmakingProfile::query()
            ->selectRaw('DATE_FORMAT(created_at, "%Y-%m") as month, count(*) as count')
            ->groupBy('month')
            ->orderBy('month')
            ->pluck('count', 'month')
            ->all();

        return [
            'form_completion_time' => [
                'profiles_with_start_and_completion' => $withTime->count(),
                'average_seconds' => $avgSeconds,
                'average_display' => $avgSeconds !== null ? $this->secondsToHuman($avgSeconds) : null,
                'min_seconds' => $minSeconds,
                'max_seconds' => $maxSeconds,
                'note' => 'Time between form start and completion (registration flow).',
            ],
            'registrations_over_time' => $registrationsOverTime,
            'most_consulted_individuals_or_organisations' => 'Not available — no view/consultation tracking in the database.',
        ];
    }

    private function secondsToHuman(int $seconds): string
    {
        if ($seconds < 60) {
            return $seconds . 's';
        }
        $m = (int) floor($seconds / 60);
        $s = $seconds % 60;
        if ($m < 60) {
            return $m . 'm ' . $s . 's';
        }
        $h = (int) floor($m / 60);
        $m = $m % 60;
        return $h . 'h ' . $m . 'm ' . $s . 's';
    }

    private function printTextReport(array $report): void
    {
        $this->newLine();
        $this->info('===== Matching service: Database and matching service (teachers & volunteers) =====');
        $this->newLine();

        $v = $report['volunteers_registered'];
        $this->info('1. Volunteers / registrations to date');
        $this->line('   Total registered: ' . $v['total_registered_to_date']);
        $this->line('   Profile – Individual: ' . $v['profile_individual']);
        $this->line('   Profile – Organisation: ' . $v['profile_organisation']);
        $this->line('   Note: ' . $v['note']);
        $this->newLine();

        $d = $report['distribution'];
        $this->info('2. Distribution of volunteers');
        $this->line('   Profile – Individual: total = ' . $d['profile_individual']['total']);
        $this->line('   Language distribution:');
        foreach ($d['profile_individual']['language_distribution'] as $lang => $count) {
            $this->line('      - ' . $lang . ': ' . $count);
        }
        $this->newLine();
        $this->line('   Profile – Organisation: total = ' . $d['profile_organisation']['total']);
        $this->line('   Organisation type breakdown:');
        foreach ($d['profile_organisation']['organisation_type_breakdown'] as $type => $count) {
            $this->line('      - ' . $type . ': ' . $count);
        }
        $this->line('   Areas of operation (country):');
        foreach ($d['profile_organisation']['areas_of_operation'] as $area => $count) {
            $this->line('      - ' . $area . ': ' . $count);
        }
        $this->newLine();

        $u = $report['usage'];
        $this->info('3. Usage of the database to date');
        $this->line('   Form completion time (time spent on registration form):');
        $this->line('      Profiles with start & completion time: ' . $u['form_completion_time']['profiles_with_start_and_completion']);
        $this->line('      Average: ' . ($u['form_completion_time']['average_display'] ?? 'n/a'));
        if ($u['form_completion_time']['min_seconds'] !== null) {
            $this->line('      Min: ' . $this->secondsToHuman($u['form_completion_time']['min_seconds']));
            $this->line('      Max: ' . $this->secondsToHuman($u['form_completion_time']['max_seconds']));
        }
        $this->line('      Note: ' . $u['form_completion_time']['note']);
        $this->newLine();
        $this->line('   Registrations over time (by month):');
        foreach ($u['registrations_over_time'] as $month => $count) {
            $this->line('      ' . $month . ': ' . $count);
        }
        $this->newLine();
        $this->line('   Most consulted individuals/organisations: ' . $u['most_consulted_individuals_or_organisations']);
        $this->newLine();

        $this->comment('Notes:');
        $this->line('   - ' . $report['notes']['code4europe']);
        $this->line('   - ' . $report['notes']['most_consulted']);
        $this->newLine();
    }
}
