@extends('layout.new_base')

@section('content')
    <section id="codeweek-search-page" class="codeweek-page font-['Blinker']">
        <!-- Banner Section -->
        <section 
            class="relative flex items-end md:item-center min-h-[560px] w-full py-5 md:py-[84px]" 
            style="background: linear-gradient(36.92deg, #33C2E9 20.32%, #00B3E3 28.24%);"
        >
            <div class="codeweek-container-lg">
              <div class="relative flex flex-col justify-center w-full md:max-w-[400px] xl:max-w-[640px] max-md:mx-auto z-50 bg-white px-6 md:px-14 py-10 md:py-[72px] rounded-[32px]">
                <h2 class="text-[#1C4DA1] text-[30px] md:text-[48px] xl:text-[60px] leading-9 md:leading-[58px] xl:leading-[72px] font-normal font-['Montserrat']">
                  @lang('search.search_banner_title')
                </h2>
                <p class="text-xl md:text-2xl leading-8 text-[#333E48] !pb-0">
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
              class="absolute top-0 right-0 h-full max-w-[calc(70vw)] object-cover hidden md:block"
              src="images/search/search_bg_lg.png"
              style="clip-path: ellipse(70% 140% at 70% 25%);"
            >
        </section>

        <!-- Filter Section -->
        <section class="py-10 border-b border-[#D6D8DA]">  
          @livewire('global-search-filter-component')
        </section>

        <!-- Search Result Content Section -->
        <section class="flex justify-center pt-8 md:pb-16 max-lg:pt-[50px]">
            <div class="codeweek-container">
                @livewire('search-content-component')
            </div>
        </section>

        @livewire('still-have-question-section')
    </section>

@endsection