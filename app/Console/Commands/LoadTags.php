<?php

namespace App\Console\Commands;


use App\Tag;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class LoadTags extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'load:tags';

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
        Log::debug('Load tags');

        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('tags')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        $old_tags = DB::table('taggit_tag')
            ->select(DB::raw('id, name, slug'))
            ->get();


        foreach ($old_tags as $old) {

            $new = new Tag();
            $new->id = $old->id;
            $new->name = $old->name;
            $new->slug = $old->slug;
            $new->save();
        }
    }
}
