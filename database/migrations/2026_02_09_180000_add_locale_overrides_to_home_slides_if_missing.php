<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Add locale_overrides column to home_slides if missing.
     * Safe to run on any environment (idempotent).
     */
    public function up(): void
    {
        if (Schema::hasTable('home_slides') && ! Schema::hasColumn('home_slides', 'locale_overrides')) {
            Schema::table('home_slides', function (Blueprint $table) {
                $table->json('locale_overrides')->nullable()->after('button2_text');
            });
        }
    }

    public function down(): void
    {
        if (Schema::hasColumn('home_slides', 'locale_overrides')) {
            Schema::table('home_slides', function (Blueprint $table) {
                $table->dropColumn('locale_overrides');
            });
        }
    }
};
