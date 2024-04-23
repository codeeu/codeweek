<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateResourceProgrammingLanguagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('resource_programming_languages', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->integer('position');
            $table->boolean('active')->default(true);
            $table->boolean('teach')->default(true);
            $table->boolean('learn')->default(true);
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
        Schema::dropIfExists('resource_programming_languages');
    }
}
