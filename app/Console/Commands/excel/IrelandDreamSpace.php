<?php

namespace App\Console\Commands\excel;

use App\Imports\IrelandDreamSpaceImport;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;
use Maatwebsite\Excel\Facades\Excel;

class IrelandDreamSpace extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'excel:ireland-dream-space';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Ireland Dream Space From Excel File';

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
        Log::info('Loading Ireland Dream Space');

        Excel::import(
            new IrelandDreamSpaceImport(),
            'Code Week Events - Ireland Dream Space .xlsx',
            'excel'
        );
    }
}