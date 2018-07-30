<?php

namespace App\Console\Commands;

use DB;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;

class LoadAdmins extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'load:admins';

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
        Log::debug('Load Admins');

        $old_admins = DB::table('auth_user')
            ->where('is_staff',"=",1)
            ->get();

        foreach ($old_admins as $old) {

            DB::table('model_has_roles')->insert(
                ['role_id' => 5,'model_type'=>'App\User', 'model_id' => $old->id]
            );


        }
    }
}
