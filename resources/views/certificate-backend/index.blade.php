@extends('layout.base')

@section('content')
<section class="codeweek-participation-report-page codeweek-page">
    <section class="codeweek-content-header" style="display: flex; justify-content: space-between; align-items: center; flex-wrap: wrap; gap: 1rem;">
        <h1>Certificate Backend – Excellence &amp; Super Organiser</h1>
        <div>
            <a href="{{ route('certificate_backend.index', ['edition' => $edition, 'type' => $typeSlug]) }}" class="inline-block px-6 py-3 mr-2 font-semibold text-white rounded-full duration-300 cursor-pointer bg-primary hover:opacity-90">Refresh</a>
            <a href="{{ route('certificate_backend.errors', ['edition' => $edition, 'type' => $typeSlug]) }}" class="inline-block px-6 py-3 font-semibold text-white rounded-full duration-300 cursor-pointer bg-primary hover:opacity-90">View errors</a>
        </div>
    </section>
 <section class="px-5 codeweek-content-wrapper">
    {{-- Tabs --}}
    <ul class="cert-backend-tabs" style="display: flex; gap: 0.5rem; list-style: none; padding: 0; margin: 0 0 1.5rem 0; border-bottom: 1px solid #ddd;">
        <li>
            <a href="{{ route('certificate_backend.index', ['edition' => $edition, 'type' => 'excellence']) }}" style="padding: 0.5rem 1rem; text-decoration: none; {{ $typeSlug === 'excellence' ? 'font-weight: bold; border-bottom: 2px solid #333;' : '' }}">Excellence</a>
        </li>
        <li>
            <a href="{{ route('certificate_backend.index', ['edition' => $edition, 'type' => 'super-organiser']) }}" style="padding: 0.5rem 1rem; text-decoration: none; {{ $typeSlug === 'super-organiser' ? 'font-weight: bold; border-bottom: 2px solid #333;' : '' }}">Super Organiser</a>
        </li>
    </ul>

    {{-- Edition --}}
    <p style="margin-bottom: 1rem;">
        <label>Edition (year):</label>
        <select id="edition-select" style="margin-left: 0.5rem;">
            @foreach([2025, 2026] as $y)
                <option value="{{ $y }}" {{ $edition === $y ? 'selected' : '' }}>{{ $y }}</option>
            @endforeach
        </select>
    </p>

    {{-- Server note: queue worker required for bulk actions --}}
    <div class="mb-4 p-3 rounded bg-amber-100 text-amber-900" role="alert">
        <p class="mb-2"><strong>Bulk Generate and Send</strong> run in the background. To process them:</p>
        <ol class="list-decimal list-inside mb-2 space-y-1">
            <li>On the server (SSH), start the queue worker once: <code class="bg-amber-200 px-1 rounded">php artisan queue:work</code></li>
            <li>Keep it running (or use <strong>Supervisor</strong> so it restarts automatically).</li>
        </ol>
        <p class="mb-0 text-sm">When the worker is running, the progress bars above update every few seconds—you’ll see “Generating…” / “Sending…” and the counts going up. No button in the browser can start the worker; it has to run as a separate process on the server. Manual “Generate” / “Regenerate” / “Resend” for single rows work immediately without the queue.</p>
    </div>

    {{-- Visible error (in case alerts are blocked) --}}
    <div id="last-error" class="hidden mb-4 p-3 rounded bg-red-100 text-red-800" role="alert"></div>
    {{-- Success message (e.g. "Generation started" + queue reminder) --}}
    <div id="last-success" class="hidden mb-4 p-3 rounded bg-green-100 text-green-800" role="status"></div>

    {{-- Stats --}}
    <div id="stats" class="cert-backend-stats" style="display: grid; grid-template-columns: repeat(auto-fill, minmax(140px, 1fr)); gap: 1rem; margin-bottom: 1.5rem;">
        <div>Total: <strong id="stat-total">–</strong></div>
        <div>Generated: <strong id="stat-generated">–</strong></div>
        <div>Sent: <strong id="stat-sent">–</strong></div>
        <div>Generation failed: <strong id="stat-gen-failed">–</strong></div>
        <div>Send failed: <strong id="stat-send-failed">–</strong></div>
    </div>

    {{-- Progress: Generating --}}
    <div id="progress-generate" class="hidden mb-4">
        <p class="mb-1"><strong>Generating certificates…</strong> <span id="progress-generate-text">0 of 0</span></p>
        <div class="w-full bg-gray-200 rounded-full h-3 overflow-hidden">
            <div id="progress-generate-bar" class="h-full bg-primary rounded-full transition-all duration-300" style="width: 0%;"></div>
        </div>
    </div>

    {{-- Progress: Sending --}}
    <div id="progress-send" class="hidden mb-4">
        <p class="mb-1"><strong>Sending emails…</strong> <span id="progress-send-text">0 of 0</span></p>
        <div class="w-full bg-gray-200 rounded-full h-3 overflow-hidden">
            <div id="progress-send-bar" class="h-full bg-primary rounded-full transition-all duration-300" style="width: 0%;"></div>
        </div>
    </div>

    {{-- Step 1: Generate (always separate from Step 2: Send) --}}
    <div class="cert-backend-actions" style="margin-bottom: 1.5rem;">
        <p style="margin-bottom: 0.5rem;"><strong>Step 1 – Generate:</strong></p>
        <div style="margin-bottom: 1rem;">
            <button type="button" id="btn-generate" class="px-6 py-3 mr-2 font-semibold text-white rounded-full duration-300 cursor-pointer bg-primary hover:opacity-90">Generate certificates</button>
            <button type="button" id="btn-cancel" class="px-6 py-3 font-semibold text-white rounded-full duration-300 cursor-pointer bg-primary hover:opacity-90">Cancel generation</button>
        </div>
        <p style="margin-bottom: 0.5rem;"><strong>Step 2 – Send:</strong> (only after certificates are generated)</p>
        <div>
            <button type="button" id="btn-send" class="px-6 py-3 mr-2 font-semibold text-white rounded-full duration-300 cursor-pointer bg-primary hover:opacity-90">Send emails (batches of 100)</button>
            <button type="button" id="btn-resend-all-failed" class="px-6 py-3 font-semibold text-white rounded-full duration-300 cursor-pointer bg-primary hover:opacity-90">Resend all failed / unsent</button>
        </div>
    </div>

    {{-- Manual: one user – Generate and Send are separate --}}
    <details style="margin-bottom: 1.5rem;">
        <summary style="cursor: pointer;">Manual – one user (generate and send are separate)</summary>
        <div style="margin-top: 0.5rem;">
            <label>User email:</label>
            <input type="email" id="manual-email" placeholder="user@example.com" style="margin-left: 0.5rem; padding: 0.25rem;">
            <button type="button" id="btn-manual-generate" class="px-6 py-3 ml-2 font-semibold text-white rounded-full duration-300 cursor-pointer bg-primary hover:opacity-90">Generate certificate only</button>
            <button type="button" id="btn-manual-send" class="px-6 py-3 ml-2 font-semibold text-white rounded-full duration-300 cursor-pointer bg-primary hover:opacity-90">Send email only</button>
            <span id="manual-result" style="margin-left: 0.5rem;"></span>
        </div>
    </details>

    {{-- Search --}}
    <div style="margin-bottom: 1rem;">
        <label>Search by name or email:</label>
        <input type="text" id="search-input" placeholder="Search…" style="margin-left: 0.5rem; padding: 0.25rem; width: 280px;">
        <button type="button" id="btn-search" class="px-6 py-3 ml-2 font-semibold text-white rounded-full duration-300 cursor-pointer bg-primary hover:opacity-90">Search</button>
    </div>
