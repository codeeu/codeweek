<?php

namespace App\Console\Commands\excel;

use App\Imports\HamburgEventsImport;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;
use Maatwebsite\Excel\Facades\Excel;

class Hamburg extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'excel:hamburg';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Import the data for Hamburg';

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
     *
     * @return mixed
     */
    public function handle(): void
    {
        Log::info('Loading Hamburg Excel File');

        Excel::import(new HamburgEventsImport, 'hamburg.xlsx', 'excel');

        // Process the events

    }
}
