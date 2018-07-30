<?php

namespace App\Console\Commands;

use DB;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;

class LoadEventsAudience extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'load:events:audiences';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

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
        Log::debug('Load events Audience');

        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('audience_event')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');


        $old_audience = DB::table('api_event_audience')
            ->get();


        foreach ($old_audience as $old) {

            DB::table('audience_event')->insert(
                ['event_id' => $old->event_id, 'audience_id' => $old->eventaudience_id]
            );

        }

    }
}
