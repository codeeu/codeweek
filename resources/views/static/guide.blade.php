@extends('layout.new_base')

@php
    $list = [
        (object) ['label' => 'Guide', 'href' => '/guide']
    ];
@endphp

@section('layout.breadcrumb')
    @include('layout.breadcrumb', ['list' => $list])
@endsection

@section('title', 'EU Code Week Guide – How to Get Started')
@section('description', 'New to EU Code Week? Check out our step-by-step guide on how to organize events, access resources, and engage with the coding community')
<style>

#codeweek-toolkits-page a {
    color: #1C4DA1!important;
    text-decoration: underline!important;
}


#codeweek-toolkits-page a:hover {
    text-decoration: none!important;
}

 #questions a {
    color: black!important;
    text-decoration: underline!important;
    font-weight: bold!important;
} 

 #questions a:hover {
    text-decoration: none!important;
}

#codeweek-toolkits-page #toolkit {
    margin-top: 0px!important;
}

#codeweek-toolkits-page #toolkit li {
    margin-bottom:  1rem; 
}

#codeweek-toolkits-page #toolkit a {
    text-decoration: none!important;
}

</style>
@section('content')
    <section id="codeweek-toolkits-page" class="font-['Blinker'] overflow-hidden">
        <section class="relative flex overflow-hidden">
            <div class="relative flex w-full pt-32 pb-0 transition-all bg-light-blue-gradient md:py-32">
                <div class="flex flex-col justify-end flex-shrink-0 w-full pb-10 overflow-hidden md:p-0 md:flex-row md:items-center">
                    <div class="flex flex-col duration-1000 codeweek-container-lg md:flex-row md:items-center gap-28 md:gap-4 xl:gap-28">
                        <div class="order-1 flex-1 px-6 py-10 md:px-14 md:py-[4.5rem] bg-white rounded-[32px] z-10 relative">
                            <h2 class="text-[#1C4DA1] text-[30px] md:text-[60px] leading-9 md:leading-[72px] font-normal font-['Montserrat'] mb-4 max-md:max-w-full max-w-[532px]">
                              @lang('guide.title') on activities
                            </h2>
                            <p class="text-xl font-normal md:text-2xl leading-8 text-[#333E48] p-0 max-md:max-w-full max-w-[525px]">
                              @lang('guide.organise_activity')
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

        <section class="relative z-10 animation-section">
            <div class="relative z-10 flex flex-col-reverse items-center gap-12 pt-[5rem] max-md:py-12 md:flex-row md:pb-48 codeweek-container-lg  mx-auto">
                <div class="flex-1">
                    <div class="relative inline-block observer-element">
                        <img class="relative z-10 w-full max-w-xl" loading="lazy" src="/images/guide/guide1.png" />
                        <img
                            class="animation-element move-background duration-[1.5s] absolute top-0 left-0 w-full max-w-xl"
                            loading="lazy"
                            src="/images/shape.png"
                            style="transform: translate(-16px, -24px)"
                        />
                    </div>
                </div>
                         <div class="flex-1">
                    <h3 class="text-[#1C4DA1] text-2xl md:text-4xl leading-[44px] font-medium font-['Montserrat'] lg:mb-6">
                       @lang('guide.what.title')
                    </h3>
                     <div class="p-0 mb-6 text-lg font-normal leading-8 text-gray-700 md:text-xl">
                       @lang('guide.what.content')
                    </div>
                        <ul class="w-full">
                            <li class="flex flex-wrap items-center w-full gap-3 mt-6 max-md:max-w-full">
                            <div class="flex gap-2.5 items-start py-2 w-3">
                                <div class="flex self-stretch flex-1 w-3 h-3 my-auto bg-orange-500 rounded-full shrink basis-0 fill-orange-500 min-h-3 mt-[.1rem]" aria-hidden="true"></div>
                            </div>
                            <span class="flex-1 text-[#333e48] text-xl font-normal font-['Blinker'] leading-[30px] max-md:max-w-full">
                                @lang('codeweek4all.why.1')
                            </span>
                            </li>

                            <li class="flex flex-wrap items-center w-full gap-3 mt-6 max-md:max-w-full">
                            <div class="flex gap-2.5 items-start py-2 w-3">
                                <div class="flex self-stretch flex-1 w-3 h-3 my-auto bg-orange-500 rounded-full shrink basis-0 fill-orange-500 min-h-3 mt-[.1rem]" aria-hidden="true"></div>
                            </div>
                            <span class="flex-1 text-xl text-gray-700 shrink basis-0 max-md:max-w-full">
                               @lang('codeweek4all.why.2')
                            </span>
                            </li>

                            <li class="flex flex-wrap items-center w-full gap-3 mt-6 max-md:max-w-full">
                            <div class="flex gap-2.5 items-start py-2 w-3">
                                <div class="flex self-stretch flex-1 w-3 h-3 my-auto bg-orange-500 rounded-full shrink basis-0 fill-orange-500 min-h-3 mt-[.1rem]" aria-hidden="true"></div>
                            </div>
                            <span class="flex-1 text-xl text-gray-700 shrink basis-0 max-md:max-w-full">
                               @lang('codeweek4all.why.3')
                            </span>
                            </li>

                                                        <li class="flex flex-wrap items-center w-full gap-3 mt-6 max-md:max-w-full">
                            <div class="flex gap-2.5 items-start py-2 w-3">
                                <div class="flex self-stretch flex-1 w-3 h-3 my-auto bg-orange-500 rounded-full shrink basis-0 fill-orange-500 min-h-3 mt-[.1rem]" aria-hidden="true"></div>
                            </div>
                            <span class="flex-1 text-xl text-gray-700 shrink basis-0 max-md:max-w-full">
                               @lang('codeweek4all.why.4')
                            </span>
                            </li>

                                                        <li class="flex flex-wrap items-center w-full gap-3 mt-6 max-md:max-w-full">
                            <div class="flex gap-2.5 items-start py-2 w-3">
                                <div class="flex self-stretch flex-1 w-3 h-3 my-auto bg-orange-500 rounded-full shrink basis-0 fill-orange-500 min-h-3 mt-[.1rem]" aria-hidden="true"></div>
                            </div>
                            <span class="flex-1 text-xl text-gray-700 shrink basis-0 max-md:max-w-full">
                               @lang('codeweek4all.why.5')
                            </span>
                            </li>

                        </ul>
                </div>
            </div>
            <div
                class="animation-element move-background duration-[1.5s] absolute z-0 bottom-10 md:bottom-auto md:top-2/3 -right-14 md:-right-36 w-28 md:w-72 h-28 md:h-72 bg-[#A4B8D9] rounded-full lg:hidden xl:block max-md:hidden"
                style="transform: translate(-16px, -24px)"
            ></div>
            <div
                class="animation-element move-background duration-[1.5s] absolute z-0 -bottom-28 right-40 w-28 h-28 hidden xl:block bg-[#A4B8D9] rounded-full"
                style="transform: translate(-16px, -24px)"
            ></div>
        </section>


        <section class="relative overflow-hidden">
            <div class="absolute w-full h-full bg-[#F4F6FA] md:hidden" style="clip-path: ellipse(270% 90% at 38% 90%);"></div>
            <div class="absolute w-full h-full bg-[#F4F6FA] hidden md:block lg:hidden" style="clip-path: ellipse(188% 90% at 50% 90%);"></div>
            <div class="absolute w-full h-full bg-[#F4F6FA] hidden lg:block xl:hidden" style="clip-path: ellipse(128% 90% at 50% 90%);"></div>
            <div class="absolute w-full h-full bg-[#F4F6FA] hidden xl:block" style="clip-path: ellipse(93% 90% at 50% 90%);"></div>
            <div class="relative flex justify-center pt-20 pb-16 codeweek-container-lg md:pt-40 md:pb-28">
                <div class="w-full max-w-[907px] gap-2">
                    <h2 class="text-[#1C4DA1] tablet:text-left text-[22px] md:text-4xl leading-7 md:leading-[44px] xl:whitespace-nowrap font-medium font-['Montserrat'] mb-6 tablet:mb-8">
                      @lang('guide.what_you_need_organise.title')
                    </h2>
                    <div class="relative flex gap-x-8 pb-14">
                        <div class="relative w-10 h-10 rounded-full flex justify-center items-center text-[#20262C] font-semibold text-2xl bg-primary
                            after:content-[''] after:absolute after:w-[2px] after:bg-[#5F718A]
                            after:top-full after:left-1/2 after:-translate-x-1/2
                            after:h-[50px] after:max-h-[50px] after:mt-2">
                            1
                        </div>
                        <div class="flex-1">
                            <p class="text-slate-500 font-normal text-xl leading-[22px] md:leading-[30px] p-0">
                                @lang('guide.what_you_need_organise.items.1')
                            </p>
                        </div>
                    </div>
                    <div class="relative flex gap-x-8 pb-14">
                        <div class="relative w-10 h-10 rounded-full flex justify-center items-center text-[#20262C] font-semibold text-2xl bg-primary
                            after:content-[''] after:absolute after:w-[2px] after:bg-[#5F718A]
                            after:top-full after:left-1/2 after:-translate-x-1/2
                            after:h-[50px] after:max-h-[50px] after:mt-2">
                         2
                        </div>
                        <div class="flex-1">
                            <p class="text-slate-500 font-normal text-xl leading-[22px] md:leading-[30px] p-0">
                               @lang('guide.what_you_need_organise.items.2')
                            </p>
                        </div>
                    </div>
                    <div class="relative flex gap-x-8 pb-14">
                        <div class="relative w-10 h-10 rounded-full flex justify-center items-center text-[#20262C] font-semibold text-2xl bg-primary
                            after:content-[''] after:absolute after:w-[2px] after:bg-[#5F718A]
                            after:top-full after:left-1/2 after:-translate-x-1/2
                            after:h-[50px] after:max-h-[50px] after:mt-2">
                          3
                        </div>
                        <div class="flex-1">
                            <p class="text-slate-500 font-normal text-xl leading-[22px] md:leading-[30px] p-0">
                                @lang('guide.what_you_need_organise.items.3')
                            </p>
                        </div>
                    </div>
                    <div class="relative flex gap-x-8 pb-14">
                    <div class="relative w-10 h-10 rounded-full flex justify-center items-center text-[#20262C] font-semibold text-2xl bg-primary
                            after:content-[''] after:absolute after:w-[2px] after:bg-[#5F718A]
                            after:top-full after:left-1/2 after:-translate-x-1/2
                            after:h-[50px] after:max-h-[50px] after:mt-2">
                           4
                        </div>
                        <div class="flex-1">
                            <p class="text-slate-500 font-normal text-xl leading-[22px] md:leading-[30px] p-0">
                               @lang('guide.what_you_need_organise.items.4')
                            </p>
                        </div>
                    </div>
                    <div class="relative flex gap-x-8 pb-14">
                      <div class="relative w-10 h-10 rounded-full flex justify-center items-center text-[#20262C] font-semibold text-2xl bg-primary
                            after:content-[''] after:absolute after:w-[2px] after:bg-[#5F718A]
                            after:top-full after:left-1/2 after:-translate-x-1/2
                            after:h-[50px] after:max-h-[50px] after:mt-2">
                            5
                        </div>
                        <div class="flex-1">
                            <p class="text-slate-500 font-normal text-xl leading-[22px] md:leading-[30px] p-0">
                              @lang('guide.what_you_need_organise.items.5')
                            </p>
                        </div>
                    </div>
                    <div class="relative flex gap-x-8 tablet:pb-6">
                        <div class="relative w-10 h-10 rounded-full flex justify-center items-center text-[#20262C] font-semibold text-2xl bg-primary
                            after:content-[''] after:absolute after:w-[2px] after:bg-[#5F718A]
                            after:top-full after:left-1/2 after:-translate-x-1/2
                            after:h-[50px] after:max-h-[50px] after:mt-2">
                           6
                        </div>
                        <div class="flex-1">
                            <p class="text-slate-500 font-normal text-xl leading-[22px] md:leading-[30px] p-0">
                            @lang('guide.what_you_need_organise.items.6')
                            </p>
                        </div>
                    </div>
                     <div class="relative flex gap-x-8 pb-14">
                        <div class="relative w-10 h-10 rounded-full flex justify-center items-center text-[#20262C] font-semibold text-2xl bg-primary
                            after:content-[''] after:absolute after:w-[2px] after:bg-[#5F718A]
                            after:top-full after:left-1/2 after:-translate-x-1/2
                            after:h-[50px] after:max-h-[50px] after:mt-2">
                           7
                        </div>
                        <div class="flex-1">
                            <p class="text-slate-500 font-normal text-xl leading-[22px] md:leading-[30px] p-0">
                              @lang('guide.what_you_need_organise.items.7')
                            </p>
                        </div>
                    </div>
                  <div class="relative flex gap-x-8 pb-14">
                        <div class="w-10 h-10 rounded-full flex justify-center items-center text-[#20262C] font-semibold text-2xl bg-primary">
                       8
                        </div>
  
                        <div class="flex-1">
                            <p class="text-slate-500 font-normal text-xl leading-[22px] md:leading-[30px] p-0">
                           @lang('guide.what_you_need_organise.items.8')
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="relative overflow-hidden bg-[#F4F6FA]">
                    <div class="absolute w-full h-full bg-yellow-50 md:hidden" style="clip-path: ellipse(270% 90% at 38% 90%);"></div>
            <div class="absolute hidden w-full h-full bg-yellow-50 md:block lg:hidden" style="clip-path: ellipse(188% 90% at 50% 90%);"></div>
            <div class="absolute hidden w-full h-full bg-yellow-50 lg:block xl:hidden" style="clip-path: ellipse(128% 90% at 50% 90%);"></div>
            <div class="absolute hidden w-full h-full bg-yellow-50 xl:block" style="clip-path: ellipse(85% 90% at 50% 90%);"></div>
            <div class="relative max-lg:py-12 xl:pt-[10rem] xl:pb-16 codeweek-container-lg md:pt-20 md:pb-28 max-md:px-5">
                <div class="flex flex-col items-center gap-6 lg:flex-row lg:gap-20">
                  <div class="flex-1 max-xs:px-5">
                        <p class="text-dark-blue text-[22px] md:text-4xl font-medium font-['Montserrat'] mb-6 p-0 max-xs:px-5">
                            @lang('guide.how_to.title')
                        </p>
                        <ul class="w-full max-xs:px-5">
                            <li class="flex flex-wrap items-start w-full gap-3 mt-6 max-md:max-w-full">
                            <div class="flex gap-2.5 items-start py-2 w-3">
                                <div class="flex self-stretch flex-1 w-3 h-3 my-auto bg-orange-500 rounded-full shrink basis-0 fill-orange-500 min-h-3 mt-[.1rem]" aria-hidden="true"></div>
                            </div>
                            <span class="flex-1 text-[#333e48] text-xl font-normal font-['Blinker'] leading-[30px] max-md:max-w-full">
                              @lang('guide.how_to.items.1')
                            </span>
                            </li>

                            <li class="flex flex-wrap items-start w-full gap-3 mt-6 max-md:max-w-full">
                            <div class="flex gap-2.5 items-start py-2 w-3">
                                <div class="flex self-stretch flex-1 w-3 h-3 my-auto bg-orange-500 rounded-full shrink basis-0 fill-orange-500 min-h-3 mt-[.1rem]" aria-hidden="true"></div>
                            </div>
                            <span class="flex-1 text-xl text-gray-700 shrink basis-0 max-md:max-w-full">
                             @lang('guide.how_to.items.2')
                            </span>
                            </li>

                            <li class="flex flex-wrap items-start w-full gap-3 mt-6 max-md:max-w-full">
                            <div class="flex gap-2.5 items-start py-2 w-3">
                                <div class="flex self-stretch flex-1 w-3 h-3 my-auto bg-orange-500 rounded-full shrink basis-0 fill-orange-500 min-h-3 mt-[.1rem]" aria-hidden="true"></div>
                            </div>
                            <span class="flex-1 text-xl text-gray-700 shrink basis-0 max-md:max-w-full">
                                @lang('guide.how_to.items.3')
                            </span>
                            </li>

                            <li class="flex flex-wrap items-start w-full gap-3 mt-6 max-md:max-w-full">
                            <div class="flex gap-2.5 items-start py-2 w-3">
                                <div class="flex self-stretch flex-1 w-3 h-3 my-auto bg-orange-500 rounded-full shrink basis-0 fill-orange-500 min-h-3 mt-[.1rem]" aria-hidden="true"></div>
                            </div>
                            <span class="flex-1 text-xl text-gray-700 shrink basis-0 max-md:max-w-full">
                                 @lang('guide.how_to.items.4')
                            </span>
                            </li>

                            <li class="flex flex-wrap items-start w-full gap-3 mt-6 max-md:max-w-full">
                            <div class="flex gap-2.5 items-start py-2 w-3">
                                <div class="flex self-stretch flex-1 w-3 h-3 my-auto bg-orange-500 rounded-full shrink basis-0 fill-orange-500 min-h-3 mt-[.1rem]" aria-hidden="true"></div>
                            </div>
                            <span class="flex-1 text-xl text-gray-700 shrink basis-0 max-md:max-w-full">
                              @lang('guide.how_to.items.5')
                            </span>
                            </li>

                        </ul>
                        <div class="flex flex-col pt-4 tablet:flex-row lg:flex-col 2xl:flex-row gap-x-2 gap-y-4">
                            <a style="color: black!important; text-decoration: none!important;     white-space: nowrap;"
                                class="inline-block bg-primary hover:bg-hover-orange rounded-full py-4 px-2 md:px-10 font-semibold text-base max-md:w-full w-fit md:w-auto text-center text-[#20262C] transition-all duration-300"
                                target="_blank" href="https://codeweek.eu/resources/"
                            >
                                Freely available open source material
                            </a>
                            <a style="text-decoration: none!important;     white-space: nowrap;"
                                class="flex justify-center items-center gap-2 text-[#1C4DA1] border-solid border-2 border-[#1C4DA1] rounded-full py-3 px-8 font-semibold text-lg transition-all duration-300 hover:bg-[#E8EDF6] group"
                                target="_blank" href="https://www.facebook.com/groups/774720866253044/"
                            >
                                <span>EU Code Week Teacher’s group</span>
                                <div class="flex w-4 gap-2 overflow-hidden">
                                    <img src="/images/arrow-right-icon.svg" class="duration-500 transform -translate-x-6 min-w-4 group-hover:translate-x-0" />
                                    <img src="/images/arrow-right-icon.svg" class="duration-500 transform -translate-x-6 min-w-4 group-hover:translate-x-0" />
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="relative flex items-center flex-1 overflow-hidden justify-center h-full rounded-[16px]">
                       <img src="{{asset('images/codeweek4all/why.png')}}" class="object-cover h-full max-h-[449px] rounded-[16px]" />
                    </div>
                </div>
            </div>
        </section>



        <section class="relative flex overflow-hidden">
            <div class="relative w-full py-12  max-w-[819px] mx-auto md:py-24 codeweek-container-lg">
                <h4 class="text-dark-blue text-[22px] md:text-4xl md:leading-[44px] font-medium font-['Montserrat'] mb-4 md:mb-4 block">
                  @lang('guide.material.title')
                </h4>
                <p class="text-[#20262c] text-lg font-normal font-['Blinker'] leading-7 lg:leading-[22px] md:text-xl p-0 max-w-4xl">
                 @lang('snippets.guide.tutorials.1') <a href="{{route('training.index')}}">@lang('snippets.guide.tutorials.2')</a> @lang('snippets.guide.tutorials.3')
                </p>

            </div>
        </section>


        <section class="relative flex overflow-hidden bg-[#F2FBFE] lg:py-12">
          <div class="absolute bg-cyan-200 rounded-full h-[280px] rotate-[-162.343deg] top-[198px] -left-[10rem] w-[280px] max-md:hidden" aria-hidden="true"></div>
                <div class="absolute right-6 bg-cyan-200 rounded-full h-[93px] rotate-[-162.343deg] top-[57px] -left-[10rem] w-[93px] max-md:hidden" aria-hidden="true"></div>
            <div class="relative max-lg:py-12 lg:pt-20 lg:pb-16 codeweek-container-lg ">
                <div class=" bg-cyan-200 rounded-full h-[93px] absolute top-12 -right-8 z-10 rotate-[-162.343deg] w-[93px] max-md:hidden" aria-hidden="true"></div>
                <div class="relative flex flex-col items-center overflow-hidden">
                <div class="flex lg:gap-20 items-start mx-auto w-full max-w-[1428px] max-lg:flex-col-reverse">
                   <div class="relative w-full lg:w-1/2">
                    <img
                    src="{{asset('images/guide/guide2.png')}}"
                    alt="Toolkit preview"
                    class="relative z-50 object-cover w-full h-auto rounded-2xl md:max-w-1/3 xl:max-w-1/2"
                    />
                <div class="max-lg:hidden bg-cyan-200 rounded-full h-[118px] relative -top-8 left-12 z-10 rotate-[-162.343deg] w-[118px]" aria-hidden="true"></div>
                    </div>
                    <!-- Content section -->
                    <div class="flex flex-col flex-1 gap-6 lg:w-1/2">
                    <h4 class="text-[#1C4DA1] text-2xl md:text-4xl lg:leading-[44px] font-medium font-['Montserrat']">
                        @lang('guide.toolkits.title')
                    </h4>

                    <div id="toolkit" class="text-[#333e48] text-xl font-normal mb-2 font-['Blinker'] leading-[30px]">
                        @include('_tookits')
                    </div>
                    </div>
                </div>
                </div>
            </div>
        </section>


        <section id="questions" class="relative overflow-hidden bg-[#F2FBFE]">
            <div class="absolute w-full h-full bg-[#00B3E3] md:hidden" style="clip-path: ellipse(143% 90% at 38% 90%);"></div>
            <div class="absolute hidden w-full h-full bg-[#00B3E3] md:block lg:hidden" style="clip-path: ellipse(244% 90% at 50% 90%);"></div>
            <div class="absolute hidden w-full h-full bg-[#00B3E3] lg:block xl:hidden" style="clip-path: ellipse(144% 90% at 50% 90%);"></div>
            <div class="absolute hidden w-full h-full bg-[#00B3E3] xl:block" style="clip-path: ellipse(64% 90% at 50% 90%);"></div>
            <div class="relative pt-20 pb-24 codeweek-container-lg md:pt-40 md:pb-28 max-w-[890px]">
            <h5 class="justify-start text-black max-md:text-[22px] text-4xl font-medium font-['Montserrat'] leading-[44px]">@lang('guide.questions.title')</h5>
            <span class="text-[#20262C] font-normal text-[16px] leading-[22px] md:text-xl p-0 mb-6 md:mb-10 max-w-4xl">
                    @lang('guide.questions.content')
            </span>
            </div>
        </section>

    </section>
@endsection

@push('scripts')
    <script type="text/javascript">
      const waitForDOM = (callback, interval = 100, maxRetries = 50) => {
        let retries = 0;
        const checkDOM = () => {
          const target = document.getElementById('codeweek-toolkits-page');
          if (target) {
            callback(target);
          } else if (retries < maxRetries) {
            retries++;
            setTimeout(checkDOM, interval);
          } else {
            console.error('DOM not ready after retries');
          }
        };
        checkDOM();
      };

      waitForDOM((target) => {
        triggerAnimations(target);
      });

      document.addEventListener('DOMContentLoaded', function() {
        const accordionItemHeaders = document.querySelectorAll(".accordion-item-header");

        accordionItemHeaders.forEach(accordionItemHeader => {
          accordionItemHeader.addEventListener("click", event => {

            accordionItemHeader.classList.toggle("active");

            const button = accordionItemHeader.querySelector("button");

            button.classList.toggle("!bg-primary");
            button.classList.toggle("!hover:bg-hover-orange");

            const arrowIcon = accordionItemHeader.querySelector("svg");

            arrowIcon.classList.toggle("rotate-180");


            const accordionItemBody = accordionItemHeader.nextElementSibling;
            if(accordionItemHeader.classList.contains("active")) {
              accordionItemBody.style.maxHeight = accordionItemBody.scrollHeight + "px";
            }
            else {
              accordionItemBody.style.maxHeight = 0;
            }

          });
        });
      });
    </script>
    @endpush