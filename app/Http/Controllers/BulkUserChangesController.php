<?php

namespace App\Http\Controllers;

use App\Services\BulkUserChanges\BulkUserChangesPlanner;
use App\Services\BulkUserChanges\BulkUserChangesReadOptions;
use App\Services\BulkUserChanges\BulkUserChangesSheetReader;
use App\Services\BulkUserChanges\BulkUserChangesTextParser;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\View\View;

class BulkUserChangesController extends Controller
{
    private const SESSION_TOKEN = 'bulk_user_changes_token';

    public function index(): View
    {
        return view('admin.bulk-user-changes.index');
    }

    public function validateUpload(
        Request $request,
        BulkUserChangesSheetReader $reader,
        BulkUserChangesTextParser $textParser,
        BulkUserChangesPlanner $planner,
    ): RedirectResponse {
        $hasFile = $request->hasFile('file') && $request->file('file')?->isValid();
        $hasPaste = trim((string) $request->input('paste', '')) !== '';

        if ($hasFile && $hasPaste) {
            return redirect()->route('admin.bulk-user-changes.index')
                ->withErrors(['file' => 'Upload a file or paste text, not both.'])
                ->withInput();
        }

        if (! $hasFile && ! $hasPaste) {
            return redirect()->route('admin.bulk-user-changes.index')
                ->withErrors(['file' => 'Upload a file or paste changes to continue.']);
        }

        if ($hasPaste) {
            return $this->validatePaste($request, $textParser, $planner);
        }

        return $this->validateFile($request, $reader, $planner);
    }

    public function preview(Request $request): View|RedirectResponse
    {
        $payload = $this->payloadFromSession($request);
        if ($payload === null) {
            return redirect()->route('admin.bulk-user-changes.index')
                ->withErrors(['file' => 'No validated upload found. Please upload a file or paste changes first.']);
        }

        return view('admin.bulk-user-changes.preview', [
            'parsed' => $payload['parsed'],
            'plan' => $payload['plan'],
            'token' => $request->session()->get(self::SESSION_TOKEN),
        ]);
    }

    public function apply(
        Request $request,
        BulkUserChangesSheetReader $reader,
        BulkUserChangesTextParser $textParser,
        BulkUserChangesPlanner $planner,
    ): RedirectResponse {
        $token = (string) $request->input('token', $request->session()->get(self::SESSION_TOKEN, ''));
        $payload = $token !== '' ? Cache::get('bulk_user_changes_'.$token) : null;

        if (! is_array($payload)) {
            return redirect()->route('admin.bulk-user-changes.index')
                ->withErrors(['file' => 'Session expired. Please upload or paste again.']);
        }

        try {
            $parsed = $this->readPayload($payload, $reader, $textParser);
            $result = $planner->apply($parsed['rows']);
        } catch (\Throwable $e) {
            return redirect()->route('admin.bulk-user-changes.preview')
                ->withErrors(['apply' => 'Apply failed: '.$e->getMessage()]);
        }

        $this->cleanupPayload($payload);
        Cache::forget('bulk_user_changes_'.$token);
        $request->session()->forget(self::SESSION_TOKEN);
        $request->session()->put('bulk_user_changes_report', [
            'parsed' => $parsed,
            'result' => $result,
        ]);

        return redirect()->route('admin.bulk-user-changes.report');
    }

    public function report(Request $request): View|RedirectResponse
    {
        $report = $request->session()->get('bulk_user_changes_report');
        if (! is_array($report)) {
            return redirect()->route('admin.bulk-user-changes.index');
        }

        return view('admin.bulk-user-changes.report', [
            'parsed' => $report['parsed'],
            'result' => $report['result'],
        ]);
    }

