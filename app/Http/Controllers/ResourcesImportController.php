<?php

namespace App\Http\Controllers;

use App\Imports\ResourcesImport;
use App\Imports\ResourcesPreviewImport;
use App\Services\ResourcesImportResult;
use App\Services\ResourcesUploadValidator;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;
use Maatwebsite\Excel\Facades\Excel;

class ResourcesImportController extends Controller
{
    private const SESSION_FILE_PATH = 'resources_import_file_path';
    private const SESSION_ROWS = 'resources_import_rows';
    private const SESSION_FOCUS = 'resources_import_focus';

    /**
     * Show the resources import form (file upload + focus checkbox).
     */
    public function index(): View
    {
        return view('admin.resources-import.index');
    }

    /**
     * Verify file: validate, parse Excel to rows, store in session, redirect to preview.
     */
    public function verify(Request $request): RedirectResponse
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
            'focus' => ['nullable', 'boolean'],
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
            return redirect()->route('admin.resources-import.index')
                ->withErrors(['file' => 'The file must be a CSV or Excel file (.csv, .xlsx, or .xls).'])
                ->withInput();
        }

        $oldPath = $request->session()->get(self::SESSION_FILE_PATH);
        if ($oldPath && Storage::exists($oldPath)) {
            Storage::delete($oldPath);
        }
        $request->session()->forget([self::SESSION_FILE_PATH, self::SESSION_ROWS, self::SESSION_FOCUS]);

        $path = $file->storeAs('temp', 'resources_import_'.time().'.'.$extension);

        try {
            $import = new ResourcesPreviewImport;
            Excel::import($import, $path, 'local');
            $rows = $import->data;
        } catch (\Throwable $e) {
            Storage::delete($path);

            return redirect()->route('admin.resources-import.index')
                ->withErrors(['file' => 'Could not parse file: '.$e->getMessage()])
                ->withInput();
        }

        $headerCheck = ResourcesUploadValidator::validateRequiredColumnsFromRows($rows);
        if (! $headerCheck['valid']) {
            Storage::delete($path);

            return redirect()->route('admin.resources-import.index')
                ->withErrors(['file' => 'Missing required column(s): '.implode(', ', $headerCheck['missing']).'. Please add a header row with at least "name_of_the_resource".'])
                ->withInput();
        }
        if (empty($rows)) {
            Storage::delete($path);

            return redirect()->route('admin.resources-import.index')
                ->withErrors(['file' => 'The file has no data rows.'])
                ->withInput();
        }

        $request->session()->put(self::SESSION_FILE_PATH, $path);
        $request->session()->put(self::SESSION_ROWS, $rows);
        $request->session()->put(self::SESSION_FOCUS, (bool) $request->boolean('focus'));

        return redirect()->route('admin.resources-import.preview');
    }

    /**
     * Show preview table (editable Image URL per row). Redirect to index if no session data.
     */
    public function preview(Request $request): View|RedirectResponse
    {
        $rows = $request->session()->get(self::SESSION_ROWS);
        $focus = $request->session()->get(self::SESSION_FOCUS, false);

        if (! is_array($rows) || empty($rows)) {
            $request->session()->forget([self::SESSION_FILE_PATH, self::SESSION_ROWS, self::SESSION_FOCUS]);

            return redirect()->route('admin.resources-import.index')
                ->with('info', 'No preview data found. Please upload and verify a file first.');
        }

        $path = $request->session()->get(self::SESSION_FILE_PATH);
        $importPayload = $path ? Crypt::encryptString(json_encode([
            'path' => $path,
            'focus' => $focus,
        ])) : '';

        return view('admin.resources-import.preview', [
            'rows' => $rows,
            'focus' => $focus,
            'import_payload' => $importPayload,
        ]);
    }

    /**
     * Run import with file path (from form payload or session) and request edits; redirect to report.
     * Uses encrypted form payload so import works when session is not shared (e.g. load-balanced servers).
     */
    public function import(Request $request): RedirectResponse
    {
        $path = null;
        $focus = false;

        $payload = $request->input('import_payload');
        if (is_string($payload) && $payload !== '') {
            try {
                $decoded = json_decode(Crypt::decryptString($payload), true);
                if (is_array($decoded) && ! empty($decoded['path'])) {
                    $path = $decoded['path'];
                    $focus = (bool) ($decoded['focus'] ?? false);
                }
            } catch (\Throwable $e) {
                // Invalid or expired payload, fall back to session
            }
        }

        if (! $path) {
            $path = $request->session()->get(self::SESSION_FILE_PATH);
            $focus = $request->session()->get(self::SESSION_FOCUS, false);
        }

        if (! $path || ! Storage::exists($path)) {
            $request->session()->forget([self::SESSION_FILE_PATH, self::SESSION_ROWS, self::SESSION_FOCUS]);

            return redirect()->route('admin.resources-import.index')
                ->withErrors(['import' => 'No verified file found. Please upload and verify a file first.']);
        }
        $edits = $request->input('edits', []);
        if (! is_array($edits)) {
            $edits = [];
        }
        $overrides = [];
        $allowedKeys = [
            'name_of_the_resource', 'link', 'description', 'image',
            'filters_type', 'filters_target_audience', 'filters_level_of_difficulty',
            'filters_programming_language', 'filters_subject', 'filters_topics', 'filters_language',
            'category', 'group_name',
        ];
        foreach ($edits as $index => $fields) {
            if (! is_array($fields)) {
                continue;
            }
            $rowOverrides = [];
            foreach ($allowedKeys as $key) {
                if (array_key_exists($key, $fields)) {
                    $value = $fields[$key];
                    if (is_scalar($value)) {
                        $rowOverrides[$key] = trim((string) $value);
                    } elseif (is_array($value)) {
                        $rowOverrides[$key] = $value;
                    }
                }
            }
            if ($rowOverrides !== []) {
                $overrides[(int) $index] = $rowOverrides;
            }
        }

        try {
            $result = new ResourcesImportResult;
            $import = new ResourcesImport(null, null, $focus, $overrides, $result);
            Excel::import($import, $path, 'local');

            Storage::delete($path);
            $request->session()->forget([self::SESSION_FILE_PATH, self::SESSION_ROWS, self::SESSION_FOCUS]);

            $request->session()->flash('resources_import_report_created', $result->created);
            $request->session()->flash('resources_import_report_updated', $result->updated);
            $request->session()->flash('resources_import_report_failures', $result->failures);

            return redirect()->route('admin.resources-import.report');
        } catch (\Throwable $e) {
            if (Storage::exists($path)) {
                Storage::delete($path);
            }
            $request->session()->forget([self::SESSION_FILE_PATH, self::SESSION_ROWS, self::SESSION_FOCUS]);

            return redirect()->route('admin.resources-import.preview')
                ->withErrors(['import' => 'Import failed: '.$e->getMessage()]);
        }
    }

    /**
     * Show the import report (GET). Data is flashed from import() redirect.
     */
    public function report(Request $request): View|RedirectResponse
    {
        $created = $request->session()->get('resources_import_report_created');
        $updated = $request->session()->get('resources_import_report_updated');
        $failures = $request->session()->get('resources_import_report_failures');

        if ($created === null && $updated === null && $failures === null) {
            return redirect()->route('admin.resources-import.index')
                ->with('info', 'Report no longer available. Run an import to see a new report.');
        }

        return view('admin.resources-import.report', [
            'created' => $created ?? [],
            'updated' => $updated ?? [],
            'failures' => $failures ?? [],
        ]);
    }
}
