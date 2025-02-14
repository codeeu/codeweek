<?php

namespace App\Console\Commands\excel;

use App\Imports\AvandeEventsImport;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;
use Maatwebsite\Excel\Facades\Excel;

class AvandeEvents extends Command
{
  /**
   * The name and signature of the console command.
   *
   * @var string
   */
  protected $signature = 'excel:avande';

  /**
   * The console command description.
   *
   * @var string
   */
  protected $description = 'Import Avande Events';

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
    Log::info('Loading Avande Events');

    Excel::import(
      new AvandeEventsImport(),
      'C4E_Avanade.xlsx',
      'excel'
    );
  }
}
