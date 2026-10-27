<?php
// One-off backfill: generate missing event certificates ONLY for activities
// that the organiser actually reported (reported_at set) but whose
// certificate_url is still empty. Replicates ReportController:54 exactly.
require '/home/forge/codeweek.eu/vendor/autoload.php';
$app = require '/home/forge/codeweek.eu/bootstrap/app.php';
$app->make(Illuminate\Contracts\Console\Kernel::class)->bootstrap();

use App\Certificate;
use App\Event;

$limit = (int) ($argv[1] ?? 25);
$pauseMs = (int) ($argv[2] ?? 0);
$failFile = '/tmp/cert_backfill_failed.txt';
$failed = [];
if (file_exists($failFile)) {
    foreach (file($failFile) as $line) {
        $line = trim($line);
        if ($line !== '') {
            $failed[(int) $line] = true;
        }
    }
}

$done = 0;
$errors = 0;
while (true) {
    $q = Event::where('status', 'approved')
        ->whereNotNull('reported_at')
        ->where(function ($q) {
            $q->whereNull('certificate_url')->orWhere('certificate_url', '');
        });
    if (! empty($failed)) {
        $q->whereNotIn('id', array_keys($failed));
    }
    $ids = $q->orderBy('id')->limit($limit)->pluck('id')->all();
    if (empty($ids)) {
        break;
    }
    foreach ($ids as $id) {
        $event = Event::find($id);
        if (! $event) {
            continue;
        }
        try {
            $t0 = microtime(true);
            $url = (new Certificate($event))->generate();
            if (empty($event->fresh()->certificate_url)) {
                $event->update(['certificate_url' => $url]);
            }
            $done++;
            echo sprintf("[%s] ok id=%d %.1fs %s\n", date('H:i:s'), $id, microtime(true) - $t0, $url);
        } catch (\Throwable $e) {
            $errors++;
            $failed[$id] = true;
            file_put_contents($failFile, $id . PHP_EOL, FILE_APPEND);
            echo sprintf("[%s] FAIL id=%d %s\n", date('H:i:s'), $id, substr($e->getMessage(), 0, 200));
        }
        if ($pauseMs) {
            usleep($pauseMs * 1000);
        }
    }
}
echo "DONE ok={$done} errors={$errors}\n";
