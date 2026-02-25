<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        if (Schema::hasTable('hackathons_page') && !Schema::hasColumn('hackathons_page', 'extra_button_text')) {
            Schema::table('hackathons_page', function (Blueprint $table) {
                $table->string('extra_button_text')->nullable()->after('video_url');
            });
        }

        if (Schema::hasTable('hackathons_page') && !Schema::hasColumn('hackathons_page', 'extra_button_link')) {
            Schema::table('hackathons_page', function (Blueprint $table) {
                $table->string('extra_button_link')->nullable()->after('extra_button_text');
            });
        }
    }

    public function down(): void
    {
        if (Schema::hasTable('hackathons_page') && Schema::hasColumn('hackathons_page', 'extra_button_link')) {
            Schema::table('hackathons_page', function (Blueprint $table) {
                $table->dropColumn('extra_button_link');
            });
        }

        if (Schema::hasTable('hackathons_page') && Schema::hasColumn('hackathons_page', 'extra_button_text')) {
            Schema::table('hackathons_page', function (Blueprint $table) {
                $table->dropColumn('extra_button_text');
            });
        }
    }
};
