<?php

namespace App\Console\Commands\excel;

use App\Imports\MagentaEventsImport;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;
use Maatwebsite\Excel\Facades\Excel;

class Magenta extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'excel:magenta';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Magenta Moon';

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
        Log::info('Loading Magenta Moon Excel File');

        Excel::import(new MagentaEventsImport, 'magenta.xlsx', 'excel');
    }
}
