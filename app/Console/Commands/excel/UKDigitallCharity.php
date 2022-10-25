<?php

namespace App\Console\Commands\excel;

use App\Imports\DutchDanceEventsImport;
use App\Imports\DutchMoorlagEventsImport;
use App\Imports\DutchSimoneEventsImport;
use App\Imports\UKDigitAllCharityEventsImport;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;
use Maatwebsite\Excel\Facades\Excel;

class UKDigitallCharity extends Command {
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'excel:charity';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'UK DigitAll Charity';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct() {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle() {
        Log::info('Loading UK Digitall Charity');

        Excel::import(
            new UKDigitAllCharityEventsImport(),
            'uk-digitall-charity.xlsx',
            'excel'
        );
    }
}
