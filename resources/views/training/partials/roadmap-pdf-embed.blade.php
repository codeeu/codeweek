@props([
    'url',
])
@php
    // Strip any fragment from stored URL for the "open in new tab" link.
    $tabUrl = \Illuminate\Support\Str::before($url, '#');
    // Same-origin PDF.js viewer for the allowlisted DDP roadmap (see TrainingRoadmapPdfController).
    // Other URLs keep the direct PDF iframe with viewer chrome hints.
    $ddpRoadmapBase = 'https://codeweek-resources.s3.eu-west-1.amazonaws.com/+discover-digital-toolkit/DDP_toolkit_roadmap.pdf';
    $usePdfjsViewer = strtolower(rtrim($tabUrl, '/')) === strtolower(rtrim($ddpRoadmapBase, '/'));
    $fragment = '#toolbar=0&navpanes=0&scrollbar=1&view=FitH';
    $embedSrc = $usePdfjsViewer ? route('training.roadmap_pdf_viewer') : $tabUrl.$fragment;
@endphp
<div class="w-full max-w-full my-6 rounded-xl overflow-hidden border border-slate-200 bg-slate-100 shadow-sm">
    <iframe
        title="{{ __('Roadmap (PDF)') }}"
        src="{{ $embedSrc }}"
        class="w-full border-0 block max-w-full"
        style="width: 100%; height: min(85dvh, 920px); min-height: min(60dvh, 520px);"
        loading="lazy"
        referrerpolicy="no-referrer-when-downgrade"
    ></iframe>
</div>
<p class="text-sm mt-2 mb-0 text-[#333E48]">
    <a href="{{ $tabUrl }}" target="_blank" rel="noopener noreferrer" class="text-dark-blue underline font-medium">
        {{ __('Open roadmap PDF in a new tab') }}
    </a>
    — {{ __('if the preview does not load in your browser.') }}
</p>
