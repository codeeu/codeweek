<?php

namespace App\Console\Commands;

use App\OnlineCourse;
use App\ResourceItem;
use Carbon\Carbon;
use Illuminate\Console\Command;

/**
 * Training resources report for https://codeweek.eu/training and related Learn & Teach resources.
 *
 * Training page: static list of MOOC modules (not in DB). Download links go directly to S3,
 * so download counts, geography, and top-downloaded are not available unless S3 logs are used
 * or a tracking redirect is implemented.
 */
class TrainingResourcesReport extends Command
{
    /** Code4Europe project start – used for "added since" baseline (configurable). */
    private const CODE4EUROPE_START = '2024-06-01';

    /** Number of static training modules on /training (from resources/views/static/training/index.blade.php). */
    private const STATIC_TRAINING_MODULES_COUNT = 22;

    protected $signature = 'training:report
                            {--format=text : Output format: text or json }
                            {--baseline= : Override baseline date (Y-m-d) for "added since" }
                            {--learn-teach-only : Only output Learn & Teach resource counts (baseline + total now) }
                            {--online-courses-only : Only output Online Courses counts (baseline + total now) }';

    protected $description = 'Training resources report: counts (static training modules + Learn & Teach + Online Courses), baseline vs total. Download/geography/top10 require tracking or S3 logs.';

    public function handle(): int
    {
        $format = $this->option('format');
        $learnTeachOnly = $this->option('learn-teach-only');
        $onlineCoursesOnly = $this->option('online-courses-only');
        $baseline = $this->option('baseline') ? Carbon::parse($this->option('baseline')) : Carbon::parse(self::CODE4EUROPE_START);

        if ($learnTeachOnly) {
            $stats = $this->learnTeachResourcesStats($baseline);
            if ($format === 'json') {
                $this->line(json_encode([
                    'learn_teach_resources' => $stats,
                    'generated_at' => now()->toIso8601String(),
                ], JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES));
                return self::SUCCESS;
            }
            $this->line('Learn & Teach Resources (https://codeweek.eu/resources/learn-and-teach)');
            $this->line('Baseline date (project start): ' . $stats['baseline_date']);
            $this->line('Total resources now: ' . $stats['total_resources_now']);
            $this->line('Added since baseline: ' . $stats['added_since_baseline']);
            return self::SUCCESS;
        }

        if ($onlineCoursesOnly) {
            $stats = $this->onlineCoursesStats($baseline);
            if ($format === 'json') {
                $this->line(json_encode([
                    'online_courses' => $stats,
                    'generated_at' => now()->toIso8601String(),
                ], JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES));
                return self::SUCCESS;
            }
            $this->line('Online Courses (https://codeweek.eu/online-courses)');
            $this->line('Baseline date (project start): ' . $stats['baseline_date']);
            $this->line('Total online courses now: ' . $stats['total_now']);
            $this->line('Added since baseline: ' . $stats['added_since_baseline']);
            return self::SUCCESS;
        }

        $report = [
            'generated_at' => now()->toIso8601String(),
            'report_period_downloads' => 'June/Sept 2024 – Jan 2026 (requested). Download data not collected by application.',
            'training_page' => $this->trainingPageStats(),
            'learn_teach_resources' => $this->learnTeachResourcesStats($baseline),
            'online_courses' => $this->onlineCoursesStats($baseline),
            'downloads' => $this->downloadsSection(),
            'geographical_distribution' => $this->geographySection(),
            'downloads_over_time' => $this->downloadsOverTimeSection(),
            'top_10_downloaded' => $this->top10Section(),
            'notes' => $this->notes(),
        ];

        if ($format === 'json') {
            $this->line(json_encode($report, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES));
            return self::SUCCESS;
        }

        $this->printTextReport($report, $baseline);
        return self::SUCCESS;
    }

    private function trainingPageStats(): array
    {
        return [
            'url' => 'https://codeweek.eu/training',
            'total_training_modules_now' => self::STATIC_TRAINING_MODULES_COUNT,
            'added_since_code4europe_baseline' => null,
            'note' => 'The /training page is static: modules are hardcoded in resources/views/static/training/index.blade.php. There is no DB record of when each module was added, so "added since baseline" is not available. Total count is fixed (22 modules).',
        ];
    }

    private function learnTeachResourcesStats(Carbon $baseline): array
    {
        $total = ResourceItem::query()->where('active', true)->count();
        $addedSince = ResourceItem::query()
            ->where('active', true)
            ->where('created_at', '>=', $baseline->copy()->startOfDay())
            ->count();

        return [
            'total_resources_now' => $total,
            'added_since_baseline' => $addedSince,
            'baseline_date' => $baseline->format('Y-m-d'),
            'note' => 'Learn & Teach resources at /resources/learn-and-teach (ResourceItem). Not the same as the static /training modules; both are "training-related" content.',
        ];
    }

