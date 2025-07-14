<section class="flex flex-wrap items-center justify-center gap-2 py-12 font-['Blinker']" aria-label="Numbered steps">
    <a
        class="p-4 duration-300 rounded-full cursor-pointer bg-yellow hover:bg-primary {{ $paginator->onFirstPage() ? 'opacity-50 pointer-events-none' : '' }}"
        aria-label="Previous step"
        @if ($paginator->onFirstPage())
            disabled
        @else
            href="{{ $paginator->previousPageUrl() }}"
            onclick="window.scroll(0, 0)"
        @endif
    >
        <svg width="33" height="32" viewBox="0 0 33 32" fill="none" xmlns="http://www.w3.org/2000/svg">
          <path d="M25.8335 16H7.16683" stroke="black" stroke-width="2.66667" stroke-linecap="round" stroke-linejoin="round"/>
          <path d="M16.5 6.66663L7.16667 16L16.5 25.3333" stroke="black" stroke-width="2.66667" stroke-linecap="round" stroke-linejoin="round"/>
        </svg>
    </a>
    
    <nav class="flex items-center gap-1 whitespace-nowrap" aria-label="Step navigation">
        @foreach ($elements as $element)
            @if (is_string($element))
                <span class="mx-1 text-black">{{ $element }}</span>
            @endif

            @if (is_array($element))
                @foreach ($element as $page => $url)
                <a
                    class="w-12 h-12 flex items-center justify-center text-xl hover:bg-[#1C4DA1]/10 rounded {{ $page == $paginator->currentPage() ? 'font-normal text-[#333E48]' : 'font-bold text-[#1C4DA1] underline' }} {{ $loop->index >= 3 ? 'max-md:hidden' : '' }}"
                    aria-current="{{ $page == $paginator->currentPage() ? 'step' : '' }}"
                    aria-label="Step {{ $page }}"
                    href="{{ $url }}"
                    onclick="window.scroll(0, 0)"
                >
                    {{ $page }}
                </a>
                @endforeach
            @endif
        @endforeach
    </nav>

    <a
        class="p-4 duration-300 rounded-full cursor-pointer bg-yellow hover:bg-primary {{ !$paginator->hasMorePages() ? 'opacity-50 pointer-events-none' : '' }}"
        aria-label="Next step"
        @if (!$paginator->hasMorePages())
            disabled
        @else
            href="{{ $paginator->nextPageUrl() }}"
            onclick="window.scroll(0, 0)"
        @endif
    >
        <svg width="33" height="32" viewBox="0 0 33 32" fill="none" xmlns="http://www.w3.org/2000/svg">
          <path d="M7.16699 16H25.8337" stroke="black" stroke-width="2.66667" stroke-linecap="round" stroke-linejoin="round"/>
          <path d="M16.5 6.66663L25.8333 16L16.5 25.3333" stroke="black" stroke-width="2.66667" stroke-linecap="round" stroke-linejoin="round"/>
        </svg>
    </a>
</section>
