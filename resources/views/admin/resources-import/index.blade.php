@extends('layout.base')

@section('content')
    <section id="codeweek-resources-import-page" class="codeweek-page">
        <section class="codeweek-content-header" style="display: flex; justify-content: space-between; align-items: center;">
            <h1>Resources import</h1>
            <a href="{{ route('admin.bulk-upload.index') }}" class="px-4 py-2 bg-gray-200 rounded hover:bg-gray-300">Bulk event upload</a>
        </section>

        <section class="codeweek-content-wrapper">
            <p class="mb-4">Upload the Learn &amp; Teach metadata workbook (multi-sheet Excel is supported) and optionally a ZIP of PDFs/images. Click <strong>Verify</strong> to parse and preview rows, then <strong>Import</strong> to publish resources to S3 and the Learn &amp; Teach page.</p>
            <ul class="mb-4 text-sm text-gray-700 list-disc list-inside space-y-1">
                <li><strong>Localized PDF resources:</strong> upload a ZIP with <code>links/&lt;group name&gt;/file.pdf</code> and <code>images/thumbnail.png</code>, or rely on SharePoint PDF URLs in the Link column (server must be able to access SharePoint).</li>
                <li><strong>Third-party resources:</strong> Link must be a full <code>https://...</code> URL. These publish as external links and already open in a new tab on the site.</li>
                <li><strong>S3/AWS:</strong> no extra setup in this form — imports use the existing <code>RESOURCES_BUCKET</code> / AWS credentials in <code>.env</code> on the server.</li>
            </ul>

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

            <div class="mb-8">
                <h2 class="text-lg font-semibold mb-2">Step 1: Upload &amp; verify</h2>
                <form id="resources-import-verify-form" method="POST" action="{{ route('admin.resources-import.verify') }}" enctype="multipart/form-data" class="codeweek-form">
                    @csrf

                    <div class="codeweek-form-inner-container">
                        <div class="mb-4">
                            <label for="focus" class="inline-flex items-center gap-2 cursor-pointer">
                                <input type="hidden" name="focus" value="0">
                                <input type="checkbox" name="focus" id="focus" value="1" {{ old('focus') ? 'checked' : '' }}
                                       class="rounded border-gray-300">
                                <span>Focus (create missing filter options)</span>
                            </label>
                            <p class="text-sm text-gray-600 mt-1">If checked, missing types, levels, subjects, etc. will be created automatically.</p>
                        </div>

                        <div class="mb-4">
                            <label for="file" class="block font-medium mb-1">Excel / CSV file <span class="text-red-600">*</span></label>
                            <input type="file" name="file" id="file" accept=".csv,.xlsx,.xls" required
                                   class="block w-full max-w-md" aria-required="true">
                            <p class="text-sm text-gray-600 mt-1">Supports the multi-sheet Learn &amp; Teach workbook (one tab per resource group + Third party resources). Max 50 MB.</p>
                            <p id="file-required-hint" class="text-sm text-amber-600 mt-1 hidden">Please select a file first, then click Verify.</p>
                        </div>

                        <div class="mb-4">
                            <label for="assets_zip" class="block font-medium mb-1">Assets ZIP (optional)</label>
                            <input type="file" name="assets_zip" id="assets_zip" accept=".zip"
                                   class="block w-full max-w-md">
                            <p class="text-sm text-gray-600 mt-1">ZIP layout: <code>links/Binary Number Challenge/ALBANIAN_01 ...pdf</code> and <code>images/Binary number challenge.png</code>. Use this if you do not have SharePoint synced locally. Max 500 MB.</p>
                        </div>

                        <div class="codeweek-form-button-container">
                            <div class="codeweek-button">
                                <button type="submit" id="resources-import-verify-btn" class="bg-primary cursor-pointer px-6 py-3 rounded-full font-semibold text-[#20262C] hover:bg-hover-orange duration-300">
                                    Verify
                                </button>
                            </div>
                        </div>
                    </div>
                </form>
                <script>
                    document.getElementById('resources-import-verify-form').addEventListener('submit', function (e) {
                        var fileInput = document.getElementById('file');
                        var hint = document.getElementById('file-required-hint');
                        var btn = document.getElementById('resources-import-verify-btn');
                        if (!fileInput.files || fileInput.files.length === 0) {
                            e.preventDefault();
                            hint.classList.remove('hidden');
                            fileInput.focus();
                            return;
                        }
                        hint.classList.add('hidden');
                        btn.disabled = true;
                        btn.textContent = 'Verifying…';
                    });
                </script>
            </div>
        </section>
    </section>
@endsection
