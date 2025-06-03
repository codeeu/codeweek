<?php

namespace App\Console\Commands\excel;

use App\Imports\GenericEventsImport;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;
use Maatwebsite\Excel\Facades\Excel;

class Generic extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'excel:generic';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Generic Excel Importer';

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
        Log::info('Loading Generic Excel');

        Excel::import(
            new GenericEventsImport(),
            '3-june.xlsx',
            'excel'
        );
    }
}
