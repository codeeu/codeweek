<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateResourceItemResourceLevelPivotTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('resource_item_resource_level', function (Blueprint $table) {
            $table->integer('resource_item_id')->unsigned()->index();
            $table->foreign('resource_item_id')->references('id')->on('resource_items')->onDelete('cascade');
            $table->integer('resource_level_id')->unsigned()->index();
            $table->foreign('resource_level_id')->references('id')->on('resource_levels')->onDelete('cascade');
            $table->primary(['resource_item_id', 'resource_level_id'], 'resitem_reslevel');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('resource_item_resource_level');
    }
}
