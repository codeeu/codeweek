@extends('layout.new_base')

@php
    $list = [
        (object) ['label' => 'Educational Resources', 'href' => '/educational-resources'],
        (object) ['label' => 'Treasure Hunt', 'href' => ''],
    ];
@endphp

@section('layout.breadcrumb')
    @include('layout.breadcrumb', ['list' => $list])
@endsection

@section('title', 'EU Code Week Treasure Hunt – Fun & Interactive Coding Game')
@section('description', 'Take part in the EU Code Week Treasure Hunt, a digital adventure designed to teach coding in an exciting and interactive way.')

@section('content')
    <section id="treasure-hunt-page" class="font-['Blinker'] overflow-hidden">
        <section class="relative flex overflow-hidden">
            <div class="flex relative transition-all w-full bg-orange-gradient pt-32 pb-0 md:py-32">
                <div class="w-full overflow-hidden pb-10 md:p-0 flex flex-col md:flex-row justify-end md:items-center flex-shrink-0">
                    <div class="codeweek-container-lg flex flex-col md:flex-row md:items-center duration-1000 gap-28 md:gap-4 xl:gap-28">
                        <div class="order-1 flex-1 px-6 py-10 md:px-14 md:py-[4.5rem] bg-white rounded-[32px] z-10 relative">
                            <h2 class="text-[#1C4DA1] text-[30px] md:text-[60px] leading-9 md:leading-[72px] font-normal font-['Montserrat'] mb-4 max-md:max-w-full max-w-[532px]">
                                Treasure Hunt
                            </h2>
                            <p class="text-xl font-normal md:text-2xl leading-8 text-[#333E48] p-0 max-md:max-w-full max-w-[525px]">
                                Simple yet challenging Telegram game – easy for beginners, engaging for experienced players.
                            </p>
                        </div>
                        <div class="order-0 md:order-2 flex flex-1 justify-center items-center z-10"></div>
                        <img
                            class="absolute top-0 -left-1/4 w-[150vw] !max-w-none md:hidden"
                            loading="lazy"
                            src="/images/treasure-hunt/banner_bg.png"
                            style="clip-path: ellipse(71% 73% at 40% 20%);"
                        />
                        <img
                            class="absolute top-0 right-0 h-full max-w-[calc(70vw)] object-cover hidden md:block"
                            loading="lazy"
                            src="/images/treasure-hunt/banner_bg.png"
                            style="clip-path: ellipse(70% 140% at 70% 25%);"
                        />
                    </div>
                </div>
            </div>
        </section>

        <section class="relative z-10">
            <div class="relative z-10 py-10 md:py-20 codeweek-container-lg flex justify-center">
                <div class="w-full max-w-[880px] gap-2">
                    <h2 class="text-dark-blue text-[22px] md:text-4xl leading-7 md:leading-[44px] font-medium font-['Montserrat'] mb-6">
                        Code Week Treasure Hunt
                    </h2>
                    <p class="text-[#20262C] font-normal text-lg md:text-2xl p-0 mb-6">
                        This is a game on Telegram that is simple enough for beginners, but also challenging to keep experienced participants on their toes.
                    </p>
                    <p class="text-[#333E48] font-normal text-[16px] md:text-xl leading-[22px] md:leading-[30px] p-0">
                        <a href="/code-hunting-game" class="text-dark-blue underline">The Code Week Treasure Hunt</a> is a game best played on your PC with a mobile phone in hand. The game will ask you to solve coding challenges and guide you through the history of coding, computer science and technology in Europe.
                    </p>
                </div>
            </div>
            <div
                class="animation-element move-background duration-[1.5s] absolute z-0 bottom-10 md:bottom-auto md:top-1/3 -right-14 md:-right-40 w-28 md:w-72 h-28 md:h-72 bg-[#FFEF99] rounded-full hidden lg:block"
                style="transform: translate(-16px, -24px)"
            ></div>
            <div
                class="animation-element move-background duration-[1.5s] absolute z-0 lg:-bottom-20 xl:-bottom-36 right-40 w-28 h-28 hidden lg:block bg-[#FFEF99] rounded-full"
                style="transform: translate(-16px, -24px)"
            ></div>
        </section>

        <section class="relative overflow-hidden">
            <div class="absolute w-full h-full bg-yellow-50 md:hidden" style="clip-path: ellipse(270% 90% at 38% 90%);"></div>
            <div class="absolute w-full h-full bg-yellow-50 hidden md:block lg:hidden" style="clip-path: ellipse(188% 90% at 50% 90%);"></div>
            <div class="absolute w-full h-full bg-yellow-50 hidden lg:block xl:hidden" style="clip-path: ellipse(128% 90% at 50% 90%);"></div>
            <div class="absolute w-full h-full bg-yellow-50 hidden xl:block" style="clip-path: ellipse(93% 90% at 50% 90%);"></div>
            <div class="codeweek-container-lg relative pt-20 pb-16 md:pt-40 md:pb-28 flex justify-center">
                <div class="w-full max-w-[907px] gap-2">
                    <h2 class="text-dark-blue tablet:text-center text-[22px] md:text-4xl leading-7 md:leading-[44px] font-medium font-['Montserrat'] mb-6 tablet:mb-8">
                        How to play
                    </h2>
                    <div class="relative flex gap-x-8 pb-4 tablet:pb-16">
                        <div class="w-10 h-10 rounded-full flex justify-center items-center text-['#20262C'] font-semibold text-2xl bg-primary">
                            1
                        </div>
                        <div class="absolute after:content-[''] after:block after:w-[2px] after:h-full after:bg-[#5F718A] left-5 bottom-2 top-12 tablet:top-16"></div>
                        <div class="flex-1">
                            <p class="text-slate-500 font-normal text-[16px] md:text-xl leading-[22px] md:leading-[30px] p-0">
                                Download the Telegram app. It is available for <a href="https://desktop.telegram.org/" class="text-dark-blue underline">Desktop</a> (Windows, macOS and Linux), <a href="https://apps.apple.com/app/telegram-messenger/id686449807" class="text-dark-blue underline">iOS</a> and <a href="https://play.google.com/store/apps/details?id=org.telegram.messenger" class="text-dark-blue underline">Android</a> You can play the game either on your PC or laptop, or on your smartphone. We recommend you play it on your computer so that you can get the instructions and solve the coding challenges on the Telegram app on your phone.
                            </p>
                        </div>
                    </div>
                    <div class="relative flex gap-x-8 pb-4 tablet:pb-16">
                        <div class="w-10 h-10 rounded-full flex justify-center items-center text-['#20262C'] font-semibold text-2xl bg-primary">
                            2
                        </div>
                        <div class="absolute after:content-[''] after:block after:w-[2px] after:h-full after:bg-[#5F718A] left-5 bottom-2 top-12 tablet:top-16"></div>
                        <div class="flex-1">
                            <p class="text-slate-500 font-normal text-[16px] md:text-xl leading-[22px] md:leading-[30px] p-0">
                                To play the game, <a href="/code-hunting-game" class="text-dark-blue underline">open the game</a> and scan the QR code that will take you to the Telegram app and give you the first set of instructions.
                            </p>
                        </div>
                    </div>
                    <div class="relative flex gap-x-8 pb-4 tablet:pb-16">
                        <div class="w-10 h-10 rounded-full flex justify-center items-center text-['#20262C'] font-semibold text-2xl bg-primary">
                            3
                        </div>
                        <div class="absolute after:content-[''] after:block after:w-[2px] after:h-full after:bg-[#5F718A] left-5 bottom-2 top-12 tablet:top-16"></div>
                        <div class="flex-1">
                            <p class="text-slate-500 font-normal text-[16px] md:text-xl leading-[22px] md:leading-[30px] p-0">
                                To win, you need to solve 10 coding challenges and find 10 locations on the map of Europe that are linked to the rise of coding and technology.
                            </p>
                        </div>
                    </div>
                    <div class="relative flex gap-x-8 mb-8">
                        <div class="w-10 h-10 rounded-full flex justify-center items-center text-['#20262C'] font-semibold text-2xl bg-primary">
                            4
                        </div>
                        <div class="flex-1">
                            <p class="text-slate-500 font-normal text-[16px] md:text-xl leading-[22px] md:leading-[30px] p-0">
                                After you complete the game, share your score with your friends using #EUCodeWeek and challenge them to play and learn about the history of coding too. Let's see who scores the top results!
                            </p>
                        </div>
                    </div>
                    <div class="w-full bg-white rounded-lg p-6 flex flex-col tablet:flex-row justify-start gap-2">
                        <img class="min-w-8 min-h-8" src="/images/icon_info.svg" />
                        <div class="text-slate-500">
                            <p class="font-normal leading-[22px] text-default tablet:leading-[30px] tablet:text-xl p-0">
                                The Code Week Treasure Hunt is the virtual version of the original EU Code Week Treasure Hunt which was first developed by Alessandro Bogliolo, Professor of Computer Systems at the University of Urbino. To learn more about his original game, visit our <a href="https://blog.codeweek.eu/" class="text-dark-blue underline">blog</a>.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="relative overflow-hidden bg-yellow-50">
            <div class="absolute w-full h-full bg-blue-gradient md:hidden" style="clip-path: ellipse(270% 90% at 38% 90%);"></div>
            <div class="absolute w-full h-full bg-blue-gradient hidden md:block lg:hidden" style="clip-path: ellipse(188% 90% at 50% 90%);"></div>
            <div class="absolute w-full h-full bg-blue-gradient hidden lg:block xl:hidden" style="clip-path: ellipse(128% 90% at 50% 90%);"></div>
            <div class="absolute w-full h-full bg-blue-gradient hidden xl:block" style="clip-path: ellipse(93% 90% at 50% 90%);"></div>
            <div class="codeweek-container-lg relative pt-20 pb-16 md:pt-40 md:pb-28 flex justify-center">
                <div class="flex flex-col lg:flex-row gap-10 lg:gap-20">
                    <div class="relative flex-1 order-1">
                        <img src="{{asset('images/treasure-hunt/get_involved.png')}}" class="w-full object-cover">
                    </div>
                    <div class="flex-1 h-full flex flex-col justify-center order-0 md:order-2">
                        <h2 class="text-white text-[22px] md:text-4xl leading-7 md:leading-[44px] font-medium font-['Montserrat'] mb-6">
                            How to get involved
                        </h2>
                        <p class="text-white font-normal leading-7 text-base tablet:text-xl p-0 mb-6">
                            Can’t wait to start coding? If you would like to join the EU Code Week community but don't know where to start, take a look at these resources that will help get you started, just in time for our annual celebration in October.
                        </p>
                        <div class="mb-6 flex gap-2 items-center"><div class="bg-primary w-3 h-3 rounded-full"></div><a class="text-white font-normal text-base tablet:text-xl hover:underline" href="https://blog.codeweek.eu/getting-started-with-eu-code-week/">@lang('cw2020.get-involved.content.0')</a></div>
                        <div class="mb-6 flex gap-2 items-center"><div class="bg-primary w-3 h-3 rounded-full"></div><a class="text-white font-normal text-base tablet:text-xl hover:underline" href="{{route("guide")}}">@lang('cw2020.get-involved.content.1')</a></div>
                        <div class="mb-6 flex gap-2 items-center"><div class="bg-primary w-3 h-3 rounded-full"></div><a class="text-white font-normal text-base tablet:text-xl hover:underline" href="{{route("training.index")}}">@lang('cw2020.get-involved.content.2')</a></div>
                        <div class="mb-6 flex gap-2 items-center"><div class="bg-primary w-3 h-3 rounded-full"></div><a class="text-white font-normal text-base tablet:text-xl hover:underline" href="https://bit.ly/DEEPDIVE2020">@lang('cw2020.get-involved.content.3')</a></div>
                        <div class="mb-6 flex gap-2 items-center"><div class="bg-primary w-3 h-3 rounded-full"></div><a class="text-white font-normal text-base tablet:text-xl hover:underline" href="{{route("coding@home")}}">@lang('cw2020.get-involved.content.4')</a></div>
                    </div>
                </div>
            </div>
        </section>
    </section>
@endsection
