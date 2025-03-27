@extends('layout.new_base')

@php
    $list = [
      (object) ['label' => 'Educational Resources', 'href' => '/educational-resources'],
      (object) ['label' => 'Webinars', 'href' => ''],
    ];

    $results = [
         [
            'image' => '/images/webinars/webinar_blog.png',
            'time' => '25:00',
            'title' => 'Unlocking the Power of AI in Education',
            'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. ',
            'date' => '13 Jan 2025',
            'label' => 'Coming soon',
            'link' => '/'
        ],
        [
            'image' => '/images/webinars/webinar_blog.png',
            'time' => '25:00',
            'title' => 'Unlocking the Power of AI in Education',
            'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. ',
            'date' => '13 Jan 2025',
            'label' => 'Coming soon',
            'link' => '/'
        ],
        [
            'image' => '/images/webinars/webinar_blog.png',
            'time' => '25:00',
            'title' => 'Unlocking the Power of AI in Education',
            'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. ',
            'date' => '13 Jan 2025',
            'label' => 'Coming soon',
            'link' => '/'
        ],
        [
            'image' => '/images/webinars/webinar_blog.png',
            'time' => '25:00',
            'title' => 'Unlocking the Power of AI in Education',
            'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. ',
            'date' => '13 Jan 2025',
            'label' => 'Coming soon',
            'link' => '/'
        ],
        [
            'image' => '/images/webinars/webinar_blog.png',
            'time' => '25:00',
            'title' => 'Unlocking the Power of AI in Education',
            'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. ',
            'date' => '13 Jan 2025',
            'label' => 'Coming soon',
            'link' => '/'
        ],
        [
            'image' => '/images/webinars/webinar_blog.png',
            'time' => '25:00',
            'title' => 'Unlocking the Power of AI in Education',
            'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. ',
            'date' => '13 Jan 2025',
            'label' => 'Coming soon',
            'link' => '/'
        ],
    ];
@endphp
@section('layout.breadcrumb')
    @include('layout.breadcrumb', ['list' => $list])
@endsection

@section('title', 'Coding at Home – Fun & Educational Activities for All')
@section('description', 'Explore EU Code Week’s Coding at Home series—fun, interactive coding activities for kids, families, and educators.')

