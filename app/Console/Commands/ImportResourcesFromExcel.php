<?php

namespace App\Console\Commands;

use Exception;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\ResourcesImport;

class ImportResourcesFromExcel extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'resources:import {file : Path to the Excel file}
                            {--focus : Focus create related attributes}
                            {--batch-timestamp : Use one Unix timestamp for every file in this run (same suffix for all)}
                            {--stable-names : Stable S3 paths without timestamp (overwrites same key on re-upload)}
                            {--preserve-filenames : Use local file basenames as S3 keys (rename locals to match live URLs, then overwrite)}
                            {--suffix= : Optional human-readable suffix for all files, e.g. 2026-03}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Import resources from an Excel file with accompanying images folder (images/, links/).';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $focus = $this->option('focus');
        $filePath = $this->argument('file');
        $excelPath = realpath($filePath);

        if (!$excelPath || !file_exists($excelPath)) {
            $this->error("Excel file does not exist: $filePath");
            return 1;
        }

        $excelDir = dirname($excelPath);
        $imagesDir = $excelDir . DIRECTORY_SEPARATOR . 'images';
        $pdfsDir = $excelDir . DIRECTORY_SEPARATOR . 'links';

        if (!is_dir($imagesDir)) {
            $this->warn("Warning: Images folder not found at $imagesDir. Continuing without images.");
        }

        $filenameMode = 'per_file';
        $batchTimestamp = null;
        $globalSuffix = $this->option('suffix');
        $globalSuffix = is_string($globalSuffix) && trim($globalSuffix) !== '' ? trim($globalSuffix) : null;

        if ($this->option('preserve-filenames')) {
            $filenameMode = 'preserve';
        } elseif ($this->option('stable-names')) {
            $filenameMode = 'stable';
        } elseif ($this->option('batch-timestamp')) {
            $filenameMode = 'batch';
            $batchTimestamp = time();
        }

        try {
            Excel::import(
                new ResourcesImport($imagesDir, $pdfsDir, $focus, [], null, $filenameMode, $batchTimestamp, $globalSuffix),
                $filePath
            );

            $this->info('Import completed successfully.');
            $this->line("Filename mode: {$filenameMode}" . ($globalSuffix ? " (suffix: {$globalSuffix})" : ''));
            return 0;
        } catch (Exception $e) {
            Log::error('[ImportResourcesFromExcel] Error: ' . $e->getMessage(), [
                'trace' => $e->getTraceAsString(),
            ]);
            $this->error('Import failed: ' . $e->getMessage());
            return 2;
        }
    }
}
