@extends('layout.base')

@section('content')
    <section id="codeweek-bulk-user-changes-report-page" class="codeweek-page">
        <section class="codeweek-content-header" style="display: flex; justify-content: space-between; align-items: center;">
            <h1>Bulk user changes — report</h1>
            <a href="{{ route('admin.bulk-user-changes.index') }}" class="px-4 py-2 bg-gray-200 rounded hover:bg-gray-300">Upload another file</a>
        </section>

        <section class="codeweek-content-wrapper">
            <div class="mb-6 p-4 rounded bg-green-50 border border-green-200">
                <p><strong>Applied:</strong> {{ $result->summary['applied'] ?? 0 }}</p>
                <p><strong>Skipped / unchanged:</strong> {{ collect($result->summary)->except(['applied'])->sum() }}</p>
            </div>

            <div class="overflow-x-auto">
                <table class="w-full border-collapse border border-gray-300 text-sm">
                    <thead>
                        <tr class="bg-gray-100">
                            <th class="border border-gray-300 px-2 py-2 text-left">Row</th>
                            <th class="border border-gray-300 px-2 py-2 text-left">Email</th>
                            <th class="border border-gray-300 px-2 py-2 text-left">Status</th>
                            <th class="border border-gray-300 px-2 py-2 text-left">Message</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($result->rows as $row)
                            <tr class="{{ ($row['bucket'] ?? '') === 'applied' ? 'bg-green-50' : '' }}">
                                <td class="border border-gray-300 px-2 py-2">{{ $row['row_number'] ?? '' }}</td>
                                <td class="border border-gray-300 px-2 py-2">{{ $row['email'] ?? '' }}</td>
                                <td class="border border-gray-300 px-2 py-2">{{ $row['status'] ?? '' }}</td>
                                <td class="border border-gray-300 px-2 py-2">{{ $row['message'] ?? '' }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </section>
    </section>
@endsection
