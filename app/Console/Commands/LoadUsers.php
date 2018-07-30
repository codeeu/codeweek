<?php

namespace App\Console\Commands;


use App\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class LoadUsers extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'load:users';

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
        Log::debug('Load users');

        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('users')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        $old_users = DB::table('auth_user')
            ->leftJoin('api_userprofile','api_userprofile.user_id',"=","auth_user.id")
            ->get();


        foreach ($old_users as $old) {

            $new = new User();
            $new->id = $old->user_id;
            $new->password = $old->password;
            $new->firstname= $old->first_name;
            $new->lastname= $old->last_name;
            $new->username= $old->username;

            $new->email= $old->email;

            $new->country_iso= $old->country;
            $new->twitter= $old->twitter;
            $new->website= $old->website;
            $new->bio= $old->bio;

            $new->save();
        }
    }
}
