<?php

namespace App\Console\Commands;

use App\Excellence as ExcellenceModel;
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
     */
    public function handle(): void
    {
        $edition = $this->argument('edition');

        $winners = SuperOrganiserQuery::winners($edition);

        $created = 0;
        $existing = 0;
        $failed = 0;

        foreach ($winners as $user_id) {
            try {
                $record = ExcellenceModel::updateOrCreate(
                    [
                        'edition' => (int) $edition,
                        'user_id' => (int) $user_id,
                        'type' => 'SuperOrganiser',
                    ],
                    []
                );

                if ($record->wasRecentlyCreated) {
                    $created++;
                } else {
                    $existing++;
                }
            } catch (\Exception $ex) {
                $failed++;
                Log::info($ex->getMessage());
            }
        }

        $this->info("Super organiser sync completed. Created: {$created}, Existing: {$existing}, Failed: {$failed}");
    }
}
