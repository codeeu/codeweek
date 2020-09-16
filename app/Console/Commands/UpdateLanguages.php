<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class UpdateLanguages extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'update:languages';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Update Languages of Meet and Code events';

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
     * @return int
     */
    public function handle()
    {
        return 0;
    }
}
