<?php

namespace App\Console\Commands;

use App\Helpers\UserHelper;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;

class DeleteUnactiveUsers extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'delete:unactiveusers';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Delete user after 5 years of no activity';

    /**
     * Execute the console command.
     */
    public function handle(): int
    {
        $deletedUsers = UserHelper::deleteInactiveUsers(5);
        $admin = config('codeweek.administrator');
        Mail::to($admin)->queue(new \App\Mail\DeletedUsers($deletedUsers));
    }
}
