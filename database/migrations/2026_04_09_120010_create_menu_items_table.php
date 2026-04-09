<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('menu_items', function (Blueprint $table) {
            $table->id();
            $table->foreignId('menu_section_id')->constrained('menu_sections')->cascadeOnDelete();

            $table->string('label')->nullable(); // optional literal label
            $table->string('label_key')->nullable(); // optional translation key (preferred)
            $table->json('label_overrides')->nullable(); // { "en": "Custom", "fr": "..." }

            $table->string('url')->nullable(); // for external or internal hard links
            $table->string('route_name')->nullable(); // preferred for internal links
            $table->json('route_params')->nullable();

            $table->boolean('open_in_new_tab')->default(false);
            $table->boolean('is_active')->default(true)->index();
            $table->unsignedInteger('sort_order')->default(0)->index();

            $table->timestamps();

            $table->index(['menu_section_id', 'sort_order']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('menu_items');
    }
};

