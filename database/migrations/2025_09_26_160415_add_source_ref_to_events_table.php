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
        Schema::table('events', function (Blueprint $table) {
            $table->string('source_ref', 191)->nullable()->unique()->after('language');
            $table->timestamp('source_synced_at')->nullable()->after('source_ref');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('events', function (Blueprint $table) {
            $table->dropUnique(['source_ref']);
            $table->dropColumn(['source_ref','source_synced_at']);
        });
    }
};
