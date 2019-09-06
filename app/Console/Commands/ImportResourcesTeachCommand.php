<?php

namespace App\Console\Commands;

use App\Imports\ResourcesTeachImport;
use Illuminate\Console\Command;
use Maatwebsite\Excel\Facades\Excel;

class ImportResourcesTeachCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'import:resources:teach';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Import Teach Resources From Excel';

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
//        Excel::import(new ResourcesTeachImport, 'resources-teach.xlsx','excel');
        Excel::import(new ResourcesTeachImport, 'apple-teach-2019.xlsx','excel');
    }
}