</section>
    {{-- Table --}}
    <div class="codeweek-content-wrapper">
        <div id="table-loading" style="padding: 1rem;">Loading…</div>
        <table id="recipients-table" class="codeweek-table" style="display: none; width: 100%; border-collapse: collapse;">
            <thead>
                <tr>
                    <th style="text-align: left; padding: 0.5rem;">Name</th>
                    <th style="text-align: left; padding: 0.5rem;">Email</th>
                    <th style="text-align: left; padding: 0.5rem;">Cert generated</th>
                    <th style="text-align: left; padding: 0.5rem;">Sent</th>
                    <th style="text-align: left; padding: 0.5rem;">Certificate URL</th>
                    <th style="text-align: left; padding: 0.5rem;">Actions</th>
                </tr>
            </thead>
            <tbody id="recipients-tbody"></tbody>
        </table>
        <div id="pagination" style="margin-top: 1rem;"></div>
    </div>
</section>

<script>
(function() {
    const editionSelect = document.getElementById('edition-select');
    const typeSlug = '{{ $typeSlug }}';
    // Relative path so POST is same-origin (session + CSRF work reliably)
    const basePath = '/admin/certificate-backend';
    let currentPage = 1;
    let searchQuery = '';
    let statusInterval = null;

    function showError(msg) {
        const el = document.getElementById('last-error');
        if (!el) return;
        el.textContent = msg || '';
        el.classList.toggle('hidden', !msg);
    }

    function showSuccess(msg) {
        const el = document.getElementById('last-success');
        if (!el) return;
        el.textContent = msg || '';
        el.classList.toggle('hidden', !msg);
    }

    function clearError() {
        showError('');
    }

    function clearSuccess() {
        showSuccess('');
    }

    function apiUrl(path, params = {}) {
        const segment = path.replace(/^\//, '');
        const u = new URL(segment ? basePath + '/' + segment : basePath, window.location.origin);
        u.searchParams.set('edition', editionSelect.value);
        u.searchParams.set('type', typeSlug);
        Object.entries(params).forEach(([k, v]) => { if (v !== undefined && v !== '') u.searchParams.set(k, v); });
        return u.toString();
    }

    function csrf() {
        return document.querySelector('meta[name="csrf-token"]')?.getAttribute('content') || '';
    }

    function handleResponse(r) {
        const contentType = r.headers.get('content-type') || '';
        const isJson = contentType.indexOf('application/json') !== -1;
        if (!r.ok) {
            return (isJson ? r.json() : r.text()).then(function(data) {
                const msg = (data && data.message) ? data.message : (typeof data === 'string' ? data.substring(0, 200) : 'Request failed (' + r.status + ')');
                throw new Error(r.status === 419 ? 'Session expired. Please refresh the page and try again.' : (r.status === 403 ? 'Access denied.' : msg));
            });
        }
        return isJson ? r.json() : r.text().then(function() { return {}; });
    }

    function fetchJson(url, options = {}) {
        const opts = { method: 'GET', headers: { 'Accept': 'application/json', 'X-Requested-With': 'XMLHttpRequest' }, credentials: 'same-origin' };
        if (options.method === 'POST') {
            opts.method = 'POST';
            opts.headers['Content-Type'] = 'application/json';
            opts.headers['X-CSRF-TOKEN'] = csrf();
            opts.body = JSON.stringify(options.body || {});
        }
        return fetch(url, opts).then(handleResponse);
    }

    function postJson(url, body = {}) {
        const token = csrf();
        if (!token) {
            return Promise.reject(new Error('CSRF token missing. Refresh the page and try again.'));
        }
        return fetch(url, {
            method: 'POST',
            credentials: 'same-origin',
            headers: {
                'Accept': 'application/json',
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': token,
                'X-Requested-With': 'XMLHttpRequest'
            },
            body: JSON.stringify(body)
        }).then(handleResponse);
    }

    function updateProgress(data) {
        const total = Number(data.total) || 0;
        const generated = Number(data.generated) || 0;
        const sent = Number(data.sent) || 0;
        const genRunning = !!data.generation_running;
        const sendRunning = !!data.send_running;

        const progGen = document.getElementById('progress-generate');
        const progGenText = document.getElementById('progress-generate-text');
        const progGenBar = document.getElementById('progress-generate-bar');
        const progSend = document.getElementById('progress-send');
        const progSendText = document.getElementById('progress-send-text');
        const progSendBar = document.getElementById('progress-send-bar');

        if (progGen) {
            progGen.classList.toggle('hidden', !genRunning);
            if (genRunning) {
                progGenText.textContent = generated + ' of ' + total + ' generated';
                progGenBar.style.width = (total > 0 ? Math.round((generated / total) * 100) : 0) + '%';
            }
        }
        if (progSend) {
            progSend.classList.toggle('hidden', !sendRunning);
            if (sendRunning) {
                progSendText.textContent = sent + ' of ' + total + ' sent';
                progSendBar.style.width = (total > 0 ? Math.round((sent / total) * 100) : 0) + '%';
            }
        }

        if (genRunning || sendRunning) {
            if (!statusInterval) statusInterval = setInterval(loadStatus, 2000);
        } else {
            if (statusInterval) { clearInterval(statusInterval); statusInterval = null; }
        }
    }

    /** Start polling status every 2s for a while after starting an action (so progress bars appear once the worker picks up the job). */
    function startStatusPollingForAWhile() {
        if (statusInterval) return;
        statusInterval = setInterval(loadStatus, 2000);
        setTimeout(function() {
            if (statusInterval) {
                clearInterval(statusInterval);
                statusInterval = null;
            }
        }, 120000);
    }

    function loadStatus() {
        fetchJson(apiUrl('/status')).then(data => {
            document.getElementById('stat-total').textContent = data.total ?? '–';
            document.getElementById('stat-generated').textContent = data.generated ?? '–';
            document.getElementById('stat-sent').textContent = data.sent ?? '–';
            document.getElementById('stat-gen-failed').textContent = data.generation_failed ?? '–';
            document.getElementById('stat-send-failed').textContent = data.send_failed ?? '–';
            updateProgress(data);
        }).catch(function(err) {
            showError(err.message || 'Could not load status.');
        });
    }

    function loadList(page = 1) {
        document.getElementById('table-loading').style.display = 'block';
        document.getElementById('recipients-table').style.display = 'none';
        fetchJson(apiUrl('/list', { page, search: searchQuery, per_page: 50 })).then(data => {
            document.getElementById('table-loading').style.display = 'none';
            document.getElementById('recipients-table').style.display = 'table';
            const tbody = document.getElementById('recipients-tbody');
            tbody.innerHTML = '';
            (data.data || []).forEach(row => {
                const tr = document.createElement('tr');
                tr.innerHTML =
                    '<td style="padding: 0.5rem;">' + escapeHtml(row.name || '') + '</td>' +
                    '<td style="padding: 0.5rem;">' + escapeHtml(row.email || '') + '</td>' +
                    '<td style="padding: 0.5rem;">' + (row.certificate_generated ? 'Yes' : 'No') + (row.certificate_generation_error ? ' <span style="color:red" title="' + escapeAttr(row.certificate_generation_error) + '">(error)</span>' : '') + '</td>' +
                    '<td style="padding: 0.5rem;">' + (row.certificate_sent ? (row.notified_at || 'Yes') : 'No') + (row.certificate_sent_error ? ' <span style="color:red" title="' + escapeAttr(row.certificate_sent_error) + '">(error)</span>' : '') + '</td>' +
                    '<td style="padding: 0.5rem;">' + (row.certificate_url ? '<a href="' + escapeAttr(row.certificate_url) + '" target="_blank" rel="noopener">Open</a>' : '–') + '</td>' +
                    '<td style="padding: 0.5rem;">' +
                    '<button type="button" class="regenerate-one px-4 py-2 text-sm font-semibold text-white rounded-full duration-300 cursor-pointer bg-primary hover:opacity-90 mr-1" data-id="' + row.id + '">' + (row.certificate_generated ? 'Regenerate' : 'Generate') + '</button>' +
                    (row.certificate_url ? '<button type="button" class="resend-one px-4 py-2 text-sm font-semibold text-white rounded-full duration-300 cursor-pointer bg-primary hover:opacity-90" data-id="' + row.id + '">Resend</button>' : '') +
                    '</td>';
                tbody.appendChild(tr);
            });
            pagination(data.current_page, data.last_page, data.total);
        }).catch(function(err) {
            document.getElementById('table-loading').innerHTML = 'Error loading list. ' + (err.message || '');
        });
    }

    function escapeHtml(s) {
        const div = document.createElement('div');
        div.textContent = s;
        return div.innerHTML;
    }
    function escapeAttr(s) {
        return escapeHtml(s).replace(/"/g, '&quot;');
    }

    function pagination(current, last, total) {
        const el = document.getElementById('pagination');
        if (last <= 1) { el.innerHTML = ''; return; }
        let html = '';
        if (current > 1) html += '<button type="button" class="px-4 py-2 font-semibold text-white rounded-full duration-300 cursor-pointer bg-primary hover:opacity-90 page-btn" data-page="' + (current - 1) + '">Previous</button> ';
        html += ' Page ' + current + ' of ' + last + ' (' + total + ' total) ';
        if (current < last) html += '<button type="button" class="px-4 py-2 font-semibold text-white rounded-full duration-300 cursor-pointer bg-primary hover:opacity-90 page-btn" data-page="' + (current + 1) + '">Next</button>';
        el.innerHTML = html;
        el.querySelectorAll('.page-btn').forEach(btn => btn.addEventListener('click', function() { currentPage = parseInt(this.dataset.page, 10); loadList(currentPage); }));
    }

    editionSelect.addEventListener('change', function() {
        window.location.href = '{{ url("/admin/certificate-backend") }}?edition=' + this.value + '&type=' + typeSlug;
    });

    document.getElementById('btn-generate').addEventListener('click', function(e) {
        e.preventDefault();
        const btn = this;
        const origText = btn.textContent;
        clearError();
        clearSuccess();
        btn.disabled = true;
        btn.textContent = 'Starting…';
        postJson(apiUrl('/generate/start')).then(r => {
            if (r.ok) {
                showError('');
                showSuccess('Generation started. Progress will update above. If the numbers don\'t change within a minute, run the queue worker on the server: php artisan queue:work');
                loadStatus();
                startStatusPollingForAWhile();
            } else {
                showError(r.message || 'Error');
                showSuccess('');
            }
        }).catch(function(err) {
            showError(err.message || 'Request failed.');
            showSuccess('');
        }).finally(function() {
            btn.disabled = false;
            btn.textContent = origText;
        });
    });

    document.getElementById('btn-cancel').addEventListener('click', function(e) {
        e.preventDefault();
        clearError();
        clearSuccess();
        postJson(apiUrl('/generate/cancel')).then(r => {
            showError(r.ok ? '' : r.message);
            showSuccess(r.ok ? 'Cancellation requested.' : '');
            loadStatus();
        }).catch(function(err) { showError(err.message || 'Request failed.'); });
    });

    document.getElementById('btn-send').addEventListener('click', function(e) {
        e.preventDefault();
        const btn = this;
        const origText = btn.textContent;
        clearError();
        clearSuccess();
        btn.disabled = true;
        btn.textContent = 'Starting…';
        postJson(apiUrl('/send/start')).then(r => {
            if (r.ok) {
                showError('');
                showSuccess('Sending started. Progress will update above. If the numbers don\'t change, run the queue worker: php artisan queue:work');
                loadStatus();
                loadList(currentPage);
                startStatusPollingForAWhile();
            } else {
                showError(r.message || 'Error');
                showSuccess('');
            }
        }).catch(function(err) {
            showError(err.message || 'Request failed.');
            showSuccess('');
        }).finally(function() {
            btn.disabled = false;
            btn.textContent = origText;
        });
    });

    document.getElementById('btn-resend-all-failed').addEventListener('click', function(e) {
        e.preventDefault();
        const btn = this;
        const origText = btn.textContent;
        clearError();
        clearSuccess();
        btn.disabled = true;
        btn.textContent = 'Starting…';
        postJson(apiUrl('/resend-all-failed')).then(r => {
            if (r.ok) {
                showError('');
                showSuccess('Resend started. Progress will update above. Run the queue worker if needed: php artisan queue:work');
                loadStatus();
                loadList(currentPage);
                startStatusPollingForAWhile();
            } else {
                showError(r.message || 'Error');
                showSuccess('');
            }
        }).catch(function(err) {
            showError(err.message || 'Request failed.');
            showSuccess('');
        }).finally(function() {
            btn.disabled = false;
            btn.textContent = origText;
        });
    });

    document.getElementById('btn-manual-generate').addEventListener('click', function(e) {
        e.preventDefault();
        const email = document.getElementById('manual-email').value.trim();
        const resultEl = document.getElementById('manual-result');
        if (!email) { showError('Enter email.'); return; }
        clearError();
        resultEl.textContent = 'Generating…';
        postJson(apiUrl('/manual-create-send'), { user_email: email, generate_only: true }).then(r => {
            resultEl.textContent = r.ok ? ('Generated. ' + (r.certificate_url ? 'URL: ' + r.certificate_url : '')) : r.message;
            if (!r.ok) showError(r.message);
            if (r.ok) { loadStatus(); loadList(currentPage); }
        }).catch(function(err) { resultEl.textContent = ''; showError(err.message || 'Request failed.'); });
    });

    document.getElementById('btn-manual-send').addEventListener('click', function(e) {
        e.preventDefault();
        const email = document.getElementById('manual-email').value.trim();
        const resultEl = document.getElementById('manual-result');
        if (!email) { showError('Enter email.'); return; }
        clearError();
        resultEl.textContent = 'Sending…';
        postJson(apiUrl('/manual-create-send'), { user_email: email, send_only: true }).then(r => {
            resultEl.textContent = r.ok ? (r.message || 'Email sent.') : r.message;
            if (!r.ok) showError(r.message);
            if (r.ok) { loadStatus(); loadList(currentPage); }
        }).catch(function(err) { resultEl.textContent = ''; showError(err.message || 'Request failed.'); });
    });

    document.getElementById('btn-search').addEventListener('click', function(e) {
        e.preventDefault();
        searchQuery = document.getElementById('search-input').value.trim();
        currentPage = 1;
        loadList(1);
    });
    document.getElementById('search-input').addEventListener('keydown', function(e) { if (e.key === 'Enter') document.getElementById('btn-search').click(); });

    document.getElementById('recipients-tbody').addEventListener('click', function(e) {
        e.preventDefault();
        const regenerateBtn = e.target.closest('.regenerate-one');
        const resendBtn = e.target.closest('.resend-one');
        if (regenerateBtn) {
            const id = regenerateBtn.dataset.id;
            regenerateBtn.disabled = true;
            clearError();
            const url = basePath + '/regenerate/' + id + '?edition=' + encodeURIComponent(editionSelect.value) + '&type=' + encodeURIComponent(typeSlug);
            postJson(url, {}).then(r => {
                showError(r.ok ? '' : r.message);
                if (r.ok) { loadStatus(); loadList(currentPage); }
            }).catch(function(err) { showError(err.message || 'Request failed.'); }).finally(function() { regenerateBtn.disabled = false; });
            return;
        }
        if (resendBtn) {
            const id = resendBtn.dataset.id;
            resendBtn.disabled = true;
            clearError();
            const resendUrl = basePath + '/resend/' + id + '?edition=' + encodeURIComponent(editionSelect.value) + '&type=' + encodeURIComponent(typeSlug);
            postJson(resendUrl, {}).then(r => {
                showError(r.ok ? '' : r.message);
                if (r.ok) { loadStatus(); loadList(currentPage); }
            }).catch(function(err) { showError(err.message || 'Request failed.'); }).finally(function() { resendBtn.disabled = false; });
        }
    });

    loadStatus();
    loadList(1);
    setInterval(loadStatus, 10000);
})();
</script>
@endsection
