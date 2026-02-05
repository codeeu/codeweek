@extends('layout.base')

@section('content')
    <section id="codeweek-bulk-upload-preview-page" class="codeweek-page">
        <section class="codeweek-content-header" style="display: flex; justify-content: space-between; align-items: center;">
            <h1>Bulk Event Upload – validation preview</h1>
            <a href="{{ route('admin.bulk-upload.index') }}" class="px-4 py-2 bg-gray-200 rounded hover:bg-gray-300">Upload another file</a>
        </section>

        <section class="codeweek-content-wrapper">
            <p class="mb-4">Rows below show validation results: <span class="bg-trans-success text-green-800 px-1 rounded">green</span> = valid, <span class="bg-trans-danger text-red-800 px-1 rounded">red</span> = problem. You can still run the import; invalid rows will be skipped. Click <strong>Import</strong> to run the import.</p>

            @if ($errors->any())
                <div class="mb-4 p-4 rounded bg-red-50 border border-red-200">
                    <ul class="list-disc list-inside text-red-700">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div class="overflow-x-auto mb-6">
                <table class="w-full border-collapse border border-gray-300">
                    <thead>
                        <tr class="bg-gray-100">
                            <th class="border border-gray-300 px-3 py-2 text-left">Row</th>
                            <th class="border border-gray-300 px-3 py-2 text-left">Status</th>
                            <th class="border border-gray-300 px-3 py-2 text-left">Details</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($row_statuses as $item)
                            <tr class="{{ $item['valid'] ? 'bg-trans-success' : 'bg-trans-danger' }}">
                                <td class="border border-gray-300 px-3 py-2 font-medium">{{ $item['row'] }}</td>
                                <td class="border border-gray-300 px-3 py-2">
                                    @if ($item['valid'])
                                        <span class="text-green-800 font-medium">Valid</span>
                                    @else
                                        <span class="text-red-800 font-medium">Problem</span>
                                    @endif
                                </td>
                                <td class="border border-gray-300 px-3 py-2 {{ $item['valid'] ? 'text-green-700' : 'text-red-700' }}">
                                    @if ($item['valid'])
                                        —
                                    @else
                                        {{ $item['message'] ?? 'Validation failed' }}
                                    @endif
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="3" class="border border-gray-300 px-3 py-4 text-gray-500 text-center">No data rows to show.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <form method="POST" action="{{ route('admin.bulk-upload.import') }}" class="inline" id="bulk-upload-import-form">
                @csrf
                <input type="hidden" name="import_payload" value="{{ $import_payload ?? '' }}">
                <button type="submit" id="bulk-upload-import-btn" class="bg-primary cursor-pointer px-6 py-3 rounded-full font-semibold text-white hover:opacity-90 duration-300">Import</button>
            </form>
            <script>
                document.getElementById('bulk-upload-import-form').addEventListener('submit', function () {
                    var btn = document.getElementById('bulk-upload-import-btn');
                    if (btn) { btn.disabled = true; btn.textContent = 'Importing…'; }
                });
            </script>
        </section>
    </section>
@endsection