    private function onlineCoursesStats(Carbon $baseline): array
    {
        $total = OnlineCourse::query()->where('active', true)->count();
        $addedSince = OnlineCourse::query()
            ->where('active', true)
            ->where('created_at', '>=', $baseline->copy()->startOfDay())
            ->count();

        return [
            'total_now' => $total,
            'added_since_baseline' => $addedSince,
            'baseline_date' => $baseline->format('Y-m-d'),
            'url' => 'https://codeweek.eu/online-courses',
            'note' => 'Online Courses (MOOCs) at /online-courses. Managed in Nova; counts use active records only.',
        ];
    }

    private function downloadsSection(): array
    {
        return [
            'total_downloads' => null,
            'downloads_june_sept_2024_to_jan_2026' => null,
            'note' => 'Training module "Download video script" and similar links point directly to S3. The application does not track clicks or downloads. To get numbers: (1) use S3 access logs for the codeweek-s3/docs/training bucket/path, or (2) add a redirect route that logs (resource/module, date, optional country) then redirects to the S3 URL.',
        ];
    }

    private function geographySection(): array
    {
        return [
            'top_by_country' => null,
            'note' => 'Geographical distribution is not tracked. To report by country: add server-side logging when users access training pages or use a download redirect that records country (e.g. from GeoIP or Accept-Language).',
        ];
    }

    private function downloadsOverTimeSection(): array
    {
        return [
            'downloads_over_time' => null,
            'peak_periods' => null,
            'note' => 'Not available without download tracking (or S3 log analysis).',
        ];
    }

    private function top10Section(): array
    {
        return [
            'top_10_downloaded_resources' => null,
            'note' => 'Not available without download tracking. Training modules are static (no resource_id in DB for each module); tracking would need to record by module slug or URL.',
        ];
    }

    private function notes(): array
    {
        return [
            'training_vs_resources' => 'The Training page (/training) lists static MOOC modules. The Learn & Teach page (/resources/learn-and-teach) lists ResourceItem records. Both can be considered "training resources" for reporting.',
            'code4europe_baseline' => 'Baseline for "added since" uses ' . self::CODE4EUROPE_START . '. Override with --baseline=YYYY-MM-DD.',
            'implementing_tracking' => 'To enable download and geography metrics: add a migration for training_downloads (e.g. module_slug, downloaded_at, country_code), replace direct S3 links with /training/download?module=... that logs and redirects, and optionally log page views for /training and each module.',
        ];
    }

    private function printTextReport(array $report, Carbon $baseline): void
    {
        $this->line('=== Training resources report ===');
        $this->line('Generated: ' . $report['generated_at']);
        $this->line('');

        $this->line('--- Training page (https://codeweek.eu/training) ---');
        $this->line('Total training modules (static list): ' . $report['training_page']['total_training_modules_now']);
        $this->line('Added since Code4Europe baseline: not stored (static content)');
        $this->line($report['training_page']['note']);
        $this->line('');

        $this->line('--- Learn & Teach resources (ResourceItem) ---');
        $this->line('Total resources now: ' . $report['learn_teach_resources']['total_resources_now']);
        $this->line('Added since baseline (' . $baseline->format('Y-m-d') . '): ' . $report['learn_teach_resources']['added_since_baseline']);
        $this->line($report['learn_teach_resources']['note']);
        $this->line('');

        $this->line('--- Online Courses (https://codeweek.eu/online-courses) ---');
        $this->line('Total online courses now: ' . $report['online_courses']['total_now']);
        $this->line('Added since baseline (' . $baseline->format('Y-m-d') . '): ' . $report['online_courses']['added_since_baseline']);
        $this->line($report['online_courses']['note']);
        $this->line('');

        $this->line('--- Downloads ---');
        $this->line('Total number: not tracked (links go to S3).');
        $this->line('June/Sept 2024 – Jan 2026: not tracked.');
        $this->line($report['downloads']['note']);
        $this->line('');

        $this->line('--- Geographical distribution / engagement ---');
        $this->line('Top by country: not tracked.');
        $this->line($report['geographical_distribution']['note']);
        $this->line('');

        $this->line('--- Downloads over time / peaks ---');
        $this->line($report['downloads_over_time']['note']);
        $this->line('');

        $this->line('--- Top 10 downloaded training resources ---');
        $this->line($report['top_10_downloaded']['note']);
        $this->line('');

        $this->line('--- Notes ---');
        foreach ($report['notes'] as $key => $text) {
            $this->line($key . ': ' . $text);
        }
    }
}
