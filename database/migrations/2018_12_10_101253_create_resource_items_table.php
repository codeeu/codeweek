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
        Schema::create('resource_items', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('source');
            $table->text('description');
            $table->string('thumbnail')->nullable();
            $table->string('facebook')->nullable();
            $table->string('twitter')->nullable();
            $table->boolean('active')->default(true);
            $table->boolean('teach')->default(true);
            $table->boolean('learn')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('resource_items');
    }
};
