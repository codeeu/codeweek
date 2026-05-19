<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        if (!Schema::hasTable('support_approvals')) {
            Schema::create('support_approvals', function (Blueprint $table) {
                $table->id();

                $table->foreignId('support_case_id')->constrained('support_cases')->cascadeOnDelete();

                $table->string('requested_action')->index();
                $table->json('payload_json')->nullable();
                $table->string('risk_level')->index();
                $table->string('status')->index();

                $table->string('approved_by')->nullable()->index();
                $table->timestamp('approved_at')->nullable()->index();
                $table->text('rejected_reason')->nullable();

                $table->string('correlation_id')->nullable()->index();
                $table->string('gmail_thread_id')->nullable()->index();
                $table->string('gmail_message_id')->nullable()->index();
                $table->string('notify_email')->nullable()->index();

                $table->timestamps();
            });

            return;
        }

        Schema::table('support_approvals', function (Blueprint $table) {
            if (!Schema::hasColumn('support_approvals', 'gmail_thread_id')) {
                $table->string('gmail_thread_id')->nullable()->index()->after('correlation_id');
            }
            if (!Schema::hasColumn('support_approvals', 'gmail_message_id')) {
                $table->string('gmail_message_id')->nullable()->index()->after('gmail_thread_id');
            }
            if (!Schema::hasColumn('support_approvals', 'notify_email')) {
                $table->string('notify_email')->nullable()->index()->after('gmail_message_id');
            }
        });
    }

    public function down(): void
    {
        if (!Schema::hasTable('support_approvals')) {
            return;
        }

        Schema::table('support_approvals', function (Blueprint $table) {
            $columns = array_filter([
                Schema::hasColumn('support_approvals', 'gmail_thread_id') ? 'gmail_thread_id' : null,
                Schema::hasColumn('support_approvals', 'gmail_message_id') ? 'gmail_message_id' : null,
                Schema::hasColumn('support_approvals', 'notify_email') ? 'notify_email' : null,
            ]);

            if ($columns !== []) {
                $table->dropColumn($columns);
            }
        });
    }
};
