<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddIndexToExperiences extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('experiences', function(Blueprint $table)
        {
            $table->index('year');
            $table->index('user_id');
        });
    }



    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {

        Schema::table('experiences', function (Blueprint $table)
        {
            $table->dropIndex(['year']);
            $table->dropIndex(['user_id']);
        });
    }
}
