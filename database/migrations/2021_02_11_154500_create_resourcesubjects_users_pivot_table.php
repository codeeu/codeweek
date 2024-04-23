<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateResourceSubjectsUsersPivotTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('resource_subject_user', function (Blueprint $table) {
            $table->integer('resource_subject_id')->unsigned()->index();
            $table->foreign('resource_subject_id')->references('id')->on('resource_subjects')->onDelete('cascade');
            $table->integer('user_id')->unsigned()->index();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->primary(['resource_subject_id', 'user_id'], 'ressubject_user');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('resource_subject_user');
    }
}
