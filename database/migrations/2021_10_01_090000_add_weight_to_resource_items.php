<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddWeightToResourceItems extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('resource_items', function (Blueprint $table) {
            //$table->string('registration_url')->nullable();

            $table->unsignedInteger('weight')->default(10);

        });
    }


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {

        Schema::table('resource_items', function (Blueprint $table) {
            $table->dropColumn('weight');
        });
    }
}
