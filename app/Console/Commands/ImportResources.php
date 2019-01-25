<?php

namespace App\Console\Commands;

use App\Imports\ResourcesImport;
use Illuminate\Console\Command;
use Maatwebsite\Excel\Facades\Excel;

class ImportResources extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'import:resources';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Import Resources From Excel';

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
     * @return mixed
     */
    public function handle()
    {
        //Read the Excel Sheet
        Excel::import(new ResourcesImport, 'resources.xlsx','excel');
    }
}
