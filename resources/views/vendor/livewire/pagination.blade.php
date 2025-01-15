<section class="flex flex-wrap items-center justify-center gap-2 font-['Blinker']" aria-label="Numbered steps">
    <button
        class="p-4 rounded-full bg-yellow hover:bg-primary duration-300 cursor-pointer"
        aria-label="Previous step"
        @if (!$paginator->onFirstPage())
            wire:click="previousPage('{{ $paginator->getPageName() }}')"
            dusk="previousPage{{ $paginator->getPageName() == 'page' ? '' : '.' . $paginator->getPageName() }}.after"
        @endif
        {{ $paginator->onFirstPage() ? 'disabled' : '' }}>
        <svg width="33" height="32" viewBox="0 0 33 32" fill="none" xmlns="http://www.w3.org/2000/svg">
          <path d="M25.8335 16H7.16683" stroke="black" stroke-width="2.66667" stroke-linecap="round" stroke-linejoin="round"/>
          <path d="M16.5 6.66663L7.16667 16L16.5 25.3333" stroke="black" stroke-width="2.66667" stroke-linecap="round" stroke-linejoin="round"/>
        </svg>
    </button>

    {{-- Page Buttons --}}
    <nav class="flex gap-1 items-center whitespace-nowrap" aria-label="Step navigation">
        @foreach ($elements as $element)
            @if (is_string($element))
                <span class="text-black mx-1">{{ $element }}</span>
            @endif

            @if (is_array($element))
                @foreach ($element as $page => $url)
                    <button 
                        class="w-8 h-8 text-xl hover:bg-[#1C4DA1]/10 rounded {{ $page == $paginator->currentPage() ? 'font-normal text-[#333E48]' : 'font-bold text-[#1C4DA1] underline' }} {{ $loop->index >= 3 ? 'max-md:hidden' : '' }}"
                        aria-current="{{ $page == $paginator->currentPage() ? 'step' : '' }}" 
                        aria-label="Step {{ $page }}"
                        wire:click="gotoPage({{ $page }}, '{{ $paginator->getPageName() }}')">
                        {{ $page }}
                    </button>
                @endforeach
            @endif
        @endforeach
    </nav>
    <script>
      // Pass the PHP variable to JavaScript
      const elements = @json($elements);
  
      // Log it to the console
      console.log(elements);
  </script>

    {{-- Next Button --}}
    <button
        class="p-4 rounded-full bg-yellow hover:bg-primary duration-300 cursor-pointer"
        aria-label="Next step"
        @if ($paginator->hasMorePages())
            wire:click="nextPage('{{ $paginator->getPageName() }}')"
            dusk="nextPage{{ $paginator->getPageName() == 'page' ? '' : '.' . $paginator->getPageName() }}.after"
        @endif
        {{ !$paginator->hasMorePages() ? 'disabled' : '' }}>
        <svg width="33" height="32" viewBox="0 0 33 32" fill="none" xmlns="http://www.w3.org/2000/svg">
          <path d="M7.16699 16H25.8337" stroke="black" stroke-width="2.66667" stroke-linecap="round" stroke-linejoin="round"/>
          <path d="M16.5 6.66663L25.8333 16L16.5 25.3333" stroke="black" stroke-width="2.66667" stroke-linecap="round" stroke-linejoin="round"/>
        </svg>
    </button>
</section>
