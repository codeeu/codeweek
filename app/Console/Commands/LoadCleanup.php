<?php

namespace App\Console\Commands;


use App\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Schema;

class LoadCleanup extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'load:cleanup';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Drops old tables';

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
        Log::debug('Cleanup');

        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        Schema::drop('api_event');
        Schema::drop('api_event_audience');
        Schema::drop('api_event_theme');
        Schema::drop('api_eventaudience');
        Schema::drop('api_eventtheme');
        Schema::drop('api_socialaccountlist');
        Schema::drop('api_userprofile');
        Schema::drop('auth_group');
        Schema::drop('auth_group_permissions');
        Schema::drop('auth_permission');
        Schema::drop('auth_user');
        Schema::drop('auth_user_groups');
        Schema::drop('auth_user_user_permissions');
        Schema::drop('avatar_avatar');
        Schema::drop('countries_plus_country');
        Schema::drop('django_admin_log');
        Schema::drop('django_content_type');
        Schema::drop('django_migrations');
        Schema::drop('django_session');
        Schema::drop('django_site');
        Schema::drop('social_auth_association');
        Schema::drop('social_auth_code');
        Schema::drop('social_auth_nonce');
        Schema::drop('social_auth_usersocialauth');
        Schema::drop('south_migrationhistory');
        Schema::drop('taggit_tag');
        Schema::drop('taggit_taggeditem');
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');





    }
}
