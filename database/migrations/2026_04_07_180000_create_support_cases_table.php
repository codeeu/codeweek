<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('support_cases', function (Blueprint $table) {
            $table->id();

            $table->string('source_channel')->index(); // gmail_forwarded, gmail_label, manual
            $table->string('processing_mode')->index(); // manual, forwarded, label_auto

            $table->string('gmail_message_id')->nullable()->index();
            $table->string('gmail_thread_id')->nullable()->index();

            $table->string('forwarded_by_email')->nullable()->index();
            $table->string('original_sender_email')->nullable()->index();
            $table->string('assigned_to_email')->nullable()->index();

            $table->string('subject');
            $table->longText('raw_message');
            $table->longText('normalized_message')->nullable();

            $table->string('status')->index(); // new, triaged, investigating, awaiting_approval, action_executed, verified, draft_ready, resolved, closed, escalated
            $table->string('case_type')->nullable()->index();
            $table->decimal('confidence', 5, 4)->nullable();
            $table->string('risk_level')->default('low')->index(); // low, medium, high
            $table->string('assigned_runbook')->nullable();

            $table->string('target_email')->nullable()->index();
            $table->json('secondary_emails')->nullable();
            $table->unsignedBigInteger('target_user_id')->nullable()->index();

            $table->boolean('needs_human_review')->default(false)->index();
            $table->string('human_approved_by')->nullable();

            $table->text('final_resolution')->nullable();
            $table->string('draft_reply_to')->nullable();
            $table->string('draft_reply_subject')->nullable();

            $table->string('correlation_id')->nullable()->index();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('support_cases');
    }
};

