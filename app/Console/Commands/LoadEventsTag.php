<?php

namespace App\Console\Commands;

use DB;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;

class LoadEventsTag extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'load:events:tags';

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
        Log::debug('Load events Tags');

        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('event_tag')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');


        $old_tagged = DB::table('taggit_taggeditem')
            ->get();


        foreach ($old_tagged as $old) {

            DB::table('event_tag')->insert(
                ['event_id' => $old->object_id, 'tag_id' => $old->tag_id]
            );

        }

    }
}
