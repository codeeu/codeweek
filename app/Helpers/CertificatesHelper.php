<?php

namespace App\Helpers;

use App\CertificateParticipation;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use ZipArchive;
use Exception;

class CertificatesHelper
{
    /**
     * Generate participation certificates, zip them and upload to S3.
     * 
     * @param array $names
     * @param string $event_name
     * @param string $event_date
     * @return string|null   S3 URL or null on error
     */
    public static function doGenerateCertificatesOfParticipation($names, $event_name, $event_date)
    {
        $filenames = [];
        try {
            // Generate certificates
            foreach ($names as $name) {
                $filename = (new CertificateParticipation($name, $event_name, $event_date))->generate();
                $pdfPath = resource_path("latex/{$filename}.pdf");
                if (!file_exists($pdfPath)) {
                    Log::error("[Certificates] Missing certificate PDF: {$pdfPath}");
                    continue;
                }
                $filenames[] = $filename;
            }

            if (empty($filenames)) {
                Log::error('[Certificates] No certificates generated.');
                return null;
            }

            // Zip files
            $zipname = 'participation-certificates-'.Str::random(10).'.zip';
            $zipfull = resource_path("latex/{$zipname}");
            $zip = new ZipArchive;

            if ($zip->open($zipfull, ZipArchive::CREATE) !== true) {
                Log::error("[Certificates] Could not create zip: {$zipfull}");
                return null;
            }

            foreach ($filenames as $file) {
                $pdfPath = resource_path("latex/{$file}.pdf");
                if (file_exists($pdfPath)) {
                    $zip->addFile($pdfPath, "{$file}.pdf");
                } else {
                    Log::warning("[Certificates] File missing during zipping: {$pdfPath}");
                }
            }
            $zip->close();

            // Upload to S3
            if (!file_exists($zipfull)) {
                Log::error("[Certificates] Zip file not found for upload: {$zipfull}");
                return null;
            }

            $zipStream = fopen($zipfull, 'r');
            if (!$zipStream) {
                Log::error("[Certificates] Failed to open zip stream: {$zipfull}");
                return null;
            }

            $s3Path = 'participation/' . $zipname;
            $upload = Storage::disk('s3')->put($s3Path, $zipStream);
            fclose($zipStream);

            if (!$upload) {
                Log::error("[Certificates] Upload to S3 failed: {$s3Path}");
                return null;
            }

            // Clean up
            foreach ($filenames as $file) {
                $pdfPath = resource_path("latex/{$file}.pdf");
                if (file_exists($pdfPath)) {
                    @unlink($pdfPath);
                }
            }

            @unlink($zipfull);

            return Storage::disk('s3')->url($s3Path);

        } catch (Exception $e) {
            Log::error("[Certificates] Generation error: " . $e->getMessage(), [
                'trace' => $e->getTraceAsString()
            ]);
            // Optional: cleanup even if error
            if (isset($zipfull) && file_exists($zipfull)) {
                @unlink($zipfull);
            }
            if (!empty($filenames)) {
                foreach ($filenames as $file) {
                    $pdfPath = resource_path("latex/{$file}.pdf");
                    if (file_exists($pdfPath)) {
                        @unlink($pdfPath);
                    }
                }
            }
            return null;
        }
    }
}
