<?php

namespace App\Console\Commands\excel;

use App\Imports\EventiEventsImport;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;
use Maatwebsite\Excel\Facades\Excel;

class EventiEvents extends Command
{
  /**
   * The name and signature of the console command.
   *
   * @var string
   */
  protected $signature = 'excel:eventi';

  /**
   * The console command description.
   *
   * @var string
   */
  protected $description = 'eventi 2025 From Excel File';

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
    Log::info('Loading eventi Excel File');

    Excel::import(
      new EventiEventsImport(),
      resource_path('excel/.xlsx')
    );
  }
}
