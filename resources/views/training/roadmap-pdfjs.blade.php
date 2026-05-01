<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="noindex, nofollow">
    <title>{{ __('Roadmap') }}</title>
    <style>
        html, body { margin: 0; padding: 0; background: #f1f5f9; min-height: 100%; }
        #pdf-scroll { max-width: 100%; padding: 8px; box-sizing: border-box; overflow-x: hidden; overflow-y: auto; }
        #pdf-error { color: #b91c1c; padding: 1rem; font-family: system-ui, sans-serif; font-size: 0.9rem; }
        canvas { display: block; max-width: 100%; height: auto !important; margin: 0 auto 1rem; border-radius: 6px; box-shadow: 0 1px 3px rgb(0 0 0 / 0.12); background: #fff; }
    </style>
</head>
<body>
    <div id="pdf-error" role="alert"></div>
    <div id="pdf-scroll"></div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdf.js/3.11.174/pdf.min.js" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        (async function () {
            var pdfUrl = @json(url(route('training.embedded_pdf.roadmap')));
            var pdfjsLib = window.pdfjsLib || window['pdfjs-dist/build/pdf'];
            var container = document.getElementById('pdf-scroll');
            var err = document.getElementById('pdf-error');

            if (!pdfjsLib || typeof pdfjsLib.getDocument !== 'function') {
                err.textContent = 'PDF viewer failed to load.';
                return;
            }

            pdfjsLib.GlobalWorkerOptions.workerSrc = 'https://cdnjs.cloudflare.com/ajax/libs/pdf.js/3.11.174/pdf.worker.min.js';

            try {
                var pdf = await pdfjsLib.getDocument({ url: pdfUrl }).promise;

                async function renderAll() {
                    container.innerHTML = '';
                    var cw = Math.max(200, container.clientWidth || window.innerWidth);
                    for (var p = 1; p <= pdf.numPages; p++) {
                        var page = await pdf.getPage(p);
                        var base = page.getViewport({ scale: 1 });
                        var scale = Math.min(2.2, Math.max(0.4, (cw - 16) / base.width));
                        var viewport = page.getViewport({ scale: scale });
                        var canvas = document.createElement('canvas');
                        var ctx = canvas.getContext('2d', { alpha: false });
                        canvas.width = viewport.width;
                        canvas.height = viewport.height;
                        await page.render({ canvasContext: ctx, viewport: viewport }).promise;
                        container.appendChild(canvas);
                    }
                }

                await renderAll();
                var t;
                window.addEventListener('resize', function () {
                    clearTimeout(t);
                    t = setTimeout(function () { renderAll(); }, 200);
                });
            } catch (e) {
                err.textContent = (e && e.message) ? e.message : 'Could not open PDF.';
            }
        })();
    </script>
</body>
</html>
