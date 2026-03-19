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
        Schema::create('training_resources', function (Blueprint $table) {
            $table->id();
            $table->string('slug')->unique();
            $table->string('card_title');
            $table->string('card_author')->nullable();
            $table->string('card_image')->nullable();
            $table->string('page_title');
            $table->string('hero_author')->nullable();
            $table->longText('intro')->nullable();
            $table->longText('content')->nullable();
            $table->string('button_text')->nullable();
            $table->string('button_url')->nullable();
            $table->string('meta_title')->nullable();
            $table->text('meta_description')->nullable();
            $table->unsignedInteger('position')->default(0)->nullable();
            $table->boolean('active')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('training_resources');
    }
};
