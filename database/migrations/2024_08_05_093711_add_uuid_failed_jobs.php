<?php

/**
 * @Author: Bernard Hanna
 * @Date:   2025-03-21 18:42:08
 * @Last Modified by:   Bernard Hanna
 * @Last Modified time: 2025-03-22 13:18:45
 */


use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddUuidFailedJobs extends Migration
{
    public function up()
    {
        Schema::table('failed_jobs', function (Blueprint $table) {
            if (!Schema::hasColumn('failed_jobs', 'uuid')) {
                $table->string('uuid')->nullable()->after('id');
            }
        });
    }

    public function down()
    {
        Schema::table('failed_jobs', function (Blueprint $table) {
            if (Schema::hasColumn('failed_jobs', 'uuid')) {
                $table->dropColumn('uuid');
            }
        });
    }
}
