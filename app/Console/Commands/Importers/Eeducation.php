<?php

namespace App\Console\Commands\Importers;

use App\Helpers\ImporterHelper;
use App\Imports\RemoteImporter;
use Exception;
use Illuminate\Console\Command;
use Feeds;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Log;


class Eeducation extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'import:eeducation';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Import the data from Eeducation Feed';

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
        Log::info("Loading Eeducation");

        // Create or Load Eeducation Technical User
        //$techicalUserID = ImporterHelper::getTechnicalUser("eeducation-technical");

        if (is_null(env("EEDUCATION_CLIENTID"))) {
            throw new Exception('Please Specify the EEducation Endpoint in the .env file');
        };


        // Read the API
        $endpoint = "https://eeducation.at/rest-api/codeweek-activities/?clientid=" . env("EEDUCATION_CLIENTID");

        $client = new Client();

        $response = $client->get($endpoint);

        $eventsArr = json_decode((string)$response->getBody());

        if (is_null($eventsArr)){
            Log::error($response->getBody());
            return;
        }
        $importer = new RemoteImporter("Eeducation", $eventsArr);
        $metrics = $importer->import();

        Log::info("Records  : " . $metrics[0]);
        Log::info("Added    : " . $metrics[1]);
        Log::info("Updated  : " . $metrics[2]);




    }
}
