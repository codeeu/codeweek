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

    {{-- Stats --}}
    <div id="stats" class="cert-backend-stats" style="display: grid; grid-template-columns: repeat(auto-fill, minmax(140px, 1fr)); gap: 1rem; margin-bottom: 1.5rem;">
        <div>Total: <strong id="stat-total">–</strong></div>
        <div>Generated: <strong id="stat-generated">–</strong></div>
        <div>Sent: <strong id="stat-sent">–</strong></div>
        <div>Generation failed: <strong id="stat-gen-failed">–</strong></div>
        <div>Send failed: <strong id="stat-send-failed">–</strong></div>
        <div id="stat-running" style="display: none;">Generation in progress…</div>
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
    const basePath = '{{ url("/admin/certificate-backend") }}'.replace(/\/$/, '');
    let currentPage = 1;
    let searchQuery = '';

    function apiUrl(path, params = {}) {
        const u = new URL(basePath + path.replace(/^\//, ''), window.location.origin);
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
        return fetch(url, {
            method: 'POST',
            credentials: 'same-origin',
            headers: {
                'Accept': 'application/json',
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': csrf(),
                'X-Requested-With': 'XMLHttpRequest'
            },
            body: JSON.stringify(body)
        }).then(handleResponse);
    }

    function loadStatus() {
        fetchJson(apiUrl('/status')).then(data => {
            document.getElementById('stat-total').textContent = data.total ?? '–';
            document.getElementById('stat-generated').textContent = data.generated ?? '–';
            document.getElementById('stat-sent').textContent = data.sent ?? '–';
            document.getElementById('stat-gen-failed').textContent = data.generation_failed ?? '–';
            document.getElementById('stat-send-failed').textContent = data.send_failed ?? '–';
            const runEl = document.getElementById('stat-running');
            if (data.generation_running) runEl.style.display = 'block'; else runEl.style.display = 'none';
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
                    '<td style="padding: 0.5rem;">' + (row.certificate_url ? '<button type="button" class="px-4 py-2 text-sm font-semibold text-white rounded-full duration-300 cursor-pointer resend-one bg-primary hover:opacity-90" data-id="' + row.id + '">Resend</button>' : '–') + '</td>';
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

    document.getElementById('btn-generate').addEventListener('click', function() {
        const btn = this;
        btn.disabled = true;
        postJson(apiUrl('/generate/start')).then(r => {
            alert(r.message || (r.ok ? 'Started.' : 'Error'));
            loadStatus();
        }).catch(function(err) {
            alert(err.message || 'Request failed.');
        }).finally(function() { btn.disabled = false; });
    });

    document.getElementById('btn-cancel').addEventListener('click', function() {
        postJson(apiUrl('/generate/cancel')).then(r => { alert(r.message); loadStatus(); }).catch(function(err) { alert(err.message || 'Request failed.'); });
    });

    document.getElementById('btn-send').addEventListener('click', function() {
        postJson(apiUrl('/send/start')).then(r => { alert(r.message); loadStatus(); loadList(currentPage); }).catch(function(err) { alert(err.message || 'Request failed.'); });
    });

    document.getElementById('btn-resend-all-failed').addEventListener('click', function() {
        postJson(apiUrl('/resend-all-failed')).then(r => { alert(r.message); loadStatus(); loadList(currentPage); }).catch(function(err) { alert(err.message || 'Request failed.'); });
    });

    document.getElementById('btn-manual-generate').addEventListener('click', function() {
        const email = document.getElementById('manual-email').value.trim();
        const resultEl = document.getElementById('manual-result');
        if (!email) { resultEl.textContent = 'Enter email.'; return; }
        resultEl.textContent = 'Generating…';
        postJson(apiUrl('/manual-create-send'), { user_email: email, generate_only: true }).then(r => {
            resultEl.textContent = r.ok ? ('Generated. ' + (r.certificate_url ? 'URL: ' + r.certificate_url : '')) : r.message;
            if (r.ok) { loadStatus(); loadList(currentPage); }
        }).catch(function(err) { resultEl.textContent = err.message || 'Request failed.'; });
    });

    document.getElementById('btn-manual-send').addEventListener('click', function() {
        const email = document.getElementById('manual-email').value.trim();
        const resultEl = document.getElementById('manual-result');
        if (!email) { resultEl.textContent = 'Enter email.'; return; }
        resultEl.textContent = 'Sending…';
        postJson(apiUrl('/manual-create-send'), { user_email: email, send_only: true }).then(r => {
            resultEl.textContent = r.ok ? (r.message || 'Email sent.') : r.message;
            if (r.ok) { loadStatus(); loadList(currentPage); }
        }).catch(function(err) { resultEl.textContent = err.message || 'Request failed.'; });
    });

    document.getElementById('btn-search').addEventListener('click', function() {
        searchQuery = document.getElementById('search-input').value.trim();
        currentPage = 1;
        loadList(1);
    });
    document.getElementById('search-input').addEventListener('keydown', function(e) { if (e.key === 'Enter') document.getElementById('btn-search').click(); });

    document.getElementById('recipients-tbody').addEventListener('click', function(e) {
        const btn = e.target.closest('.resend-one');
        if (!btn) return;
        const id = btn.dataset.id;
        btn.disabled = true;
        const resendUrl = '{{ url("/admin/certificate-backend/resend") }}'.replace(/\/$/, '') + '/' + id;
        postJson(resendUrl, {}).then(r => {
            alert(r.message);
            loadStatus();
            loadList(currentPage);
        }).catch(function(err) { alert(err.message || 'Request failed.'); }).finally(function() { btn.disabled = false; });
    });

    loadStatus();
    loadList(1);
    setInterval(loadStatus, 10000);
})();
</script>
@endsection
