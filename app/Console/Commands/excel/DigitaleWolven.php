<?php

namespace App\Console\Commands\excel;

use App\Imports\CodingActivitiesEUCodeWeekSiteImport;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;
use Maatwebsite\Excel\Facades\Excel;

class DigitaleWolven extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'excel:digitale_wolven';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Digitale Wolven From Excel File';

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
        Log::info('Loading Digitale Wolven');

        Excel::import(
            new CodingActivitiesEUCodeWeekSiteImport(),
            'digitale-wolven-events.xlsx',
            'excel'
        );
    }
}
