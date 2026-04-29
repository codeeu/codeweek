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
        Schema::table('training_resources', function (Blueprint $table) {
            $table->string('hero_button_text')->nullable()->after('hero_author');
            $table->string('hero_button_url')->nullable()->after('hero_button_text');
            $table->string('hero_secondary_button_text')->nullable()->after('hero_button_url');
            $table->string('hero_secondary_button_url')->nullable()->after('hero_secondary_button_text');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('training_resources', function (Blueprint $table) {
            $table->dropColumn([
                'hero_button_text',
                'hero_button_url',
                'hero_secondary_button_text',
                'hero_secondary_button_url',
            ]);
        });
    }
};
