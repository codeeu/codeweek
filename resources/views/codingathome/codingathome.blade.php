@extends('layout.new_base')

@php
    $list = [
      (object) ['label' => 'Educational Resources', 'href' => '/educational-resources'],
      (object) ['label' => 'Coding@Home', 'href' => ''],
    ];

    $results = [
         [
            'image' => '/img/codingathome/0.jpg',
            'time' => '25:00',
            'title' => 'coding-at-home.intro.title',
            'description' => 'coding-at-home.intro.text',
            'label' => 'Label',
            'link' => 'codingathome-introduction'
        ],
        [
            'image' => '/img/codingathome/1.jpg',
            'time' => '25:00',
            'title' => 'coding-at-home.explorer.title',
            'description' => 'coding-at-home.explorer.text',
            'label' => 'Label',
            'link' => 'codingathome-the-explorer'
        ],
        [
            'image' => '/img/codingathome/2.jpg',
            'time' => '25:00',
            'title' => 'coding-at-home.right-and-left.title',
            'description' => 'coding-at-home.right-and-left.text',
            'label' => 'Label',
            'link' => 'codingathome-right-and-left'
        ],
        [
            'image' => '/img/codingathome/3.jpg',
            'time' => '25:00',
            'title' => 'coding-at-home.keep-off-my-path.title',
            'description' => 'coding-at-home.keep-off-my-path.text',
            'label' => 'Label',
            'link' => 'codingathome-keep-off-my-path'
        ],
        [
            'image' => '/img/codingathome/4.jpg',
            'time' => '25:00',
            'title' => 'coding-at-home.tug-of-war.title',
            'description' => 'coding-at-home.tug-of-war.text',
            'label' => 'Label',
            'link' => 'codingathome-tug-of-war'
        ],
        [
            'image' => '/img/codingathome/5.jpg',
            'time' => '25:00',
            'title' => 'coding-at-home.explorer-without-footprints.title',
            'description' => 'coding-at-home.explorer-without-footprints.text',
            'label' => 'Label',
            'link' => 'codingathome-explorer-without-footprints'
        ],
        [
            'image' => '/img/codingathome/6.jpg',
            'time' => '25:00',
            'title' => 'coding-at-home.walk-as-long-as-you-can.title',
            'description' => 'coding-at-home.walk-as-long-as-you-can.text',
            'label' => 'Label',
            'link' => 'codingathome-walk-as-long-as-you-can'
        ],
//        [
//            'image' => '/img/codingathome/7.jpg',
//            'time' => '25:00',
//            'title' => 'coding-at-home.ada-charles-roby.title',
//            'description' => 'coding-at-home.ada-charles-roby.text',
//            'label' => 'Label',
//            'link' => 'codingathome-ada-charles-roby'
//        ],
        [
            'image' => '/img/codingathome/8.jpg',
            'time' => '25:00',
            'title' => 'coding-at-home.cody-and-roby.title',
            'description' => 'coding-at-home.cody-and-roby.text',
            'label' => 'Label',
            'link' => 'codingathome-cody-and-roby'
        ],
        [
            'image' => '/img/codingathome/9.jpg',
            'time' => '25:00',
            'title' => 'coding-at-home.the-tourist.title',
            'description' => 'coding-at-home.the-tourist.text',
            'label' => 'Label',
            'link' => 'codingathome-the-tourist'
        ],
        [
            'image' => '/img/codingathome/10.png',
            'time' => '25:00',
            'title' => 'coding-at-home.catch-the-robot.title',
            'description' => 'coding-at-home.catch-the-robot.text',
            'label' => 'Label',
            'link' => 'codingathome-catch-the-robot'
        ],
        [
            'image' => '/img/codingathome/12.png',
            'time' => '25:00',
            'title' => 'coding-at-home.the-snake.title',
            'description' => 'coding-at-home.the-snake.text',
            'label' => 'Label',
            'link' => 'codingathome-the-snake'
        ],
        [
            'image' => '/img/codingathome/11.png',
            'time' => '25:00',
            'title' => 'coding-at-home.storytelling.title',
            'description' => 'coding-at-home.storytelling.text',
            'label' => 'Label',
            'link' => 'codingathome-storytelling'
        ],
        [
            'image' => '/img/codingathome/13.png',
            'time' => '25:00',
            'title' => 'coding-at-home.two-snakes.title',
            'description' => 'coding-at-home.two-snakes.text',
            'label' => 'Label',
            'link' => 'codingathome-two-snakes'
        ],
        [
            'image' => '/img/codingathome/14.png',
            'time' => '25:00',
            'title' => 'coding-at-home.round-trip.title',
            'description' => 'coding-at-home.round-trip.text',
            'label' => 'Label',
            'link' => 'codingathome-round-trip'
        ],
        [
            'image' => '/img/codingathome/15.png',
            'time' => '25:00',
            'title' => 'coding-at-home.meeting-point.title',
            'description' => 'coding-at-home.meeting-point.text',
            'label' => 'Label',
            'link' => 'codingathome-meeting-point'
        ],
        [
            'image' => '/img/codingathome/16.png',
            'time' => '25:00',
            'title' => 'coding-at-home.follow-the-music.title',
            'description' => 'coding-at-home.follow-the-music.text',
            'label' => 'Label',
            'link' => 'codingathome-follow-the-music'
        ],
        [
            'image' => '/img/codingathome/17.png',
            'time' => '25:00',
            'title' => 'coding-at-home.colour-everything.title',
            'description' => 'coding-at-home.colour-everything.text',
            'label' => 'Label',
            'link' => 'codingathome-colour-everything'
        ],
        [
            'image' => '/img/codingathome/18.png',
            'time' => '25:00',
            'title' => 'coding-at-home.codyplotter-and-codyprinter.title',
            'description' => 'coding-at-home.codyplotter-and-codyprinter.text',
            'label' => 'Label',
            'link' => 'codingathome-codyplotter-and-codyprinter'
        ],
        [
            'image' => '/img/codingathome/19.png',
            'time' => '25:00',
            'title' => 'coding-at-home.boring-pixels.title',
            'description' => 'coding-at-home.boring-pixels.text',
            'label' => 'Label',
            'link' => 'codingathome-boring-pixels'
        ],
        [
            'image' => '/img/codingathome/20.png',
            'time' => '25:00',
            'title' => 'coding-at-home.turning-code-into-pictures.title',
            'description' => 'coding-at-home.turning-code-into-pictures.text.1',
            'label' => 'Label',
            'link' => 'codingathome-turning-code-into-pictures'
        ],
    ];
