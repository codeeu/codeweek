<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        if (Schema::hasTable('failed_jobs') && !Schema::hasColumn('failed_jobs', 'uuid')) {
            Schema::table('failed_jobs', function (Blueprint $table) {
                $table->string('uuid')->after('id')->nullable()->unique();
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        if (Schema::hasTable('failed_jobs')) {
            // SQLite can't reliably drop columns + related indexes in all Laravel versions.
            if (DB::getDriverName() === 'sqlite') {
                return;
            }

            if (Schema::hasColumn('failed_jobs', 'uuid')) {
                Schema::table('failed_jobs', function (Blueprint $table) {
                    $table->dropUnique(['uuid']);
                    $table->dropColumn('uuid');
                });
            }
        }
    }
};
