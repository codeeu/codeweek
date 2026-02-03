@extends('layout.base')

@section('content')
    <section id="codeweek-bulk-upload-report-page" class="codeweek-page">
        <section class="codeweek-content-header" style="display: flex; justify-content: space-between; align-items: center;">
            <h1>Bulk upload report</h1>
            <a href="{{ route('admin.bulk-upload.index') }}" class="px-4 py-2 bg-gray-200 rounded hover:bg-gray-300">Upload another file</a>
        </section>

        <section class="codeweek-content-wrapper">
            @if (count($created) > 0)
                <h2 class="text-xl font-semibold mt-6 mb-2">Created events ({{ count($created) }})</h2>
                <ul class="list-disc list-inside mb-6">
                    @foreach ($created as $event)
                        <li>
                            <a href="{{ $event['url'] }}" target="_blank" rel="noopener" class="text-blue-600 hover:underline">{{ $event['title'] }}</a>
                            <span class="text-gray-500">(ID: {{ $event['id'] }})</span>
                        </li>
                    @endforeach
                </ul>
            @endif

            @if (count($failures) > 0)
                <h2 class="text-xl font-semibold mt-6 mb-2">Failures ({{ count($failures) }})</h2>
                <p class="text-sm text-gray-600 mb-2">Row number refers to the row in the Excel file (header = row 1).</p>
                <table class="w-full border-collapse border border-gray-300">
                    <thead>
                        <tr class="bg-gray-100">
                            <th class="border border-gray-300 px-3 py-2 text-left">Row</th>
                            <th class="border border-gray-300 px-3 py-2 text-left">Reason</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($failures as $rowIndex => $reason)
                            <tr>
                                <td class="border border-gray-300 px-3 py-2">{{ $rowIndex }}</td>
                                <td class="border border-gray-300 px-3 py-2">{{ $reason }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @endif

            @if (count($created) === 0 && count($failures) === 0)
                <p class="text-gray-600">No events were created and no failures were recorded. The file may have had no data rows.</p>
            @endif
        </section>
    </section>
@endsection
