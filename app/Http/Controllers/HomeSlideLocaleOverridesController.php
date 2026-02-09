<?php

namespace App\Http\Controllers;

use App\HomeSlide;
use App\Nova\HomeSlide as HomeSlideResource;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\StreamedResponse;

class HomeSlideLocaleOverridesController extends Controller
{
    /**
     * Export a single slide's locale overrides as CSV. Used by Nova action redirect.
     */
    public function export(Request $request): StreamedResponse
    {
        $id = $request->query('id');
        $slide = $id ? HomeSlide::find($id) : null;
        if (! $slide) {
            abort(404, 'Slide not found.');
        }

        $filename = 'home-slide-' . $slide->id . '-locale-overrides.csv';
        $headers = [
            'Content-Type' => 'text/csv; charset=UTF-8',
            'Content-Disposition' => 'attachment; filename="' . $filename . '"',
        ];

        return response()->streamDownload(function () use ($slide) {
            $stream = fopen('php://output', 'w');
            fprintf($stream, chr(0xEF) . chr(0xBB) . chr(0xBF));
            fputcsv($stream, ['locale', 'title', 'description', 'button_text', 'button2_text']);
            $overrides = $slide->locale_overrides ?? [];
            $locales = HomeSlideResource::localesSorted();
            foreach ($locales as $locale) {
                $row = $overrides[$locale] ?? [];
                fputcsv($stream, [
                    $locale,
                    $row['title'] ?? '',
                    $row['description'] ?? '',
                    $row['button_text'] ?? '',
                    $row['button2_text'] ?? '',
                ]);
            }
            fclose($stream);
        }, $filename, $headers);
    }
}
