<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;

class EventSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        create('App\Event',[
            'status' => 'APPROVED',
            'title' => 'Boitsfort Coding',
            'geoposition' => '50.8093378,4.4088449',
            'start_date' => Carbon::yesterday(),
            'end_date' => Carbon::now()->addYear(),

        ]);

        factory(App\Event::class, 200)->create();
    }
}
