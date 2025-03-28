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
        Schema::create('resource_item_resource_type', function (Blueprint $table) {
            $table->integer('resource_item_id')->unsigned()->index();
            $table->foreign('resource_item_id')->references('id')->on('resource_items')->onDelete('cascade');
            $table->integer('resource_type_id')->unsigned()->index();
            $table->foreign('resource_type_id')->references('id')->on('resource_types')->onDelete('cascade');
            $table->primary(['resource_item_id', 'resource_type_id'], 'resitem_restype');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::drop('resource_item_resource_type');
    }
};
