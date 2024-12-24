@extends('layout.base')

@section('content')
    <section id="codeweek-search-page" class="codeweek-page md:pb-16 font-['Blinker']">
        <!-- Banner Section -->
        <section 
            class="relative flex items-end md:item-center min-h-[560px] w-full py-5 md:py-[84px]" 
            style="background: linear-gradient(36.92deg, #33C2E9 20.32%, #00B3E3 28.24%);"
        >
            <div class="codeweek-container-lg">
              <div class="relative flex flex-col justify-center w-full max-w-[640px] max-md:mx-auto z-50 bg-white px-6 md:px-14 py-10 md:py-[72px] rounded-[32px]">
                <h2 class="text-[#1C4DA1] text-[30px] md:text-[60px] leading-9 md:leading-[72px] font-normal font-['Montserrat']">
                  @lang('search.search_banner_title')
                </h2>
                <p class="text-xl md:text-2xl leading-8 text-[#333E48]">
                    @lang('search.search_banner_content')
                </p>
              </div>
            </div>
            <img
              class="absolute top-0 right-0 w-full md:hidden"
              src="images/search/search_bg_sm.png"
              style="clip-path: ellipse(71% 73% at 40% 20%);"
            >
            <img
              class="absolute top-0 right-0 h-full hidden md:block"
              src="images/search/search_bg_lg.png"
              style="clip-path: ellipse(70% 140% at 70% 25%);"
            >
        </section>

        <!-- Filter Section -->
        <section class="py-10 border-b border-[#D6D8DA]">
            <div class="codeweek-container-lg mx-auto">
                <h2 class="pb-6 md:pb-8 text-2xl md:text-4xl text-[#1C4DA1] font-normal font-['Montserrat']">
                  @lang('search.search_results_title')
                </h2>

                <div class="mb-6 md:mb-10">
                  <p class="p-0 mb-3 font-bold text-lg md:text-xl text-[#333E48]">
                    @lang('search.search_input_label')
                  </p>

                  <div class="flex">
                    <div class="relative w-full max-w-lg">
                      <input class="pl-6 pr-14 py-3 w-full rounded-full border-solid border-2 border-[#A4B8D9] text-[#333E48]" placeholder="@lang('search.search_input_placeholder')" />
                      <svg class="absolute right-6 top-1/2 -translate-y-1/2" width="21" height="22" viewBox="0 0 21 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M16.717 15.46L21 19.742L19.585 21.157L15.303 16.874C13.7098 18.1512 11.728 18.8459 9.68604 18.843C4.71804 18.843 0.686035 14.811 0.686035 9.84302C0.686035 4.87502 4.71804 0.843018 9.68604 0.843018C14.654 0.843018 18.686 4.87502 18.686 9.84302C18.6889 11.885 17.9943 13.8668 16.717 15.46ZM14.711 14.718C15.9801 13.4129 16.6889 11.6634 16.686 9.84302C16.686 5.97502 13.553 2.84302 9.68604 2.84302C5.81804 2.84302 2.68604 5.97502 2.68604 9.84302C2.68604 13.71 5.81804 16.843 9.68604 16.843C11.5065 16.8459 13.2559 16.1371 14.561 14.868L14.711 14.718Z" fill="#1C4DA1"/>
                      </svg>
                    </div>
                  </div>
                </div>

                @livewire('global-search-filter-component')
            </div>
        </section>

        <!-- Search Result Content Section -->
        <section class="flex justify-center pt-8 max-lg:pt-[50px]">
            <div class="codeweek-container">
                @livewire('search-content-component')
            </div>
        </section>

    </section>

@endsection