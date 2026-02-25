<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        if (Schema::hasTable('dream_job_role_models') && !Schema::hasColumn('dream_job_role_models', 'pathway_title')) {
            Schema::table('dream_job_role_models', function (Blueprint $table) {
                $table->text('pathway_title')->nullable()->after('pathway_map_link');
            });
        }

        if (Schema::hasTable('dream_job_role_models') && !Schema::hasColumn('dream_job_role_models', 'pathway_cta_text')) {
            Schema::table('dream_job_role_models', function (Blueprint $table) {
                $table->string('pathway_cta_text')->nullable()->after('pathway_title');
            });
        }
    }

    public function down(): void
    {
        if (Schema::hasTable('dream_job_role_models') && Schema::hasColumn('dream_job_role_models', 'pathway_cta_text')) {
            Schema::table('dream_job_role_models', function (Blueprint $table) {
                $table->dropColumn('pathway_cta_text');
            });
        }

        if (Schema::hasTable('dream_job_role_models') && Schema::hasColumn('dream_job_role_models', 'pathway_title')) {
            Schema::table('dream_job_role_models', function (Blueprint $table) {
                $table->dropColumn('pathway_title');
            });
        }
    }
};
