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
            <div class="flex relative transition-all w-full bg-orange-gradient pt-60 pb-0 md:py-32">
                <div class="w-full overflow-hidden pb-10 md:p-0 flex flex-col md:flex-row justify-end md:items-center flex-shrink-0">
                    <div class="home-activity codeweek-container-lg flex flex-col md:flex-row md:items-center duration-1000 gap-28 md:gap-4 xl:gap-28">
                        <div class="px-6 py-10 md:px-14 md:py-[4.5rem] bg-white rounded-[32px] z-10 relative">
                            <h2 class="text-dark-blue text-[30px] md:text-[60px] leading-9 md:leading-[72px] font-normal font-['Montserrat'] mb-4 max-md:max-w-full max-w-[830px]">
                                Educational Resources
                            </h2>
                            <p class="text-xl font-normal md:text-2xl leading-8 text-slate-500 p-0 mb-0 max-md:max-w-full max-w-[725px]">
                                Welcome! Here, you'll find a collection of free resources designed to support your learning journey!
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
                <h2 class="text-dark-blue text-[22px] md:text-4xl md:leading-[44px] font-medium font-['Montserrat'] mb-8">
                    Got free and open educational resources?
                </h2>
                <p class="text-slate-500 font-normal leading-7 text-xl p-0 mb-4 w-full md:max-w-[825px] font-['Blinker']">
                    Share them with the EU Code Week community! Submit your free resources using the form below, and we'll feature them on this page to help others learn, create and grow OR tell us what you think!
                </p>
                <p class="text-slate-500 font-normal leading-7 text-xl p-0 mb-4 w-full md:max-w-[825px] font-['Blinker']">
                    Share your feedback on the existing resources – whether you have suggestions for improvement, compliments, or new ideas, we'd love to hear from you!
                </p>
                <div class="flex flex-col md:flex-row gap-4 mb-10 md:mb-16">
                    <a
                        class="text-nowrap w-full md:w-fit flex justify-center items-center bg-primary hover:bg-hover-orange duration-300 text-[#20262C] rounded-full py-2.5 px-6 font-semibold text-lg"
                        href="https://forms.gle/pZz9issG45B9131n9"
                        target="_blank"
                    >
                        <span>Share your resource</span>
                    </a>
                    <a
                        class="text-nowrap w-full md:w-fit flex justify-center items-center bg-primary hover:bg-hover-orange duration-300 text-[#20262C] rounded-full py-2.5 px-6 font-semibold text-lg"
                        href="https://forms.gle/enVmsPvNyYo7yEuT6"
                        target="_blank"
                    >
                        <span>Share your feedback</span>
                    </a>
                </div>
                <div class="grid grid-cols-1 tablet:grid-cols-3 gap-6 xl:gap-10 mb-6 xl:mb-8">
                    <div class="rounded-lg bg-white overflow-hidden cursor-pointer group" onclick="window.location.href='{{ route('coding@home') }}'">
                        <img class="object-cover aspect-[3/2]" src="/images/educational-resources/coding_home.png" />
                        <div class="p-6 flex justify-between items-center">
                            <p class="text-dark-blue text-lg p-0 font-semibold">Coding @ Home</p>
                            <span class="bg-yellow group-hover:bg-primary rounded-full min-w-12 min-h-12 duration-300 flex justify-center items-center">
                                <img class="-rotate-90" src="/images/digital-girls/arrow.svg" />
                            </span>
                        </div>
                    </div>
                    <div class="rounded-lg bg-white overflow-hidden cursor-pointer group" onclick="window.location.href='{{ route('podcasts') }}'">
                        <img class="object-cover aspect-[3/2]" src="/images/educational-resources/podcasts.png" />
                        <div class="p-6 flex justify-between items-center">
                            <p class="text-dark-blue text-lg p-0 font-semibold">Podcasts</p>
                            <span class="bg-yellow group-hover:bg-primary rounded-full min-w-12 min-h-12 duration-300 flex justify-center items-center">
                                <img class="-rotate-90" src="/images/digital-girls/arrow.svg" />
                            </span>
                        </div>
                    </div>
                    <div class="rounded-lg bg-white overflow-hidden cursor-pointer group" onclick="window.location.href='{{ route('webinars') }}'">
                        <img class="object-cover aspect-[3/2]" src="/images/educational-resources/webinar.png" />
                        <div class="p-6 flex justify-between items-center">
                            <p class="text-dark-blue text-lg p-0 font-semibold">Webinars</p>
                            <span class="bg-yellow group-hover:bg-primary rounded-full min-w-12 min-h-12 duration-300 flex justify-center items-center">
                                <img class="-rotate-90" src="/images/digital-girls/arrow.svg" />
                            </span>
                        </div>
                    </div>
                </div>
                <div class="grid grid-cols-1 tablet:grid-cols-2 gap-6 xl:gap-10 mb-6 xl:mb-8">
                    <div class="rounded-lg bg-dark-blue overflow-hidden cursor-pointer group" onclick="window.location.href='{{ route('online-courses') }}'">
                        <img class="object-cover aspect-[3/2]" src="/images/educational-resources/placeholder.png" />
                        <div class="p-6 flex justify-between items-center">
                            <p class="text-white text-lg p-0 font-semibold">Online Courses</p>
                            <span class="bg-yellow group-hover:bg-primary rounded-full min-w-12 min-h-12 duration-300 flex justify-center items-center">
                                <img class="-rotate-90" src="/images/digital-girls/arrow.svg" />
                            </span>
                        </div>
                    </div>
                    <div class="rounded-lg bg-dark-blue overflow-hidden cursor-pointer group" onclick="window.location.href='{{route('treasure-hunt')}}'">
                        <img class="object-cover aspect-[3/2]" src="/images/educational-resources/treasure_hunt.png" />
                        <div class="p-6 flex justify-between items-center">
                            <p class="text-white text-lg p-0 font-semibold">Treasure Hunt</p>
                            <span class="bg-yellow group-hover:bg-primary rounded-full min-w-12 min-h-12 duration-300 flex justify-center items-center">
                                <img class="-rotate-90" src="/images/digital-girls/arrow.svg" />
                            </span>
                        </div>
                    </div>
                </div>
                <div class="grid grid-cols-1 tablet:grid-cols-3 gap-6 xl:gap-10 mb-6 xl:mb-8">
                    <div class="rounded-lg bg-white overflow-hidden cursor-pointer group" onclick="window.location.href='{{route('training.index')}}'">
                        <img class="object-cover aspect-[3/2] w-100" src="/images/training/training_bg.png" />
                        <div class="p-6 flex justify-between items-center">
                            <p class="text-dark-blue text-lg p-0 font-semibold">Training</p>
                            <span class="bg-yellow group-hover:bg-primary rounded-full min-w-12 min-h-12 duration-300 flex justify-center items-center">
                                <img class="-rotate-90" src="/images/digital-girls/arrow.svg" />
                            </span>
                        </div>
                    </div>
                    <div class="rounded-lg bg-white overflow-hidden cursor-pointer group" onclick="window.location.href='dream-jobs-in-digital'">
                        <img class="object-cover aspect-[3/2]" src="/images/educational-resources/careers_in_digital.png" />
                        <div class="p-6 flex justify-between items-center">
                            <p class="text-dark-blue text-lg p-0 font-semibold">Careers in Digital</p>
                            <span class="bg-yellow group-hover:bg-primary rounded-full min-w-12 min-h-12 duration-300 flex justify-center items-center">
                                <img class="-rotate-90" src="/images/digital-girls/arrow.svg" />
                            </span>
                        </div>
                    </div>
                    <div class="rounded-lg bg-white overflow-hidden cursor-pointer group" onclick="window.location.href='{{ route('resources_all') }}'">
                        <img class="object-cover aspect-[3/2]" src="/images/educational-resources/placeholder-2.png" />
                        <div class="p-6 flex justify-between items-center">
                            <p class="text-dark-blue text-lg p-0 font-semibold">Learn & Teach</p>
                            <span class="bg-yellow group-hover:bg-primary rounded-full min-w-12 min-h-12 duration-300 flex justify-center items-center">
                                <img class="-rotate-90" src="/images/digital-girls/arrow.svg" />
                            </span>
                        </div>
                    </div>
                </div>
                <div class="grid grid-cols-1 tablet:grid-cols-2 gap-6 xl:gap-10 mb-6 xl:mb-8">
                    <div class="rounded-lg bg-dark-blue overflow-hidden cursor-pointer group" onclick="window.location.href='{{route('challenges')}}'">
                        <img class="object-cover aspect-[3/2]" src="/images/educational-resources/challenges.png" />
                        <div class="p-6 flex justify-between items-center">
                            <p class="text-white text-lg p-0 font-semibold">Challenges</p>
                            <span class="bg-yellow group-hover:bg-primary rounded-full min-w-12 min-h-12 duration-300 flex justify-center items-center">
                                <img class="-rotate-90" src="/images/digital-girls/arrow.svg" />
                            </span>
                        </div>
                    </div>
                    <div class="rounded-lg bg-dark-blue overflow-hidden cursor-pointer group" onclick="window.location.href='{{route('hackathons')}}'">
                        <img class="object-cover aspect-[3/2]" src="/images/educational-resources/hackathons.png" />
                        <div class="p-6 flex justify-between items-center">
                            <p class="text-white text-lg p-0 font-semibold">Hackathons</p>
                            <span class="bg-yellow group-hover:bg-primary rounded-full min-w-12 min-h-12 duration-300 flex justify-center items-center">
                                <img class="-rotate-90" src="/images/digital-girls/arrow.svg" />
                            </span>
                        </div>
                    </div>
                </div>
                <div class="grid grid-cols-1 tablet:grid-cols-3 gap-6 xl:gap-10">
                    <div class="rounded-lg bg-white overflow-hidden cursor-pointer group" onclick="window.location.href='{{route('toolkits')}}'">
                        <img class="object-cover aspect-[3/2]" src="/images/educational-resources/toolkits.png" />
                        <div class="p-6 flex justify-between items-center">
                            <p class="text-dark-blue text-lg p-0 font-semibold">Presentations and Toolkits</p>
                            <span class="bg-yellow group-hover:bg-primary rounded-full min-w-12 min-h-12 duration-300 flex justify-center items-center">
                                <img class="-rotate-90" src="/images/digital-girls/arrow.svg" />
                            </span>
                        </div>
                    </div>
                    <div class="rounded-lg bg-white overflow-hidden cursor-pointer group" onclick="window.location.href='{{ route('girls-in-digital-week') }}'">
                        <img class="object-cover aspect-[3/2]" src="/images/digital-girls/banner_bg.png" />
                        <div class="p-6 flex justify-between items-center">
                            <p class="text-dark-blue text-lg p-0 font-semibold">Girls in Digital</p>
                            <span class="bg-yellow group-hover:bg-primary rounded-full min-w-12 min-h-12 duration-300 flex justify-center items-center">
                                <img class="-rotate-90" src="/images/digital-girls/arrow.svg" />
                            </span>
                        </div>
                    </div>
                    <div class="rounded-lg bg-white overflow-hidden cursor-pointer group" onclick="window.location.href='{{ route('dance') }}'">
                        <img class="object-cover aspect-[3/2]" src="/images/educational-resources/dance_challenges.png" />
                        <div class="p-6 flex justify-between items-center">
                            <p class="text-dark-blue text-lg p-0 font-semibold">Dance Challenge</p>
                            <span class="bg-yellow group-hover:bg-primary rounded-full min-w-12 min-h-12 duration-300 flex justify-center items-center">
                                <img class="-rotate-90" src="/images/digital-girls/arrow.svg" />
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="relative overflow-hidden">
            <div class="relative py-10 md:py-20 codeweek-container-lg flex justify-center">
                <div class="w-full bg-light-blue rounded-lg p-6 flex flex-col md:flex-row text-['Blinker'] gap-2">
                    <img class="min-w-8 min-h-8" src="/images/icon_info.svg" />
                    <div class="text-slate-500">
                        <p class="font-semibold text-xl p-0">Copyright notice ©</p>
                        <p class="font-normal text-xl p-0">
                            <span class="font-semibold text-xl text-dark-blue underline">The EU Code Week website</span> is a service supported by the European Commission Except where stated otherwise, content made available on this site is licensed under a <span class="font-semibold text-xl text-dark-blue underline">Creative Commons Attribution-NonCommercial-ShareAlike 4.0 International (CC BY-NC-SA 4.0) license</span> Licensing under Creative Commons licenses does not of itself affect the ownership of the copyright Content from third party websites is subject to their own copyright restrictions; please refer to the site of origin for more information.
                        </p>
                    </div>
                </div>
            </div>
        </section>
    </section>
@endsection