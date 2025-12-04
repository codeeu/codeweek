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
        {--path= : Output path under storage/app (default: exports/certificates_manifest_[range].csv)}
        {--family=both : Which family to export: participations|excellence|both}
        {--inclusive=0 : If 1, do not require URL and do not force status=DONE}
        {--date-field=created_at : Date field to use (created_at|event_date|issued_at if present)}';

    protected $description = 'Export a CSV manifest of issued certificates (links + metadata) for the requested interval';

    public function handle()
    {
        // ---- Window normalize
        $start = $this->option('start') ?: now()->subYear()->startOfDay()->toDateTimeString();
        $end   = $this->option('end')   ?: now()->endOfDay()->toDateTimeString();
        if (preg_match('/^\d{4}-\d{2}-\d{2}$/', $start)) $start .= ' 00:00:00';
        if (preg_match('/^\d{4}-\d{2}-\d{2}$/', $end))   $end   .= ' 23:59:59';

        $family    = strtolower($this->option('family') ?: 'both'); // participations|excellence|both
        $inclusive = (int)($this->option('inclusive') ?: 0) === 1;
        $datePref  = strtolower($this->option('date-field') ?: 'created_at'); // created_at|event_date|issued_at

        $defaultPath = 'exports/certificates_manifest_'
            . str_replace([':', ' '], ['_', '_'], $start)
            . '_to_'
            . str_replace([':', ' '], ['_', '_'], $end)
            . ($inclusive ? '_inclusive' : '')
            . ($family !== 'both' ? "_{$family}" : '')
            . '.csv';

        $path = $this->option('path') ?: $defaultPath;

        $rows = collect();

        if ($family === 'participations' || $family === 'both') {
            $rows = $rows->merge($this->exportParticipations($start, $end, $inclusive, $datePref));
        }

        if ($family === 'excellence' || $family === 'both') {
            $rows = $rows->merge($this->exportExcellence($start, $end, $inclusive, $datePref));
        }

        // Write merged CSV
        $stream = fopen('php://temp', 'w+');
        fputcsv($stream, [
            'family', 'record_id', 'issued_at', 'event_date',
            'status', 'owner_email', 'event_id', 'title',
            'certificate_url', 'missing_url'
        ]);

        foreach ($rows as $r) {
            fputcsv($stream, [
                $r['family'] ?? null,
                $r['record_id'] ?? null,
                $r['issued_at'] ?? null,
                $r['event_date'] ?? null,
                $r['status'] ?? null,
                $r['owner_email'] ?? null,
                $r['event_id'] ?? null,
                $r['title'] ?? null,
                $r['certificate_url'] ?? null,
                !empty($r['certificate_url']) ? 0 : 1,
            ]);
        }

        rewind($stream);
        $csv = stream_get_contents($stream);
        fclose($stream);
        Storage::disk('local')->put($path, $csv);

        $this->info("Wrote {$rows->count()} rows to storage/app/{$path}");
        $this->line('Breakdown:');

        // Print per-family monthly breakdowns for the memo
        $this->printMonthly('participations', $start, $end, $inclusive, $datePref);
        $this->printMonthly('excellence', $start, $end, $inclusive, $datePref);

        return self::SUCCESS;
    }

    // ---------- Helpers ----------

    protected function pickDateColumn(string $table, string $preferred): ?string
    {
        // Respect requested preference first
        if ($preferred === 'event_date' && Schema::hasColumn($table, 'event_date')) {
            return 'event_date';
        }
        if ($preferred === 'issued_at' && Schema::hasColumn($table, 'issued_at')) {
            return 'issued_at';
        }
        if ($preferred === 'created_at' && Schema::hasColumn($table, 'created_at')) {
            return 'created_at';
        }
        // Fallbacks
        foreach (['created_at','issued_at','event_date','date'] as $c) {
            if (Schema::hasColumn($table, $c)) return $c;
        }
        return null;
    }

    protected function exportParticipations(string $start, string $end, bool $inclusive, string $datePref)
    {
        $table   = 'participations';
        $dateCol = $this->pickDateColumn($table, $datePref) ?? 'created_at';
        $dateExpr = "p.$dateCol";

        $q = DB::table('participations as p')
            ->leftJoin('users as u', 'u.id', '=', 'p.user_id')
            ->whereBetween($dateExpr, [$start, $end])
            ->orderBy('p.id');

        $hasEventId    = Schema::hasColumn($table, 'event_id');
        $hasActivityId = Schema::hasColumn($table, 'activity_id');

        if ($hasEventId) {
            $q->leftJoin('events as e', 'e.id', '=', 'p.event_id');
        } elseif ($hasActivityId) {
            $q->leftJoin('events as e', 'e.id', '=', 'p.activity_id');
        }

        if (!$inclusive) {
            if (Schema::hasColumn($table, 'status')) {
                $q->where('p.status', 'DONE');
            }
            $q->whereNotNull('p.participation_url');
        }

        $select = [
            'p.id as record_id',
            DB::raw("$dateExpr as issued_at"),
            (Schema::hasColumn($table, 'event_date') ? 'p.event_date' : DB::raw('NULL as event_date')),
            (Schema::hasColumn($table, 'status')     ? 'p.status'     : DB::raw('NULL as status')),
            'u.email as owner_email',
            (Schema::hasColumn($table, 'participation_url') ? 'p.participation_url as certificate_url' : DB::raw('NULL as certificate_url')),
        ];

        if ($hasEventId || $hasActivityId) {
            $select[] = 'e.id as event_id';
            $select[] = 'e.title as title';
        } else {
            $select[] = DB::raw('NULL as event_id');
            $select[] = DB::raw('NULL as title'); // `participations` has no native title in your DB
        }

        return collect($q->get($select))->map(function ($r) {
            return [
                'family'          => 'participations',
                'record_id'       => $r->record_id,
                'issued_at'       => $r->issued_at,
                'event_date'      => $r->event_date,
                'status'          => $r->status,
                'owner_email'     => $r->owner_email,
                'event_id'        => property_exists($r, 'event_id') ? $r->event_id : null,
                'title'           => $r->title ?? null,
                'certificate_url' => $r->certificate_url ?? null,
            ];
        });
    }

    protected function exportExcellence(string $start, string $end, bool $inclusive, string $datePref)
    {
        $table = 'CertificatesOfExcellence';
        if (!Schema::hasTable($table)) return collect();

        $dateCol  = $this->pickDateColumn($table, $datePref) ?? 'created_at';
        $alias    = 'x';
        $dateExpr = "$alias.$dateCol";

        $q = DB::table("$table as $alias")
            ->whereBetween($dateExpr, [$start, $end])
            ->orderBy("$alias.id");

        if (!$inclusive && Schema::hasColumn($table, 'status')) {
            $q->where("$alias.status", 'DONE');
        }
        if (!$inclusive) {
            $urlCol = Schema::hasColumn($table, 'certificate_url') ? 'certificate_url'
                   : (Schema::hasColumn($table, 'url') ? 'url' : null);
            if ($urlCol) $q->whereNotNull("$alias.$urlCol");
        }

        // Build select list defensively
        $select = ["$alias.id as record_id", DB::raw("$dateExpr as issued_at")];
        $select[] = Schema::hasColumn($table,'event_date') ? "$alias.event_date" : DB::raw('NULL as event_date');
        $select[] = Schema::hasColumn($table,'status')     ? "$alias.status"     : DB::raw('NULL as status');

        if (Schema::hasColumn($table,'email'))            $select[] = "$alias.email as owner_email";
        elseif (Schema::hasColumn($table,'user_email'))   $select[] = "$alias.user_email as owner_email";
        else                                              $select[] = DB::raw('NULL as owner_email');

        $select[] = Schema::hasColumn($table,'event_id') ? "$alias.event_id" : DB::raw('NULL as event_id');
        $select[] = Schema::hasColumn($table,'title')    ? "$alias.title"    : DB::raw('NULL as title');

        if (Schema::hasColumn($table,'certificate_url'))      $select[] = "$alias.certificate_url as certificate_url";
        elseif (Schema::hasColumn($table,'url'))              $select[] = "$alias.url as certificate_url";
        else                                                  $select[] = DB::raw('NULL as certificate_url');

        return collect($q->get($select))->map(function ($r) {
            return [
                'family'          => 'excellence',
                'record_id'       => $r->record_id,
                'issued_at'       => $r->issued_at,
                'event_date'      => $r->event_date ?? null,
                'status'          => $r->status ?? null,
                'owner_email'     => $r->owner_email ?? null,
                'event_id'        => $r->event_id ?? null,
                'title'           => $r->title ?? null,
                'certificate_url' => $r->certificate_url ?? null,
            ];
        });
    }

    protected function printMonthly(string $family, string $start, string $end, bool $inclusive, string $datePref): void
    {
        if ($family === 'participations') {
            $table = 'participations';
            $alias = 'p';
        } elseif ($family === 'excellence') {
            $table = 'CertificatesOfExcellence';
            if (!Schema::hasTable($table)) { $this->line("  {$family}: table missing"); return; }
            $alias = 'x';
        } else {
            return;
        }

        $dateCol  = $this->pickDateColumn($table, $datePref) ?? 'created_at';
        $dateExpr = "$alias.$dateCol";

        $q = DB::table("$table as $alias")->whereBetween($dateExpr, [$start, $end]);

        if (!$inclusive && Schema::hasColumn($table, 'status')) {
            $q->where("$alias.status", 'DONE');
        }
        if (!$inclusive) {
            $urlCol = Schema::hasColumn($table,'participation_url') ? 'participation_url'
                   : (Schema::hasColumn($table,'certificate_url')   ? 'certificate_url'
                   : (Schema::hasColumn($table,'url')               ? 'url' : null));
            if ($urlCol) $q->whereNotNull("$alias.$urlCol");
        }

        $monthly = $q->selectRaw('DATE_FORMAT('.$dateExpr.', "%Y-%m") as yyyymm, COUNT(*) as cnt')
            ->groupBy('yyyymm')->orderBy('yyyymm')->get();

        $this->line("  {$family}:");
        foreach ($monthly as $m) {
            $this->line("    {$m->yyyymm}: {$m->cnt}");
        }
    }
}
