<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class LoadAll extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'load:all';

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
        exec("php artisan load:countries");
        exec("php artisan load:tags");
        exec("php artisan load:users");
        exec("php artisan load:avatars");
        exec("php artisan load:providers");
        exec("php artisan load:events");
        exec("php artisan load:events:audiences");
        exec("php artisan load:events:themes");
        exec("php artisan load:events:tags");

    }
}
