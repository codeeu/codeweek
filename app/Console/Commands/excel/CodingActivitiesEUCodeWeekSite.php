<?php

namespace App\Console\Commands\excel;

use App\Imports\CodingActivitiesEUCodeWeekSiteImport;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;
use Maatwebsite\Excel\Facades\Excel;

class CodingActivitiesEUCodeWeekSite extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'excel:coding_activities_eu';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Coding Activities EU CodeWeek Site From Excel File';

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
        Log::info('Loading Coding Activities EU CodeWeek Site');

        Excel::import(
            new CodingActivitiesEUCodeWeekSiteImport(),
            'events.23_24.xlsx',
            'excel'
        );
    }
}
