<?php

namespace App\Console\Commands\api;

use App\Helpers\ImporterHelper;
use Illuminate\Console\Command;

class Germany extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'api:germany';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Import German Events';

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
    public function handle()
    {

        dump('Loading German events');

        $germanCities = ImporterHelper::getGermanCities();

        foreach ($germanCities as $city) {
            $this->call("api:{$city}");
        }

        dump('Done Loading German events');

    }
}
