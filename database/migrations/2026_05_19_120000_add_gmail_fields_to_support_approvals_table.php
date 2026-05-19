<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('support_approvals', function (Blueprint $table) {
            $table->string('gmail_thread_id')->nullable()->index()->after('correlation_id');
            $table->string('gmail_message_id')->nullable()->index()->after('gmail_thread_id');
            $table->string('notify_email')->nullable()->index()->after('gmail_message_id');
        });
    }

    public function down(): void
    {
        Schema::table('support_approvals', function (Blueprint $table) {
            $table->dropColumn(['gmail_thread_id', 'gmail_message_id', 'notify_email']);
        });
    }
};
