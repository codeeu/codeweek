@extends('layout.new_base')

@php
    $list = [
      (object) ['label' => 'Educational Resources', 'href' => ''],
    ];
@endphp
@section('layout.breadcrumb')
    @include('layout.breadcrumb', ['list' => $list])
@endsection

@section('content')
    <section id="educational-resources" class="font-['Blinker'] overflow-hidden">
        <section class="relative flex overflow-hidden">
            <div class="flex relative transition-all w-full bg-orange-gradient pt-60 pb-0 md:py-12">
                <div class="w-full overflow-hidden pb-10 md:p-0 flex flex-col md:flex-row justify-end md:items-center flex-shrink-0">
                    <div class="home-activity codeweek-container-lg flex flex-col md:flex-row md:items-center duration-1000 gap-28 md:gap-4 xl:gap-28">
                        <div class="px-6 py-10 md:px-14 md:py-[4.5rem] bg-white rounded-[32px] z-10 relative">
                            <h2 class="text-[#1C4DA1] text-[30px] md:text-[60px] leading-9 md:leading-[72px] font-normal font-['Montserrat'] mb-4 max-md:max-w-full max-w-[532px]">
                                Educational Resources landing page title
                            </h2>
                            <p class="text-xl font-normal md:text-2xl leading-8 text-[#333E48] p-0 mb-0 max-md:max-w-full max-w-[525px]">
                                Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero.
                            </p>
                        </div>
                        <img
                            class="absolute top-0 -left-1/4 w-[150vw] !max-w-none md:hidden"
                            loading="lazy"
                            src="/images/educational-resources/educational_resources_bg.png"
                            style="clip-path: ellipse(71% 73% at 40% 20%);"
                        />
                        <img
                            class="absolute top-0 right-0 h-full max-w-[calc(70vw)] object-cover hidden md:block"
                            loading="lazy"
                            src="/images/educational-resources/educational_resources_bg.png"
                            style="clip-path: ellipse(70% 140% at 70% 25%);"
                        />
                    </div>
                </div>
            </div>
        </section>

        <section class="relative bg-yellow-50">
            <div class="relative py-10 md:py-20 codeweek-container-lg font-['Montserrat']">
                <div class="grid grid-cols-1 tablet:grid-cols-3 gap-6 xl:gap-10 mb-6 xl:mb-8">
                    <div class="rounded-lg bg-white overflow-hidden">
                        <img src="/images/educational-resources/coding_home.png" />
                        <div class="p-6 flex justify-between items-center">
                            <p class="text-dark-blue text-lg p-0 font-semibold">Coding @ Home</p>
                            <a href="{{route('coding@home')}}" class="bg-yellow hover:bg-primary rounded-full min-w-12 min-h-12 duration-300 flex justify-center items-center">
                                <img class="-rotate-90" src="/images/digital-girls/arrow.svg" />
                            </a>
                        </div>
                    </div>
                    <div class="rounded-lg bg-white overflow-hidden">
                        <img src="/images/educational-resources/podcasts.png" />
                        <div class="p-6 flex justify-between items-center">
                            <p class="text-dark-blue text-lg p-0 font-semibold">Podcasts</p>
                            <a href="{{route('podcasts')}}" class="bg-yellow hover:bg-primary rounded-full min-w-12 min-h-12 duration-300 flex justify-center items-center">
                                <img class="-rotate-90" src="/images/digital-girls/arrow.svg" />
                            </a>
                        </div>
                    </div>
                    <div class="rounded-lg bg-white overflow-hidden">
                        <img src="/images/educational-resources/webinar.png" />
                        <div class="p-6 flex justify-between items-center">
                            <p class="text-dark-blue text-lg p-0 font-semibold">Webinars</p>
                            <a href="/" class="bg-yellow hover:bg-primary rounded-full min-w-12 min-h-12 duration-300 flex justify-center items-center">
                                <img class="-rotate-90" src="/images/digital-girls/arrow.svg" />
                            </a>
                        </div>
                    </div>
                </div>
                <div class="grid grid-cols-1 tablet:grid-cols-2 gap-6 xl:gap-10 mb-6 xl:mb-8">
                    <div class="rounded-lg bg-dark-blue overflow-hidden">
                        <img src="/images/educational-resources/placeholder.png" />
                        <div class="p-6 flex justify-between items-center">
                            <p class="text-white text-lg p-0 font-semibold">Placeholder title</p>
                            <a href="/" class="bg-yellow hover:bg-primary rounded-full min-w-12 min-h-12 duration-300 flex justify-center items-center">
                                <img class="-rotate-90" src="/images/digital-girls/arrow.svg" />
                            </a>
                        </div>
                    </div>
                    <div class="rounded-lg bg-dark-blue overflow-hidden">
                        <img src="/images/educational-resources/treasure_hunt.png" />
                        <div class="p-6 flex justify-between items-center">
                            <p class="text-white text-lg p-0 font-semibold">Treasure Hunt</p>
                            <a href="{{route('treasure-hunt')}}" class="bg-yellow hover:bg-primary rounded-full min-w-12 min-h-12 duration-300 flex justify-center items-center">
                                <img class="-rotate-90" src="/images/digital-girls/arrow.svg" />
                            </a>
                        </div>
                    </div>
                </div>
                <div class="grid grid-cols-1 tablet:grid-cols-3 gap-6 xl:gap-10 mb-6 xl:mb-8">
                    <div class="rounded-lg bg-white overflow-hidden">
                        <img src="/images/educational-resources/seasonal_content.png" />
                        <div class="p-6 flex justify-between items-center">
                            <p class="text-dark-blue text-lg p-0 font-semibold">Seasonal content</p>
                            <a href="/" class="bg-yellow hover:bg-primary rounded-full min-w-12 min-h-12 duration-300 flex justify-center items-center">
                                <img class="-rotate-90" src="/images/digital-girls/arrow.svg" />
                            </a>
                        </div>
                    </div>
                    <div class="rounded-lg bg-white overflow-hidden">
                        <img src="/images/educational-resources/careers_in_digital.png" />
                        <div class="p-6 flex justify-between items-center">
                            <p class="text-dark-blue text-lg p-0 font-semibold">Careers in Digital</p>
                            <a href="/" class="bg-yellow hover:bg-primary rounded-full min-w-12 min-h-12 duration-300 flex justify-center items-center">
                                <img class="-rotate-90" src="/images/digital-girls/arrow.svg" />
                            </a>
                        </div>
                    </div>
                    <div class="rounded-lg bg-white overflow-hidden">
                        <img src="/images/educational-resources/placeholder-2.png" />
                        <div class="p-6 flex justify-between items-center">
                            <p class="text-dark-blue text-lg p-0 font-semibold">Placeholder title</p>
                            <a href="/" class="bg-yellow hover:bg-primary rounded-full min-w-12 min-h-12 duration-300 flex justify-center items-center">
                                <img class="-rotate-90" src="/images/digital-girls/arrow.svg" />
                            </a>
                        </div>
                    </div>
                </div>
                <div class="grid grid-cols-1 tablet:grid-cols-2 gap-6 xl:gap-10">
                    <div class="rounded-lg bg-dark-blue overflow-hidden">
                        <img src="/images/educational-resources/challenges.png" />
                        <div class="p-6 flex justify-between items-center">
                            <p class="text-white text-lg p-0 font-semibold">Challenges</p>
                            <a href="{{route('challenges')}}" class="bg-yellow hover:bg-primary rounded-full min-w-12 min-h-12 duration-300 flex justify-center items-center">
                                <img class="-rotate-90" src="/images/digital-girls/arrow.svg" />
                            </a>
                        </div>
                    </div>
                    <div class="rounded-lg bg-dark-blue overflow-hidden">
                        <img src="/images/educational-resources/hackathons.png" />
                        <div class="p-6 flex justify-between items-center">
                            <p class="text-white text-lg p-0 font-semibold">Hackathons</p>
                            <a href="{{route('hackathons')}}" class="bg-yellow hover:bg-primary rounded-full min-w-12 min-h-12 duration-300 flex justify-center items-center">
                                <img class="-rotate-90" src="/images/digital-girls/arrow.svg" />
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="relative overflow-hidden">
            <div class="relative py-10 md:py-20 codeweek-container-lg flex justify-center">
                <div class="w-full max-w-[907px] bg-light-blue rounded-lg p-6 flex flex-col md:flex-row text-['Blinker'] gap-2">
                    <img class="min-w-8 min-h-8" src="/images/icon_info.svg" />
                    <div>
                        <p class="font-semibold text-xl p-0">Copyright notice ©</p>
                        <p class="font-normal text-xl p-0">
                            <span class="font-semibold text-xl text-dark-blue underline">The EU Code Week website for schools</span> is a service supported by the European Commission Except where stated otherwise, content made available on this site is licensed under a <span class="font-semibold text-xl text-dark-blue underline">Creative Commons Attribution-NonCommercial-ShareAlike 4.0 International (CC BY-NC-SA 4.0) license</span> Licensing under Creative Commons licenses does not of itself affect the ownership of the copyright Content from third party websites is subject to their own copyright restrictions; please refer to the site of origin for more information.
                        </p>
                    </div>
                </div>
            </div>
        </section>
    </section>
@endsection