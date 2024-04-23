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
    public function up(): void
    {
        Schema::create('resource_category_resource_item', function (Blueprint $table) {
            $table->integer('resource_item_id')->unsigned()->index();
            $table->foreign('resource_item_id')->references('id')->on('resource_items')->onDelete('cascade');
            $table->integer('resource_category_id')->unsigned()->index();
            $table->foreign('resource_category_id')->references('id')->on('resource_categories')->onDelete('cascade');
            $table->primary(['resource_item_id', 'resource_category_id'], 'resitem_rescategory');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(): void
    {
        Schema::drop('resource_category_resource_item');
    }
};
