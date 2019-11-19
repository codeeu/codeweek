<?php

namespace App\Console\Commands\Importers;

use App\Imports\BulgariaEventsImport;
use App\Imports\TelerikEventsImport;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;
use Maatwebsite\Excel\Facades\Excel;
use Feeds;


class Telerik extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'import:telerik';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Import the data from Telerik Excel File';

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
    public function handle()
    {
        Log::info("Loading Telerik Excel File");

        Excel::import(new TelerikEventsImport, 'telerik.xlsx','excel');


        // Process the events

    }
}
