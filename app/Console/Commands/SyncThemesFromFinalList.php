<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class SyncThemesFromFinalList extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'themes:sync-finalized {--restore : Restore event_theme from backup only}';

    public const BACKUP_FILE = 'event_theme_backup.json';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Sync themes to finalized list, map existing event_theme, or restore backup if needed';

    public const OLD_TO_NEW_THEME_MAP = [
        // AI
        'AI & Gen AI'                  => 'AI & Generative AI',
        'Artificial intelligence'      => 'AI & Generative AI',

        // Robotics, Drones, Devices
        'Robotics'                     => 'Robotics, Drones & Smart Devices',
        'Drones'                       => 'Robotics, Drones & Smart Devices',
        'Hardware'                     => 'Robotics, Drones & Smart Devices',
        'Digital Technologies'         => 'Robotics, Drones & Smart Devices',

        // Web/App/Software Dev
        'Mobile app development'       => 'Web, App & Software Development',
        'Web development'              => 'Web, App & Software Development',
        'Software development'         => 'Web, App & Software Development',

        // Game Design
        'Game design'                  => 'Game Design',

        // Cybersecurity & Data
        'Data manipulation and visualisation' => 'Cybersecurity & Data', // best match despite not direct

        // Visual/Block Programming
        'Basic programming concepts'   => 'Visual/Block Programming',
        'Visual/Block programming'     => 'Visual/Block Programming',

        // Art & Creative Coding
        'Art and creativity'           => 'Art & Creative Coding',

        // Internet of Things & Wearables
        'Sensors'                      => 'Internet of Things & Wearables',
        'Internet of things and wearable computing' => 'Internet of Things & Wearables',

        // AR/VR/3D
        '3D printing'                  => 'AR, VR & 3D Technologies',
        'Augmented reality'           => 'AR, VR & 3D Technologies',

        // Digital Careers
        'Digital careers'              => 'Digital Careers & Learning Pathways',
        'Digital learning pathways'    => 'Digital Careers & Learning Pathways',

        // Soft Skills
        'Soft Skills'                  => 'Digital Literacy & Soft Skills',

        // Unplugged & Playful
        'Unplugged activities'         => 'Unplugged & Playful Activities',
        'Playful coding activities'    => 'Unplugged & Playful Activities',

        // Diversity
        'Promoting diversity'          => 'Promoting Diversity & Inclusion',

        // Awareness
        'Motivation and awareness raising' => 'Awareness & Inspiration',

        // Other
        'Other'                        => 'Other',
    ];

    protected $finalThemes = [
        [17, 'AI & Generative AI', 15],
        [6, 'Robotics, Drones & Smart Devices', 1],
        [2, 'Web, App & Software Development', 4],
        [13, 'Game Design', 10],
        [5, 'Cybersecurity & Data', 2],
        [1, 'Visual/Block Programming', 5],
        [11, 'Art & Creative Coding', 8],
        [14, 'Internet of Things & Wearables', 11],
        [16, 'AR, VR & 3D Technologies', 12],
        [3, 'Digital Careers & Learning Pathways', 13],
        [4, 'Digital Literacy & Soft Skills', 14],
        [9, 'Unplugged & Playful Activities', 6],
        [19, 'Promoting Diversity & Inclusion', 17],
        [18, 'Awareness & Inspiration', 16],
        [8, 'Other', 18],
    ];

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $restoreOnly = $this->option('restore');

        if ($restoreOnly) {
            return $this->restoreBackup();
        }

        $this->info('Starting themes sync and migration...');

        DB::beginTransaction();

        try {
            DB::statement('SET FOREIGN_KEY_CHECKS=0');
            config(['database.connections.mysql.strict' => false]);
            DB::reconnect();

            $eventThemeOld = DB::table('event_theme')
                ->join('themes', 'event_theme.theme_id', '=', 'themes.id')
                ->select('event_theme.event_id', 'themes.name as old_theme_name', 'event_theme.theme_id')
                ->get();

            if ( !Storage::disk('excel')->exists(self::BACKUP_FILE)) {
                Storage::disk('excel')->put(self::BACKUP_FILE, $eventThemeOld->toJson(JSON_PRETTY_PRINT));
                $this->info('Backed up current event_theme to ' . self::BACKUP_FILE);
            }
            else {
                $this->info('No update, Backed up current event_theme exist in ' . self::BACKUP_FILE);
            }

            DB::table('event_theme')->delete();
            DB::table('themes')->delete();

            $finalThemesMap = collect($this->finalThemes)->map(function ($theme) {
                return [
                    'id' => $theme[0],
                    'name' => $theme[1],
                    'order' => $theme[2],
                ];
            });
            
            DB::table('themes')->insert($finalThemesMap->toArray());
            
            // Set AUTO_INCREMENT to max(id) + 1
            $maxId = collect($this->finalThemes)->max(fn($theme) => $theme[0]);
            DB::statement('ALTER TABLE themes AUTO_INCREMENT = ' . ($maxId + 1));

            $newThemes = DB::table('themes')->get()->keyBy('name');

            $mappedRows = [];

            foreach ($eventThemeOld as $item) {
                $newName = self::OLD_TO_NEW_THEME_MAP[$item->old_theme_name] ?? null;
                if ($newName && isset($newThemes[$newName])) {
                    $mappedRows[] = [
                        'event_id' => $item->event_id,
                        'theme_id' => $newThemes[$newName]->id,
                    ];
                }
            }

            $validatedRows = [];

            foreach (array_chunk($mappedRows, 500) as $chunk) {
                $eventIds = array_column($chunk, 'event_id');

                $existingIds = DB::table('events')
                    ->whereIn('id', $eventIds)
                    ->pluck('id')
                    ->toArray();

                $validatedRows = array_merge($validatedRows, array_filter($chunk, fn($row) => in_array($row['event_id'], $existingIds)));
            }

            $uniqueRows = collect($validatedRows)
                ->unique(fn($row) => $row['event_id'] . '-' . $row['theme_id'])
                ->values()
                ->all();

            foreach (array_chunk($uniqueRows, 1000) as $chunk) {
                DB::table('event_theme')->insert($chunk);
            }

            DB::statement('SET FOREIGN_KEY_CHECKS=1');
            config(['database.connections.mysql.strict' => true]);
            DB::reconnect();

            DB::commit();

            $this->info("Themes synced and event_theme migrated successfully. Total migrated: " . count($uniqueRows));
        } catch (\Throwable $e) {
            DB::rollBack();
            $this->error("Error syncing themes: " . $e->getMessage());
        }

        return 0;
    }

    protected function restoreBackup(): int
    {
        $this->info('Restoring event_theme from backup...');

        if (!Storage::disk('excel')->exists(self::BACKUP_FILE)) {
            $this->error('Backup file not found: ' . self::BACKUP_FILE);
            return 1;
        }

        $raw = Storage::disk('excel')->get(self::BACKUP_FILE);
        $data = json_decode($raw, true);
        $data = collect($data)->map(function ($row) {
            return [
                'event_id' => $row['event_id'],
                'theme_id' => $row['theme_id'],
            ];
        })->values()->all();

        if (empty($data)) {
            $this->error('Backup is empty or invalid.');
            return 1;
        }

        try {
            config(['database.connections.mysql.strict' => false]);
            DB::reconnect();

            DB::beginTransaction();
            DB::statement('SET FOREIGN_KEY_CHECKS=0');

            DB::table('event_theme')->delete();
            DB::table('themes')->delete();

            DB::statement('SET FOREIGN_KEY_CHECKS=1');
            DB::commit();

            $this->info('Running legacy ThemeTableSeeder...');
            $this->callSilent('db:seed', [
                '--class' => 'ThemeTableSeeder',
            ]);

            DB::beginTransaction();
            DB::statement('SET FOREIGN_KEY_CHECKS=0');

            foreach (array_chunk($data, 1000) as $chunk) {
                DB::table('event_theme')->insert($chunk);
            }

            DB::statement('SET FOREIGN_KEY_CHECKS=1');
            DB::commit();

            config(['database.connections.mysql.strict' => true]);
            DB::reconnect();

            $this->info('Restored event_theme successfully: ' . count($data) . ' rows.');
        } catch (\Throwable $e) {
            DB::rollBack();
            $this->error('Restore failed: ' . $e->getMessage());
            return 1;
        }

        return 0;
    }
}
