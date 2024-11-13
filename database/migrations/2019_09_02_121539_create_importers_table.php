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
        Schema::create('importers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('original_id');
            $table->integer('event_id')->unsigned();
            $table->timestamp('original_updated_at');
            $table->timestamp('seen_at');
            $table->string('status')->default('ADDED');
            $table->string('website');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('importers');
    }
};
