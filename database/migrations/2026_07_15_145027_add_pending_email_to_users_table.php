<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('pending_email')->nullable()->after('email_display');
            $table->string('pending_email_token', 64)->nullable()->after('pending_email');
            $table->timestamp('pending_email_requested_at')->nullable()->after('pending_email_token');
        });
    }

    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn(['pending_email', 'pending_email_token', 'pending_email_requested_at']);
        });
    }
};
