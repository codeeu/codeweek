<?php

namespace App\Console\Commands;

use App\Excellence;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class CertificateOrphanedExcellence extends Command
{
    protected $signature = 'certificate:orphaned-excellence
                            {--edition=2025 : Target edition year}
                            {--type=all : excellence|super-organiser|all}
                            {--ids= : Comma-separated excellence IDs to check (optional)}
                            {--export= : CSV path to export orphaned rows}
                            {--delete : Delete orphaned excellence rows (cannot send cert without user)}';

    protected $description = 'List or fix Excellence rows whose user record is missing (Missing related user record)';

    public function handle(): int
    {
        $edition = (int) $this->option('edition');
        $typeOption = strtolower(trim((string) $this->option('type')));
        $idsOption = trim((string) $this->option('ids'));
        $exportPath = trim((string) $this->option('export'));
        $delete = (bool) $this->option('delete');

        $types = $this->resolveTypes($typeOption);
        if ($types === null) {
            $this->error("Invalid --type value: {$typeOption}. Use 'excellence', 'super-organiser', or 'all'.");
            return self::FAILURE;
        }

        $query = Excellence::query()
            ->where('edition', $edition)
            ->whereIn('type', $types)
            ->whereNotExists(function ($q) {
                $q->select(DB::raw(1))
                    ->from('users')
                    ->whereColumn('users.id', 'excellences.user_id');
            })
            ->orderBy('id');

        if ($idsOption !== '') {
            $ids = array_filter(array_map('intval', explode(',', $idsOption)));
            if (! empty($ids)) {
                $query->whereIn('id', $ids);
            }
        }

        $rows = $query->get();
        if ($rows->isEmpty()) {
            $this->info('No orphaned Excellence rows found (all have a related user).');
            return self::SUCCESS;
        }

        $this->warn('Orphaned Excellence rows (user_id points to missing user): ' . $rows->count());
        $this->table(
            ['id', 'user_id', 'type', 'edition', 'name_for_certificate'],
            $rows->map(fn ($e) => [$e->id, $e->user_id, $e->type, $e->edition, $e->name_for_certificate ?? ''])->toArray()
        );

        if ($exportPath !== '') {
            $path = str_starts_with($exportPath, '/') ? $exportPath : base_path($exportPath);
            $dir = dirname($path);
            if (! is_dir($dir) && ! @mkdir($dir, 0775, true) && ! is_dir($dir)) {
                $this->error("Failed to create directory: {$dir}");
                return self::FAILURE;
            }
            $fh = @fopen($path, 'wb');
            if (! $fh) {
                $this->error("Failed to open: {$path}");
                return self::FAILURE;
            }
            fputcsv($fh, ['excellence_id', 'user_id', 'type', 'edition', 'name_for_certificate']);
            foreach ($rows as $e) {
                fputcsv($fh, [$e->id, $e->user_id, $e->type, $e->edition, $e->name_for_certificate ?? '']);
            }
            fclose($fh);
            $this->info("Exported: {$path}");
        }

        if ($delete) {
            $ids = $rows->pluck('id')->toArray();
            Excellence::query()->whereIn('id', $ids)->delete();
            $this->info('Deleted ' . count($ids) . ' orphaned Excellence row(s). They will no longer appear in preflight or send.');
        } else {
            $this->line('Tip: Use --delete to remove these rows so they are excluded from certificate generation/send.');
        }

        return self::SUCCESS;
    }

    private function resolveTypes(string $typeOption): ?array
    {
        return match ($typeOption) {
            'all' => ['Excellence', 'SuperOrganiser'],
            'excellence' => ['Excellence'],
            'super-organiser', 'superorganiser' => ['SuperOrganiser'],
            default => null,
        };
    }
}
