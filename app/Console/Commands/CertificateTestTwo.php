<?php

namespace App\Console\Commands;

use App\CertificateExcellence;
use Illuminate\Console\Command;

class CertificateTestTwo extends Command
{
    protected $signature = 'certificate:test-two
                            {--edition=2025 : Edition year}
                            {--type=all : excellence|super-organiser|all}
                            {--no-pdf : Preflight only (no S3, no PDFs kept); default}
                            {--keep-pdf : Generate PDFs and save locally so you can view them (storage/app/test-certificates/)}
                            {--generate : Generate and upload to S3 (use with care)}';

    protected $description = 'Run preflight for a few test names (Greek, Cyrillic, Latin, accented); use --keep-pdf to save viewable PDFs';

    /** @var array<int, array{name: string, label: string}> */
    private static array $testNames = [
        ['name' => 'Βασιλική Μπαμπαλή', 'label' => 'Greek'],
        ['name' => 'Юлія Колісниченко', 'label' => 'Ukrainian (Cyrillic)'],
        ['name' => 'Иван Петров', 'label' => 'Russian (Cyrillic)'],
        ['name' => 'John Smith', 'label' => 'English'],
        ['name' => 'José García', 'label' => 'Accented Latin'],
        ['name' => 'María Fernández', 'label' => 'Accented Latin 2'],
    ];

    public function handle(): int
    {
        $edition = (int) $this->option('edition');
        $typeOption = strtolower(trim((string) $this->option('type')));
        $keepPdf = (bool) $this->option('keep-pdf');
        $uploadToS3 = (bool) $this->option('generate');
        $preflightOnly = ! $keepPdf && ! $uploadToS3;

        $typeList = $this->resolveTypes($typeOption);
        if ($typeList === null) {
            $this->error("Invalid --type: {$typeOption}. Use excellence, super-organiser, or all.");
            return self::FAILURE;
        }

        $outDir = $keepPdf ? storage_path('app/test-certificates') : null;
        if ($outDir !== null && ! is_dir($outDir)) {
            mkdir($outDir, 0775, true);
        }

        $mode = $preflightOnly ? 'Preflight only (no PDFs kept)' : ($keepPdf ? 'Generating PDFs to ' . $outDir : 'Generating and uploading to S3');
        $this->info('Certificate test names. Edition: ' . $edition . ', types: ' . implode(', ', $typeList) . '. ' . $mode);
        $this->newLine();

        $failed = 0;
        $index = 0;
        foreach (self::$testNames as $test) {
            $this->line("--- {$test['label']}: {$test['name']} ---");
            $cert = new CertificateExcellence($edition, $test['name'], 'excellence', 0, 999999, 'test@example.com');
            $this->line('  is_greek(): ' . ($cert->is_greek() ? 'true' : 'false') . ', is_cyrillic(): ' . ($cert->is_cyrillic() ? 'true' : 'false'));

            $safeLabel = preg_replace('/[^a-zA-Z0-9_-]/', '_', $test['label']);
            foreach ($typeList as $certType) {
                $activities = $certType === 'super-organiser' ? 10 : 0;
                $certTest = new CertificateExcellence($edition, $test['name'], $certType, $activities, 999999, 'test@example.com');
                $label = $certType === 'super-organiser' ? 'SuperOrganiser' : 'Excellence';
                try {
                    if ($preflightOnly) {
                        $certTest->preflight();
                        $this->info("  [{$label}] Preflight OK.");
                    } elseif ($keepPdf) {
                        $index++;
                        $filename = sprintf('%02d-%s-%s.pdf', $index, $safeLabel, $label);
                        $path = $certTest->generateAndSavePdfTo($outDir . DIRECTORY_SEPARATOR . $filename);
                        $this->info("  [{$label}] Saved: {$path}");
                    } else {
                        $url = $certTest->generate();
                        $this->info("  [{$label}] Generated: {$url}");
                    }
                } catch (\Throwable $e) {
                    $this->error("  [{$label}] Failed: " . $e->getMessage());
                    $failed++;
                }
            }
            $this->newLine();
        }

        if ($failed > 0) {
            $this->error("{$failed} test(s) failed.");
            return self::FAILURE;
        }
        if ($keepPdf) {
            $this->info('All test PDFs saved. Open: ' . $outDir);
        } else {
            $this->info('All test names passed.');
        }
        return self::SUCCESS;
    }

    /** @return array<string>|null */
    private function resolveTypes(string $typeOption): ?array
    {
        return match ($typeOption) {
            'all' => ['excellence', 'super-organiser'],
            'excellence' => ['excellence'],
            'super-organiser', 'superorganiser' => ['super-organiser'],
            default => null,
        };
    }
}
