<?php

namespace App\Console\Commands\excel;

use App\Imports\DutchMoorlagEventsImport;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;
use Maatwebsite\Excel\Facades\Excel;

class DutchMoorlag extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'excel:dutch';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Dutch Moorlag Activities';

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
        Log::info('Loading Dutch Moorlag File');

        Excel::import(
            new DutchMoorlagEventsImport(),
            'Pierson_Import_CW22_prt2.xlsx',
            'excel'
        );
    }
}
