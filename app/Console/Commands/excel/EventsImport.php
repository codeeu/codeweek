<?php

namespace App\Console\Commands\excel;

use App\Imports\EventsImport;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;
use Maatwebsite\Excel\Facades\Excel;

class EventsImporter extends Command
{
  /**
   * The name and signature of the console command.
   *
   * @var string
   */
  protected $signature = 'excel:events-import';

  /**
   * The console command description.
   *
   * @var string
   */
  protected $description = 'events 2025 From Excel File';

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
    Log::info('Loading events Excel File');

    Excel::import(
      new EventsImporter(),
            '3-june.xlsx',
            'excel'
    );
  }
}
