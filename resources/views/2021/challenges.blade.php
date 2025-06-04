@extends('layout.new_base')

@php
    $list = [
        (object) ['label' => 'Educational Resources', 'href' => '/educational-resources'],
        (object) ['label' => 'Challenges', 'href' => ''],
    ];
@endphp

@section('layout.breadcrumb')
    @include('layout.breadcrumb', ['list' => $list])
@endsection

@section('title', 'Coding Challenges – Test Your Skills with EU Code Week')
@section('description', 'Take on exciting coding challenges designed to boost creativity, problem-solving, and programming skills for all ages.')

<x-tailwind></x-tailwind>

@section('content')
    <section id="challenges-page" class="font-['Blinker'] overflow-hidden">
        <section class="relative flex overflow-hidden">
            <div class="flex relative transition-all w-full bg-orange-gradient pt-32 pb-0 md:py-32">
                <div class="w-full overflow-hidden pb-10 md:p-0 flex flex-col md:flex-row justify-end md:items-center flex-shrink-0">
                    <div class="codeweek-container-lg flex flex-col md:flex-row md:items-center duration-1000 gap-28 md:gap-4 xl:gap-28">
                        <div class="order-1 flex-1 px-6 py-10 md:px-14 md:py-[4.5rem] bg-white rounded-[32px] z-10 relative">
                            <h2 class="text-[#1C4DA1] text-[30px] md:text-[60px] leading-9 md:leading-[72px] font-normal font-['Montserrat'] mb-4 max-md:max-w-full max-w-[532px]">
                                Challenges
                            </h2>
                            <p class="text-xl font-normal md:text-2xl leading-8 text-[#333E48] p-0 max-md:max-w-full max-w-[525px]">
                                @lang('challenges.challenges-text')
                            </p>
                        </div>
                        <div class="order-0 md:order-2 flex flex-1 justify-center items-center z-10"></div>
                        <img
                            class="absolute top-0 -left-1/4 w-[150vw] !max-w-none md:hidden"
                            loading="lazy"
                            src="/img/2021/challenges/banner_bg.png"
                            style="clip-path: ellipse(71% 73% at 40% 20%);"
                        />
                        <img
                            class="absolute top-0 right-0 h-full max-w-[calc(70vw)] object-cover hidden md:block"
                            loading="lazy"
                            src="/img/2021/challenges/banner_bg.png"
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
                        @lang('challenges.challenges-sub-title')
                    </h2>
                    <p class="text-[#20262C] font-normal text-lg md:text-2xl p-0 mb-6">
                        @lang('challenges.challenges-sub-text1')
                    </p>
                    <p class="text-[#333E48] font-normal text-[16px] md:text-xl leading-[22px] md:leading-[30px] p-0">
                        @lang('challenges.challenges-sub-text2')
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
            <div class="absolute w-full h-full bg-yellow-50 md:hidden" style="clip-path: ellipse(570% 90% at 38% 90%);"></div>
            <div class="absolute w-full h-full bg-yellow-50 hidden md:block lg:hidden" style="clip-path: ellipse(488% 90% at 50% 90%);"></div>
            <div class="absolute w-full h-full bg-yellow-50 hidden lg:block xl:hidden" style="clip-path: ellipse(288% 90% at 50% 90%);"></div>
            <div class="absolute w-full h-full bg-yellow-50 hidden xl:block" style="clip-path: ellipse(198% 90% at 50% 90%);"></div>
            <div class="codeweek-container-lg relative pt-20 pb-16 md:pt-40 md:pb-28">
                <div class="grid grid-cols-1 lg:grid-cols-2 xl:grid-cols-3 gap-6 xl:gap-10">
                    @include('2021._thumbnail', ['slug' => 'careers-as-constellations', 'author'=>'Linda Liukas'])
                    @include('2021._thumbnail', ['slug' => 'air-drawing-with-AI', 'author'=>'Kristina Slišurić'])

                    @include('2021._thumbnail', ['slug' => 'coding-with-legoboost', 'author'=>'Lidia Ristea'])

                    @include('2021._thumbnail', ['slug' => 'coding-with-art-through-storytelling', 'author'=>'Maria Tsapara and Anthi Arkouli'])

                    @include('2021._thumbnail', ['slug' => 'app-that-counts-in-several-languages', 'author'=>'Samuel Branco'])


                    @include('2021._thumbnail', ['slug' => 'illustrate-a-joke', 'author'=>'Margot Schubert'])
                    @include('2021._thumbnail', ['slug' => 'let-the-snake-run', 'author'=>'Ágota Klacsákné Tóth'])
                    @include('2021._thumbnail', ['slug' => 'coding-escape-room', 'author'=>'Stefania Altieri and Elisa Baraghini'])
                    @include('2021._thumbnail', ['slug' => 'circle-of-dots', 'author'=>'Marin Popov'])
                    @include('2021._thumbnail', ['slug' => 'craft-magic', 'author'=>'Georgia Lascaris'])
                    @include('2021._thumbnail', ['slug' => 'emobot-kliki', 'author'=>'Margareta Zajkova'])
                    @include('2021._thumbnail', ['slug' => 'play-against-ai', 'author'=>'Kristina Slišurić'])
                    @include('2021._thumbnail', ['slug' => 'create-a-spiral', 'author'=>'Lydie El-Halougi'])


                    @include('2021._thumbnail', ['slug' => 'personal-trainer', 'author'=>'Álvaro Molina Ayuso'])
                    @include('2021._thumbnail', ['slug' => 'code-a-dice', 'author'=>'Fabrizia Agnello'])
                    @include('2021._thumbnail', ['slug' => 'build-calliope', 'author'=>'Amazon Future Engineer | Meet and Code feat. Calliope gGmbH'])
                    @include('2021._thumbnail', ['slug' => 'chatbot'])
                    @include('2021._thumbnail', ['slug' => 'paper-circuit'])
                    @include('2021._thumbnail', ['slug' => 'dance'])
                    @include('2021._thumbnail', ['slug' => 'compose-song'])
                    @include('2021._thumbnail', ['slug' => 'sensing-game'])
                    @include('2021._thumbnail', ['slug' => 'ai-hour-of-code'])
                    @include('2021._thumbnail', ['slug' => 'calming-leds'])
                    @include('2021._thumbnail', ['slug' => 'computational-thinking-and-computational-fluency'])
                    @include('2021._thumbnail', ['slug' => 'create-a-dance', 'author' => 'Code.org'])
                    @include('2021._thumbnail', ['slug' => 'create-a-simulation', 'author' => 'Code.org'])
                    @include('2021._thumbnail', ['slug' => 'create-your-own-masterpiece', 'author' => 'Code.org'])
                    @include('2021._thumbnail', ['slug' => 'cs-first-unplugged-activities', 'author' => 'Google'])
                    @include('2021._thumbnail', ['slug' => 'family-care', 'author'=>'Allen Yan / MakeX'])
                    @include('2021._thumbnail', ['slug' => 'virtual-flower-field'])
                    @include('2021._thumbnail', ['slug' => 'haunted-house'])
                    @include('2021._thumbnail', ['slug' => 'inclusive-app-design'])
                    @include('2021._thumbnail', ['slug' => 'silly-eyes'])
                    @include('2021._thumbnail', ['slug' => 'train-ai-bot', 'author'=>'Code.org'])
                </div>
            </div>
        </section>
    </section>

@endsection

@section('extra-css')
    <style>
        ul.checklist li:before {
            content: '• ';
            color: #ee6a2c;
            font-weight: bold;
        }

        ul.sub-checklist li:before {
            content: '- ';
            color: #9d5025;
            font-weight: bold;
        }
    </style>
@endsection
