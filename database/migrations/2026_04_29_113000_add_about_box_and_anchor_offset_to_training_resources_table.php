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
            $table->longText('about_box_section')->nullable()->after('register_box_section');
            $table->unsignedInteger('anchor_offset')->nullable()->after('about_box_section');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('training_resources', function (Blueprint $table) {
            $table->dropColumn([
                'about_box_section',
                'anchor_offset',
            ]);
        });
    }
};
