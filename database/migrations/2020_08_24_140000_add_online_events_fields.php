<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddOnlineEventsFields extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('events', function (Blueprint $table) {
            //$table->string('registration_url')->nullable();
            $table->string('playback_url')->nullable();
            $table->string('highlighted_status')->default('NONE');
        });
    }



    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {

        Schema::table('events', function (Blueprint $table)
        {
//            $table->dropColumn('registration_url');
//            $table->dropColumn('playback_url');
//            $table->dropColumn('highlighted_status');
        });
    }
}
