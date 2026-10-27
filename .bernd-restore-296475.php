<?php
/**
 * Restore soft-deleted original user 296475 (szrnr1453@gmail.com) and re-link
 * her Google identity from the two throwaway duplicates (1041778, 1041838).
 *
 * RUN:  php .bernd-restore-296475.php           -> dry run (no writes)
 *       php .bernd-restore-296475.php --apply   -> apply (writes)
 *
 * Backs up all three rows to .bernd-backup-296475-<ts>.json before writing.
 */

require __DIR__.'/vendor/autoload.php';
$app = require_once __DIR__.'/bootstrap/app.php';
$app->make(Illuminate\Contracts\Console\Kernel::class)->bootstrap();

use App\User;
use Illuminate\Support\Facades\DB;

$apply   = in_array('--apply', $argv, true);
$email   = 'szrnr1453@gmail.com';
$primary = 296475;
$dupes   = [1041778, 1041838];

$rows = DB::table('users')->whereIn('id', [$primary, ...$dupes])->get();
echo "rows found: ".$rows->count().PHP_EOL;
foreach ($rows as $r) {
    echo sprintf("  %d | deleted_at=%s | provider=%s | provider_id=%s | created=%s\n",
        $r->id, $r->deleted_at ?? 'NULL', $r->provider ?? '-', $r->provider_id ?? '-', $r->created_at);
}

$primaryRow = $rows->firstWhere('id', $primary);
if (! $primaryRow) { exit("ABORT: primary $primary not found\n"); }
if ($primaryRow->deleted_at === null) { echo "NOTE: $primary already active (deleted_at NULL)\n"; }

// Google identity to adopt: prefer the newest duplicate that actually has one.
$source = null;
foreach ($dupes as $d) {
    $r = $rows->firstWhere('id', $d);
    if ($r && $r->deleted_at !== null && ! empty($r->provider_id)) {
        $source = $r;
    }
}

echo "google identity source: ".($source ? $source->id.' ('.$source->provider.'/'.$source->provider_id.')' : 'none').PHP_EOL;

$certTable = 'CertificatesOfExcellence';
try {
    $certCount = DB::table($certTable)->where('user_id', $primary)->count();
    echo "$certTable for $primary: $certCount".PHP_EOL;
    foreach (DB::table($certTable)->whereIn('user_id', [$primary, ...$dupes])->get() as $c) {
        echo "  cert id=".($c->id ?? '?').' user_id='.$c->user_id.PHP_EOL;
    }
} catch (\Throwable $e) {
    echo 'cert lookup skipped: '.$e->getMessage().PHP_EOL;
}

if (! $apply) {
    echo PHP_EOL."DRY RUN — nothing written. Re-run with --apply.\n";
    exit(0);
}

$backup = __DIR__.'/.bernd-backup-'.$primary.'-'.date('YmdHis').'.json';
file_put_contents($backup, json_encode($rows, JSON_PRETTY_PRINT));
echo "backup: $backup".PHP_EOL;

DB::transaction(function () use ($primary, $source) {
    $update = ['deleted_at' => null];
    if ($source) {
        $update['provider']    = $source->provider;
        $update['provider_id'] = $source->provider_id;
    }
    DB::table('users')->where('id', $primary)->update($update);
});

$after = DB::table('users')->where('id', $primary)->first();
echo sprintf("after: %d | deleted_at=%s | provider=%s | provider_id=%s\n",
    $after->id, $after->deleted_at ?? 'NULL', $after->provider ?? '-', $after->provider_id ?? '-');

$active = DB::table('users')->where('id', $primary)->whereNull('deleted_at')->exists();
echo "restore_ok=".($active ? 'YES' : 'NO').PHP_EOL;
echo "duplicates left soft-deleted: ".(DB::table('users')->whereIn('id', [1041778, 1041838])->whereNotNull('deleted_at')->count())."/2".PHP_EOL;
