<?php

namespace App\Console\Commands\excel;

use App\Imports\GenericEventsImport;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;
use Maatwebsite\Excel\Facades\Excel;

class Generic extends Command
{
    protected $signature = 'excel:generic';
    protected $description = 'Generic Excel Importer';

    public function handle(): void
    {
        Log::info('Loading Generic Excel');

        // Load rows to determine the actual count (only the first sheet)
        $collection = Excel::toCollection(new GenericEventsImport($this->output), 'example.xlsx', 'excel');
        $rows = $collection->first();
        $rowCount = $rows->count();

        $this->info("Rows to import: {$rowCount}");

        // Re-run with row count and output for progress tracking
        $importer = new GenericEventsImport($this->output, $rowCount);

        Excel::import(
            $importer,
            'example.xlsx',
            'excel'
        );

        $this->info("✅ Import completed successfully.");
    }
}
