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
        Schema::create('res_pl_pivot', function (Blueprint $table) {
            $table->integer('resource_item_id')->unsigned()->index();
            $table->foreign('resource_item_id', 'item_fk')->references('id')->on('resource_items')->onDelete('cascade');
            $table->integer('resource_programming_language_id')->unsigned()->index();
            $table->foreign('resource_programming_language_id', 'prog_fk')->references('id')->on('resource_programming_languages')->onDelete('cascade');
            $table->primary(['resource_item_id', 'resource_programming_language_id'], 'item_prog_pk');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::drop('res_pl_pivot');
    }
};
