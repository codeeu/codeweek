<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateResourceSubjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('resource_subjects', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->integer('position');
            $table->boolean('active')->default(true);
            $table->boolean('teach')->default(true);
            $table->boolean('learn')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('resource_subjects');
    }
}
