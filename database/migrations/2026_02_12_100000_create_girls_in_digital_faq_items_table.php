<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        if (! Schema::hasTable('girls_in_digital_faq_items')) {
            Schema::create('girls_in_digital_faq_items', function (Blueprint $table) {
                $table->id();
                $table->unsignedBigInteger('page_id')->default(1);
                $table->unsignedInteger('position')->default(0);
                $table->text('question')->nullable();
                $table->text('answer')->nullable();
                $table->json('locale_overrides')->nullable();
                $table->timestamps();
            });
        }

        $page = 'girls_in_digital_page';
        if (Schema::hasColumn($page, 'faq_items')) {
            $row = DB::table($page)->where('id', 1)->first();
            if ($row && $row->faq_items) {
                $items = json_decode($row->faq_items, true);
                if (is_array($items)) {
                    foreach ($items as $i => $item) {
                        DB::table('girls_in_digital_faq_items')->insert([
                            'page_id' => 1,
                            'position' => $i,
                            'question' => $item['question'] ?? null,
                            'answer' => $item['answer'] ?? null,
                            'locale_overrides' => null,
                            'created_at' => now(),
                            'updated_at' => now(),
                        ]);
                    }
                }
            }
            Schema::table($page, function (Blueprint $table) use ($page) {
                $table->dropColumn('faq_items');
            });
        }
    }

    public function down(): void
    {
        Schema::dropIfExists('girls_in_digital_faq_items');
        if (! Schema::hasColumn('girls_in_digital_page', 'faq_items')) {
            Schema::table('girls_in_digital_page', function (Blueprint $table) {
                $table->json('faq_items')->nullable()->after('faq_title');
            });
        }
    }
};
