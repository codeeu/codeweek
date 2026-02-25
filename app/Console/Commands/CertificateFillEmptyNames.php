<?php

namespace App\Console\Commands;

use App\Excellence;
use Illuminate\Console\Command;

class CertificateFillEmptyNames extends Command
{
    protected $signature = 'certificate:fill-empty-names
                            {--edition=2025 : Target edition year}
                            {--type=all : excellence|super-organiser|all}
                            {--fallback=email : email = use local part of email; placeholder = use "Certificate Holder"}
                            {--placeholder="Certificate Holder" : When fallback=placeholder, this value is used}
                            {--limit=0 : Max rows to update (0 = all)}
                            {--dry-run : Only report, do not update}';

    protected $description = 'Set name_for_certificate for Excellence rows where it is empty (so certs can generate)';

    public function handle(): int
    {
        $edition = (int) $this->option('edition');
        $typeOption = strtolower(trim((string) $this->option('type')));
        $fallback = strtolower(trim((string) $this->option('fallback')));
        $placeholder = trim((string) $this->option('placeholder')) ?: 'Certificate Holder';
        $limit = max(0, (int) $this->option('limit'));
        $dryRun = (bool) $this->option('dry-run');

        $types = $this->resolveTypes($typeOption);
        if ($types === null) {
            $this->error("Invalid --type value: {$typeOption}. Use 'excellence', 'super-organiser', or 'all'.");
            return self::FAILURE;
        }

        $query = Excellence::query()
            ->where('edition', $edition)
            ->whereIn('type', $types)
            ->where(function ($q) {
                $q->whereNull('name_for_certificate')->orWhere('name_for_certificate', '');
            })
            ->with('user')
            ->orderBy('id');

        if ($limit > 0) {
            $query->limit($limit);
        }

        $rows = $query->get();
        if ($rows->isEmpty()) {
            $this->info('No rows with empty name_for_certificate found.');
            return self::SUCCESS;
        }

        $this->info('Rows with empty name: ' . $rows->count() . ($dryRun ? ' (dry-run, no changes)' : ''));
        $updated = 0;

        foreach ($rows as $e) {
            $user = $e->user;
            $email = $user?->email ?? '';
            $name = $this->fallbackName($fallback, $placeholder, $email, $user);
            if ($name === '') {
                $name = 'Certificate Holder';
            }
            $name = $this->truncateName($name, 40);

            if (! $dryRun) {
                $e->update(['name_for_certificate' => $name]);
            }
            $updated++;
            $this->line("  " . ($dryRun ? 'Would set' : 'Set') . " excellence id {$e->id} ({$email}) => " . $name);
        }

        $this->newLine();
        $this->info($dryRun ? "Dry-run: would update {$updated} row(s). Run without --dry-run to apply." : "Updated {$updated} row(s).");

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

    private function fallbackName(string $fallback, string $placeholder, string $email, $user): string
    {
        if ($fallback === 'placeholder') {
            return $placeholder;
        }
        if ($email === '') {
            return $placeholder;
        }
        $local = explode('@', $email)[0] ?? '';
        $local = preg_replace('/[^a-zA-Z0-9._-]/', ' ', $local);
        $local = str_replace(['.', '_', '-'], ' ', $local);
        $local = ucwords(strtolower(trim(preg_replace('/\s+/', ' ', $local))));
        return $local !== '' ? $local : $placeholder;
    }

    private function truncateName(string $name, int $max = 40): string
    {
        if (mb_strlen($name) <= $max) {
            return $name;
        }
        return mb_substr($name, 0, $max - 1) . '…';
    }
}
