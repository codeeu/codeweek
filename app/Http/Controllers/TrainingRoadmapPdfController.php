<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;

class TrainingRoadmapPdfController extends Controller
{
    /**
     * Public roadmap PDF used by the Discover Digital Programme embed.
     * Kept allowlisted here so the proxy cannot be abused as an open redirect.
     */
    private const ROADMAP_SOURCE = 'https://codeweek-resources.s3.eu-west-1.amazonaws.com/+discover-digital-toolkit/DDP_toolkit_roadmap.pdf';

    /**
     * Same-origin PDF bytes for PDF.js (avoids cross-origin fetch issues).
     */
    public function proxyPdf()
    {
        $bytes = Cache::remember(
            'training_embedded_roadmap_pdf_v1',
            3600,
            function () {
                $response = Http::timeout(120)->get(self::ROADMAP_SOURCE);

                if (! $response->successful()) {
                    abort(502, 'Unable to load roadmap PDF.');
                }

                return $response->body();
            }
        );

        return response($bytes, 200, [
            'Content-Type' => 'application/pdf',
            'Content-Disposition' => 'inline; filename="DDP_toolkit_roadmap.pdf"',
            'Cache-Control' => 'public, max-age=3600',
        ]);
    }

    /**
     * Minimal PDF.js viewer (no site chrome) for iframe embedding on training pages.
     */
    public function viewer()
    {
        return response()
            ->view('training.roadmap-pdfjs')
            ->header('X-Frame-Options', 'SAMEORIGIN');
    }
}
