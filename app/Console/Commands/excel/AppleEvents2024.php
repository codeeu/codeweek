<?php

namespace App\Console\Commands\excel;

use App\Imports\AppleEventsImport;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;
use Maatwebsite\Excel\Facades\Excel;

class AppleEvents2024 extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'excel:apple2024';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Apple Events 2024 From Excel File';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     */
    public function handle(): void
    {
        Log::info('Loading Apple Excel File');

        Excel::import(
            new AppleEventsImport(),
            'Apple_events_code_week_2024_BATCH1.xlsx',
            'excel'
        );
    }
}
