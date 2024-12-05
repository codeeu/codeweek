@extends('layout.base')

@section('content')
    <section id="codeweek-search-page" class="codeweek-page">
<style>
    button {
           border: 2px solid;
    }
</style>
        <!-- Banner Section -->
        <section 
            class="relative flex justify-center mx-auto overflow-hidden codeweek-banner search min-h-[366px]" 
            style="background-image: url('images/search/searchbg.png'); background-size: cover; background-position: center;">
            <div class="py-12 max-w-[1080px] max-xl:px-8 flex-col w-full h-full flex justify-center mx-auto z-50">
                <h2 class="max-w-[600px] text-white text-[60px] font-bold font-['PT Sans'] leading-[48px] partner_title">@lang('search.search_banner_title')</h2>
                <p class="max-w-[600px] text-base font-bold leading-6 text-white max-md:max-w-full partner_text">
                    @lang('search.search_banner_content')
                </p>
            </div>
            <img src="images/search/searchlg.png" class="relative right-0 w-auto mr-0 max-lg:hidden lg:absolute object-fit">
            <img src="images/search/searchsm.png" class="relative right-0 w-auto mr-0 lg:hidden lg:absolute object-fit">
        </section>

        <!-- Filter Section -->
        <section class="flex flex-col justify-center px-24 pt-16 font-bold text-center max-md:px-5">
            <div class="flex flex-col items-center w-full max-md:max-w-full">
                <h2 class="text-4xl leading-tight text-orange-500">@lang('search.search_results_title')</h2>
                <p class="hidden w-2/3 pt-4 text-base font-light leading-6 text-black"></p>
                @livewire('partner-filter-component')
            </div>
        </section>

        <!-- Partner Content Section -->
        <section class="px-6 pt-8 max-lg:pb-12">
            @livewire('search-content-component')
        </section>

    </section>

@endsection