<section class="flex flex-wrap items-center justify-center gap-2 mt-12" aria-label="Numbered steps">
    <button 
        class="flex flex-col justify-center items-center self-stretch my-auto w-8 h-8 bg-primary hover:bg-blue-primary rounded min-h-[32px]" 
        aria-label="Previous step"
        @if (!$paginator->onFirstPage())
            wire:click="previousPage('{{ $paginator->getPageName() }}')"
            dusk="previousPage{{ $paginator->getPageName() == 'page' ? '' : '.' . $paginator->getPageName() }}.after"
        @endif
        {{ $paginator->onFirstPage() ? 'disabled' : '' }}>
        <svg xmlns="http://www.w3.org/2000/svg" width="10" height="16" viewBox="0 0 10 16" fill="none">
            <path d="M8 14L2 8L8 2" stroke="white" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"/>
        </svg>
    </button>

    {{-- Page Buttons --}}
    <nav class="flex gap-2.5 items-center self-stretch my-auto text-base font-bold text-center text-black whitespace-nowrap" aria-label="Step navigation">
        @foreach ($elements as $element)
            @if (is_string($element))
                <span class="text-gray-500">{{ $element }}</span>
            @endif

            @if (is_array($element))
                @foreach ($element as $page => $url)
                    <button 
                        class="self-stretch my-auto w-8 rounded min-h-[32px] {{ $page == $paginator->currentPage() ? 'h-8 text-primary border-2 border-solid border-[#f95c22] flex-col justify-center items-center gap-2.5 inline-flex hover:bg-blue-primary hover:border-blue-primary hover:text-white' : 'border border-neutral-200 border-solid hover:bg-blue-primary hover:border-blue-primary hover:text-white' }}" 
                        aria-current="{{ $page == $paginator->currentPage() ? 'step' : '' }}" 
                        aria-label="Step {{ $page }}"
                        wire:click="gotoPage({{ $page }}, '{{ $paginator->getPageName() }}')">
                        {{ $page }}
                    </button>
                @endforeach
            @endif
        @endforeach
    </nav>

    {{-- Next Button --}}
    <button 
        class="flex flex-col justify-center items-center self-stretch hover:bg-blue-primary my-auto w-8 h-8 bg-primary rounded min-h-[32px]" 
        aria-label="Next step"
        @if ($paginator->hasMorePages())
            wire:click="nextPage('{{ $paginator->getPageName() }}')"
            dusk="nextPage{{ $paginator->getPageName() == 'page' ? '' : '.' . $paginator->getPageName() }}.after"
        @endif
        {{ !$paginator->hasMorePages() ? 'disabled' : '' }}>
        <svg xmlns="http://www.w3.org/2000/svg" width="10" height="16" viewBox="0 0 10 16" fill="none">
        <path d="M2 14L8 8L2 2" stroke="white" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"/>
        </svg>
    </button>
</section>
