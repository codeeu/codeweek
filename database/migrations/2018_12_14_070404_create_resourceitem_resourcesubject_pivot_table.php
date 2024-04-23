<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('resource_item_resource_subject', function (Blueprint $table) {
            $table->integer('resource_item_id')->unsigned()->index();
            $table->foreign('resource_item_id')->references('id')->on('resource_items')->onDelete('cascade');
            $table->integer('resource_subject_id')->unsigned()->index();
            $table->foreign('resource_subject_id')->references('id')->on('resource_subjects')->onDelete('cascade');
            $table->primary(['resource_item_id', 'resource_subject_id'], 'resitem_ressubject');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('resource_item_resource_subject');
    }
};
