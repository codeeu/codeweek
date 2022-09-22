<?php

namespace App\Console\Commands\api;


use App\BadenRSSItem;
use App\Helpers\ImporterHelper;
use Illuminate\Console\Command;
use Illuminate\Support\Arr;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;


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
     *
     * @return mixed
     */
    public function handle()
    {

        dump("Loading German events");

        $germanCities = ImporterHelper::getGermanCities();

        foreach ($germanCities as $city){
            $this->call("api:{$city}");
        }



        dump("Done Loading German events");


    }


}
