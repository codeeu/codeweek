<?php

namespace App\Console\Commands\excel;

use App\Imports\LuxembourgEventsImport;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;
use Maatwebsite\Excel\Facades\Excel;

class Luxembourg extends Command {
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'excel:lux';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Luxembourg Workshops';

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
        Log::info('Loading Luxembourg Excel File');

        Excel::import(new LuxembourgEventsImport(), 'lux22-1.xlsx', 'excel');
    }
}
