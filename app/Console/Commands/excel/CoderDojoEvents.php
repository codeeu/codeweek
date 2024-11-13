<?php

namespace App\Console\Commands\excel;

use App\Imports\CoderDojoEventsImport;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;
use Maatwebsite\Excel\Facades\Excel;

class CoderDojoEvents extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'excel:coderdojo';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Coder Dojo 2024 From Excel File';

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
        Log::info('Loading Coder Dojo Excel File');

        Excel::import(
            new CoderDojoEventsImport(),
            '20241024 CodeWeek activities NOVEMBER CoderDojo Belgium.xlsx',
            'excel'
        );
    }
}
