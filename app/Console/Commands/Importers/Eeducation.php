<?php

namespace App\Console\Commands\Importers;

use App\Helpers\ImporterHelper;
use App\Imports\RemoteImporter;
use Illuminate\Console\Command;
use Feeds;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Client;

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
        dump("Loading Eeducation");

        // Create or Load Eeducation Technical User
        //$techicalUserID = ImporterHelper::getTechnicalUser("eeducation-technical");

        // Read the API
        $endpoint = "https://eeducation.at/rest-api/codeweek-activities/?clientid=" . env("EEDUCATION_CLIENTID");

        $client = new Client();

        $response = $client->get($endpoint);
        $eventsArr = json_decode((string)$response->getBody());


        $importer = new RemoteImporter("Eeducation", $eventsArr);
        $metrics = $importer->import();

        dump("Records  : " . $metrics[0]);
        dump("Added    : " . $metrics[1]);
        dump("Updated  : " . $metrics[2]);


        // Process the events

    }
}
