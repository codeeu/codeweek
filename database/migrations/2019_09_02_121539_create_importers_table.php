<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateImportersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('importers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('original_id');
            $table->integer('event_id')->unsigned();
            $table->timestamp('original_updated_at');
            $table->timestamp('seen_at');
            $table->string('status')->default('ADDED');
            $table->string('website');
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
        Schema::dropIfExists('importers');
    }
}
