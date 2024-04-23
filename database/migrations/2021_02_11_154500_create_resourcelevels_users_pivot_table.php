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
        Schema::create('resource_level_user', function (Blueprint $table) {
            $table->integer('resource_level_id')->unsigned()->index();
            $table->foreign('resource_level_id')->references('id')->on('resource_levels')->onDelete('cascade');
            $table->integer('user_id')->unsigned()->index();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->primary(['resource_level_id', 'user_id'], 'reslevel_user');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::drop('resource_level_user');
    }
};
