<?php

namespace App\Console\Commands;

use App\Event;
use App\User;
use Illuminate\Console\Command;

class LoadOrphans extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'load:orphans';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Load and link events with user that have no email set';

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

        //Set email to dikovicnatalija@gmail.com for user 10358
        User::where('id', 10358)
            ->update(['email' => 'dikovicnatalija@gmail.com']);

        //Update event 138402 to move from user without email (18952) to user with email (124956)
        Event::where('id',138402)
            ->update(['creator_id' => 124956]);
    }
}