@section('content')
    <section id="webinars-page" class="font-['Blinker'] overflow-hidden">
        <section class="relative flex overflow-hidden">
            <div class="flex relative transition-all w-full bg-orange-gradient pt-32 pb-0 md:py-20">
                <div class="w-full overflow-hidden pb-10 md:p-0 flex flex-col md:flex-row justify-end md:items-center flex-shrink-0">
                    <div class="codeweek-container-lg flex flex-col md:flex-row md:items-center duration-1000 gap-28 md:gap-4 xl:gap-28">
                        <div class="order-1 flex-1 px-6 py-10 md:px-14 md:py-[4.5rem] bg-white rounded-[32px] z-10 relative">
                            <h2 class="text-[#1C4DA1] text-[30px] md:text-[60px] leading-9 md:leading-[72px] font-normal font-['Montserrat'] mb-4 max-md:max-w-full max-w-[532px]">
                                Webinars
                            </h2>
                            <p class="text-xl font-normal md:text-2xl leading-8 text-[#333E48] p-0 mb-4 max-md:max-w-full max-w-[525px]">
                                Discover a range of free webinars to boost your coding skills and knowledge. Tune in and learn from experts at your own pace!
                            </p>
                            <span class="text-dark-blue font-semibold text-lg ">
                                <a href="/" class="cursor-pointer text-dark-blue underline mr-1">
                                    Optional secondary CTA introduction to webinars
                                </a>
                                ›
                            </span>

                        </div>
                        <div class="order-0 md:order-2 flex flex-1 justify-center items-center z-10">
{{--                            <button class="bg-yellow hover:bg-primary rounded-full w-20 h-20 duration-300 flex justify-center items-center">--}}
{{--                                <img class="duration-300 ml-2" src="/images/fi_play.svg" />--}}
{{--                            </button>--}}
                        </div>
                        <img
                                class="absolute top-0 -left-1/4 w-[150vw] !max-w-none md:hidden"
                                loading="lazy"
                                src="/images/training/training_bg.png"
                                style="clip-path: ellipse(71% 73% at 40% 20%);"
                        />
                        <img
                                class="absolute top-0 right-0 h-full max-w-[calc(70vw)] object-cover hidden md:block"
                                loading="lazy"
                                src="/images/training/training_bg.png"
                                style="clip-path: ellipse(70% 140% at 70% 25%);"
                        />
                    </div>
                </div>
            </div>
        </section>

        <section class="relative z-10">
            <div class="relative py-10 md:py-20 codeweek-container-lg flex justify-center">
                <div class="w-full max-w-[880px] gap-2 z-10">
                    <h2 class="text-dark-blue text-2xl md:text-4xl leading-[44px] font-medium font-['Montserrat'] mb-6">
                        Webinars
                    </h2>
                    <p class="text-[#20262C] font-normal text-lg md:text-2xl p-0 mb-6">
                        Organised by the EU Code Week team, this webinar series is designed to support the organisation of events and activities. This series brings together experts, educators, and enthusiasts to explore the fascinating intersection of coding and digital creativity.
                        Whether you're a teacher looking to enrich your curriculum, a student eager to expand your skills, or a coding enthusiast interested in the latest educational trends, this series has something for everyone.
                    </p>
                    <p class="text-[#333E48] font-normal text-lg md:text-xl p-0">
                        All recordings are also available as YouTube playlists: <br />
                        2024 Webinar Series: <a class="text-dark-blue underline" target="_blank" href="https://www.youtube.com/playlist?list=PLnqp3yQre_1gaiLYx-_QIB6NMYLOhrAcf">https://www.youtube.com/playlist?list=PLnqp3yQre_1gaiLYx-_QIB6NMYLOhrAcf</a> <br />
                        2025 Webinar Series:  <a class="text-dark-blue underline" target="_blank" href="https://www.youtube.com/playlist?list=PLnqp3yQre_1iU1qMK7vMSzC_jfMkqxXky">https://www.youtube.com/playlist?list=PLnqp3yQre_1iU1qMK7vMSzC_jfMkqxXky</a>
                    </p>
                </div>
            </div>
            <div
                    class="animation-element move-background duration-[1.5s] absolute z-0 bottom-10 md:bottom-auto md:top-1/3 -right-14 md:-right-40 w-28 md:w-72 h-28 md:h-72 bg-[#FFEF99] rounded-full hidden lg:block"
                    style="transform: translate(-16px, -24px)"
            ></div>
            <div
                    class="animation-element move-background duration-[1.5s] absolute z-0 lg:-bottom-20 xl:-bottom-32 right-40 w-28 h-28 hidden lg:block bg-[#FFEF99] rounded-full"
                    style="transform: translate(-16px, -24px)"
            ></div>
        </section>

        <section class="relative overflow-hidden">
            <div class="absolute w-full h-full bg-yellow-50 md:hidden" style="clip-path: ellipse(370% 90% at 38% 90%);"></div>
            <div class="absolute w-full h-full bg-yellow-50 hidden md:block lg:hidden" style="clip-path: ellipse(488% 90% at 50% 90%);"></div>
            <div class="absolute w-full h-full bg-yellow-50 hidden lg:block xl:hidden" style="clip-path: ellipse(188% 90% at 50% 90%);"></div>
            <div class="absolute w-full h-full bg-yellow-50 hidden xl:block" style="clip-path: ellipse(108% 90% at 50% 90%);"></div>
            <div class="codeweek-container-lg relative pt-20 pb-16 md:pt-40 md:pb-28">
                <div class="grid grid-cols-1 lg:grid-cols-2 xl:grid-cols-3 gap-6 xl:gap-10">
                    @foreach($results as $result)
                        <div class="flex flex-col rounded-lg bg-white overflow-hidden">
                            <div class="relative">
                                <a href="{{ $result['link'] }}" class="w-full">
                                    <img src="{{ $result['image'] }}" class="w-full" />
                                </a>
                                <div class="absolute bottom-0 translate-y-1/2 left-6 px-4 py-1 bg-[#FFD700] rounded-full text-[#164194] font-semibold text-[16px] leading-[22px] pointer-events-none">
                                    {{ $result['label'] }}
                                </div>
                            </div>
                            <div class="block flex-grow px-6 py-8">
                                <a  href="{{ $result['link'] }}" class="text-dark-blue text-lg p-0 font-semibold mb-2 font-['Montserrat']">
                                    {{ $result['title'] }}
                                </a>
                                <p class="text-slate-500 text-default p-0 font-bold mb-2 font-['Blinker']">
                                    {{ $result['date'] }}
                                </p>
                                <p class="text-[#333E48] font-normal text-[16px] leading-[22px] p-0 mb-4">
                                    {{ $result['description'] }}
                                </p>
                                <a
                                    class="flex justify-center items-center gap-2 text-[#1C4DA1] border-solid border-2 border-[#1C4DA1] rounded-full py-2.5 px-8 font-semibold text-lg transition-all duration-300 hover:bg-[#E8EDF6] group"
                                    href="/"
                                >
                                    <span>Register</span>
                                    <div class="flex gap-2 w-4 overflow-hidden">
                                        <img src="/images/arrow-right-icon.svg" class="min-w-4 duration-500 transform -translate-x-6 group-hover:translate-x-0" />
                                        <img src="/images/arrow-right-icon.svg" class="min-w-4 duration-500 transform -translate-x-6 group-hover:translate-x-0" />
                                    </div>
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    </section>
@endsection