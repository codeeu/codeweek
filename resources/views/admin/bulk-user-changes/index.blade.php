@extends('layout.base')

@section('content')
    <section id="codeweek-bulk-user-changes-page" class="codeweek-page">
        <section class="codeweek-content-header" style="display: flex; justify-content: space-between; align-items: center;">
            <h1>Bulk user changes</h1>
            <a href="{{ route('admin.bulk-upload.index') }}" class="px-4 py-2 bg-gray-200 rounded hover:bg-gray-300">Bulk event upload</a>
        </section>

        <section class="codeweek-content-wrapper">
            <p class="mb-4">Upload the client Excel workbook. <strong>Only the sheet named <code>Changes</code> is read</strong> — all other tabs are ignored. The tool finds the header row on that sheet automatically; rows with no email/action are skipped. <strong>Missing users are never created.</strong></p>

            @if ($errors->any())
                <div class="mb-4 p-4 rounded bg-red-50 border border-red-200">
                    <ul class="list-disc list-inside text-red-700">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form method="POST" action="{{ route('admin.bulk-user-changes.validate') }}" enctype="multipart/form-data" class="codeweek-form">
                @csrf
                <div class="codeweek-form-inner-container">
                    <div class="mb-4">
                        <label for="bulk-user-changes-file" class="font-medium">Excel file (.xlsx) <span class="text-red-600">*</span></label>
                        <input type="file" name="file" id="bulk-user-changes-file" accept=".xlsx,.xls" required
                               class="mt-2 text-sm file:mr-2 file:py-2 file:px-4 file:rounded-full file:border-0 file:font-semibold file:bg-primary file:text-white hover:file:opacity-90 file:cursor-pointer cursor-pointer">
                        <p class="text-sm text-gray-600 mt-2">Must include a tab named <code>Changes</code> (other tabs are not processed). Required columns on that tab: Country, Full name, Email address, ACTION, Role.</p>
                    </div>
                    <button type="submit" class="bg-primary cursor-pointer px-6 py-3 rounded-full font-semibold text-[#20262C] hover:bg-hover-orange duration-300">Upload &amp; preview</button>
                </div>
            </form>
        </section>
    </section>
@endsection
