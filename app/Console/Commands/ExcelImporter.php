<?php

namespace App\Console\Commands;

use App\Imports\EventsImport;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;
use Maatwebsite\Excel\Facades\Excel;

class ExcelImporter extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'excel:import';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

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
        Log::info("Read excel file");
        Excel::import(new EventsImport, 'apple2.xlsx','excel');
        // Read the xls file
        // For each line:
        //   Create en event
        //   Link it with admin account
        //   Approve it
    }
}
