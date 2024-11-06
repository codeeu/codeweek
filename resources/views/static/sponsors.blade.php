@extends('layout.base')

@section('content')
    <section id="codeweek-sponsors-page" class="codeweek-page">
<style>
    button {
           border: 2px solid;
    }
</style>
        <!-- Banner Section -->
        <section 
            class="relative flex justify-center mx-auto overflow-hidden codeweek-banner about min-h-[366px]" 
            style="background-image: url('/images/partners/partnerbg.png'); background-size: cover; background-position: center;">
            <div class="py-12 max-w-[1080px] max-xl:px-8 flex-col w-full h-full flex justify-center mx-auto z-50">
                <h2 class="max-w-[600px] text-white text-[60px] font-bold font-['PT Sans'] leading-[48px] partner_title">@lang('about.partners_and_sponsors')</h2>
                <p class="max-w-[600px] text-base font-bold leading-6 text-white max-md:max-w-full partner_text">
                    Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua.
                </p>
            </div>
            <img src="/images/partners/partnerlg.png" class="relative right-0 w-auto mr-0 max-lg:hidden lg:absolute object-fit">
            <img src="/images/partners/partnersm.png" class="relative right-0 w-auto mr-0 lg:hidden lg:absolute object-fit">
        </section>

        <!-- Filter Section -->
        <section class="flex flex-col justify-center px-24 pt-16 font-bold text-center max-md:px-5">
            <div class="flex flex-col items-center w-full max-md:max-w-full">
                <h2 class="text-4xl leading-tight text-orange-500">H2 Lorem ipsum dolor</h2>
                @livewire('partner-filter-component')
            </div>
        </section>

        <!-- Partner Content Section -->
        <section class="px-6 pt-8 max-lg:pb-12 xl:pt-16 xl:px-24">
            @livewire('partner-content-component')
        </section>

    </section>

@endsection
