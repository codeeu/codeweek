<?php

namespace App\Http\Controllers;

use App\Imports\GenericEventsImport;
use App\Services\BulkEventImportResult;
use App\Services\BulkEventUploadValidator;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;
use Maatwebsite\Excel\Facades\Excel;

class BulkEventUploadController extends Controller
{
    private const SESSION_FILE_PATH = 'bulk_upload_file_path';
    private const SESSION_DEFAULT_CREATOR = 'bulk_upload_default_creator_email';
    private const SESSION_VALIDATION_PASSED = 'bulk_upload_validation_passed';
    private const SESSION_VALIDATION_MISSING = 'bulk_upload_validation_missing';

    /**
     * Show the bulk upload form.
     */
    public function index(Request $request): View
    {
        $validationMissing = $request->session()->get('validation_missing')
            ?? $request->session()->get(self::SESSION_VALIDATION_MISSING, []);
        $validationPassed = $request->session()->get(self::SESSION_VALIDATION_PASSED, false);
        $filePath = $request->session()->get(self::SESSION_FILE_PATH);
        $tempDisk = config('filesystems.bulk_upload_temp_disk', 'local');
        $importPayload = '';
        if ($validationPassed && $filePath) {
            $importPayload = Crypt::encryptString(json_encode([
                'path' => $filePath,
                'default_creator_email' => $request->session()->get(self::SESSION_DEFAULT_CREATOR),
                'disk' => $tempDisk,
            ]));
        }

        return view('admin.bulk-upload.index', [
            'validationPassed' => $validationPassed,
            'validationMissing' => $validationMissing,
            'storedDefaultCreatorEmail' => $request->session()->get(self::SESSION_DEFAULT_CREATOR),
            'import_payload' => $importPayload,
        ]);
    }

    /**
     * Upload file and validate required columns. Store file in session for import step.
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
        $oldPath = $request->session()->get(self::SESSION_FILE_PATH);
        if ($oldPath && Storage::disk($tempDisk)->exists($oldPath)) {
            Storage::disk($tempDisk)->delete($oldPath);
        }
        $request->session()->forget([self::SESSION_FILE_PATH, self::SESSION_VALIDATION_PASSED, self::SESSION_VALIDATION_MISSING, self::SESSION_DEFAULT_CREATOR]);

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

        $request->session()->put(self::SESSION_FILE_PATH, $path);
        $request->session()->put(self::SESSION_DEFAULT_CREATOR, $validated['default_creator_email'] ?? null);
        $request->session()->put(self::SESSION_VALIDATION_PASSED, true);
        $request->session()->forget(self::SESSION_VALIDATION_MISSING);

        return redirect()->route('admin.bulk-upload.index')
            ->with('success', 'File uploaded. All required columns are present. Click Import to run the import.');
    }

    /**
     * Run the import using file path from encrypted form payload or session.
     * Payload avoids "No validated file found" when session is not shared (e.g. load balancer).
     */
    public function import(Request $request): View|RedirectResponse
    {
        $path = null;
        $defaultCreatorEmail = null;
        $tempDisk = config('filesystems.bulk_upload_temp_disk', 'local');

        $payload = $request->input('import_payload');
        if (is_string($payload) && $payload !== '') {
            try {
                $decoded = json_decode(Crypt::decryptString($payload), true);
                if (is_array($decoded) && ! empty($decoded['path'])) {
                    $path = $decoded['path'];
                    $defaultCreatorEmail = $decoded['default_creator_email'] ?? null;
                    if (! empty($decoded['disk'])) {
                        $tempDisk = $decoded['disk'];
                    }
                }
            } catch (\Throwable $e) {
                // Fall back to session
            }
        }
        if (! $path) {
            $path = $request->session()->get(self::SESSION_FILE_PATH);
            $defaultCreatorEmail = $request->session()->get(self::SESSION_DEFAULT_CREATOR);
        }

        if (! $path || ! Storage::disk($tempDisk)->exists($path)) {
            $request->session()->forget([self::SESSION_FILE_PATH, self::SESSION_DEFAULT_CREATOR, self::SESSION_VALIDATION_PASSED, self::SESSION_VALIDATION_MISSING]);

            return redirect()->route('admin.bulk-upload.index')
                ->withErrors(['import' => 'No validated file found. Please upload and validate a file first.']);
        }

        try {
            $result = new BulkEventImportResult;
            $import = new GenericEventsImport($defaultCreatorEmail, $result);
            Excel::import($import, $path, $tempDisk);

            Storage::disk($tempDisk)->delete($path);
            $request->session()->forget([self::SESSION_FILE_PATH, self::SESSION_DEFAULT_CREATOR, self::SESSION_VALIDATION_PASSED, self::SESSION_VALIDATION_MISSING]);

            $this->clearMapCache();

            $request->session()->flash('bulk_upload_report_created', $result->created);
            $request->session()->flash('bulk_upload_report_failures', $result->failures);

            return redirect()->route('admin.bulk-upload.report');
        } catch (\Throwable $e) {
            if (Storage::disk($tempDisk)->exists($path)) {
                Storage::disk($tempDisk)->delete($path);
            }
            $request->session()->forget([self::SESSION_FILE_PATH, self::SESSION_DEFAULT_CREATOR, self::SESSION_VALIDATION_PASSED, self::SESSION_VALIDATION_MISSING]);

            return redirect()->route('admin.bulk-upload.index')
                ->withErrors(['import' => 'Import failed: '.$e->getMessage()]);
        }
    }

    /**
     * Show the import report (GET). Data is flashed from import() redirect.
     * Refreshing this page will redirect back to index as flash data is gone.
     */
    public function report(Request $request): View|RedirectResponse
    {
        $created = $request->session()->get('bulk_upload_report_created');
        $failures = $request->session()->get('bulk_upload_report_failures');

        if ($created === null && $failures === null) {
            return redirect()->route('admin.bulk-upload.index')
                ->with('info', 'Report no longer available. Run an import to see a new report.');
        }

        return view('admin.bulk-upload.report', [
            'created' => $created ?? [],
            'failures' => $failures ?? [],
        ]);
    }

    /**
     * Clear map cache so new/updated events appear on the map immediately.
     */
    private function clearMapCache(): void
    {
        Cache::flush();
    }
}
