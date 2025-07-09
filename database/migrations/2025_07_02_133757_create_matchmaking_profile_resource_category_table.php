<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('matchmaking_profile_resource_category', function (Blueprint $table) {
            $table->unsignedBigInteger('matchmaking_profile_id');
            $table->unsignedInteger('resource_category_id');
            $table->primary(['matchmaking_profile_id', 'resource_category_id']);

            $table->foreign('matchmaking_profile_id', 'mmprc_profile_fk')
                ->references('id')->on('matchmaking_profiles')
                ->onDelete('cascade');
            
            $table->foreign('resource_category_id', 'mmprc_category_fk')
                ->references('id')->on('resource_categories')
                ->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('matchmaking_profile_resource_category');
    }
};
