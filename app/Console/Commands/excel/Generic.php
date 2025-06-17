<?php

namespace App\Console\Commands\excel;
use App\Imports\GenericEventsImport;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;
use Maatwebsite\Excel\Facades\Excel;
use PhpOffice\PhpSpreadsheet\IOFactory;

class Generic extends Command
{
    protected $signature = 'excel:generic';
    protected $description = 'Generic Excel Importer';

    public function handle(): void
    {
        Log::info('Loading Generic Excel');

        // Count rows first (optional but useful)
       $filePath = base_path('resources/excel/example.xlsx');
        $spreadsheet = IOFactory::load($filePath);
        $worksheet = $spreadsheet->getActiveSheet();
        $rowCount = $worksheet->getHighestDataRow();

        $this->info("Rows to import: {$rowCount}");

        $importer = new GenericEventsImport($this->output, $rowCount);

        Excel::import(
            $importer,
            $filePath
        );
    }
}