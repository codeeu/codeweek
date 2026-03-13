<?php

namespace App\Console\Commands;

use App\CertificateExcellence;
use App\Excellence;
use App\User;
use Illuminate\Console\Command;

/**
 * Regenerate a single certificate PDF and overwrite the existing file on S3
 * so the same URL serves the corrected PDF. No email sent; user does not need to notice.
 *
 * Use when the PDF shows the wrong year (e.g. 2024 instead of 2023) and you want
 * to fix it without changing the link or notifying the recipient.
 */
class CertificateRegenerateInPlace extends Command
{
    protected $signature = 'certificate:regenerate-in-place
                            {--email= : User email (certificate owner)}
                            {--certificate-url= : Exact certificate URL to replace (if user has multiple certs)}
                            {--edition= : Year to show on the certificate (e.g. 2023); default: use value from DB}
                            {--dry-run : Show what would be done, do not regenerate}';

    protected $description = 'Regenerate one certificate PDF in place (same URL); no email sent. Use to fix wrong year or content.';

    public function handle(): int
    {
        $email = trim((string) $this->option('email'));
        $certificateUrl = trim((string) $this->option('certificate-url'));
        $editionOverride = $this->option('edition');
        $dryRun = (bool) $this->option('dry-run');

        if ($email === '') {
            $this->error('Provide --email (certificate owner).');
            return self::FAILURE;
        }

        $user = User::where('email', $email)->first();
        if (! $user) {
            $this->error("User not found: {$email}");
            return self::FAILURE;
        }

        $excellence = null;
        if ($certificateUrl !== '') {
            $excellence = Excellence::where('user_id', $user->id)
                ->where(function ($q) use ($certificateUrl) {
                    $q->where('certificate_url', $certificateUrl)
                        ->orWhere('certificate_url', 'like', '%' . basename(parse_url($certificateUrl, PHP_URL_PATH)) . '%');
                })
                ->first();
            if (! $excellence) {
                $this->error('No excellence record found for this user with that certificate URL.');
                return self::FAILURE;
            }
        } else {
            $candidates = Excellence::where('user_id', $user->id)
                ->whereNotNull('certificate_url')
                ->orderBy('edition')
                ->orderBy('type')
                ->get();
            if ($candidates->isEmpty()) {
                $this->error("No certificate(s) found for {$email}.");
                return self::FAILURE;
            }
            if ($candidates->count() > 1) {
                $this->error('User has more than one certificate. Specify --certificate-url= to choose which one to regenerate.');
                $this->table(
                    ['id', 'edition', 'type', 'certificate_url'],
                    $candidates->map(fn (Excellence $e) => [$e->id, $e->edition, $e->type, $e->certificate_url])->toArray()
                );
                return self::FAILURE;
            }
            $excellence = $candidates->first();
        }

        $excellence->load('user');
        $edition = $editionOverride !== null && $editionOverride !== ''
            ? (int) $editionOverride
            : (int) $excellence->edition;
        $name = $excellence->name_for_certificate ?? trim(($excellence->user->firstname ?? '') . ' ' . ($excellence->user->lastname ?? ''));
        $name = $name !== '' ? $name : 'Unknown';
        $type = $excellence->type === 'SuperOrganiser' ? 'super-organiser' : 'excellence';
        $numberOfActivities = $type === 'super-organiser' ? (int) $excellence->user->activities($edition) : 0;

        $this->info("Certificate: excellence id {$excellence->id}, edition {$excellence->edition} (will generate with year {$edition}), type {$excellence->type}.");
        $this->line('URL (unchanged): ' . $excellence->certificate_url);

        if ($dryRun) {
            $this->warn('Dry run: no regeneration. Run without --dry-run to overwrite the PDF on S3.');
            return self::SUCCESS;
        }

        try {
            $cert = new CertificateExcellence(
                $edition,
                $name,
                $type,
                $numberOfActivities,
                (int) $excellence->user->id,
                (string) ($excellence->user->email ?? '')
            );
            $url = $cert->generateReplacing($excellence->certificate_url);
            $excellence->update([
                'certificate_url' => $url,
                'certificate_generation_error' => null,
            ]);
            $this->info('Done. PDF regenerated; same link now serves the corrected certificate. No email sent.');
        } catch (\Throwable $e) {
            $this->error('Regeneration failed: ' . $e->getMessage());
            $excellence->update(['certificate_generation_error' => $e->getMessage()]);

            return self::FAILURE;
        }

        return self::SUCCESS;
    }
}
