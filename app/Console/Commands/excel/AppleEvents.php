<?php

namespace App\Console\Commands\excel;

use App\Imports\AppleEventsImport;
use App\Imports\DutchDanceEventsImport;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;
use Maatwebsite\Excel\Facades\Excel;

class AppleEvents extends Command {
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'excel:apple';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Apple Events From Excel File';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct() {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle() {
        Log::info('Loading Apple Excel File');

        Excel::import(
            new AppleEventsImport(),
            'apple_2022.xlsx',
            'excel'
        );
    }
}
