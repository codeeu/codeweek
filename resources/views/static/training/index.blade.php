@extends('layout.new_base')

@php
    $list = [
      (object) ['label' => 'Learn & Teach', 'href' => '/learn'],
      (object) ['label' => 'Training', 'href' => ''],
    ];

    $results = [
         [
            'image' => '/img/learning/coding-without-computers.png',
            'title' => 'training.lessons.1.title',
            'author' => 'training.lessons.1.author',
            'link' => '/training/coding-without-computers'
        ],
        [
            'image' => '/img/learning/computational-thinking-and-problem-solving.png',
            'title' => 'training.lessons.2.title',
            'author' => 'training.lessons.2.author',
            'link' => '/training/computational-thinking-and-problem-solving'
        ],
        [
            'image' => '/img/learning/visual-programming-introduction-to-scratch.png',
            'title' => 'training.lessons.3.title',
            'author' => 'training.lessons.3.author',
            'link' => '/training/visual-programming-introduction-to-scratch'
        ],
        [
            'image' => '/img/learning/creating-educational-games-with-scratch.png',
            'title' => 'training.lessons.4.title',
            'author' => 'training.lessons.4.author',
            'link' => '/training/creating-educational-games-with-scratch'
        ],
        [
            'image' => '/img/learning/making-robotics-and-tinkering-in-the-classroom.png',
            'title' => 'training.lessons.5.title',
            'author' => 'training.lessons.5.author',
            'link' => '/training/making-robotics-and-tinkering-in-the-classroom'
        ],
        [
            'image' => '/img/learning/developing-creative-thinking-through-mobile-app-development.png',
            'title' => 'training.lessons.6.title',
            'author' => 'training.lessons.6.author',
            'link' => '/training/developing-creative-thinking-through-mobile-app-development'
        ],
        [
            'image' => '/img/learning/tinkering-and-making.png',
            'title' => 'training.lessons.7.title',
            'author' => 'training.lessons.7.author',
            'link' => '/training/tinkering-and-making'
        ],
        [
            'image' => '/img/learning/coding-for-all-subjects.png',
            'title' => 'training.lessons.8.title',
            'author' => 'training.lessons.8.author',
            'link' => '/training/coding-for-all-subjects'
        ],
        [
            'image' => '/img/learning/making-an-automaton-with-microbit.png',
            'title' => 'training.lessons.9.title',
            'author' => 'training.lessons.9.author',
            'link' => '/training/making-an-automaton-with-microbit'
        ],
        [
            'image' => '/img/learning/creative-coding-with-python.png',
            'title' => 'training.lessons.10.title',
            'author' => 'training.lessons.10.author',
            'link' => '/training/creative-coding-with-python'
        ],
        [
            'image' => '/img/learning/coding-for-inclusion.png',
            'title' => 'training.lessons.11.title',
            'author' => 'training.lessons.11.author',
            'link' => '/training/coding-for-inclusion'
        ],
        [
            'image' => '/img/learning/coding-for-sustainable-development-goals.png',
            'title' => 'training.lessons.12.title',
            'author' => 'training.lessons.12.author',
            'link' => '/training/coding-for-sustainable-development-goals'
        ],
        [
            'image' => '/img/learning/introduction-to-artificial-intelligence-in-the-classroom.png',
            'title' => 'training.lessons.13.title',
            'author' => 'training.lessons.13.author',
            'link' => '/training/introduction-to-artificial-intelligence-in-the-classroom'
        ],
        [
            'image' => '/img/learning/learning-in-the-age-of-intelligent-machines.png',
            'title' => 'training.lessons.14.title',
            'author' => 'training.lessons.14.author',
            'link' => '/training/learning-in-the-age-of-intelligent-machines'
        ],
        [
            'image' => '/img/learning/mining-media-literacy.png',
            'title' => 'training.lessons.15.title',
            'author' => 'training.lessons.15.author',
            'link' => '/training/mining-media-literacy'
        ],
        [
            'image' => '/img/learning/story-telling-with-hedy.png',
            'title' => 'training.lessons.16.title',
            'author' => 'training.lessons.16.author',
            'link' => '/training/story-telling-with-hedy'
        ],
        [
            'image' => '/img/learning/feel-the-code.jpg',
            'title' => 'training.lessons.17.title',
            'author' => 'training.lessons.17.author',
            'link' => '/training/feel-the-code'
        ],
        [
            'image' => '/img/learning/sos-water.png',
            'title' => 'training.lessons.18.title',
            'author' => 'training.lessons.18.author',
            'link' => '/training/sos-water'
        ],
        [
            'image' => '/img/learning/creative-scratch-laboratory.png',
            'title' => 'training.lessons.19.title',
            'author' => 'training.lessons.19.author',
            'link' => '/training/creative-scratch-laboratory'
        ],
        [
            'image' => '/img/learning/code-through-art.png',
            'title' => 'training.lessons.20.title',
            'author' => 'training.lessons.20.author',
            'link' => '/training/code-through-art'
        ],
        [
            'image' => '/img/learning/making-and-coding.png',
            'title' => 'training.lessons.21.title',
            'author' => 'training.lessons.21.author',
            'link' => '/training/making-and-coding'
        ],
    ];
