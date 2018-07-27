<?php

namespace App\Console\Commands;

use App\Country;
use App\Tag;
use App\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class LoadProviders extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'load:providers';

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
        var_dump('Load providers');


        $providers = DB::table('social_auth_usersocialauth')
            ->get();


        foreach ($providers as $provider) {


            User::where('id', $provider->user_id)
                ->update(['provider' => $provider->provider]);


        }
    }
}