@endphp
@section('layout.breadcrumb')
    @include('layout.breadcrumb', ['list' => $list])
@endsection

@section('title', 'Coding at Home – Fun & Educational Activities for All')
@section('description', 'Explore EU Code Week’s Coding at Home series—fun, interactive coding activities for kids, families, and educators.')

@section('content')
    <section id="coding-at-home-page" class="font-['Blinker'] overflow-hidden">
        <section class="relative flex overflow-hidden">
            <div class="flex relative transition-all w-full bg-orange-gradient pt-32 pb-0 md:py-20">
                <div class="w-full overflow-hidden pb-10 md:p-0 flex flex-col md:flex-row justify-end md:items-center flex-shrink-0">
                    <div class="codeweek-container-lg flex flex-col md:flex-row md:items-center duration-1000 gap-28 md:gap-4 xl:gap-28">
                        <div class="order-1 flex-1 px-6 py-10 md:px-14 md:py-[4.5rem] bg-white rounded-[32px] z-10 relative">
                            <h2 class="text-[#1C4DA1] text-[30px] md:text-[60px] leading-9 md:leading-[72px] font-normal font-['Montserrat'] mb-4 max-md:max-w-full max-w-[532px]">
                                Coding@Home – video tutorials
                            </h2>
                            <p class="text-xl font-normal md:text-2xl leading-8 text-[#333E48] p-0 mb-0 max-md:max-w-full max-w-[525px]">
                                A collection of short videos, do-it-yourself materials, puzzles, games, and coding challenges for everyday use in the family as well as at school.
                            </p>
                        </div>
                        <div class="order-0 md:order-2 flex flex-1 justify-center items-center z-10">
                            <button class="bg-yellow hover:bg-primary rounded-full w-20 h-20 duration-300 flex justify-center items-center">
                                <img class="duration-300 ml-2" src="/images/fi_play.svg" />
                            </button>
                        </div>
                        <img
                            class="absolute top-0 -left-1/4 w-[150vw] !max-w-none md:hidden"
                            loading="lazy"
                            src="/images/coding-home/coding_home_bg.png"
                            style="clip-path: ellipse(71% 73% at 40% 20%);"
                        />
                        <img
                            class="absolute top-0 right-0 h-full max-w-[calc(70vw)] object-cover hidden md:block"
                            loading="lazy"
                            src="/images/coding-home/coding_home_bg.png"
                            style="clip-path: ellipse(70% 140% at 70% 25%);"
                        />
                    </div>
                </div>
            </div>
        </section>

        <section class="relative z-10">
            <div class="relative py-10 md:py-20 codeweek-container-lg flex justify-center">
                <div class="w-full max-w-[880px] gap-2">
                    <h2 class="text-dark-blue text-2xl md:text-4xl leading-[44px] font-medium font-['Montserrat'] mb-6">
                        Coding@home optional section
                    </h2>
                    <p class="text-[#20262C] font-normal text-lg md:text-2xl p-0 mb-6">
                        EU Code Week’s Coding@Home series builds on the <a class="underline" href="https://www.raicultura.it/speciali/codinginfamiglia/" target="_blank">“Coding in famiglia”</a> initiative of the University of Urbino and the CodeMOOCnet Association in cooperation with Rai Cultura. The author of Coding@Home video is Alessandro Bogliolo, a Professor of Information Processing Systems at the University of Urbino, an <a class="underline" href="https://codeweek.eu/ambassadors?country_iso=IT" target="_blank">Italian EU Code Week ambassador</a> and the coordinator of all ambassadors as well as a member of the Governing Board of the Digital Skills and Jobs Coalition.
                    </p>
                    <p class="text-[#333E48] font-normal text-lg md:text-xl p-0">
                        You do not need any previous knowledge or electronic devices to do the activities. The activities will stimulate computational thinking and cultivate the skills of pupils, parents and teachers at home or at school
                    </p>
                </div>
            </div>
            <div
                class="animation-element move-background duration-[1.5s] absolute z-0 bottom-10 md:bottom-auto md:top-1/3 -right-14 md:-right-40 w-28 md:w-72 h-28 md:h-72 bg-[#FFEF99] rounded-full hidden lg:block"
                style="transform: translate(-16px, -24px)"
            ></div>
            <div
                class="animation-element move-background duration-[1.5s] absolute z-0 lg:-bottom-20 xl:-bottom-28 right-40 w-28 h-28 hidden lg:block bg-[#FFEF99] rounded-full"
                style="transform: translate(-16px, -24px)"
            ></div>
        </section>

        <section class="relative overflow-hidden">
            <div class="absolute w-full h-full bg-yellow-50 md:hidden" style="clip-path: ellipse(570% 90% at 38% 90%);"></div>
            <div class="absolute w-full h-full bg-yellow-50 hidden md:block lg:hidden" style="clip-path: ellipse(488% 90% at 50% 90%);"></div>
            <div class="absolute w-full h-full bg-yellow-50 hidden lg:block xl:hidden" style="clip-path: ellipse(288% 90% at 50% 90%);"></div>
            <div class="absolute w-full h-full bg-yellow-50 hidden xl:block" style="clip-path: ellipse(168% 90% at 50% 90%);"></div>
            <div class="codeweek-container-lg relative pt-20 pb-16 md:pt-40 md:pb-28">
                <div class="grid grid-cols-1 lg:grid-cols-2 xl:grid-cols-3 gap-6 xl:gap-10">
                    @foreach($results as $result)
                    <div class="flex flex-col rounded-lg bg-white overflow-hidden">
                        <div class="relative">
                            <a href="{{ route($result['link']) }}">
                                <img src="{{ $result['image'] }}" />
                            </a>
                            <div class="bg-white rounded-full w-12 h-12 flex justify-center items-center absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 pointer-events-none">
                                <img class="w-6 ml-1" src="/images/fi_play.svg" />
                            </div>
                            <div class="absolute bg-[#1C4DA1CC] px-2 py-1 rounded-md bottom-2.5 right-2.5 text-white font-semibold text-sm pointer-events-none">
                                {{ $result['time'] }}
                            </div>
                            <div class="absolute bottom-0 translate-y-1/2 left-6 px-4 py-1 bg-[#FFD700] rounded-full text-[#164194] font-semibold text-[16px] leading-[22px] pointer-events-none">
                                {{ $result['label'] }}
                            </div>
                        </div>
                        <a class="block flex-grow px-6 py-8" href="{{ route($result['link']) }}">
                            <p class="text-dark-blue text-lg p-0 font-semibold mb-2 font-['Montserrat']">
                                @lang($result['title'])
                            </p>
                            <p class="text-[#333E48] font-normal text-[16px] leading-[22px] p-0">
                                @lang($result['description'])
                            </p>
                        </a>
                    </div>
                    @endforeach
                </div>

{{--                <div class="mt-6 lg:mt-10">--}}
{{--                    {{ $results->links('vendor.livewire.pagination') }}--}}
{{--                </div>--}}
            </div>
        </section>
    </section>
@endsection