<?php

namespace App\Console\Commands;

use App\Helpers\TagsHelper;
use App\Tag;
use App\User;
use Illuminate\Console\Command;

class LinkLeadingTeachersToActivities extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'link:lt';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Should sync the events with the leading teachers based on their tags';

    /**
     * Execute the console command.
     */
    public function handle(): void
    {
        //Get the leading teachers
        $leading_teachers = User::role('leading teacher')
            ->whereNotNull('tag')
            ->get();

        //For each LT, get the tag in name
        foreach ($leading_teachers as $leading_teacher) {
            $nameInTag = TagsHelper::getNameInTag($leading_teacher->tag);

            //Find the tags with this name
            $tags = Tag::where('name', 'LIKE', '%-'.$nameInTag.'-%')->get();

            //Foreach tag, get the activities and update them
            foreach ($tags as $tag) {
                $activities = $tag->events;

                foreach ($activities as $activity) {

                    //Update each activity linked to the tag with the LT ID
                    $activity->update(['leading_teacher_tag' => $leading_teacher->tag]);
                }
            }

        }

    }
}
