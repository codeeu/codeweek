<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class EventsIndexOptimize extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'events:index-optimize {--rollback : Drop the indexes instead of creating them}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Add or drop recommended indexes on the events table for performance optimization';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $rollback = $this->option('rollback');

        $this->info(($rollback ? 'Dropping' : 'Adding') . ' indexes on events table...');

        $indexes = [
            'idx_status' => 'CREATE INDEX idx_status ON events(status)',
            'idx_country_iso' => 'CREATE INDEX idx_country_iso ON events(country_iso)',
            'idx_status_country' => 'CREATE INDEX idx_status_country ON events(status, country_iso)',
            'idx_start_date' => 'CREATE INDEX idx_start_date ON events(start_date)',
            'idx_end_date' => 'CREATE INDEX idx_end_date ON events(end_date)',
            'idx_activity_type' => 'CREATE INDEX idx_activity_type ON events(activity_type)',
            'idx_highlighted_status' => 'CREATE INDEX idx_highlighted_status ON events(highlighted_status)',
            'idx_lat_lon' => 'CREATE INDEX idx_lat_lon ON events(latitude, longitude)',
            'idx_creator_id' => 'CREATE INDEX idx_creator_id ON events(creator_id)',
            'idx_user_email' => 'CREATE INDEX idx_user_email ON events(user_email)',
            'idx_status_start' => 'CREATE INDEX idx_status_start ON events(status, start_date)',
        ];

        foreach ($indexes as $name => $sql) {
            try {
                if ($rollback) {
                    DB::statement("DROP INDEX {$name} ON events");
                    $this->info("Dropped index: {$name}");
                } else {
                    $exists = DB::select(
                        "SELECT COUNT(1) as count FROM information_schema.statistics WHERE table_schema = DATABASE() AND table_name = 'events' AND index_name = ?",
                        [$name]
                    );

                    if (!empty($exists) && $exists[0]->count == 0) {
                        DB::statement($sql);
                        $this->info("Created index: {$name}");
                    } else {
                        $this->line("Index already exists: {$name}");
                    }
                }
            } catch (\Throwable $e) {
                $this->error("Failed to " . ($rollback ? 'drop' : 'create') . " index {$name}: " . $e->getMessage());
            }
        }

        $this->info('Index operation completed.');
        return 0;
    }
}
