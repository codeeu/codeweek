<?php

namespace App\Http\Controllers;

use App\Jobs\ProcessBulkEventImportJob;
use App\Jobs\ValidateBulkEventUploadJob;
use App\Services\BulkEventUploadCache;
use App\Services\BulkEventUploadValidator;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\View\View;

class BulkEventUploadController extends Controller
{
  /**
     * Show the bulk upload form.
     */
    public function index(Request $request): View
    {
        return view('admin.bulk-upload.index', [
            'validationPassed' => false,
            'validationMissing' => $request->session()->get('validation_missing', []),
            'storedDefaultCreatorEmail' => old('default_creator_email'),
            'import_payload' => '',
        ]);
    }

    /**
     * Upload file, queue validation, redirect to processing page.
     */
    public function validateUpload(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'file' => [
                'required',
                'file',
                'max:10240',
                function ($attribute, $value, $fail) {
                    if ($value) {
                        $ext = strtolower($value->getClientOriginalExtension());
                        $allowed = ['csv', 'xlsx', 'xls'];
                        if (! in_array($ext, $allowed, true)) {
                            $filename = strtolower($value->getClientOriginalName());
                            if (strpos($filename, '.csv') === false && strpos($filename, '.xlsx') === false && strpos($filename, '.xls') === false) {
                                $fail('The file must be a CSV or Excel file (.csv, .xlsx, or .xls).');
                            }
                        }
                    }
                },
            ],
            'default_creator_email' => ['nullable', 'email', 'max:255'],
        ], [
            'file.required' => 'Please select a file to upload.',
            'file.max' => 'The file may not be greater than 10 MB.',
        ]);

        $file = $request->file('file');
        $extension = strtolower($file->getClientOriginalExtension() ?: '');
        if (empty($extension)) {
            $filename = strtolower($file->getClientOriginalName());
            if (strpos($filename, '.csv') !== false) {
                $extension = 'csv';
            } elseif (strpos($filename, '.xlsx') !== false) {
                $extension = 'xlsx';
            } elseif (strpos($filename, '.xls') !== false) {
                $extension = 'xls';
            }
        }
        if (! in_array($extension, ['csv', 'xlsx', 'xls'], true)) {
            return redirect()->route('admin.bulk-upload.index')
                ->withErrors(['file' => 'The file must be a CSV or Excel file (.csv, .xlsx, or .xls).'])
                ->withInput();
        }

        $tempDisk = config('filesystems.bulk_upload_temp_disk', 'local');
        $path = $file->storeAs('temp', 'bulk_events_'.time().'.'.$extension, $tempDisk);

        $headerCheck = BulkEventUploadValidator::validateRequiredColumns($path, $tempDisk);
        if (isset($headerCheck['error'])) {
            Storage::disk($tempDisk)->delete($path);

            return redirect()->route('admin.bulk-upload.index')
                ->withErrors(['file' => 'Could not read file: '.$headerCheck['error']])
                ->withInput();
        }
        if (! $headerCheck['valid']) {
            Storage::disk($tempDisk)->delete($path);

            return redirect()->route('admin.bulk-upload.index')
                ->with('validation_missing', $headerCheck['missing'])
                ->withErrors(['file' => 'Missing required columns: '.implode(', ', $headerCheck['missing']).'. Please add these column headers to your file.'])
                ->withInput();
        }

        $token = Str::random(64);
        BulkEventUploadCache::put($token, [
            'phase' => BulkEventUploadCache::PHASE_VALIDATING,
            'path' => $path,
            'disk' => $tempDisk,
            'default_creator_email' => $validated['default_creator_email'] ?? null,
            'error' => null,
        ]);

        ValidateBulkEventUploadJob::dispatch($token)->afterResponse();

        return redirect()->route('admin.bulk-upload.processing', ['token' => $token]);
    }

    public function processing(string $token): View|RedirectResponse
    {
        $payload = BulkEventUploadCache::get($token);
        if ($payload === null) {
            return redirect()->route('admin.bulk-upload.index')
                ->withErrors(['file' => 'Upload session expired. Please upload again.']);
        }

        return view('admin.bulk-upload.processing', [
            'token' => $token,
            'phase' => $payload['phase'] ?? BulkEventUploadCache::PHASE_VALIDATING,
        ]);
    }

    public function status(string $token): JsonResponse
    {
        $payload = BulkEventUploadCache::get($token);
        if ($payload === null) {
            return response()->json(['phase' => 'missing'], 404);
        }

        return response()->json([
            'phase' => $payload['phase'] ?? BulkEventUploadCache::PHASE_VALIDATING,
            'error' => $payload['error'] ?? null,
            'preview_url' => route('admin.bulk-upload.preview', ['token' => $token]),
            'report_url' => route('admin.bulk-upload.report', ['token' => $token]),
        ]);
    }

  /**
     * Show validation preview from cache.
     */
    public function preview(Request $request, ?string $token = null): View|RedirectResponse
    {
        $token = $token ?? (string) $request->query('token', '');
        if ($token === '') {
            return redirect()->route('admin.bulk-upload.index')
                ->withErrors(['import' => 'No validated file found. Please upload and validate a file first.']);
        }

        $payload = BulkEventUploadCache::get($token);
        if ($payload === null || ($payload['phase'] ?? '') !== BulkEventUploadCache::PHASE_VALIDATED) {
            return redirect()->route('admin.bulk-upload.processing', ['token' => $token]);
        }

        $preview = $payload['preview'] ?? [];

        return view('admin.bulk-upload.preview', [
            'import_token' => $token,
            'row_statuses' => $preview['row_statuses'] ?? [],
            'valid_count' => $preview['valid_count'] ?? 0,
            'total_count' => $preview['total_count'] ?? 0,
            'failures_only' => $preview['failures_only'] ?? false,
        ]);
    }

    /**
     * Queue import and redirect to processing page.
     */
    public function import(Request $request): RedirectResponse
    {
        $token = (string) $request->input('import_token', '');
        if ($token === '') {
            return redirect()->route('admin.bulk-upload.index')
                ->withErrors(['import' => 'No validated file found. Please upload and validate a file first.']);
        }

        $payload = BulkEventUploadCache::get($token);
        if ($payload === null || ($payload['phase'] ?? '') !== BulkEventUploadCache::PHASE_VALIDATED) {
            return redirect()->route('admin.bulk-upload.index')
                ->withErrors(['import' => 'Upload session expired or validation not finished. Please upload again.']);
        }

        $path = (string) ($payload['path'] ?? '');
        $disk = (string) ($payload['disk'] ?? 'local');
        if ($path === '' || ! Storage::disk($disk)->exists($path)) {
            return redirect()->route('admin.bulk-upload.index')
                ->withErrors(['import' => 'Uploaded file no longer available. Please upload again.']);
        }

        BulkEventUploadCache::merge($token, [
            'phase' => BulkEventUploadCache::PHASE_IMPORTING,
            'error' => null,
        ]);

        ProcessBulkEventImportJob::dispatch($token)->afterResponse();

        return redirect()->route('admin.bulk-upload.processing', ['token' => $token]);
    }

    /**
     * Show the import report from cache.
     */
    public function report(Request $request, ?string $token = null): View|RedirectResponse
    {
        $token = $token ?? (string) $request->query('token', '');
        if ($token !== '') {
            $payload = BulkEventUploadCache::get($token);
            if ($payload !== null && ($payload['phase'] ?? '') === BulkEventUploadCache::PHASE_COMPLETED) {
                $report = $payload['report'] ?? [];

                return view('admin.bulk-upload.report', [
                    'created' => $report['created'] ?? [],
                    'created_count' => $report['created_count'] ?? count($report['created'] ?? []),
                    'created_details_truncated' => $report['created_details_truncated'] ?? false,
                    'failures' => $report['failures'] ?? [],
                ]);
            }

            if ($payload !== null && ($payload['phase'] ?? '') !== BulkEventUploadCache::PHASE_COMPLETED) {
                return redirect()->route('admin.bulk-upload.processing', ['token' => $token]);
            }
        }

        return redirect()->route('admin.bulk-upload.index')
            ->with('info', 'Report no longer available. Run an import to see a new report.');
    }
}
