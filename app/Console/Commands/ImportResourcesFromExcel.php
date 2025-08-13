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
    protected $signature = 'resources:import {file : Path to the Excel file} {--focus : Focus create related attributes}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Import resources from an Excel file with accompanying images folder.';

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

        try {
            Excel::import(new ResourcesImport($imagesDir, $pdfsDir, $focus), $filePath);

            $this->info('Import completed successfully.');
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
