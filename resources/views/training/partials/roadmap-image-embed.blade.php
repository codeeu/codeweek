@props([
    'imageUrl',
    'linkUrl',
    'altText' => null,
])
@php
    $alt = $altText !== null && trim((string) $altText) !== '' ? trim((string) $altText) : __('Roadmap overview');
    $external = \Illuminate\Support\Str::startsWith($linkUrl, ['http://', 'https://', '//']);
@endphp
<div class="w-full max-w-full my-6 rounded-xl overflow-hidden border border-slate-200 bg-slate-100 shadow-sm">
    <a
        href="{{ $linkUrl }}"
        @if($external)
            target="_blank"
            rel="noopener noreferrer"
        @endif
        class="block focus:outline-none focus-visible:ring-2 focus-visible:ring-dark-blue focus-visible:ring-offset-2 rounded-xl"
    >
        <img
            src="{{ $imageUrl }}"
            alt="{{ $alt }}"
            class="block w-full h-auto max-w-full"
            loading="lazy"
            decoding="async"
        >
    </a>
</div>
<p class="text-sm mt-2 mb-0 text-[#333E48]">
    <a
        href="{{ $linkUrl }}"
        @if($external)
            target="_blank"
            rel="noopener noreferrer"
        @endif
        class="text-dark-blue underline font-medium"
    >
        {{ __('Open linked resource') }}
    </a>
    — {{ __('same destination as clicking the image above.') }}
</p>
