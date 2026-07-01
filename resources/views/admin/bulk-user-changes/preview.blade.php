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
                <p><strong>Sheet:</strong> {{ $parsed['sheet_name'] ?? 'Changes' }} · header row {{ $parsed['header_row'] ?? '?' }}</p>
                <p><strong>Actionable rows:</strong> {{ $parsed['meta']['parsed_rows'] ?? 0 }} ({{ $parsed['meta']['skipped_blank_rows'] ?? 0 }} blank rows skipped)</p>
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
                            <th class="border border-gray-300 px-2 py-2 text-left">Row</th>
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
