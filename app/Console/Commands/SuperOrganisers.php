<?php

namespace App\Console\Commands;

use App\Queries\SuperOrganiserQuery;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;

class SuperOrganisers extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'superorganisers {edition}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Allow superorganisers to generate certificates';

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
        $edition = $this->argument('edition');

        $winners = SuperOrganiserQuery::winners($edition);

        foreach ($winners as $user_id) {
            try {
                create(\App\Excellence::class, ['edition' => $edition, 'user_id' => $user_id, 'type' => 'SuperOrganiser']);
            } catch (\Exception $ex) {
                Log::info($ex->getMessage());
            }
        }

    }
}
