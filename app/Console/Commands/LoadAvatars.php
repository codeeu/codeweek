<?php

namespace App\Console\Commands;


use App\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class LoadAvatars extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'load:avatars';

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
        Log::debug('Load avatars');


        $avatars = DB::table('avatar_avatar')
            ->get();


        foreach ($avatars as $avatar) {

            if ($avatar->primary == 1) {


                User::where('id', $avatar->user_id)
                    ->update(['avatar_path' => $avatar->avatar]);

            }


        }
    }
}
