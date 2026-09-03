<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    private array $tables = [
        'baden_r_s_s_items',
        'bayern_r_s_s_items',
        'berlin_r_s_s_items',
        'bonn_r_s_s_items',
        'bremen_r_s_s_items',
        'dresden_r_s_s_items',
        'hamburg_r_s_s_items',
        'leipzig_r_s_s_items',
        'muensterland_r_s_s_items',
        'niedersachsen_r_s_s_items',
        'nordhessen_r_s_s_items',
        'thueringen_r_s_s_items',
    ];

    public function up(): void
    {
        foreach ($this->tables as $table) {
            if (! Schema::hasTable($table)) {
                continue;
            }
            if (! Schema::hasColumn($table, 'leading_teacher_tag')) {
                Schema::table($table, function (Blueprint $blueprint) {
                    $blueprint->string('leading_teacher_tag')->nullable()->after('tags');
                });
            }
        }
    }

    public function down(): void
    {
        foreach ($this->tables as $table) {
            if (! Schema::hasTable($table)) {
                continue;
            }
            if (Schema::hasColumn($table, 'leading_teacher_tag')) {
                Schema::table($table, function (Blueprint $blueprint) {
                    $blueprint->dropColumn('leading_teacher_tag');
                });
            }
        }
    }
};
