<?php

namespace App\Console\Commands\Importers;

use App\Imports\BulgariaEventsImport;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;
use Maatwebsite\Excel\Facades\Excel;

class Bulgaria extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'import:bulgaria';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Import the data from Bulgaria Excel File';

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
        Log::info('Loading Bulgaria Excel File');

        Excel::import(new BulgariaEventsImport, 'bulgaria.xlsx', 'excel');

        // Process the events

    }
}
