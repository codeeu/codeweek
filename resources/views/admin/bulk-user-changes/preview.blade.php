@extends('layout.base')

@php
    $summary = $plan->summary ?? [];
    $rows = $plan->rows ?? [];
    $wouldApply = ($summary['would_apply'] ?? 0);
    $applied = ($summary['applied'] ?? 0);
@endphp

@section('content')
    <section id="codeweek-bulk-user-changes-preview-page" class="codeweek-page">
        <section class="codeweek-content-header" style="display: flex; justify-content: space-between; align-items: center;">
            <h1>Bulk user changes — preview</h1>
            <a href="{{ route('admin.bulk-user-changes.index') }}" class="px-4 py-2 bg-gray-200 rounded hover:bg-gray-300">Upload another file</a>
        </section>

        <section class="codeweek-content-wrapper">
            @if ($errors->any())
                <div class="mb-4 p-4 rounded bg-red-50 border border-red-200 text-red-700">
                    @foreach ($errors->all() as $error)
                        <p>{{ $error }}</p>
                    @endforeach
                </div>
            @endif

            <div class="mb-6 p-4 rounded bg-blue-50 border border-blue-200 text-sm">
                @php
                    $meta = $parsed['meta'] ?? [];
                    $firstRow = $meta['first_data_row'] ?? null;
                    $lastRow = $meta['last_data_row'] ?? null;
                    $headerRow = $parsed['header_row'] ?? 1;
                    $isPaste = ($parsed['source'] ?? '') === 'paste';
                    $rowLabel = $isPaste ? 'Entry' : 'Row';
                @endphp
                <p><strong>Source:</strong> {{ $parsed['sheet_name'] ?? 'Changes' }}
                    @if (! $isPaste)
                        · header row {{ $headerRow }}
                    @endif
                </p>
                <p><strong>{{ $isPaste ? 'Entries' : 'Rows in file' }}:</strong>
                    @if ($firstRow && $lastRow)
                        {{ $firstRow }}–{{ $lastRow }}
                        ({{ $meta['parsed_rows'] ?? 0 }} with email)
                    @else
                        none
                    @endif
                </p>
                @if (! empty($meta['first_email']) && ! empty($meta['last_email']))
                    <p><strong>First:</strong> {{ $meta['first_email'] }} · <strong>Last:</strong> {{ $meta['last_email'] }}</p>
                @endif
                @if (! empty($meta['ignore_through_row']))
                    <p><strong>Ignored rows:</strong> 2–{{ $meta['ignore_through_row'] }} ({{ $meta['skipped_ignored_range_rows'] ?? 0 }} rows skipped)</p>
                @endif
                @if (($meta['skipped_legacy_rows'] ?? 0) > 0 || ($meta['skipped_no_email_rows'] ?? 0) > 0 || (($meta['skipped_blank_rows'] ?? 0) > 0 && empty($meta['ignore_through_row'])))
                    <p class="text-gray-700">
                        Also ignored:
                        @if (($meta['skipped_legacy_rows'] ?? 0) > 0)
                            {{ $meta['skipped_legacy_rows'] }} legacy <code>#VALUE!</code> rows,
                        @endif
                        @if (($meta['skipped_no_email_rows'] ?? 0) > 0)
                            {{ $meta['skipped_no_email_rows'] }} rows without email,
                        @endif
                        @if (($meta['skipped_blank_rows'] ?? 0) > 0)
                            {{ $meta['skipped_blank_rows'] }} blank rows
                        @endif
                    </p>
                @endif
                @if ($firstRow && $firstRow > $headerRow + 1 && empty($meta['ignore_through_row']) && ! $isPaste)
                    <p class="mt-2 text-amber-800"><strong>Note:</strong> The first row is {{ $firstRow }}, not row {{ $headerRow + 1 }}. Set <strong>Ignore rows through</strong> on upload, or delete earlier batches in Excel.</p>
                @endif
                <p class="mt-2"><strong>Ready to apply:</strong> {{ $summary['would_apply'] ?? 0 }} · <strong>Skipped:</strong> {{ collect($summary)->except(['would_apply', 'applied'])->sum() }}</p>
            </div>

            @if (($summary['would_apply'] ?? 0) > 0)
                <form method="POST" action="{{ route('admin.bulk-user-changes.apply') }}" class="mb-6">
                    @csrf
                    <input type="hidden" name="token" value="{{ $token }}">
                    <button type="submit" class="bg-primary cursor-pointer px-6 py-3 rounded-full font-semibold text-white hover:opacity-90 duration-300"
                            onclick="return confirm('Apply {{ $summary['would_apply'] }} planned change(s) to live user accounts?');">
                        Apply {{ $summary['would_apply'] }} change(s)
                    </button>
                </form>
            @endif

            <div class="overflow-x-auto">
                <table class="w-full border-collapse border border-gray-300 text-sm">
                    <thead>
                        <tr class="bg-gray-100">
                            <th class="border border-gray-300 px-2 py-2 text-left">{{ $rowLabel ?? 'Row' }}</th>
                            <th class="border border-gray-300 px-2 py-2 text-left">Country</th>
                            <th class="border border-gray-300 px-2 py-2 text-left">Name</th>
                            <th class="border border-gray-300 px-2 py-2 text-left">Email</th>
                            <th class="border border-gray-300 px-2 py-2 text-left">Action</th>
                            <th class="border border-gray-300 px-2 py-2 text-left">Role</th>
                            <th class="border border-gray-300 px-2 py-2 text-left">Result</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($rows as $row)
                            @php
                                $status = $row['status'] ?? '';
                                $isReady = ($row['bucket'] ?? '') === 'would_apply';
                            @endphp
                            <tr class="{{ $isReady ? 'bg-green-50' : 'bg-white' }}">
                                <td class="border border-gray-300 px-2 py-2">{{ $row['row_number'] ?? '' }}</td>
                                <td class="border border-gray-300 px-2 py-2">{{ $row['country'] ?? '' }}</td>
                                <td class="border border-gray-300 px-2 py-2">{{ $row['full_name'] ?? '' }}</td>
                                <td class="border border-gray-300 px-2 py-2">{{ $row['email'] ?? '' }}</td>
                                <td class="border border-gray-300 px-2 py-2">{{ $row['action'] ?? '' }}</td>
                                <td class="border border-gray-300 px-2 py-2">{{ $row['role'] ?? '' }}</td>
                                <td class="border border-gray-300 px-2 py-2">{{ $row['message'] ?? '' }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </section>
    </section>
@endsection
