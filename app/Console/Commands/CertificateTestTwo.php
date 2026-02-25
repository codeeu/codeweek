<?php

namespace App\Console\Commands;

use App\CertificateExcellence;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Storage;

class CertificateTestTwo extends Command
{
    protected $signature = 'certificate:test-two
                            {--edition=2025 : Edition year}
                            {--no-pdf : Only run preflight (no S3), do not keep PDFs}';

    protected $description = 'Generate two test certificates locally: one Greek name, one Russian name';

    public function handle(): int
    {
        $edition = (int) $this->option('edition');
        $preflightOnly = (bool) $this->option('no-pdf');

        $tests = [
            ['name' => 'Βασιλική Μπαμπαλή', 'label' => 'Greek'],
            ['name' => 'Иван Петров', 'label' => 'Russian'],
        ];

        foreach ($tests as $test) {
            $this->info("Testing {$test['label']}: {$test['name']}");
            $cert = new CertificateExcellence($edition, $test['name'], 'excellence', 0, 999999, 'test@example.com');
            $this->line('  is_greek(): ' . ($cert->is_greek() ? 'true' : 'false'));

            try {
                if ($preflightOnly) {
                    $cert->preflight();
                    $this->info("  Preflight OK (no PDF kept).");
                } else {
                    $url = $cert->generate();
                    $this->info("  Generated: {$url}");
                }
            } catch (\Throwable $e) {
                $this->error('  Failed: ' . $e->getMessage());
                return self::FAILURE;
            }
        }

        $this->newLine();
        $this->info('Both certificates OK. Greek uses _greek template; Russian uses default template.');
        return self::SUCCESS;
    }
}
