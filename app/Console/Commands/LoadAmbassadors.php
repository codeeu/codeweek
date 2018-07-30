<?php

namespace App\Console\Commands;

use DB;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;

class LoadAmbassadors extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'load:ambassadors';

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
        Log::debug('Load Ambassadors');

        $old_ambassadors = DB::table('auth_user_groups')
            ->select(DB::raw('user_id'))
            ->get();


        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('model_has_roles')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');


        foreach ($old_ambassadors as $old) {

            DB::table('model_has_roles')->insert(
                ['role_id' => 3,'model_type'=>'App\User', 'model_id' => $old->user_id]
            );
        }
    }
}
