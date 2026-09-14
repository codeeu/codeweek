<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('support_cases', function (Blueprint $table) {
            if (!Schema::hasColumn('support_cases', 'cursor_agent_id')) {
                $table->string('cursor_agent_id')->nullable()->index()->after('assigned_runbook');
            }
            if (!Schema::hasColumn('support_cases', 'cursor_agent_status')) {
                $table->string('cursor_agent_status')->nullable()->after('cursor_agent_id');
            }
            if (!Schema::hasColumn('support_cases', 'cursor_pr_url')) {
                $table->string('cursor_pr_url')->nullable()->after('cursor_agent_status');
            }
            if (!Schema::hasColumn('support_cases', 'live_promotion_pr_url')) {
                $table->string('live_promotion_pr_url')->nullable()->after('cursor_pr_url');
            }
        });
    }

    public function down(): void
    {
        // SQLite refuses to drop a column while an index still references it.
        if (Schema::hasColumn('support_cases', 'cursor_agent_id')) {
            Schema::table('support_cases', function (Blueprint $table) {
                $table->dropIndex('support_cases_cursor_agent_id_index');
            });
        }

        Schema::table('support_cases', function (Blueprint $table) {
            foreach (['cursor_agent_id', 'cursor_agent_status', 'cursor_pr_url', 'live_promotion_pr_url'] as $column) {
                if (Schema::hasColumn('support_cases', $column)) {
                    $table->dropColumn($column);
                }
            }
        });
    }
};
