<?php

namespace App\Console\Commands\Onetime;

use App\ResourceItem;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Maatwebsite\Excel\Facades\Excel;

/**
 * Update resource descriptions from an Excel file.
 *
 * Expected Excel structure:
 *  - Column A: "Name of the resource"
 *  - Column B: "Description of the resource"
 *
 * Usage:
 *  php artisan resources:update-descriptions
 *  php artisan resources:update-descriptions --dry-run
 */
class UpdateResourceDescriptions extends Command
{
    protected $signature = 'resources:update-descriptions {--dry-run : Simulate without saving changes}';

    protected $description = 'Update the description field for resources from Excel file based on name match.';

    private string $filePath = 'Uploaded resources.xlsx';

    public function handle(): int
    {
        $dryRun = $this->option('dry-run');

        if (!Storage::disk('excel')->exists($this->filePath)) {
            $this->error("Excel file not found: {$this->filePath}");
            return self::FAILURE;
        }

        $fullPath = Storage::disk('excel')->path($this->filePath);
        $this->info("Reading: {$this->filePath}");

        $rows = Excel::toArray([], $fullPath);

        if (empty($rows) || empty($rows[0])) {
            $this->error('No data found in the Excel file.');
            return self::FAILURE;
        }

        // Skip Row 1 is header
        $data = collect($rows[0])->skip(1);
        $results = [];
        $updated = 0;

        $bar = $this->output->createProgressBar($data->count());
        $bar->start();

        foreach ($data as $row) {
            $name = trim((string)($row['Name of the resource'] ?? $row[0] ?? ''));
            $desc = trim((string)($row['Description of the resource'] ?? $row[1] ?? ''));

            // skip blank lines
            if ($name === '' || $desc === '') {
                $bar->advance();
                continue;
            }

            $resource = ResourceItem::whereRaw('TRIM(name) = ?', [$name])->first();

            if (!$resource) {
                $results[] = [
                    'name' => $name,
                    'status' => 'NOT FOUND',
                    'description' => mb_substr($desc, 0, 80) . (strlen($desc) > 80 ? '...' : ''),
                ];
                $bar->advance();
                continue;
            }

            if ($dryRun) {
                $results[] = [
                    'name' => $name,
                    'status' => 'WOULD UPDATE',
                    'description' => mb_substr($desc, 0, 80) . (strlen($desc) > 80 ? '...' : ''),
                ];
            } else {
                $resource->description = $desc;
                $resource->save();

                $results[] = [
                    'name' => $name,
                    'status' => 'UPDATED',
                    'description' => mb_substr($desc, 0, 80) . (strlen($desc) > 80 ? '...' : ''),
                ];
            }

            $updated++;
            $bar->advance();
        }

        $bar->finish();
        $this->newLine(2);

        // summary
        $this->info(sprintf(
            'Processed: %d | Updated: %d | Not Found: %d',
            $data->count(),
            $updated,
            count(array_filter($results, fn($r) => $r['status'] === 'NOT FOUND'))
        ));

        // print table of results
        $this->newLine();
        $this->table(['Resource Name', 'Status', 'Description (excerpt)'], $results);

        // log summary
        Log::info('Resource descriptions update completed', [
            'dry_run' => $dryRun,
            'total_rows' => $data->count(),
            'updated' => $updated,
            'not_found' => array_filter($results, fn($r) => $r['status'] === 'NOT FOUND'),
        ]);

        $this->newLine();
        $duplicates = $data
            ->groupBy(fn($row) => trim((string)($row['Name of the resource'] ?? $row[0] ?? '')))
            ->map(fn($group) => $group->count())
            ->filter(fn($count) => $count > 1);

        if ($duplicates->isNotEmpty()) {
            $this->newLine(2);
            $this->warn('Duplicate resource titles detected:');
            $this->table(['Resource Name', 'Count'], $duplicates->map(fn($count, $name) => [$name, $count])->values());
        }

        if ($dryRun) {
            $this->warn('Dry run only — no data was modified.');
        }

        return self::SUCCESS;
    }
}
