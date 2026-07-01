<?php

namespace App\Http\Controllers;

use App\Services\BulkUserChanges\BulkUserChangesPlanner;
use App\Services\BulkUserChanges\BulkUserChangesSheetReader;
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
        ], [
            'file.required' => 'Please select a file to upload.',
        ]);

        $file = $validated['file'];
        $extension = strtolower($file->getClientOriginalExtension() ?: 'xlsx');
        $tempDisk = config('filesystems.bulk_upload_temp_disk', 'local');
        $path = $file->storeAs('temp', 'bulk_user_changes_'.time().'.'.$extension, $tempDisk);

        try {
            $parsed = $reader->read($path, $tempDisk);
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

        $plan = $planner->plan($parsed['rows']);
        $token = Str::random(64);

        Cache::put('bulk_user_changes_'.$token, [
            'path' => $path,
            'disk' => $tempDisk,
            'parsed' => $parsed,
            'plan' => $plan,
        ], now()->addHours(2));

        $request->session()->put(self::SESSION_TOKEN, $token);

        return redirect()->route('admin.bulk-user-changes.preview');
    }

    public function preview(Request $request): View|RedirectResponse
    {
        $payload = $this->payloadFromSession($request);
        if ($payload === null) {
            return redirect()->route('admin.bulk-user-changes.index')
                ->withErrors(['file' => 'No validated upload found. Please upload a file first.']);
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
        BulkUserChangesPlanner $planner,
    ): RedirectResponse {
        $token = (string) $request->input('token', $request->session()->get(self::SESSION_TOKEN, ''));
        $payload = $token !== '' ? Cache::get('bulk_user_changes_'.$token) : null;

        if (! is_array($payload)) {
            return redirect()->route('admin.bulk-user-changes.index')
                ->withErrors(['file' => 'Upload session expired. Please upload the file again.']);
        }

        $path = (string) ($payload['path'] ?? '');
        $disk = (string) ($payload['disk'] ?? 'local');

        if ($path === '' || ! Storage::disk($disk)->exists($path)) {
            return redirect()->route('admin.bulk-user-changes.index')
                ->withErrors(['file' => 'Uploaded file no longer available. Please upload again.']);
        }

        try {
            $parsed = $reader->read($path, $disk);
            $result = $planner->apply($parsed['rows']);
        } catch (\Throwable $e) {
            return redirect()->route('admin.bulk-user-changes.preview')
                ->withErrors(['apply' => 'Apply failed: '.$e->getMessage()]);
        }

        Storage::disk($disk)->delete($path);
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
