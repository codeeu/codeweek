<?php

namespace App\Console\Commands;

use App\Excellence;
use Illuminate\Console\Command;

class CertificateFailuresReport extends Command
{
    protected $signature = 'certificate:failures-report
                            {--edition=2025 : Target edition year}
                            {--type=all : excellence|super-organiser|all}
                            {--limit=0 : Show first N rows (0 = all)}
                            {--export= : Optional CSV export path (absolute or relative to project root)}';

    protected $description = 'List/export certificate generation failures for review before sending emails';

    public function handle(): int
    {
        $edition = (int) $this->option('edition');
        $typeOption = strtolower(trim((string) $this->option('type')));
        $limit = max(0, (int) $this->option('limit'));
        $exportPath = trim((string) $this->option('export'));

        $types = $this->resolveTypes($typeOption);
        if ($types === null) {
            $this->error("Invalid --type value: {$typeOption}. Use 'excellence', 'super-organiser', or 'all'.");
            return self::FAILURE;
        }

        $rows = Excellence::query()
            ->where('edition', $edition)
            ->whereIn('type', $types)
            ->whereNotNull('certificate_generation_error')
            ->with('user')
            ->orderBy('type')
            ->orderBy('id')
            ->get();

        if ($rows->isEmpty()) {
            $this->info("No generation failures found for edition {$edition}, type {$typeOption}.");
            return self::SUCCESS;
        }

        $displayRows = $limit > 0 ? $rows->take($limit) : $rows;
        $table = $displayRows->map(function (Excellence $e) {
            $name = $e->name_for_certificate;
            if (! $name && $e->user) {
                $name = trim(($e->user->firstname ?? '') . ' ' . ($e->user->lastname ?? ''));
            }
            return [
                'id' => $e->id,
                'type' => $e->type,
                'user_id' => $e->user_id,
                'email' => $e->user?->email ?? '',
                'name' => $name ?? '',
                'error' => $e->certificate_generation_error,
            ];
        })->values()->all();

        $this->info('Generation failures: ' . $rows->count());
        if ($limit > 0 && $rows->count() > $limit) {
            $this->line("Showing first {$limit} rows.");
        }
        $this->table(['id', 'type', 'user_id', 'email', 'name', 'error'], $table);

        if ($exportPath !== '') {
            $fullPath = $this->resolvePath($exportPath);
            $dir = dirname($fullPath);
            if (! is_dir($dir) && ! @mkdir($dir, 0775, true) && ! is_dir($dir)) {
                $this->error("Failed to create directory: {$dir}");
                return self::FAILURE;
            }

            $fh = @fopen($fullPath, 'wb');
            if (! $fh) {
                $this->error("Failed to open export file: {$fullPath}");
                return self::FAILURE;
            }

            fputcsv($fh, ['id', 'type', 'edition', 'user_id', 'email', 'name_for_certificate', 'certificate_generation_error']);
            foreach ($rows as $e) {
                $name = $e->name_for_certificate;
                if (! $name && $e->user) {
                    $name = trim(($e->user->firstname ?? '') . ' ' . ($e->user->lastname ?? ''));
                }
                fputcsv($fh, [
                    $e->id,
                    $e->type,
                    $e->edition,
                    $e->user_id,
                    $e->user?->email ?? '',
                    $name ?? '',
                    $e->certificate_generation_error,
                ]);
            }
            fclose($fh);
            $this->info("Exported CSV: {$fullPath}");
        }

        $this->line('Note: send flows already exclude rows without certificate_url, so failed generation rows are not emailed.');
        return self::SUCCESS;
    }

    /**
     * @return array<int, string>|null
     */
    private function resolveTypes(string $typeOption): ?array
    {
        return match ($typeOption) {
            'all' => ['Excellence', 'SuperOrganiser'],
            'excellence' => ['Excellence'],
            'super-organiser', 'superorganiser' => ['SuperOrganiser'],
            default => null,
        };
    }

    private function resolvePath(string $path): string
    {
        if (str_starts_with($path, '/')) {
            return $path;
        }
        return base_path($path);
    }
}
