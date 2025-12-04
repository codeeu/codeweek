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
        {--date-field=created_at : Date field to use (created_at|event_date|issued_at if present)}
        {--double-count-so=0 : If 1, append SuperOrganiser rows again (overcount to match external totals)}';

    protected $description = 'Export a CSV manifest of issued certificates (links + metadata) for the requested interval';

    public function handle()
    {
        // ---- Window normalize
        $start = $this->option('start') ?: now()->subYear()->startOfDay()->toDateTimeString();
        $end   = $this->option('end')   ?: now()->endOfDay()->toDateTimeString();
        if (preg_match('/^\d{4}-\d{2}-\d{2}$/', $start)) $start .= ' 00:00:00';
        if (preg_match('/^\d{4}-\d{2}-\d{2}$/', $end))   $end   .= ' 23:59:59';

        $family         = strtolower($this->option('family') ?: 'both'); // participations|excellence|both
        $inclusive      = (int)($this->option('inclusive') ?: 0) === 1;
        $datePref       = strtolower($this->option('date-field') ?: 'created_at'); // created_at|event_date|issued_at
        $doubleCountSO  = (int)($this->option('double-count-so') ?: 0) === 1;

        $defaultPath = 'exports/certificates_manifest_'
            . str_replace([':', ' '], ['_', '_'], $start)
            . '_to_'
            . str_replace([':', ' '], ['_', '_'], $end)
            . ($inclusive ? '_inclusive' : '')
            . ($family !== 'both' ? "_{$family}" : '')
            . ($doubleCountSO ? '_dupSO' : '')
            . '.csv';

        $path = $this->option('path') ?: $defaultPath;

        // Build rows (SO appended at end; optional duplication)
        $rows = collect();

        if ($family === 'participations' || $family === 'both') {
            $rows = $rows->merge($this->exportParticipations($start, $end, $inclusive, $datePref));
        }

        $exRows = collect();
        $soRows = collect();

        if ($family === 'excellence' || $family === 'both') {
            [$exRows, $soRows] = $this->exportExcellenceSplit($start, $end, $inclusive, $datePref);
            $rows = $rows->merge($exRows);
        }

        // Append SuperOrganiser rows at the end (as its own family)
        if ($soRows->isNotEmpty()) {
            $rows = $rows->merge($soRows);
            if ($doubleCountSO) {
                // Append again to intentionally overcount (to match external tallies)
                $rows = $rows->merge($soRows);
            }
        }

        // Write CSV
        $stream = fopen('php://temp', 'w+');
        fputcsv($stream, [
            'family', 'record_id', 'issued_at', 'event_date',
            'status', 'owner_email', 'event_id', 'title',
            'certificate_url', 'missing_url',
            'excellence_type', 'excellence_type_norm'
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
                $r['excellence_type'] ?? null,
                $r['excellence_type_norm'] ?? null,
            ]);
        }

        rewind($stream);
        $csv = stream_get_contents($stream);
        fclose($stream);
        Storage::disk('local')->put($path, $csv);

        $this->info("Wrote {$rows->count()} rows to storage/app/{$path}");
        $this->line('Breakdown:');
        $this->printMonthlyParticipations($start, $end, $inclusive, $datePref);
        $this->printMonthlyExcellenceSplit($start, $end, $inclusive, $datePref);

        return self::SUCCESS;
    }

    // ---------- Helpers ----------

    protected function pickDateColumn(string $table, string $preferred): ?string
    {
        // Respect requested preference first
        if ($preferred === 'event_date' && Schema::hasColumn($table, 'event_date')) return 'event_date';
        if ($preferred === 'issued_at' && Schema::hasColumn($table, 'issued_at')) return 'issued_at';
        if ($preferred === 'created_at' && Schema::hasColumn($table, 'created_at')) return 'created_at';
        // Fallbacks
        foreach (['created_at','issued_at','event_date','date'] as $c) {
            if (Schema::hasColumn($table, $c)) return $c;
        }
        return null;
    }

    protected function excellenceTable(): ?string
    {
        if (Schema::hasTable('excellences')) return 'excellences';
        if (Schema::hasTable('CertificatesOfExcellence')) return 'CertificatesOfExcellence';
        return null;
    }

    /* ---------- Participation exporter (email always filled) ---------- */
    protected function exportParticipations(string $start, string $end, bool $inclusive, string $datePref)
    {
        $table    = 'participations';
        $dateCol  = $this->pickDateColumn($table, $datePref) ?? 'created_at';
        $alias    = 'p';
        $dateExpr = "$alias.$dateCol";

        $q = DB::table("$table as $alias")
            ->leftJoin('users as u', 'u.id', '=', "$alias.user_id")
            ->whereBetween($dateExpr, [$start, $end])
            ->orderBy("$alias.id");

        if (!$inclusive) {
            if (Schema::hasColumn($table, 'status')) {
                $q->where("$alias.status", 'DONE');
            }
            if (Schema::hasColumn($table, 'participation_url')) {
                $q->whereNotNull("$alias.participation_url");
            }
        }

        // Optional join to events if present
        $hasEventId    = Schema::hasColumn($table, 'event_id');
        $hasActivityId = Schema::hasColumn($table, 'activity_id');
        if ($hasEventId) {
            $q->leftJoin('events as e', 'e.id', '=', "$alias.event_id");
        } elseif ($hasActivityId) {
            $q->leftJoin('events as e', 'e.id', '=', "$alias.activity_id");
        }

        // Always provide owner_email (from users)
        $select = [
            "$alias.id as record_id",
            DB::raw("$dateExpr as issued_at"),
            (Schema::hasColumn($table, 'event_date') ? "$alias.event_date" : DB::raw('NULL as event_date')),
            (Schema::hasColumn($table, 'status')     ? "$alias.status"     : DB::raw('NULL as status')),
            'u.email as owner_email',
            (Schema::hasColumn($table, 'participation_url') ? "$alias.participation_url as certificate_url" : DB::raw('NULL as certificate_url')),
        ];

        if ($hasEventId || $hasActivityId) {
            $select[] = 'e.id as event_id';
            $select[] = 'e.title as title';
        } else {
            $select[] = DB::raw('NULL as event_id');
            $select[] = DB::raw('NULL as title');
        }

        return collect($q->get($select))->map(function ($r) {
            return [
                'family'                 => 'participations',
                'record_id'              => $r->record_id,
                'issued_at'              => $r->issued_at,
                'event_date'             => $r->event_date,
                'status'                 => $r->status,
                'owner_email'            => $r->owner_email,
                'event_id'               => property_exists($r, 'event_id') ? $r->event_id : null,
                'title'                  => $r->title ?? null,
                'certificate_url'        => $r->certificate_url ?? null,
                'excellence_type'        => null,
                'excellence_type_norm'   => null,
            ];
        });
    }

    /**
     * Excellence exporter that splits out SuperOrganiser as its own "family".
     * It also ensures owner_email is filled by coalescing table email columns with users.email.
     *
     * @return array{0:\Illuminate\Support\Collection,1:\Illuminate\Support\Collection} [$excellence, $superorganiser]
     */
    protected function exportExcellenceSplit(string $start, string $end, bool $inclusive, string $datePref): array
    {
        $exTable = $this->excellenceTable();
        if (!$exTable) return [collect(), collect()];

        $alias    = 'x';
        $dateCol  = $this->pickDateColumn($exTable, $datePref) ?? 'created_at';
        $dateExpr = "$alias.$dateCol";

        $q = DB::table("$exTable as $alias")
            ->whereBetween($dateExpr, [$start, $end])
            ->orderBy("$alias.id");

        // If there is a users FK, join to users to guarantee email
        $hasUserId = Schema::hasColumn($exTable, 'user_id');
        if ($hasUserId) {
            $q->leftJoin('users as uu', 'uu.id', '=', "$alias.user_id");
        }

        if (!$inclusive && Schema::hasColumn($exTable, 'status')) {
            $q->where("$alias.status", 'DONE');
        }
        if (!$inclusive) {
            $urlCol = Schema::hasColumn($exTable, 'certificate_url') ? 'certificate_url'
                   : (Schema::hasColumn($exTable, 'url') ? 'url' : null);
            if ($urlCol) $q->whereNotNull("$alias.$urlCol");
        }

        // Build select list defensively
        $select = ["$alias.id as record_id", DB::raw("$dateExpr as issued_at")];
        $select[] = Schema::hasColumn($exTable,'event_date') ? "$alias.event_date" : DB::raw('NULL as event_date');
        $select[] = Schema::hasColumn($exTable,'status')     ? "$alias.status"     : DB::raw('NULL as status');

        // Always provide owner_email by coalescing table email columns with users.email
        $emailExprs = [];
        if (Schema::hasColumn($exTable,'email'))      $emailExprs[] = "$alias.email";
        if (Schema::hasColumn($exTable,'user_email')) $emailExprs[] = "$alias.user_email";
        if ($hasUserId)                                $emailExprs[] = "uu.email";
        // COALESCE list
        if (!empty($emailExprs)) {
            $select[] = DB::raw('COALESCE('.implode(',', $emailExprs).') as owner_email');
        } else {
            $select[] = DB::raw('NULL as owner_email');
        }

        $select[] = Schema::hasColumn($exTable,'event_id') ? "$alias.event_id" : DB::raw('NULL as event_id');
        $select[] = Schema::hasColumn($exTable,'title')    ? "$alias.title"    : DB::raw('NULL as title');

        if (Schema::hasColumn($exTable,'certificate_url'))      $select[] = "$alias.certificate_url as certificate_url";
        elseif (Schema::hasColumn($exTable,'url'))              $select[] = "$alias.url as certificate_url";
        else                                                    $select[] = DB::raw('NULL as certificate_url');

        // Excellence type (raw + normalized)
        if (Schema::hasColumn($exTable,'type')) {
            $select[] = "$alias.type as excellence_type";
            $select[] = DB::raw("LOWER(REPLACE($alias.type,'-','')) as excellence_type_norm");
        } else {
            $select[] = DB::raw("NULL as excellence_type");
            $select[] = DB::raw("NULL as excellence_type_norm");
        }

        $all = collect($q->get($select));

        $ex = collect();
        $so = collect();

        foreach ($all as $r) {
            $row = [
                'family'               => null, // set below
                'record_id'            => $r->record_id,
                'issued_at'            => $r->issued_at,
                'event_date'           => $r->event_date ?? null,
                'status'               => $r->status ?? null,
                'owner_email'          => $r->owner_email ?? null,
                'event_id'             => $r->event_id ?? null,
                'title'                => $r->title ?? null,
                'certificate_url'      => $r->certificate_url ?? null,
                'excellence_type'      => $r->excellence_type ?? null,
                'excellence_type_norm' => $r->excellence_type_norm ?? null,
            ];

            if (($r->excellence_type_norm ?? null) === 'superorganiser') {
                $row['family'] = 'superorganiser';
                $so->push($row);
            } else {
                $row['family'] = 'excellence';
                $ex->push($row);
            }
        }

        return [$ex, $so];
    }

    /* ---------- Monthly breakdown printers ---------- */

    protected function printMonthlyParticipations(string $start, string $end, bool $inclusive, string $datePref): void
    {
        $table = 'participations';
        $alias = 'p';
        $dateCol  = $this->pickDateColumn($table, $datePref) ?? 'created_at';
        $dateExpr = "$alias.$dateCol";

        $q = DB::table("$table as $alias")->whereBetween($dateExpr, [$start, $end]);

        if (!$inclusive && Schema::hasColumn($table, 'status')) {
            $q->where("$alias.status", 'DONE');
        }
        if (!$inclusive && Schema::hasColumn($table,'participation_url')) {
            $q->whereNotNull("$alias.participation_url");
        }

        $monthly = $q->selectRaw('DATE_FORMAT('.$dateExpr.', "%Y-%m") as yyyymm, COUNT(*) as cnt')
            ->groupBy('yyyymm')->orderBy('yyyymm')->get();

        $this->line("  participations:");
        foreach ($monthly as $m) {
            $this->line("    {$m->yyyymm}: {$m->cnt}");
        }
    }

    protected function printMonthlyExcellenceSplit(string $start, string $end, bool $inclusive, string $datePref): void
    {
        $table = $this->excellenceTable();
        if (!$table) { $this->line("  excellence: table missing"); $this->line("  superorganiser: table missing"); return; }

        $alias = 'x';
        $dateCol  = $this->pickDateColumn($table, $datePref) ?? 'created_at';
        $dateExpr = "$alias.$dateCol";

        $base = DB::table("$table as $alias")->whereBetween($dateExpr, [$start, $end]);

        // Join users for email if possible
        if (Schema::hasColumn($table, 'user_id')) {
            $base->leftJoin('users as uu', 'uu.id', '=', "$alias.user_id");
        }

        if (!$inclusive && Schema::hasColumn($table, 'status')) {
            $base->where("$alias.status",'DONE');
        }
        if (!$inclusive) {
            $urlCol = Schema::hasColumn($table, 'certificate_url') ? 'certificate_url'
                   : (Schema::hasColumn($table, 'url') ? 'url' : null);
            if ($urlCol) $base->whereNotNull("$alias.$urlCol");
        }

        // Excellence (excluding SO)
        $exQ = clone $base;
        if (Schema::hasColumn($table,'type')) {
            $exQ->whereRaw("LOWER(REPLACE($alias.type,'-','')) <> 'superorganiser'");
        }
        $exMonthly = $exQ->selectRaw('DATE_FORMAT('.$dateExpr.', "%Y-%m") as yyyymm, COUNT(*) as cnt')
            ->groupBy('yyyymm')->orderBy('yyyymm')->get();

        // SuperOrganiser only
        $soMonthly = collect();
        if (Schema::hasColumn($table,'type')) {
            $soQ = clone $base;
            $soQ->whereRaw("LOWER(REPLACE($alias.type,'-','')) = 'superorganiser'");
            $soMonthly = $soQ->selectRaw('DATE_FORMAT('.$dateExpr.', "%Y-%m") as yyyymm, COUNT(*) as cnt')
                ->groupBy('yyyymm')->orderBy('yyyymm')->get();
        }

        $this->line("  excellence:");
        foreach ($exMonthly as $m) {
            $this->line("    {$m->yyyymm}: {$m->cnt}");
        }
        $this->line("  superorganiser:");
        foreach ($soMonthly as $m) {
            $this->line("    {$m->yyyymm}: {$m->cnt}");
        }
    }
}
