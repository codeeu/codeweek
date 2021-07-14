<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLeadingTeacherActionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('leading_teacher_actions', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('type');
            $table->text('comment')->nullable();
            $table->date('completion_date');
            $table->integer('user_id')->unsigned();
            $table->string('status')->default('PENDING');
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
        Schema::dropIfExists('leading_teacher_actions');
    }
}
