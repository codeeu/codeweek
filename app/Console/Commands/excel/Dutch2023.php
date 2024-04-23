<?php

namespace App\Console\Commands\excel;

use App\Imports\DutchSimoneEventsImport;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;
use Maatwebsite\Excel\Facades\Excel;

class Dutch2023 extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'excel:dutch-2023';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = '2023 Dutch Activities';

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
    public function handle(): int
    {
        Log::info('Loading 2023 Dutch File');

        Excel::import(
            new DutchSimoneEventsImport(),
            'dutch-2023-14-11.xlsx',
            'excel'
        );
    }
}
