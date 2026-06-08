<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        if (! Schema::hasTable('grassroots_grants_hubs')) {
            return;
        }

        $updates = [
            'Poland – KPI' => [
                'hub_status' => 'not_launched',
                'status_message' => '<p>The small grants call was not launched in Poland during the implementation period. As a result, no projects were funded under Round 1 in this country.</p>',
            ],
            'Malta – eSkills Malta' => [
                'hub_status' => 'cancelled',
                'status_message' => '<p>The small grants call in Malta was cancelled due to a low number of applications. Consequently, no projects were selected or implemented under Round 1.</p>',
            ],
            'Ireland – Microsoft' => [
                'hub_status' => 'not_launched',
                'status_message' => '<p>The small grants call was not launched in Ireland during the implementation period. Therefore, no projects were funded under Round 1.</p>',
            ],
            'Denmark, Finland, Iceland, Norway & Sweden – ECWT' => [
                'hub_status' => 'not_launched',
                'status_message' => '<p>The small grants call was not launched in the Nordic region during the implementation period. As a result, no projects were funded under Round 1 in these countries.</p>',
            ],
        ];

        foreach ($updates as $title => $data) {
            DB::table('grassroots_grants_hubs')
                ->where('title', $title)
                ->update(array_merge($data, ['updated_at' => now()]));
        }
    }

    public function down(): void
    {
        // No rollback needed for content corrections.
    }
};
