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
        if (Schema::hasTable('training_resources') && ! Schema::hasColumn('training_resources', 'locale_overrides')) {
            Schema::table('training_resources', function (Blueprint $table) {
                $table->json('locale_overrides')->nullable()->after('pdf_links_section');
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        if (Schema::hasColumn('training_resources', 'locale_overrides')) {
            Schema::table('training_resources', function (Blueprint $table) {
                $table->dropColumn('locale_overrides');
            });
        }
    }
};