@endphp

@section('layout.breadcrumb')
    @include('layout.breadcrumb', ['list' => $list])
@endsection

@section('title', 'Coding Training for Teachers – EU Code Week')
@section('description', 'Enhance your coding teaching skills with specialized training courses and resources from EU Code Week.')

@section('content')
    <section id="training-page" class="font-['Blinker'] overflow-hidden">
        <section class="relative flex overflow-hidden">
            <div class="flex relative transition-all w-full bg-blue-gradient pt-32 pb-0 md:py-40">
                <div class="w-full overflow-hidden pb-10 md:p-0 flex flex-col md:flex-row justify-end md:items-center flex-shrink-0">
                    <div class="codeweek-container-lg flex flex-col md:flex-row md:items-center duration-1000 gap-28 md:gap-4 xl:gap-28">
                        <div class="order-1 flex-1 px-6 py-10 md:px-14 md:py-[4.5rem] bg-white rounded-[32px] z-10 relative">
                            <h2 class="text-[#1C4DA1] text-[30px] md:text-[60px] leading-9 md:leading-[72px] font-normal font-['Montserrat'] mb-4 max-md:max-w-full max-w-[532px]">
                                Training
                            </h2>
                            <p class="text-xl font-normal md:text-2xl leading-8 text-[#333E48] p-0 max-md:max-w-full max-w-[525px]">
                                @lang('training.training-text')
                            </p>
                        </div>
                        <div class="order-0 md:order-2 flex flex-1 justify-center items-center z-10"></div>
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

        <section class="relative overflow-hidden">
            <div class="codeweek-container-lg relative pt-20 pb-16 md:pt-40 md:pb-28 flex justify-center">
                <div class="w-full max-w-[907px] gap-2">
                    <h2 class="text-dark-blue tablet:text-center text-[22px] md:text-4xl leading-7 md:leading-[44px] font-medium font-['Montserrat'] mb-6 tablet:mb-8">
                        Quick & Practical Tools for Innovative Lessons
                    </h2>
                    <p class="text-slate-500 font-normal text-[16px] md:text-xl leading-[22px] md:leading-[30px] p-0 mb-8">
                        @lang('training.quick-practical-text1')
                    </p>
                    <div class="relative flex gap-x-8 pb-4 tablet:pb-16">
                        <div class="w-10 h-10 rounded-full flex justify-center items-center text-['#20262C'] font-semibold text-2xl bg-primary">
                            1
                        </div>
                        <div class="absolute after:content-[''] after:block after:w-[2px] after:h-full after:bg-[#5F718A] left-5 bottom-2 top-12"></div>
                        <div class="flex-1 pt-1">
                            <p class="font-semibold text-[#20262C] text-xl tablet:text-2xl mb-2 p-0">@lang('training.watch-learn-title')</p>
                            <p class="text-slate-500 font-normal text-[16px] md:text-xl leading-[22px] md:leading-[30px] p-0">
                                @lang('training.watch-learn-text')
                            </p>
                        </div>
                    </div>
                    <div class="relative flex gap-x-8 pb-4 tablet:pb-16">
                        <div class="w-10 h-10 rounded-full flex justify-center items-center text-['#20262C'] font-semibold text-2xl bg-primary">
                            2
                        </div>
                        <div class="absolute after:content-[''] after:block after:w-[2px] after:h-full after:bg-[#5F718A] left-5 bottom-2 top-12"></div>
                        <div class="flex-1 pt-1">
                            <p class="font-semibold text-[#20262C] text-xl tablet:text-2xl mb-2 p-0">@lang('training.get-hands-on-title')</p>
                            <p class="text-slate-500 font-normal text-[16px] md:text-xl leading-[22px] md:leading-[30px] p-0">
                                @lang('training.get-hands-on-text')
                            </p>
                        </div>
                    </div>
                    <div class="relative flex gap-x-8 mb-8">
                        <div class="w-10 h-10 rounded-full flex justify-center items-center text-['#20262C'] font-semibold text-2xl bg-primary">
                            3
                        </div>
                        <div class="flex-1 pt-1">
                            <p class="font-semibold text-[#20262C] text-xl tablet:text-2xl mb-2 p-0">@lang('training.share-inspire-title')</p>
                            <p class="text-slate-500 font-normal text-[16px] md:text-xl leading-[22px] md:leading-[30px] p-0 mb-4">
                                @lang('training.share-inspire-text1')
                            </p>
                            <p class="text-slate-500 font-normal text-[16px] md:text-xl leading-[22px] md:leading-[30px] p-0 mb-4">
                               @lang('training.share-inspire-text2')
                            </p>
                            <p class="text-slate-500 font-normal text-[16px] md:text-xl leading-[22px] md:leading-[30px] p-0">
                                @lang('training.share-inspire-text3')
                            </p>
                        </div>
                    </div>
                    <div class="w-full bg-light-blue rounded-lg p-6 flex flex-col md:flex-row text-['Blinker'] gap-2">
                        <img class="min-w-8 min-h-8" src="/images/icon_info.svg" />
                        <div class="text-slate-500 text-[16px] leading-[22px] tablet:text-xl tablet:leading-7">
                            <p class="font-semibold p-0 mb-2 tablet:mb-0">Copyright notice ©</p>
                            <p class="font-normal p-0">
                                <a class="font-semibold text-dark-blue underline" href="/training">The EU Code Week website</a> is a service supported by the European Commission Except where stated otherwise, content made available on this site is licensed under a <a class="font-semibold text-dark-blue underline" href="https://creativecommons.org/licenses/by-nc-sa/4.0/deed.en">Creative Commons Attribution-NonCommercial-ShareAlike 4.0 International (CC BY-NC-SA 4.0) license</a> Licensing under Creative Commons licenses does not of itself affect the ownership of the copyright Content from third party websites is subject to their own copyright restrictions; please refer to the site of origin for more information.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="relative overflow-hidden">
            <div class="absolute w-full h-full bg-yellow-50 md:hidden" style="clip-path: ellipse(410% 90% at 38% 90%);"></div>
            <div class="absolute w-full h-full bg-yellow-50 hidden md:block lg:hidden" style="clip-path: ellipse(528% 90% at 50% 90%);"></div>
            <div class="absolute w-full h-full bg-yellow-50 hidden lg:block xl:hidden" style="clip-path: ellipse(228% 90% at 50% 90%);"></div>
            <div class="absolute w-full h-full bg-yellow-50 hidden xl:block" style="clip-path: ellipse(148% 90% at 50% 90%);"></div>
            <div class="codeweek-container-lg relative pt-20 pb-16 md:pt-40 md:pb-28 flex flex-col talet:items-center">
                <h2 class="text-dark-blue text-left tablet:text-center text-[22px] md:text-4xl leading-7 md:leading-[44px] font-medium font-['Montserrat'] mb-6 tablet:mb-10">
                    Learning Bits
                </h2>
                <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-6 xl:gap-10">
                    @foreach($results as $result)
                        <div class="flex flex-col rounded-lg bg-white overflow-hidden cursor-pointer" onclick="window.location.href='{{ $result['link'] }}'">
                            <div class="relative">
                                <img src="{{ $result['image'] }}" class="w-full" />
                            </div>
                            <div class="block flex-grow px-6 py-8">
                                <p class="text-dark-blue text-lg p-0 font-semibold mb-2 font-['Montserrat']">
                                    @lang($result['title'])
                                </p>
                                <p class="text-[#333E48] text-default font-bold leading-[22px] p-0">
                                    @lang($result['author'])
                                </p>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    </section>

@endsection
