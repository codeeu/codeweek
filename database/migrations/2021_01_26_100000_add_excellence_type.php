<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddExcellenceType extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::table('excellences', function (Blueprint $table) {

            $table->dropUnique(["user_id","edition"]);
            $table->string('type')->default('Excellence');
            $table->unique(['user_id', 'edition','type']);
        });
    }


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('excellences', function (Blueprint $table) {

        });


    }
}
