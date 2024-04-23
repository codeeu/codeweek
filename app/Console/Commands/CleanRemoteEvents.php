<?php

namespace App\Console\Commands;

use App\Helpers\ImporterHelper;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;

class CleanRemoteEvents extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'clean:remote';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Clean Remote Events';

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
    public function handle(): void
    {
        Log::info('Calling Clean Remote Events');

        ImporterHelper::clean();

        Log::info('Done Calling Clean Remote Events');
    }
}
