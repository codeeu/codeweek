@extends('layout.base')

@section('content')
    <section id="codeweek-bulk-upload-page" class="codeweek-page">
        <section class="codeweek-content-header" style="display: flex; justify-content: space-between; align-items: center;">
            <h1>Bulk Event Upload</h1>
            <a href="{{ route('admin.resources-import.index') }}" class="px-4 py-2 bg-gray-200 rounded hover:bg-gray-300">Resources import</a>
        </section>

        <section class="codeweek-content-wrapper">
            <p class="mb-4">Upload an Excel or CSV file with event data. First click <strong>Upload &amp; validate</strong> to check that all required column headers are present. If validation passes, click <strong>Import</strong> to run the import. You can set an optional default creator email; otherwise events use the contact email (and a user will be created if needed).</p>

            @if (session('success'))
                <div class="mb-4 p-4 rounded bg-green-50 border border-green-200 text-green-800">
                    {{ session('success') }}
                </div>
            @endif

            @if (session('info'))
                <div class="mb-4 p-4 rounded bg-blue-50 border border-blue-200 text-blue-800">
                    {{ session('info') }}
                </div>
            @endif

            @if ($errors->any())
                <div class="mb-4 p-4 rounded bg-red-50 border border-red-200">
                    <ul class="list-disc list-inside text-red-700">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            {{-- Step 1: Upload & validate --}}
            <div class="mb-8">
                <h2 class="text-lg font-semibold mb-2">Step 1: Upload &amp; validate</h2>
                <form id="bulk-upload-validate-form" method="POST" action="{{ route('admin.bulk-upload.validate') }}" enctype="multipart/form-data" class="codeweek-form">
                    @csrf

                    <div class="codeweek-form-inner-container">
                        <div class="mb-4">
                            <label for="default_creator_email" class="block font-medium mb-1">Default creator email (optional)</label>
                            <input type="email" name="default_creator_email" id="default_creator_email"
                                   class="w-full max-w-md px-3 py-2 border rounded"
                                   value="{{ old('default_creator_email', $storedDefaultCreatorEmail) }}"
                                   placeholder="e.g. admin@example.com">
                            <p class="text-sm text-gray-600 mt-1">If set, all events without a creator_id or contact_email match will use this user.</p>
                        </div>

                        <div class="mb-4">
                            <div class="flex flex-wrap items-center gap-2 mb-1">
                                <label for="bulk-upload-file" class="font-medium">Excel / CSV file <span class="text-red-600">*</span></label>
                                <input type="file" name="file" id="bulk-upload-file" accept=".csv,.xlsx,.xls" required
                                       class="text-sm file:mr-2 file:py-2 file:px-4 file:rounded-full file:border-0 file:font-semibold file:bg-primary file:text-white hover:file:opacity-90 file:cursor-pointer cursor-pointer" aria-required="true">
                                <span id="bulk-upload-file-name" class="text-sm text-gray-600 italic">No file chosen</span>
                                <span id="bulk-upload-file-attached" class="hidden text-sm font-medium text-green-700 bg-green-100 px-2 py-0.5 rounded">Attached</span>
                            </div>
                            <p class="text-sm text-gray-600 mt-1">Max 10 MB. Required columns: activity_title, name_of_organisation, type_of_organisation, activity_type, description, address, country, start_date, end_date, longitude, latitude, contact_email, organiser_website, participants_count, males_count, females_count, other_count.</p>
                        </div>

                        <div class="codeweek-form-button-container">
                            <div class="codeweek-button">
                                <button type="submit" id="bulk-upload-validate-btn" class="bg-primary cursor-pointer px-6 py-3 rounded-full font-semibold text-[#20262C] hover:bg-hover-orange duration-300">
                                    Upload &amp; validate
                                </button>
                            </div>
                        </div>
                    </div>
                </form>
                <script>
                    (function () {
                        var fileInput = document.getElementById('bulk-upload-file');
                        var fileNameEl = document.getElementById('bulk-upload-file-name');
                        var attachedBadge = document.getElementById('bulk-upload-file-attached');
                        var form = document.getElementById('bulk-upload-validate-form');
                        var btn = document.getElementById('bulk-upload-validate-btn');
                        fileInput.addEventListener('change', function () {
                            if (this.files && this.files.length > 0) {
                                fileNameEl.textContent = this.files[0].name;
                                fileNameEl.classList.remove('italic', 'text-gray-600');
                                fileNameEl.classList.add('text-gray-800', 'font-medium');
                                if (attachedBadge) { attachedBadge.classList.remove('hidden'); }
                            } else {
                                fileNameEl.textContent = 'No file chosen';
                                fileNameEl.classList.add('italic', 'text-gray-600');
                                fileNameEl.classList.remove('text-gray-800', 'font-medium');
                                if (attachedBadge) { attachedBadge.classList.add('hidden'); }
                            }
                        });
                        form.addEventListener('submit', function () {
                            if (!fileInput.files || fileInput.files.length === 0) return;
                            btn.disabled = true;
                            btn.textContent = 'Validating…';
                        });
                    })();
                </script>
            </div>

            {{-- Validation result: missing columns --}}
            @if (count($validationMissing) > 0)
                <div class="mb-6 p-4 rounded bg-amber-50 border border-amber-200">
                    <h3 class="font-semibold text-amber-800 mb-2">Validation failed: missing required columns</h3>
                    <p class="text-sm text-amber-700 mb-2">Your file must have a header row with these exact column names. The following are missing:</p>
                    <ul class="list-disc list-inside text-amber-800">
                        @foreach ($validationMissing as $col)
                            <li>{{ $col }}</li>
                        @endforeach
                    </ul>
                    <p class="text-sm text-amber-700 mt-2">Add the missing columns to your file and upload again.</p>
                </div>
            @endif

            {{-- Step 2: Import (only when validation passed) --}}
            @if ($validationPassed)
                <div class="p-4 rounded bg-green-50 border border-green-200">
                    <h2 class="text-lg font-semibold mb-2 text-green-800">Step 2: Import</h2>
                    <p class="mb-3 text-green-700">All required columns are present. Click the button below to run the import.</p>
                    <form method="POST" action="{{ route('admin.bulk-upload.import') }}" class="inline" id="bulk-upload-import-form">
                        @csrf
                        <input type="hidden" name="import_payload" value="{{ $import_payload ?? '' }}">
                        <button type="submit" id="bulk-upload-import-btn" class="bg-primary cursor-pointer px-6 py-3 rounded-full font-semibold text-[#20262C] hover:bg-hover-orange duration-300">Import</button>
                    </form>
                    <script>
                        document.getElementById('bulk-upload-import-form').addEventListener('submit', function () {
                            var btn = document.getElementById('bulk-upload-import-btn');
                            if (btn) { btn.disabled = true; btn.textContent = 'Importing…'; }
                        });
                    </script>
                </div>
            @endif
        </section>
    </section>
@endsection
