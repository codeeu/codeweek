@extends('layout.new_base')

@php
    $list = [
        (object) ['label' => 'Code Week 4 All Connect & Grow the Coding', 'href' => '/codeweek4all'],
        (object) ['label' => 'Code Week 4 All', 'href' => ''],
    ];
@endphp

@section('layout.breadcrumb')
    @include('layout.breadcrumb', ['list' => $list])
@endsection

@section('title', 'Code Week 4 All – Connect & Grow the Coding Community')
@section('description', 'Join the Code Week 4 All challenge to link coding events, collaborate across countries, and promote digital skills worldwide.')
<style>
[x-cloak] { display: none !important; }

#codeweek-training-page a {
    color: #1C4DA1!important;
    text-decoration: underline!important;
}


#codeweek-training-page a:hover {
    text-decoration: none!important;
}
</style>
@section('content')
    <section id="codeweek-training-page" class="font-['Blinker'] overflow-hidden">
        <section class="relative flex overflow-hidden">
            <div class="relative flex w-full pt-32 pb-0 transition-all bg-light-blue-gradient md:py-32">
                <div class="flex flex-col justify-end flex-shrink-0 w-full pb-10 overflow-hidden md:p-0 md:flex-row md:items-center">
                    <div class="flex flex-col duration-1000 codeweek-container-lg md:flex-row md:items-center gap-28 md:gap-4 xl:gap-28">
                        <div class="order-1 flex-1 px-6 py-10 md:px-14 md:py-[4.5rem] bg-white rounded-[32px] z-10 relative">
                            <h2 class="text-[#1C4DA1] text-[30px] md:text-[60px] leading-9 md:leading-[72px] font-normal font-['Montserrat'] mb-4 max-md:max-w-full max-w-[532px]">
                              @lang('codeweek4all.title')
                            </h2>
                            <p class="text-xl font-normal md:text-2xl leading-8 text-[#333E48] p-0 max-md:max-w-full max-w-[525px]">
                              
                            </p>
                        </div>
                        <div class="z-10 flex items-center justify-center flex-1 order-0 md:order-2"></div>
                        <img
                            class="absolute top-0 -left-1/4 w-[150vw] !max-w-none md:hidden"
                            loading="lazy"
                            src="/images/codeweek4all/hero.png"
                            style="clip-path: ellipse(71% 73% at 40% 20%);"
                        />
                        <img
                            class="absolute top-0 right-0 h-full max-w-[calc(70vw)] object-cover hidden md:block"
                            loading="lazy"
                            src="/images/codeweek4all/hero.png"
                            style="clip-path: ellipse(70% 140% at 70% 25%);"
                        />
                    </div>
                </div>
            </div>
        </section>

        <section class="relative z-10">
            <div class="relative z-10 flex justify-center py-10 md:py-20 codeweek-container-lg">
                <div class="w-full max-w-[880px] gap-2">
                    <h2 class="text-dark-blue text-[22px] md:text-4xl leading-7 md:leading-[44px] font-medium font-['Montserrat'] mb-6">
                       @lang('codeweek4all.what.title')
                    </h2>
                    <p class="text-[#20262C] font-normal text-lg md:text-2xl p-0 mb-6">
                         @lang('codeweek4all.text')
                    </p>
                    <p class="text-[#333E48] font-normal text-[16px] md:text-xl leading-[22px] md:leading-[30px] p-0">
                       @lang('codeweek4all.what.content')
                        <ul style="margin-top:2px;">
                            <li><strong>@lang('codeweek4all.what.criteria2')</strong></li>@lang('base.or')
                            <li><strong>@lang('codeweek4all.what.criteria3')</strong></li>
                        </ul>
                    </p>
                </div>
            </div>
            <div
                class="animation-element move-background duration-[1.5s] absolute z-0 bottom-10 md:bottom-auto md:top-1/3 -right-14 md:-right-40 w-28 md:w-72 h-28 md:h-72 bg-[#A4B8D9] rounded-full hidden lg:block"
                style="transform: translate(-16px, -24px)"
            ></div>
            <div
                class="animation-element move-background duration-[1.5s] absolute z-0 lg:-bottom-20 xl:-bottom-36 right-40 w-28 h-28 hidden lg:block bg-[#A4B8D9] rounded-full"
                style="transform: translate(-16px, -24px)"
            ></div>
        </section>

        <section x-data="{ tab: 1 }"  class="relative overflow-hidden">
            <div x-ignore class="absolute w-full h-full bg-[#F4F6FA] md:hidden" style="clip-path: ellipse(270% 90% at 38% 90%);"></div>
            <div x-ignore class="absolute hidden w-full h-full bg-[#F4F6FA] md:block lg:hidden" style="clip-path: ellipse(188% 90% at 50% 90%);"></div>
            <div x-ignore class="absolute hidden w-full h-full bg-[#F4F6FA] lg:block xl:hidden" style="clip-path: ellipse(128% 90% at 50% 90%);"></div>
            <div x-ignore class="absolute hidden w-full h-full bg-[#F4F6FA] xl:block" style="clip-path: ellipse(93% 90% at 50% 90%);"></div>
            <div class="relative flex justify-center pt-20 pb-16 codeweek-container-lg md:pt-40 md:pb-28">
                <div class="w-full gap-2">
                    <h3 class="text-dark-blue tablet:text-center text-[22px] md:text-4xl leading-7 md:leading-[44px] font-medium font-['Montserrat'] md:mb-6 tablet:mb-8 text-center">
                       @lang('codeweek4all.howto.title')
                    </h3>
                <div 
                    class="relative flex overflow-hidden"
                    >
                    <div class="flex flex-col items-center w-full pt-5 pb-5 mx-auto">

                <!-- TABS -->
                <div  x-cloak class="flex flex-col w-full text-xl max-md:max-w-full">
                    <div class="flex-wrap items-center self-center hidden gap-2 md:flex">
                        <button
                        :class="tab === 1
                            ? 'bg-blue-800 text-white'
                            : 'border-x border-t border-solid border-blue-800 text-blue-800'"
                        class="px-5 py-3 rounded-tl rounded-tr h-full whitespace-nowrap text-[16px]  lg:text-[20px]"
                        :aria-pressed="tab === 1"
                        @click="tab = 1"
                        >
                        If you are the first one in your alliance
                        </button>

                        <button
                        :class="tab === 2
                            ? 'bg-blue-800 text-white'
                            : 'border-x border-t border-solid border-blue-800 text-blue-800'"
                        class="px-5 py-3 rounded-tl rounded-tr h-full whitespace-nowrap text-[16px] lg:text-[20px]"
                        :aria-pressed="tab === 2"
                        @click="tab = 2"
                        >
                        If you are joining an existing alliance
                        </button>
                    </div>

                    <!-- SELECT FOR < md -->
                <div class="w-full md:hidden">
                <div
                    class="flex justify-between items-center py-2.5 pr-4 pl-6 mx-auto w-full max-w-none
                        bg-white rounded-3xl border-2 border-indigo-300 border-solid
                        max-md:px-3 max-md:py-2 max-md:max-w-[991px]
                        max-sm:px-2.5 max-sm:py-1.5 max-sm:max-w-screen-sm"
                >
                    <!-- Dynamic label showing the current selection -->
                    <label
                    for="alliance-select"
                    class="hidden text-base leading-6 text-gray-700 max-md:text-sm max-sm:text-xs"
                    x-text="
                        tab === 1
                        ? 'If you are the first one in your alliance'
                        : 'If you are joining an existing alliance'
                    "
                    ></label>

                    <!-- The real select, transparent background -->
                    <div class="relative flex justify-between w-full">
                    <select
                        id="alliance-select"
                        x-model.number="tab"
                        class="w-full pr-2 bg-transparent border-none appearance-none cursor-pointer whitespace-nowrap focus:outline-none focus:ring-2 focus:ring-indigo-300 hover:bg-hover hover:text-hover max-xs:text-[14px] max-md:text-[16px] md:text-[20px]"
                        aria-label="Alliance options"
                    >
                        <option value="1">If you are the first one in your alliance</option>
                        <option value="2">If you are joining an existing alliance</option>
                    </select>
                    <!-- custom chevron icon -->
                    <div class="absolute inset-y-0 right-0 flex items-center pr-1 pointer-events-none">
                        <svg
                        width="24"
                        height="25"
                        viewBox="0 0 24 25"
                        fill="none"
                        xmlns="http://www.w3.org/2000/svg"
                        aria-hidden="true"
                        >
                        <path
                            d="M18 9.5L12 15.5L6 9.5"
                            stroke="#5F718A"
                            stroke-width="1.5"
                        />
                        </svg>
                    </div>
                    </div>
                </div>
                </div>

             <div class="flex w-full h-px bg-blue-800 max-md:hidden" role="separator" aria-orientation="horizontal"></div>
                        </div>

                        <!-- TAB CONTENT -->
                        <div class="flex flex-col items-center w-full mt-16 overflow-hidden max-md:mt-10 max-md:max-w-full">

                        <!-- CONTENT FOR TAB 1 -->
                        <div 
                            x-show="tab === 1" 
                            x-cloak
                            class="max-w-full w-[907px] overflow-hidden"
                        >
                            <!-- paste your step-by-step markup here (the four relative flex blocks + note) -->
                            <div class="overflow-hidden max-md:max-w-full">
                            <!-- Step 1 -->
                            <div class="relative flex pb-4 gap-x-8 tablet:pb-16">
                                <div class="w-10 h-10 rounded-full flex justify-center items-center text-['#20262C'] font-semibold text-2xl bg-primary">
                                    1
                                </div>
                                <div class="absolute after:content-[''] after:block after:w-[2px] after:h-full after:bg-[#5F718A] left-5 bottom-2 top-12 tablet:top-16"></div>
                                <div class="flex-1">
                                    <p class="text-slate-500 font-normal text-[16px] md:text-xl leading-[22px] md:leading-[30px] p-0">
                                    @lang('codeweek4all.howto.content') @lang('codeweek4all.howto.first_alliance.1')
                                    </p>
                                </div>
                            </div>
                            <div class="relative flex pb-4 gap-x-8 tablet:pb-16">
                                <div class="w-10 h-10 rounded-full flex justify-center items-center text-['#20262C'] font-semibold text-2xl bg-primary">
                                    2
                                </div>
                                <div class="absolute after:content-[''] after:block after:w-[2px] after:h-full after:bg-[#5F718A] left-5 bottom-2 top-12 tablet:top-16"></div>
                                <div class="flex-1">
                                    <p class="text-slate-500 font-normal text-[16px] md:text-xl leading-[22px] md:leading-[30px] p-0">
                                       @lang('codeweek4all.howto.first_alliance.2')
                                    </p>
                                </div>
                            </div>
                            <div class="relative flex pb-4 gap-x-8 tablet:pb-16">
                                <div class="w-10 h-10 rounded-full flex justify-center items-center text-['#20262C'] font-semibold text-2xl bg-primary">
                                    3
                                </div>
                                <div class="absolute after:content-[''] after:block after:w-[2px] after:h-full after:bg-[#5F718A] left-5 bottom-2 top-12 tablet:top-16"></div>
                                <div class="flex-1">
                                    <p class="text-slate-500 font-normal text-[16px] md:text-xl leading-[22px] md:leading-[30px] p-0">
                                       @lang('codeweek4all.howto.first_alliance.3')
                                    </p>
                                </div>
                            </div>
                            <div class="relative flex mb-8 gap-x-8">
                                <div class="w-10 h-10 rounded-full flex justify-center items-center text-['#20262C'] font-semibold text-2xl bg-primary">
                                    4
                                </div>
                                <div class="flex-1">
                                    <p class="text-slate-500 font-normal text-[16px] md:text-xl leading-[22px] md:leading-[30px] p-0">
                                       @lang('codeweek4all.howto.first_alliance.4')
                                    </p>
                                </div>
                            </div>
                            <div class="flex flex-col justify-start w-full gap-2 p-6 bg-white rounded-lg tablet:flex-row">
                             <svg width="33" height="32" viewBox="0 0 33 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M15.1641 22.6666H17.8307V14.6666H15.1641V22.6666ZM16.4974 12C16.8752 12 17.1921 11.872 17.4481 11.616C17.7041 11.36 17.8316 11.0435 17.8307 10.6666C17.8298 10.2897 17.7018 9.97329 17.4467 9.71729C17.1916 9.46129 16.8752 9.33329 16.4974 9.33329C16.1196 9.33329 15.8032 9.46129 15.5481 9.71729C15.293 9.97329 15.165 10.2897 15.1641 10.6666C15.1632 11.0435 15.2912 11.3604 15.5481 11.6173C15.805 11.8742 16.1214 12.0017 16.4974 12ZM16.4974 29.3333C14.653 29.3333 12.9196 28.9831 11.2974 28.2826C9.67518 27.5822 8.26406 26.6324 7.06406 25.4333C5.86406 24.2342 4.91429 22.8231 4.21473 21.2C3.51518 19.5768 3.16495 17.8435 3.16406 16C3.16318 14.1564 3.5134 12.4231 4.21473 10.8C4.91606 9.17685 5.86584 7.76574 7.06406 6.56663C8.26229 5.36751 9.6734 4.41774 11.2974 3.71729C12.9214 3.01685 14.6547 2.66663 16.4974 2.66663C18.3401 2.66663 20.0734 3.01685 21.6974 3.71729C23.3214 4.41774 24.7325 5.36751 25.9307 6.56663C27.129 7.76574 28.0792 9.17685 28.7814 10.8C29.4836 12.4231 29.8334 14.1564 29.8307 16C29.8281 17.8435 29.4778 19.5768 28.7801 21.2C28.0823 22.8231 27.1325 24.2342 25.9307 25.4333C24.729 26.6324 23.3178 27.5826 21.6974 28.284C20.077 28.9853 18.3436 29.3351 16.4974 29.3333Z" fill="#1C4DA1"/>
                                </svg>
                                <div class="text-slate-500">
                                    <p class="font-normal leading-[22px] text-default tablet:leading-[30px] tablet:text-xl p-0">
                                        @lang('codeweek4all.howto.time')
                                    </p>
                                </div>
                            </div>
                            </div>
                        </div>

                        <!-- CONTENT FOR TAB 2 -->
                        <div 
                            x-show="tab === 2" 
                            x-cloak
                            class="max-w-full w-[907px] overflow-hidden"
                        >
                            <div class="overflow-hidden max-md:max-w-full">
                                <div class="relative flex pb-4 gap-x-8 tablet:pb-16">
                                    <div class="w-10 h-10 rounded-full flex justify-center items-center text-['#20262C'] font-semibold text-2xl bg-primary">
                                        1
                                    </div>
                                    <div class="absolute after:content-[''] after:block after:w-[2px] after:h-full after:bg-[#5F718A] left-5 bottom-2 top-12 tablet:top-16"></div>
                                    <div class="flex-1">
                                        <p class="text-slate-500 font-normal text-[16px] md:text-xl leading-[22px] md:leading-[30px] p-0">
                                            @lang('codeweek4all.howto.existing_alliance.1')
                                        </p>
                                    </div>
                                </div>
                                <div class="relative flex pb-4 gap-x-8 tablet:pb-16">
                                    <div class="w-10 h-10 rounded-full flex justify-center items-center text-['#20262C'] font-semibold text-2xl bg-primary">
                                        2
                                    </div>
                                    <div class="absolute after:content-[''] after:block after:w-[2px] after:h-full after:bg-[#5F718A] left-5 bottom-2 top-12 tablet:top-16"></div>
                                    <div class="flex-1">
                                        <p class="text-slate-500 font-normal text-[16px] md:text-xl leading-[22px] md:leading-[30px] p-0">
                                           @lang('codeweek4all.howto.existing_alliance.2')
                                        </p>
                                    </div>
                                </div>
                                <div class="relative flex pb-4 gap-x-8 tablet:pb-16">
                                    <div class="w-10 h-10 rounded-full flex justify-center items-center text-['#20262C'] font-semibold text-2xl bg-primary">
                                        3
                                    </div>
                                    <div class="absolute after:content-[''] after:block after:w-[2px] after:h-full after:bg-[#5F718A] left-5 bottom-2 top-12 tablet:top-16"></div>
                                    <div class="flex-1">
                                        <p class="text-slate-500 font-normal text-[16px] md:text-xl leading-[22px] md:leading-[30px] p-0">
                                        @lang('codeweek4all.howto.existing_alliance.3')
                                        </p>
                                    </div>
                                </div>
                                <div class="relative flex mb-8 gap-x-8">
                                    <div class="w-10 h-10 rounded-full flex justify-center items-center text-['#20262C'] font-semibold text-2xl bg-primary">
                                        4
                                    </div>
                                    <div class="flex-1">
                                        <p class="text-slate-500 font-normal text-[16px] md:text-xl leading-[22px] md:leading-[30px] p-0">
                                          @lang('codeweek4all.howto.existing_alliance.4')
                                        </p>
                                    </div>
                                </div>
                                <div class="flex flex-col justify-start w-full gap-2 p-6 bg-white rounded-lg tablet:flex-row">
                                                                <svg width="33" height="32" viewBox="0 0 33 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M15.1641 22.6666H17.8307V14.6666H15.1641V22.6666ZM16.4974 12C16.8752 12 17.1921 11.872 17.4481 11.616C17.7041 11.36 17.8316 11.0435 17.8307 10.6666C17.8298 10.2897 17.7018 9.97329 17.4467 9.71729C17.1916 9.46129 16.8752 9.33329 16.4974 9.33329C16.1196 9.33329 15.8032 9.46129 15.5481 9.71729C15.293 9.97329 15.165 10.2897 15.1641 10.6666C15.1632 11.0435 15.2912 11.3604 15.5481 11.6173C15.805 11.8742 16.1214 12.0017 16.4974 12ZM16.4974 29.3333C14.653 29.3333 12.9196 28.9831 11.2974 28.2826C9.67518 27.5822 8.26406 26.6324 7.06406 25.4333C5.86406 24.2342 4.91429 22.8231 4.21473 21.2C3.51518 19.5768 3.16495 17.8435 3.16406 16C3.16318 14.1564 3.5134 12.4231 4.21473 10.8C4.91606 9.17685 5.86584 7.76574 7.06406 6.56663C8.26229 5.36751 9.6734 4.41774 11.2974 3.71729C12.9214 3.01685 14.6547 2.66663 16.4974 2.66663C18.3401 2.66663 20.0734 3.01685 21.6974 3.71729C23.3214 4.41774 24.7325 5.36751 25.9307 6.56663C27.129 7.76574 28.0792 9.17685 28.7814 10.8C29.4836 12.4231 29.8334 14.1564 29.8307 16C29.8281 17.8435 29.4778 19.5768 28.7801 21.2C28.0823 22.8231 27.1325 24.2342 25.9307 25.4333C24.729 26.6324 23.3178 27.5826 21.6974 28.284C20.077 28.9853 18.3436 29.3351 16.4974 29.3333Z" fill="#1C4DA1"/>
                                </svg>
                                    <div class="text-slate-500">
                                        <p class="font-normal leading-[22px] text-default tablet:leading-[30px] tablet:text-xl p-0">
                                          @lang('codeweek4all.howto.time')
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        </div>
                    </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="relative overflow-hidden bg-yellow-50">
            <div class="relative pt-20 pb-16 codeweek-container-lg md:pt-40 md:pb-28">
                <div class="flex flex-col-reverse gap-6 lg:flex-row lg:gap-20">
                    <div class="relative flex items-center flex-1 overflow-hidden">
                        <img src="{{asset('images/codeweek4all/why.png')}}" class="object-cover h-full rounded-lg">
                    </div>
                    <div class="flex-1">
                        <p class="text-dark-blue text-[22px] md:text-4xl font-medium font-['Montserrat'] mb-6 p-0">
                           @lang('codeweek4all.why.title')
                        </p>
                        <ul class="w-full">
                            <li class="flex flex-wrap items-center w-full gap-3 mt-6 max-md:max-w-full">
                            <div class="flex gap-2.5 items-center py-2 w-3">
                                <div class="flex self-stretch flex-1 w-3 h-3 my-auto bg-orange-500 rounded-full shrink basis-0 fill-orange-500 min-h-3" aria-hidden="true"></div>
                            </div>
                            <span class="flex-1 text-xl leading-8 text-gray-700 shrink basis-0 max-md:max-w-full">
                                @lang('codeweek4all.why.1')
                            </span>
                            </li>

                            <li class="flex flex-wrap items-center w-full gap-3 mt-6 max-md:max-w-full">
                            <div class="flex gap-2.5 items-center py-2 w-3">
                                <div class="flex self-stretch flex-1 w-3 h-3 my-auto bg-orange-500 rounded-full shrink basis-0 fill-orange-500 min-h-3" aria-hidden="true"></div>
                            </div>
                            <span class="flex-1 text-xl text-gray-700 shrink basis-0 max-md:max-w-full">
                               @lang('codeweek4all.why.2')
                            </span>
                            </li>

                            <li class="flex flex-wrap items-center w-full gap-3 mt-6 max-md:max-w-full">
                            <div class="flex gap-2.5 items-center py-2 w-3">
                                <div class="flex self-stretch flex-1 w-3 h-3 my-auto bg-orange-500 rounded-full shrink basis-0 fill-orange-500 min-h-3" aria-hidden="true"></div>
                            </div>
                            <span class="flex-1 text-xl text-gray-700 shrink basis-0 max-md:max-w-full">
                               @lang('codeweek4all.why.3')
                            </span>
                            </li>

                                                        <li class="flex flex-wrap items-center w-full gap-3 mt-6 max-md:max-w-full">
                            <div class="flex gap-2.5 items-center py-2 w-3">
                                <div class="flex self-stretch flex-1 w-3 h-3 my-auto bg-orange-500 rounded-full shrink basis-0 fill-orange-500 min-h-3" aria-hidden="true"></div>
                            </div>
                            <span class="flex-1 text-xl text-gray-700 shrink basis-0 max-md:max-w-full">
                               @lang('codeweek4all.why.4')
                            </span>
                            </li>

                                                        <li class="flex flex-wrap items-center w-full gap-3 mt-6 max-md:max-w-full">
                            <div class="flex gap-2.5 items-center py-2 w-3">
                                <div class="flex self-stretch flex-1 w-3 h-3 my-auto bg-orange-500 rounded-full shrink basis-0 fill-orange-500 min-h-3" aria-hidden="true"></div>
                            </div>
                            <span class="flex-1 text-xl text-gray-700 shrink basis-0 max-md:max-w-full">
                               @lang('codeweek4all.why.5')
                            </span>
                            </li>

                        </ul>
                    </div>
                </div>
            </div>
        </section>
<section class="relative overflow-hidden bg-yellow-50">
    <div class="absolute w-full h-full bg-yellow md:hidden" style="clip-path: ellipse(143% 90% at 38% 90%);"></div>
    <div class="absolute hidden w-full h-full bg-yellow md:block lg:hidden" style="clip-path: ellipse(244% 90% at 50% 90%);"></div>
    <div class="absolute hidden w-full h-full bg-yellow lg:block xl:hidden" style="clip-path: ellipse(144% 90% at 50% 90%);"></div>
    <div class="absolute hidden w-full h-full bg-yellow xl:block" style="clip-path: ellipse(64% 90% at 50% 90%);"></div>
    <div class="relative pt-20 pb-24 codeweek-container-lg md:pt-40 md:pb-28 max-w-[890px]">
    <h5 class="justify-start text-black max-md:text-[22px] text-4xl font-medium font-['Montserrat'] leading-[44px]">@lang('codeweek4all.superorganiser-title')</h5>
        <p class="text-[#333E48] font-normal text-lg md:text-xl p-0 max-md:mt-2 md:mt-8">
            @lang('codeweek4all.superorganiser')
        </p>
    </div>
</section>

    </section>
@endsection
