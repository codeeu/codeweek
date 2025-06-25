<?php

namespace App\Console\Commands;

use App\Event;
use App\Helpers\ExcellenceWinnersHelper;
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

        $edition = $this->argument('edition');

        $codeweek4all_codes = ExcellenceWinnersHelper::query(Carbon::now()->year($edition), true)->pluck('codeweek_for_all_participation_code');

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

        //Create an excellence record for each winner
        foreach ($winners as $user_id) {
            try {
                create(\App\Excellence::class, ['edition' => $edition, 'user_id' => $user_id]);
            } catch (\Exception $ex) {
                Log::info($ex->getMessage());
            }
        }
    }
}
