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
                            {--emails= : Comma-separated emails to test only}
                            {--emails-file= : Path to file with one email per line (to test only those)}
                            {--export= : Optional CSV path for failures (only failures written)}';

    protected $description = 'Dry-run compile certificates (no S3 upload, no DB updates) and report failures';

    public function handle(): int
    {
        $edition = (int) $this->option('edition');
        $typeOption = strtolower(trim((string) $this->option('type')));
        $limit = max(0, (int) $this->option('limit'));
        $batchSize = max(0, (int) $this->option('batch-size'));
        $onlyPending = (bool) $this->option('only-pending');
        $emailsOption = trim((string) $this->option('emails'));
        $emailsFilePath = trim((string) $this->option('emails-file'));
        $exportPath = trim((string) $this->option('export'));

        $types = $this->resolveTypes($typeOption);
        if ($types === null) {
            $this->error("Invalid --type value: {$typeOption}. Use 'excellence', 'super-organiser', or 'all'.");
            return self::FAILURE;
        }

        $emailList = $this->resolveEmailList($emailsOption, $emailsFilePath);
        if ($emailList === null) {
            return self::FAILURE;
        }

        $baseQuery = Excellence::query()
            ->where('edition', $edition)
            ->whereIn('type', $types)
            ->with('user')
            ->orderBy('type')
            ->orderBy('id');

        if (! empty($emailList)) {
            $baseQuery->whereHas('user', fn ($q) => $q->whereIn('email', $emailList));
        }

        if ($onlyPending) {
            $baseQuery->whereNull('certificate_url');
        }

        $totalToTest = (clone $baseQuery)->count();
        if ($totalToTest === 0) {
            $this->info(empty($emailList) ? 'No recipients found for the selected filters.' : 'No Excellence rows found for the given email list (edition/type may not match).');
            return self::SUCCESS;
        }

        if (! empty($emailList)) {
            $this->info('Restricted to '.count($emailList).' email(s) from list; '.$totalToTest.' Excellence row(s) match.');
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
        $exportFh = null;
        if ($exportPath !== '') {
            $path = $this->resolvePath($exportPath);
            $dir = dirname($path);
            if (! is_dir($dir) && ! @mkdir($dir, 0775, true) && ! is_dir($dir)) {
                $this->error("Failed to create export directory: {$dir}");
                return self::FAILURE;
            }
            $exportFh = @fopen($path, 'wb');
            if (! $exportFh) {
                $this->error("Failed to open export file: {$path}");
                return self::FAILURE;
            }
            fputcsv($exportFh, ['id', 'type', 'edition', 'user_id', 'email', 'name_for_certificate', 'error']);
        }

        while ($offset < $totalToTest) {
            $failuresBeforeBatch = count($allFailures);
            $take = min($batchSize, $totalToTest - $offset);
            $query = (clone $baseQuery)->offset($offset)->limit($take);
            $rows = $query->get();
            if ($rows->isEmpty()) {
                break;
            }

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
            if ($exportFh !== null) {
                $batchFailureRows = array_slice($allFailures, $failuresBeforeBatch);
                foreach ($batchFailureRows as $row) {
                    fputcsv($exportFh, [
                        $row['id'],
                        $row['type'],
                        $edition,
                        $row['user_id'],
                        $row['email'],
                        $row['name'],
                        $row['error'],
                    ]);
                }
                fflush($exportFh);
            }
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

        if ($exportFh !== null) {
            fclose($exportFh);
            $path = $this->resolvePath($exportPath);
            $this->info(empty($allFailures) ? "Exported (no failures): {$path}" : "Exported failures only: {$path}");
        }

        return self::SUCCESS;
    }

    /**
     * @return array<string>|null Returns list of emails, or null on error (e.g. file not found).
     */
    private function resolveEmailList(string $emailsOption, string $emailsFilePath): ?array
    {
        $list = [];
        if ($emailsOption !== '') {
            foreach (array_map('trim', explode(',', $emailsOption)) as $e) {
                if ($e !== '') {
                    $list[] = $e;
                }
            }
        }
        if ($emailsFilePath !== '') {
            $path = str_starts_with($emailsFilePath, '/') ? $emailsFilePath : base_path($emailsFilePath);
            if (! is_file($path) || ! is_readable($path)) {
                $this->error("Emails file not found or not readable: {$path}");
                return null;
            }
            $lines = file($path, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES) ?: [];
            foreach ($lines as $line) {
                $e = trim($line);
                if ($e !== '') {
                    $list[] = $e;
                }
            }
        }
        return array_values(array_unique($list));
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
