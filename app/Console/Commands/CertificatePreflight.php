<?php

namespace App\Console\Commands;

use App\CertificateExcellence;
use App\Excellence;
use Illuminate\Console\Command;

class CertificatePreflight extends Command
{
    protected $signature = 'certificate:preflight
                            {--edition=2025 : Target edition year}
                            {--type=all : excellence|super-organiser|all}
                            {--limit=0 : Max records to test (0 = all)}
                            {--only-pending : Test only rows without certificate_url}
                            {--export= : Optional CSV path for failures}';

    protected $description = 'Dry-run compile certificates (no S3 upload, no DB updates) and report failures';

    public function handle(): int
    {
        $edition = (int) $this->option('edition');
        $typeOption = strtolower(trim((string) $this->option('type')));
        $limit = max(0, (int) $this->option('limit'));
        $onlyPending = (bool) $this->option('only-pending');
        $exportPath = trim((string) $this->option('export'));

        $types = $this->resolveTypes($typeOption);
        if ($types === null) {
            $this->error("Invalid --type value: {$typeOption}. Use 'excellence', 'super-organiser', or 'all'.");
            return self::FAILURE;
        }

        $query = Excellence::query()
            ->where('edition', $edition)
            ->whereIn('type', $types)
            ->with('user')
            ->orderBy('type')
            ->orderBy('id');

        if ($onlyPending) {
            $query->whereNull('certificate_url');
        }

        if ($limit > 0) {
            $query->limit($limit);
        }

        $rows = $query->get();
        if ($rows->isEmpty()) {
            $this->info('No recipients found for the selected filters.');
            return self::SUCCESS;
        }

        $failures = [];
        $ok = 0;
        $bar = $this->output->createProgressBar($rows->count());
        $bar->start();

        foreach ($rows as $e) {
            $bar->advance();
            $user = $e->user;
            if (! $user) {
                $failures[] = $this->failureRow($e, '', 'Missing related user record.');
                continue;
            }
            if (! $user->email) {
                $failures[] = $this->failureRow($e, (string) $user->email, 'Missing user email.');
                continue;
            }

            $name = $e->name_for_certificate ?? trim(($user->firstname ?? '') . ' ' . ($user->lastname ?? ''));
            if ($name === '') {
                $failures[] = $this->failureRow($e, (string) $user->email, 'Empty certificate holder name.');
                continue;
            }

            $certType = $e->type === 'SuperOrganiser' ? 'super-organiser' : 'excellence';
            $numberOfActivities = $e->type === 'SuperOrganiser' ? (int) $user->activities($edition) : 0;

            try {
                $cert = new CertificateExcellence(
                    $edition,
                    $name,
                    $certType,
                    $numberOfActivities,
                    (int) $user->id,
                    (string) $user->email
                );
                $cert->preflight();
                $ok++;
            } catch (\Throwable $ex) {
                $failures[] = $this->failureRow($e, (string) $user->email, $ex->getMessage());
            }
        }
        $bar->finish();
        $this->newLine(2);

        $this->info("Preflight complete. Tested: {$rows->count()}, Passed: {$ok}, Failed: " . count($failures));

        if (! empty($failures)) {
            $show = array_slice($failures, 0, 20);
            $this->table(['id', 'type', 'user_id', 'email', 'name', 'error'], $show);
            if (count($failures) > 20) {
                $this->line('Showing first 20 failures. Use --export for full list.');
            }
        }

        if ($exportPath !== '') {
            $path = $this->resolvePath($exportPath);
            $dir = dirname($path);
            if (! is_dir($dir) && ! @mkdir($dir, 0775, true) && ! is_dir($dir)) {
                $this->error("Failed to create export directory: {$dir}");
                return self::FAILURE;
            }
            $fh = @fopen($path, 'wb');
            if (! $fh) {
                $this->error("Failed to open export file: {$path}");
                return self::FAILURE;
            }
            fputcsv($fh, ['id', 'type', 'edition', 'user_id', 'email', 'name_for_certificate', 'error']);
            foreach ($failures as $row) {
                fputcsv($fh, [
                    $row['id'],
                    $row['type'],
                    $edition,
                    $row['user_id'],
                    $row['email'],
                    $row['name'],
                    $row['error'],
                ]);
            }
            fclose($fh);
            $this->info("Exported failures CSV: {$path}");
        }

        return self::SUCCESS;
    }

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

    private function failureRow(Excellence $e, string $email, string $error): array
    {
        $name = $e->name_for_certificate ?? ($e->user ? trim(($e->user->firstname ?? '') . ' ' . ($e->user->lastname ?? '')) : '');
        return [
            'id' => $e->id,
            'type' => $e->type,
            'user_id' => (int) $e->user_id,
            'email' => $email,
            'name' => (string) $name,
            'error' => $error,
        ];
    }
}
