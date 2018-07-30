<?php

namespace App\Console\Commands;

use DB;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;

class LoadEventsTheme extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'load:events:themes';

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
        Log::debug('Load events Themes');

        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('event_theme')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');


        $old_theme = DB::table('api_event_theme')
            ->get();


        foreach ($old_theme as $old) {

            DB::table('event_theme')->insert(
                ['event_id' => $old->event_id, 'theme_id' => $old->eventtheme_id]
            );

        }

    }
}
