<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('leading_teacher_expertise_user', function (Blueprint $table) {
            $table->integer('lte_id')->unsigned()->index();
            $table->foreign('lte_id', 'lteid')->references('id')->on('leading_teacher_expertises')->onDelete('cascade');
            $table->integer('user_id')->unsigned()->index();
            $table->foreign('user_id', 'uid')->references('id')->on('users')->onDelete('cascade');
            $table->primary(['lte_id', 'user_id'], 'item_lte_pk');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::drop('leading_teacher_expertise_user');
    }
};
