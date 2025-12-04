<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Storage;

class ExportCertificatesProof extends Command
{
    protected $signature = 'cw:export-certificates-proof 
        {--start= : Start datetime (YYYY-MM-DD or full Y-m-d H:i:s)} 
        {--end= : End datetime (YYYY-MM-DD or full Y-m-d H:i:s)} 
        {--path= : Output relative path under storage/app (default: exports/certificates_manifest_[range].csv)}';

    protected $description = 'Export a CSV manifest of issued certificates (with PDF links) for an interval';

    public function handle()
    {
        $start = $this->option('start') ?: now()->subYear()->startOfDay()->toDateTimeString();
        $end   = $this->option('end')   ?: now()->endOfDay()->toDateTimeString();

        // Normalize date-only inputs
        if (preg_match('/^\d{4}-\d{2}-\d{2}$/', $start)) $start .= ' 00:00:00';
        if (preg_match('/^\d{4}-\d{2}-\d{2}$/', $end))   $end   .= ' 23:59:59';

        // --- Schema detection -------------------------------------------------
        $hasEventId    = Schema::hasColumn('participations', 'event_id');
        $hasActivityId = Schema::hasColumn('participations', 'activity_id'); // common alternative
        $hasEventTitle = Schema::hasColumn('participations', 'event_title'); // sometimes stored directly
        $hasTitle      = Schema::hasColumn('participations', 'title');       // generic fallback

        $q = DB::table('participations as p')
            ->leftJoin('users as u', 'u.id', '=', 'p.user_id')
            ->where('p.status', 'DONE')
            ->whereNotNull('p.participation_url')
            ->whereBetween('p.created_at', [$start, $end])
            ->orderBy('p.id');

        // Join events table only if we have a FK on participations
        if ($hasEventId) {
            $q->leftJoin('events as e', 'e.id', '=', 'p.event_id');
        } elseif ($hasActivityId) {
            $q->leftJoin('events as e', 'e.id', '=', 'p.activity_id');
        }

        $select = [
            'p.id as participation_id',
            'p.created_at as issued_at',
            'p.event_date',
            'u.email as owner_email',
            'p.participation_url as certificate_url',
        ];

        if ($hasEventId || $hasActivityId) {
            // We can read from events
            $select[] = 'e.id as event_id';
            $select[] = 'e.title as event_title';
        } else {
            // No join available; fall back to a title present on participations (or NULL)
            $select[] = DB::raw('NULL as event_id');
            if ($hasEventTitle) {
                $select[] = 'p.event_title as event_title';
            } elseif ($hasTitle) {
                $select[] = 'p.title as event_title';
            } else {
                $select[] = DB::raw('NULL as event_title');
            }
        }

        $rows = $q->get($select);

        $defaultPath = 'exports/certificates_manifest_'
            . str_replace([':', ' '], ['_', '_'], $start)
            . '_to_'
            . str_replace([':', ' '], ['_', '_'], $end)
            . '.csv';

        $path = $this->option('path') ?: $defaultPath;

        // Write CSV
        $stream = fopen('php://temp', 'w+');
        fputcsv($stream, ['participation_id','issued_at','event_date','owner_email','event_id','event_title','certificate_url']);
        foreach ($rows as $r) {
            // event_id may be missing if we couldn’t join events
            $eventId = property_exists($r, 'event_id') ? $r->event_id : null;
            fputcsv($stream, [
                $r->participation_id,
                $r->issued_at,
                $r->event_date,
                $r->owner_email,
                $eventId,
                $r->event_title,
                $r->certificate_url,
            ]);
        }
        rewind($stream);
        $csv = stream_get_contents($stream);
        fclose($stream);

        Storage::disk('local')->put($path, $csv);

        $this->info("Wrote ".count($rows)." rows to storage/app/{$path}");

        // Monthly breakdown for the audit note
        $monthly = DB::table('participations')
            ->selectRaw('DATE_FORMAT(created_at, "%Y-%m") as yyyymm, COUNT(*) as cnt')
            ->where('status','DONE')
            ->whereNotNull('participation_url')
            ->whereBetween('created_at', [$start,$end])
            ->groupBy('yyyymm')
            ->orderBy('yyyymm')
            ->get();

        $this->line('Breakdown:');
        foreach ($monthly as $m) {
            $this->line("  {$m->yyyymm}: {$m->cnt}");
        }

        return self::SUCCESS;
    }
}
