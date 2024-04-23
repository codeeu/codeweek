<?php

namespace App\Console\Commands\excel;

use App\Imports\ReportedEventsImport;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;
use Maatwebsite\Excel\Facades\Excel;

class Reported extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'excel:reported';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Reported Events Excel Importer';

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
     * @return int
     */
    public function handle()
    {
        Log::info('Loading Generic Excel');

        Excel::import(
            new ReportedEventsImport(),
            'dutch-reported.xlsx',
            'excel'
        );
    }
}
