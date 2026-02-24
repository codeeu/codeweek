<?php

namespace App\Console\Commands;

use App\Event;
use App\Helpers\ExcellenceWinnersHelper;
use App\Excellence as ExcellenceModel;
use Illuminate\Console\Command;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Log;

class Excellence extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'excellence {edition}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Tag users as winners of excellence certificates';

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

        $edition = (int) $this->argument('edition');

        $editionDate = Carbon::create($edition, 1, 1, 0, 0, 0);
        $codeweek4all_codes = ExcellenceWinnersHelper::query($editionDate, true)->pluck('codeweek_for_all_participation_code');

        //Select the winners from the Database
        $winners = [];
        foreach ($codeweek4all_codes as $codeweek4all_code) {
            $creators = Event::whereYear('end_date', '=', $edition)->where('status', 'APPROVED')->where('codeweek_for_all_participation_code', '=', $codeweek4all_code)->pluck('creator_id');
            foreach ($creators as $creator) {
                if (! in_array($creator, $winners)) {
                    $winners[] = $creator;
                }
            }
        }

        $created = 0;
        $existing = 0;
        $failed = 0;

        // Create or update one excellence record per winner.
        foreach ($winners as $user_id) {
            try {
                $record = ExcellenceModel::updateOrCreate(
                    [
                        'edition' => $edition,
                        'user_id' => (int) $user_id,
                        'type' => 'Excellence',
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

        $this->info("Excellence sync completed. Created: {$created}, Existing: {$existing}, Failed: {$failed}");
    }
}
