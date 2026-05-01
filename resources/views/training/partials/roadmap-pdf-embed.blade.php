@props([
    'url',
])
<div class="w-full max-w-full my-6 rounded-xl overflow-hidden border border-slate-200 bg-slate-100 shadow-sm">
    <iframe
        title="{{ __('Roadmap (PDF)') }}"
        src="{{ $url }}"
        class="w-full border-0 block"
        style="height: min(75vh, 880px); min-height: 480px;"
        loading="lazy"
    ></iframe>
</div>
<p class="text-sm mt-2 mb-0 text-[#333E48]">
    <a href="{{ $url }}" target="_blank" rel="noopener noreferrer" class="text-dark-blue underline font-medium">
        {{ __('Open roadmap PDF in a new tab') }}
    </a>
    — {{ __('if the preview does not load in your browser.') }}
</p>
