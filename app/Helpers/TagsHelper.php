<?php

namespace App\Helpers;

use App\Event;
use App\Tag;
use App\User;
use Carbon\Carbon;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class TagsHelper
{

    public static function cleanTags()
    {


        // Mysql bug: https://bugs.mysql.com/bug.php?id=62755
        //DB::statement("SET SESSION max_heap_table_size=536870912");
        //DB::statement("SET SESSION tmp_table_size=536870912");


        // Get all the duplicate tags
        $duplicate_tags = DB::table('tags')
            ->select(DB::raw('count(id),  name'))
            ->having('count(id)', '>', 1)
            ->groupBy('name')
            ->get();








        // For each tag, get the ids.
        foreach ($duplicate_tags as $duplicate_tag) {
            $arrayOfIds = DB::table('tags')
                ->select('id')
                ->where('name', "=", $duplicate_tag->name)
                ->get()
                ->pluck('id')
                ->toArray();


            $mainId = array_shift($arrayOfIds);


            try {
                DB::table('event_tag')->whereIn('tag_id', $arrayOfIds)->update(array('tag_id' => $mainId));
                Tag::destroy($arrayOfIds);
            } catch (Exception $ex) {
                dump("Error with : '" . $duplicate_tag->name . "'");
                //Fallback to one by one
                foreach ($arrayOfIds as $id) {

                    try {
                        DB::table('event_tag')->where('tag_id', $id)->update(['tag_id' => $mainId]);
                        Tag::destroy($id);

                    } catch (Exception $ex) {
                        dump("Error with : '" . $duplicate_tag->name . "'");

                        //dump($ex->getTrace()[0]["args"]);
                        if ($ex->getCode() === "23000") {
                            dump('caught unicity exception');
//                            Log::info($ex->getMessage());
//                            Log::info("Deleting {$id}");
                            DB::table('event_tag')->where('tag_id', $id)->delete();
                        }
                    }
                }

            }

            //Log::info("Main ID: {$mainId}");
            //Log::info($arrayOfIds);


            Log::info('done for ' . $duplicate_tag->name);

        }
    }


}