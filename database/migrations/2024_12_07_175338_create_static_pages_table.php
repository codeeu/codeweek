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
        Schema::create('static_pages', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->boolean('is_searchable')->default(true);
            $table->string('category')->nullable();
            $table->enum('link_type', ['internal_link', 'external_link'])->default('internal_link');
            $table->text('description')->nullable();
            $table->string('language', 2)->default('en');
            $table->string('unique_identifier');
            $table->string('path')->unique();
            $table->json('keywords')->nullable();
            $table->string('thumbnail')->nullable();
            $table->string('meta_title')->nullable();
            $table->text('meta_description')->nullable();
            $table->text('meta_keywords')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('static_pages');
    }
};
