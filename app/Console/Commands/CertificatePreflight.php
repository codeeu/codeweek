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
                            {--batch-size=500 : Process in batches; 0 = single run}
                            {--only-pending : Test only rows without certificate_url}
                            {--export= : Optional CSV path for failures (only failures written)}';

    protected $description = 'Dry-run compile certificates (no S3 upload, no DB updates) and report failures';

    public function handle(): int
    {
        $edition = (int) $this->option('edition');
        $typeOption = strtolower(trim((string) $this->option('type')));
        $limit = max(0, (int) $this->option('limit'));
        $batchSize = max(0, (int) $this->option('batch-size'));
        $onlyPending = (bool) $this->option('only-pending');
        $exportPath = trim((string) $this->option('export'));

        $types = $this->resolveTypes($typeOption);
        if ($types === null) {
            $this->error("Invalid --type value: {$typeOption}. Use 'excellence', 'super-organiser', or 'all'.");
            return self::FAILURE;
        }

        $baseQuery = Excellence::query()
            ->where('edition', $edition)
            ->whereIn('type', $types)
            ->with('user')
            ->orderBy('type')
            ->orderBy('id');

        if ($onlyPending) {
            $baseQuery->whereNull('certificate_url');
        }

        $totalToTest = (clone $baseQuery)->count();
        if ($totalToTest === 0) {
            $this->info('No recipients found for the selected filters.');
            return self::SUCCESS;
        }

        if ($limit > 0) {
            $totalToTest = min($totalToTest, $limit);
        }

        $batchSize = $batchSize > 0 ? $batchSize : $totalToTest;
        $totalBatches = (int) ceil($totalToTest / $batchSize);
        $this->info("Dry-run preflight: {$totalToTest} recipients in {$totalBatches} batch(es) of up to {$batchSize}. Failures only.");
        $this->newLine();

        $allFailures = [];
        $totalTested = 0;
        $totalPassed = 0;
        $offset = 0;

        while ($offset < $totalToTest) {
            $take = min($batchSize, $totalToTest - $offset);
            $query = (clone $baseQuery)->offset($offset)->limit($take);
            $rows = $query->get();
            if ($rows->isEmpty()) {
                break;
            }

            $batchNum = (int) floor($offset / $batchSize) + 1;
            $bar = $this->output->createProgressBar($rows->count());
            $bar->setFormat(" Batch %current%/%max% [%bar%] %percent:3s%% — failures this batch: ");
            $bar->start();

            $batchFailures = 0;
            foreach ($rows as $e) {
                $user = $e->user;
                if (! $user) {
                    $allFailures[] = $this->failureRow($e, '', 'Missing related user record.');
                    $batchFailures++;
                    $bar->advance();
                    continue;
                }
                if (! $user->email) {
                    $allFailures[] = $this->failureRow($e, (string) $user->email, 'Missing user email.');
                    $batchFailures++;
                    $bar->advance();
                    continue;
                }

                $name = $e->name_for_certificate ?? trim(($user->firstname ?? '') . ' ' . ($user->lastname ?? ''));
                if ($name === '') {
                    $allFailures[] = $this->failureRow($e, (string) $user->email, 'Empty certificate holder name.');
                    $batchFailures++;
                    $bar->advance();
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
                    $totalPassed++;
                } catch (\Throwable $ex) {
                    $allFailures[] = $this->failureRow($e, (string) $user->email, $ex->getMessage());
                    $batchFailures++;
                }
                $bar->advance();
            }

            $bar->finish();
            $totalTested += $rows->count();
            $this->line(" {$batchFailures}  |  Total: {$totalTested}/{$totalToTest} tested, " . count($allFailures) . " failures.");
            $offset += $rows->count();
        }

        $this->newLine();
        $this->info("Preflight complete. Tested: {$totalTested}, Passed: {$totalPassed}, Failed: " . count($allFailures));

        if (! empty($allFailures)) {
            $show = array_slice($allFailures, 0, 20);
            $this->table(['id', 'type', 'user_id', 'email', 'name', 'error'], $show);
            if (count($allFailures) > 20) {
                $this->line('(First 20 failures above. Full list in CSV if --export used.)');
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
            foreach ($allFailures as $row) {
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
            $this->info(empty($allFailures) ? "Exported (no failures): {$path}" : "Exported failures only: {$path}");
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
