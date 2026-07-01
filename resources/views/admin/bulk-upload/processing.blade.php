@extends('layout.base')

@section('content')
    <section id="codeweek-bulk-upload-processing-page" class="codeweek-page">
        <section class="codeweek-content-header">
            <h1>Bulk Event Upload – processing</h1>
        </section>

        <section class="codeweek-content-wrapper">
            <div id="bulk-upload-processing-panel" class="p-6 rounded bg-blue-50 border border-blue-200 max-w-xl">
                <p id="bulk-upload-processing-message" class="text-lg font-medium mb-2">Working…</p>
                <p id="bulk-upload-processing-detail" class="text-sm text-gray-700 mb-4">Large files are processed in the background so the browser does not time out. This page will update automatically.</p>
                <p class="text-sm text-gray-500 animate-pulse">Please keep this tab open.</p>
            </div>

            <div id="bulk-upload-processing-error" class="hidden mt-4 p-4 rounded bg-red-50 border border-red-200 text-red-700"></div>
        </section>
    </section>

    <script>
        (function () {
            var token = @json($token);
            var initialPhase = @json($phase);
            var messageEl = document.getElementById('bulk-upload-processing-message');
            var errorEl = document.getElementById('bulk-upload-processing-error');
            var statusUrl = @json(route('admin.bulk-upload.status', ['token' => $token]));

            var phaseLabels = {
                validating: 'Validating your file…',
                validated: 'Validation complete. Opening preview…',
                importing: 'Importing events…',
                completed: 'Import complete. Opening report…',
                failed: 'Something went wrong.'
            };

            function setMessage(phase) {
                messageEl.textContent = phaseLabels[phase] || 'Working…';
            }

            setMessage(initialPhase);

            function poll() {
                fetch(statusUrl, { headers: { 'Accept': 'application/json' } })
                    .then(function (response) { return response.json(); })
                    .then(function (data) {
                        if (!data || !data.phase) {
                            return;
                        }

                        setMessage(data.phase);

                        if (data.phase === 'validated' && data.preview_url) {
                            window.location.href = data.preview_url;
                            return;
                        }

                        if (data.phase === 'completed' && data.report_url) {
                            window.location.href = data.report_url;
                            return;
                        }

                        if (data.phase === 'failed') {
                            errorEl.textContent = data.error || 'Processing failed.';
                            errorEl.classList.remove('hidden');
                            return;
                        }

                        setTimeout(poll, 2000);
                    })
                    .catch(function () {
                        setTimeout(poll, 3000);
                    });
            }

            if (initialPhase === 'validated') {
                poll();
            } else if (initialPhase === 'completed') {
                poll();
            } else if (initialPhase !== 'failed') {
                setTimeout(poll, 1500);
            }
        })();
    </script>
@endsection
