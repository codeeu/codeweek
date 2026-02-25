@extends('layout.new_base')

@php
    $list = [
        (object) ['label' => 'Educational Resources', 'href' => '/educational-resources'],
        (object) ['label' => 'Hackathons', 'href' => ''],
    ];

    $hasHackathonsPageTable = \Illuminate\Support\Facades\Schema::hasTable('hackathons_page');
    $page = $hasHackathonsPageTable ? \App\HackathonsPage::config() : null;
    $dynamic = $page && $page->dynamic_content;
@endphp

@section('layout.breadcrumb')
    @include('layout.breadcrumb', ['list' => $list])
@endsection

@section('title', 'EU Code Week Hackathons – Innovate, Code & Compete')
@section('description', 'Join EU Code Week Hackathons, where young minds collaborate to solve real-world challenges through coding and innovation.')

@section('content')
    <section id="hackathons-page" class="font-['Blinker'] overflow-hidden">
        <section class="flex overflow-hidden relative">
            <div class="flex relative pt-32 pb-0 w-full transition-all bg-orange-gradient md:py-32">
                <div class="flex overflow-hidden flex-col flex-shrink-0 justify-end pb-10 w-full md:p-0 md:flex-row md:items-center">
                    <div class="flex flex-col gap-28 duration-1000 codeweek-container-lg md:flex-row md:items-center md:gap-4 xl:gap-28">
                        <div class="order-1 flex-1 px-6 py-10 md:px-14 md:py-[4.5rem] bg-white rounded-[32px] z-10 relative">
                            <h2 class="text-[#1C4DA1] text-[30px] md:text-[60px] leading-9 md:leading-[72px] font-normal font-['Montserrat'] mb-4 max-md:max-w-full max-w-[532px]">
                                @if($dynamic && $page && $page->contentForLocale('hero_title'))
                                    {{ $page->contentForLocale('hero_title') }}
                                @else
                                    Hackathons
                                @endif
                            </h2>
                            <p class="text-xl font-normal md:text-2xl leading-8 text-[#333E48] p-0 max-md:max-w-full max-w-[525px]">
                                @if($dynamic && $page && $page->contentForLocale('hero_subtitle'))
                                    {!! $page->contentForLocale('hero_subtitle') !!}
                                @else
                                    Bring your ideas to life!
                                @endif
                            </p>
                        </div>
                        <div class="flex z-10 flex-1 justify-center items-center order-0 md:order-2">

                        </div>
                        <img
                            class="absolute top-0 -left-1/4 w-[150vw] !max-w-none md:hidden"
                            loading="lazy"
                            src="/images/hackathons/hackathons_bg.png"
                            style="clip-path: ellipse(71% 73% at 40% 20%);"
                        />
                        <img
                            class="absolute top-0 right-0 h-full max-w-[calc(70vw)] object-cover hidden md:block"
                            loading="lazy"
                            src="/images/hackathons/hackathons_bg.png"
                            style="clip-path: ellipse(70% 140% at 70% 25%);"
                        />
                    </div>
                </div>
            </div>
        </section>

        <section class="relative z-10">
            <div class="flex relative z-10 justify-center py-10 md:py-20 codeweek-container-lg">
                <div class="w-full max-w-[880px] gap-2">
                    <h2 class="text-dark-blue text-[22px] md:text-4xl leading-7 md:leading-[44px] font-medium font-['Montserrat'] mb-6">
                        @if($dynamic && $page && $page->contentForLocale('intro_title'))
                            {{ $page->contentForLocale('intro_title') }}
                        @else
                            Hackathons
                        @endif
                    </h2>
                    <p class="text-[#20262C] font-normal text-lg md:text-2xl p-0 mb-6">
                        @if($dynamic && $page && $page->contentForLocale('intro_paragraph_1'))
                            {!! $page->contentForLocale('intro_paragraph_1') !!}
                        @else
                            A hackathon is an event where participants with diverse skills collaborate to tackle global challenges. Participants form teams to brainstorm, design, and code, aiming to produce a working solution or prototype by the event's conclusion. Beyond fostering innovation and teamwork, EU Code Week hackathons offer a platform for young enthusiasts to learn, showcase their talents, and connect with like-minded peers.
                        @endif
                    </p>
                    <p class="text-[#333E48] font-normal text-[16px] md:text-xl leading-[22px] md:leading-[30px] p-0">
                        @if($dynamic && $page && $page->contentForLocale('intro_paragraph_2'))
                            {!! $page->contentForLocale('intro_paragraph_2') !!}
                        @else
                            Adapting the traditional hackathon format, the EU Code Week Hackathons take into consideration the age of the participants and cater to the unique skills, insights, and interests of adolescents.
                            The aim of the EU Code Week Hackathons is to inspire young people to develop their coding and problem-solving skills by engaging them in collaborative, creative, and innovative projects.
                        @endif
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

        <section class="overflow-hidden relative">
            <div class="absolute w-full h-full bg-yellow-50 md:hidden" style="clip-path: ellipse(270% 90% at 38% 90%);"></div>
            <div class="hidden absolute w-full h-full bg-yellow-50 md:block lg:hidden" style="clip-path: ellipse(188% 90% at 50% 90%);"></div>
            <div class="hidden absolute w-full h-full bg-yellow-50 lg:block xl:hidden" style="clip-path: ellipse(128% 90% at 50% 90%);"></div>
            <div class="hidden absolute w-full h-full bg-yellow-50 xl:block" style="clip-path: ellipse(93% 90% at 50% 90%);"></div>
            <div class="relative pt-20 pb-16 codeweek-container-lg md:pt-40 md:pb-28">
                <div class="flex flex-col gap-6 lg:flex-row lg:gap-20">
                    <div class="flex overflow-hidden relative flex-1 items-center">
                        <img src="{{asset('images/hackathons/hackathon.png')}}" class="object-cover h-full rounded-lg">
                        <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2">
                            @include('layout.video-player', [
                                'id' => 'hackathons-video',
                                'src' => ($dynamic && $page && $page->video_url) ? $page->video_url : 'https://www.youtube.com/embed/fx0zJCpUTa8',
                            ])
                        </div>
                    </div>
                    <div class="flex-1">
                        <p class="text-dark-blue text-[22px] md:text-4xl font-medium font-['Montserrat'] mb-6 p-0">
                            @if($dynamic && $page && $page->contentForLocale('details_title'))
                                {{ $page->contentForLocale('details_title') }}
                            @else
                                EU Code Week Hackathons 2025-26
                            @endif
                        </p>
                        <p class="text-slate-500 font-normal text-[16px] md:text-xl leading-[22px] md:leading-[30px] p-0 mb-6">
                            @if($dynamic && $page && $page->contentForLocale('details_paragraph_1'))
                                {!! $page->contentForLocale('details_paragraph_1') !!}
                            @else
                                EU Code Week Hackathons share a common theme that strengthens connection and belonging among young innovators across Europe. The central theme for the 2025 edition is <strong>From Code to Community: Bridging Digital Skills and Social Impact.</strong></span>.
                            @endif
                        </p>
                        <p class="text-slate-500 font-normal text-[16px] md:text-xl leading-[22px] md:leading-[30px] p-0 mb-6">
                            @if($dynamic && $page && $page->contentForLocale('details_paragraph_2'))
                                {!! $page->contentForLocale('details_paragraph_2') !!}
                            @else
                                The ten national hackathons — <strong><a href="https://codeweek.eu/blog/hackathons-italy/">Italy (Florence)</a>, <a href="https://codeweek.eu/blog/hackathons-italy/">Italy (Turin)</a>, <a href="https://codeweek.eu/blog/greek-hackathon-2025/">Greece</a>, <a href="https://codeweek.eu/blog/eu-code-week-hackathons-croatia/">Croatia</a>, <a href="https://codeweek.eu/blog/eu-code-week-hackathons-ukraine/">Ukraine</a>, Turkey, Spain, Lithuania, <a href="https://codeweek.eu/blog/eu-code-week-hackathons-slovenia/">Slovenia</a>, and France</strong> — mark a vibrant journey of creativity and collaboration. <strong>Italy (Florence)</strong> opened the series with its event in October 2025, while all other national hackathons are taking place <strong>from now until the end of January 2026</strong>. Each event invites teams of young people aged 15 to 19 to learn, innovate, and develop digital solutions that tackle real societal challenges.
                            @endif
                        </p>
                        <p class="text-slate-500 font-normal text-[16px] md:text-xl leading-[22px] md:leading-[30px] p-0 mb-6">
                            @if($dynamic && $page && $page->contentForLocale('details_paragraph_3'))
                                {!! $page->contentForLocale('details_paragraph_3') !!}
                            @else
                               Join us online for the <strong>EU Finals on 11 March 2026</strong>, where all national finalists will present their projects and celebrate their shared achievements. Expect inspiring ideas, expert jury insights, and plenty of positive energy — a celebration of how young people use technology to make a difference.
                            @endif
                        </p>
                        <p class="text-slate-500 font-normal text-[16px] md:text-xl leading-[22px] md:leading-[30px] p-0 mb-6">
                            @if($dynamic && $page && $page->contentForLocale('details_paragraph_4'))
                                {!! $page->contentForLocale('details_paragraph_4') !!}
                            @else
                                Be part of the excitement as we honour the outstanding teams shaping the future of digital innovation!</span>!
                            @endif
                        </p>
                        <div class="flex flex-col gap-x-2 gap-y-4 tablet:flex-row lg:flex-col 2xl:flex-row">
                            @if($dynamic && $page && $page->extra_button_link && $page->contentForLocale('extra_button_text'))
                                <a
                                    class="inline-block bg-primary hover:bg-hover-orange rounded-full py-4 px-6 md:px-10 font-semibold text-base w-full md:w-auto text-center text-[#20262C] transition-all duration-300"
                                    target="_blank" href="{{ $page->extra_button_link }}"
                                >
                                    {{ $page->contentForLocale('extra_button_text') }}
                                </a>
                            @endif
                            <a
                                class="inline-block bg-primary hover:bg-hover-orange rounded-full py-4 px-6 md:px-10 font-semibold text-base w-full md:w-auto text-center text-[#20262C] transition-all duration-300"
                                target="_blank" href="{{ ($dynamic && $page && $page->recap_button_link) ? $page->recap_button_link : 'https://eventornado.com/event/eu-codeweek-hackathon2024#Finals%20-%20EU%20Code%20Week%20Hackathon%202024' }}"
                            >
                                @if($dynamic && $page && $page->contentForLocale('recap_button_text'))
                                    {{ $page->contentForLocale('recap_button_text') }}
                                @else
                                    Hackathons Final 2024 Recap
                                @endif
                            </a>
                            <a
                                class="flex justify-center items-center gap-2 text-[#1C4DA1] border-solid border-2 border-[#1C4DA1] rounded-full py-3 px-8 font-semibold text-lg transition-all duration-300 hover:bg-[#E8EDF6] group"
                                target="_blank" href="{{ ($dynamic && $page && $page->toolkit_button_link) ? $page->toolkit_button_link : '/docs/C4EU_D2.7 Code Week Event Hackathon Design & Toolkit Final 18.06.2025.pdf' }}"
                            >
                                <span>
                                    @if($dynamic && $page && $page->contentForLocale('toolkit_button_text'))
                                        {{ $page->contentForLocale('toolkit_button_text') }}
                                    @else
                                        Hackathon 2025 Toolkit
                                    @endif
                                </span>
                                <div class="flex overflow-hidden gap-2 w-4">
                                    <img src="/images/arrow-right-icon.svg" class="duration-500 transform -translate-x-6 min-w-4 group-hover:translate-x-0" />
                                    <img src="/images/arrow-right-icon.svg" class="duration-500 transform -translate-x-6 min-w-4 group-hover:translate-x-0" />
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </section>
@endsection
