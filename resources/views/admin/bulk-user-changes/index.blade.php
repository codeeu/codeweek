@extends('layout.base')

@section('content')
    <section id="codeweek-bulk-user-changes-page" class="codeweek-page">
        <section class="codeweek-content-header" style="display: flex; justify-content: space-between; align-items: center;">
            <h1>Bulk user changes</h1>
            <a href="{{ route('admin.bulk-upload.index') }}" class="px-4 py-2 bg-gray-200 rounded hover:bg-gray-300">Bulk event upload</a>
        </section>

        <section class="codeweek-content-wrapper">
            <p class="mb-4">Upload the client Excel workbook or paste a change list below. <strong>Missing users are never created.</strong> You get a preview summary before anything is applied.</p>

            @if ($errors->any())
                <div class="mb-4 p-4 rounded bg-red-50 border border-red-200">
                    <ul class="list-disc list-inside text-red-700">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div class="mb-10">
                <h2 class="text-lg font-semibold mb-3">Excel upload</h2>
                <p class="mb-4 text-sm text-gray-700"><strong>Only the sheet named <code>Changes</code> is read.</strong> If older batches are still on the sheet, set <strong>Ignore rows through</strong> (e.g. <code>149</code> to start at row 150).</p>

                <form method="POST" action="{{ route('admin.bulk-user-changes.validate') }}" enctype="multipart/form-data" class="codeweek-form">
                    @csrf
                    <div class="codeweek-form-inner-container">
                        <div class="mb-4">
                            <label for="bulk-user-changes-file" class="font-medium">Excel file (.xlsx)</label>
                            <input type="file" name="file" id="bulk-user-changes-file" accept=".xlsx,.xls"
                                   class="mt-2 text-sm file:mr-2 file:py-2 file:px-4 file:rounded-full file:border-0 file:font-semibold file:bg-primary file:text-white hover:file:opacity-90 file:cursor-pointer cursor-pointer">
                        </div>
                        <div class="mb-4">
                            <label for="bulk-user-changes-ignore-through-row" class="font-medium">Ignore rows through (optional)</label>
                            <input type="number" name="ignore_through_row" id="bulk-user-changes-ignore-through-row" min="1" max="10000" step="1"
                                   value="{{ old('ignore_through_row') }}"
                                   placeholder="e.g. 149"
                                   class="mt-2 block w-full max-w-xs rounded border border-gray-300 px-3 py-2 text-sm">
                            <p class="text-sm text-gray-600 mt-2">Excel row number. Rows 2 through this line are skipped.</p>
                        </div>
                        <button type="submit" class="bg-primary cursor-pointer px-6 py-3 rounded-full font-semibold text-[#20262C] hover:bg-hover-orange duration-300">Upload &amp; preview</button>
                    </div>
                </form>
            </div>

            <div>
                <h2 class="text-lg font-semibold mb-3">Or paste changes</h2>
                <p class="mb-4 text-sm text-gray-700">Paste groups of <strong>5 lines per person</strong>: country, full name, email, action, then role (or <code>new email: …</code> for email changes).</p>

                <form method="POST" action="{{ route('admin.bulk-user-changes.validate') }}" class="codeweek-form">
                    @csrf
                    <div class="codeweek-form-inner-container">
                        <div class="mb-4">
                            <label for="bulk-user-changes-paste" class="font-medium">Change list</label>
                            <textarea name="paste" id="bulk-user-changes-paste" rows="18"
                                      placeholder="Poland&#10;Anita Kocunik&#10;anitakocunik@wp.pl&#10;add&#10;leading teachers"
                                      class="mt-2 block w-full rounded border border-gray-300 px-3 py-2 text-sm font-mono">{{ old('paste') }}</textarea>
                        </div>
                        <button type="submit" class="bg-primary cursor-pointer px-6 py-3 rounded-full font-semibold text-[#20262C] hover:bg-hover-orange duration-300">Paste &amp; preview</button>
                    </div>
                </form>
            </div>
        </section>
    </section>
@endsection
