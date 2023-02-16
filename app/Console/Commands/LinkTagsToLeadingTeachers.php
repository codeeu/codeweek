<?php

namespace App\Console\Commands;

use App\Helpers\TagsHelper;
use App\User;
use Carbon\Carbon;
use Illuminate\Console\Command;

class LinkTagsToLeadingTeachers extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'link:tags';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Link Tags to Leading Teachers';

    private int $step = 100;

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        //Get all the leading teachers
        User::role("leading teacher")->chunk(100, function($users, $index){

            $this->reportProgress($index);
            $users->each(function($user){
                TagsHelper::linkTagToLeadingTeacher($user);

            });
        });
        //For each LT, link the tags


    }

    /**
     * @param $index
     */
    protected function reportProgress($index): void
    {
        $from = ($index - 1) * $this->step;
        $to = ($index - 1) * $this->step + $this->step;
        $this->info("Extracting Locations from events {$from} - {$to}");
    }
}