    private function validateFile(
        Request $request,
        BulkUserChangesSheetReader $reader,
        BulkUserChangesPlanner $planner,
    ): RedirectResponse {
        $validated = $request->validate([
            'file' => [
                'required',
                'file',
                'max:10240',
                function ($attribute, $value, $fail) {
                    if (! $value) {
                        return;
                    }
                    $ext = strtolower($value->getClientOriginalExtension());
                    if (! in_array($ext, ['xlsx', 'xls'], true)) {
                        $fail('The file must be an Excel workbook (.xlsx or .xls) with a Changes sheet.');
                    }
                },
            ],
            'ignore_through_row' => ['nullable', 'integer', 'min:1', 'max:10000'],
        ], [
            'file.required' => 'Please select a file to upload.',
        ]);

        $file = $validated['file'];
        $readOptions = BulkUserChangesReadOptions::fromInput($validated['ignore_through_row'] ?? null);
        $extension = strtolower($file->getClientOriginalExtension() ?: 'xlsx');
        $tempDisk = config('filesystems.bulk_upload_temp_disk', 'local');
        $path = $file->storeAs('temp', 'bulk_user_changes_'.time().'.'.$extension, $tempDisk);

        try {
            $parsed = $reader->read($path, $tempDisk, $readOptions);
        } catch (\Throwable $e) {
            Storage::disk($tempDisk)->delete($path);

            return redirect()->route('admin.bulk-user-changes.index')
                ->withErrors(['file' => 'Could not read file: '.$e->getMessage()]);
        }

        if ($parsed['rows'] === []) {
            Storage::disk($tempDisk)->delete($path);

            return redirect()->route('admin.bulk-user-changes.index')
                ->withErrors(['file' => 'No actionable rows found after the header row. Check that the Changes sheet has email addresses and actions.']);
        }

        return $this->storePreviewSession($request, $planner, $parsed, [
            'source' => 'file',
            'path' => $path,
            'disk' => $tempDisk,
            'ignore_through_row' => $readOptions->ignoreThroughRow,
        ]);
    }

    private function validatePaste(
        Request $request,
        BulkUserChangesTextParser $textParser,
        BulkUserChangesPlanner $planner,
    ): RedirectResponse {
        $validated = $request->validate([
            'paste' => ['required', 'string', 'min:10', 'max:100000'],
        ], [
            'paste.required' => 'Paste the change list to continue.',
        ]);

        try {
            $parsed = $textParser->parse($validated['paste']);
        } catch (\Throwable $e) {
            return redirect()->route('admin.bulk-user-changes.index')
                ->withErrors(['paste' => $e->getMessage()])
                ->withInput();
        }

        return $this->storePreviewSession($request, $planner, $parsed, [
            'source' => 'paste',
            'paste_text' => $validated['paste'],
        ]);
    }

    /**
     * @param  array<string, mixed>  $parsed
     * @param  array<string, mixed>  $cacheMeta
     */
    private function storePreviewSession(
        Request $request,
        BulkUserChangesPlanner $planner,
        array $parsed,
        array $cacheMeta,
    ): RedirectResponse {
        $plan = $planner->plan($parsed['rows']);
        $token = Str::random(64);

        Cache::put('bulk_user_changes_'.$token, [
            ...$cacheMeta,
            'parsed' => $parsed,
            'plan' => $plan,
        ], now()->addHours(2));

        $request->session()->put(self::SESSION_TOKEN, $token);

        return redirect()->route('admin.bulk-user-changes.preview');
    }

    /**
     * @param  array<string, mixed>  $payload
     * @return array<string, mixed>
     */
    private function readPayload(
        array $payload,
        BulkUserChangesSheetReader $reader,
        BulkUserChangesTextParser $textParser,
    ): array {
        if (($payload['source'] ?? 'file') === 'paste') {
            $pasteText = (string) ($payload['paste_text'] ?? '');

            if ($pasteText === '') {
                throw new \RuntimeException('Pasted text no longer available. Please paste again.');
            }

            return $textParser->parse($pasteText);
        }

        $path = (string) ($payload['path'] ?? '');
        $disk = (string) ($payload['disk'] ?? 'local');

        if ($path === '' || ! Storage::disk($disk)->exists($path)) {
            throw new \RuntimeException('Uploaded file no longer available. Please upload again.');
        }

        $readOptions = BulkUserChangesReadOptions::fromInput($payload['ignore_through_row'] ?? null);

        return $reader->read($path, $disk, $readOptions);
    }

    /**
     * @param  array<string, mixed>  $payload
     */
    private function cleanupPayload(array $payload): void
    {
        if (($payload['source'] ?? 'file') !== 'file') {
            return;
        }

        $path = (string) ($payload['path'] ?? '');
        $disk = (string) ($payload['disk'] ?? 'local');

        if ($path !== '' && Storage::disk($disk)->exists($path)) {
            Storage::disk($disk)->delete($path);
        }
    }

    /**
     * @return array<string, mixed>|null
     */
    private function payloadFromSession(Request $request): ?array
    {
        $token = (string) $request->session()->get(self::SESSION_TOKEN, '');
        if ($token === '') {
            return null;
        }

        $payload = Cache::get('bulk_user_changes_'.$token);

        return is_array($payload) ? $payload : null;
    }
}
