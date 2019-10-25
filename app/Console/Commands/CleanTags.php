<?php

namespace App\Console\Commands;

use App\Helpers\TagsHelper;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;

class CleanTags extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'clean:tags';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Clean Tags';

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
        Log::info("Calling Clean Tags");
        TagsHelper::cleanTags();
        Log::info("Done Calling Clean Tags");
    }
}
