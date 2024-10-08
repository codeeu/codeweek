<?php

namespace App\Console\Commands\excel;

use App\Imports\IrelandEventsImport;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;
use Maatwebsite\Excel\Facades\Excel;

class Ireland extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'excel:ireland';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Ireland Import';

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
        Log::info('Loading Irish Excel File');

        Excel::import(new IrelandEventsImport(), 'ireland-2023-3.xlsx', 'excel');
    }
}
