<?php

namespace App\Console\Commands\Importers;

use App\Helpers\ImporterHelper;
use App\Imports\AppleEventsImport;
use App\Imports\CoderDojoEventsImport;
use App\Imports\EventsImport;
use App\Imports\RemoteImporter;
use Exception;
use Illuminate\Console\Command;
use Feeds;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Log;
use Maatwebsite\Excel\Facades\Excel;


class Apple extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'import:apple';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Import the data from Apple Excel File';

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
        Log::info("Loading Apple Excel File");

        Excel::import(new AppleEventsImport, 'apple2019-2.xlsx','excel');


        // Process the events

    }
}
