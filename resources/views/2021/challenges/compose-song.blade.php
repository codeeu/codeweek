@extends('layout.new_base')

@php
    $slug = 'compose-song';
    $title = trans("challenges-content.$slug.title");

    $list = [
        (object) ['label' => 'Educational Resources', 'href' => '/educational-resources'],
        (object) ['label' => 'Challenges', 'href' => '/challenges'],
        (object) ['label' => $title, 'href' => ''],
    ];
@endphp

@section('layout.breadcrumb')
    @include('layout.breadcrumb', ['list' => $list])
@endsection

@section('title', 'Compose a Song – A Creative Coding Challenge')
@section('description', 'Use coding to create your own music! Design and program a melody in this fun and artistic challenge.')

<x-tailwind></x-tailwind>

@section('content')
    <section id="challenge-detail-page" class="font-['Blinker'] overflow-hidden">
        <section class="relative flex overflow-hidden">
            <div class="flex relative transition-all w-full bg-orange-gradient pt-32 pb-0 md:py-32">
                <div class="w-full overflow-hidden pb-10 md:p-0 flex flex-col md:flex-row justify-end md:items-center flex-shrink-0">
                    <div class="codeweek-container-lg flex flex-col md:flex-row md:items-center duration-1000 gap-28 md:gap-4 xl:gap-28">
                        <div class="order-1 flex-1 px-6 py-10 md:px-14 md:py-[4.5rem] bg-white rounded-[32px] z-10 relative">
                            <h2 class="text-[#1C4DA1] text-[30px] md:text-[60px] leading-9 md:leading-[72px] font-normal font-['Montserrat'] mb-4 max-md:max-w-full max-w-[532px]">
                                @lang("challenges-content.$slug.title")
                            </h2>
                            <p class="text-xl font-normal md:text-2xl leading-8 text-[#333E48] p-0 max-md:max-w-full max-w-[525px]">
                                @include('2021.challenges._author', ['author' => __("challenges-content.$slug.author")])
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
                                src="{{asset('img/2021/challenges/thumbnails/'.$slug.'.png')}}"
                                style="clip-path: ellipse(71% 73% at 40% 20%);"
                        />
                        <img
                                class="absolute top-0 right-0 h-full max-w-[calc(70vw)] object-cover hidden md:block"
                                loading="lazy"
                                src="{{asset('img/2021/challenges/thumbnails/'.$slug.'.png')}}"
                                style="clip-path: ellipse(70% 140% at 70% 25%);"
                        />
                    </div>
                </div>
            </div>
        </section>

        <section class="relative bg-yellow-50">
            <div class="relative py-10 md:py-20 codeweek-container-lg">
                <div class="grid grid-cols-1 lg:grid-cols-3 gap-y-6 lg:gap-16">
                    <div id="challenge-left-col" class="flex flex-col gap-6">
                        <div class="bg-white p-6 rounded-lg flex lg:flex-col 2xl:flex-row flex-wrap gap-4 2xl:gap-8">
                            <div>
                                <p class="font-normal text-2xl p-0 mb-4">@lang('challenges.common.duration')</p>
                                <div class="w-fit px-4 py-1.5 bg-light-blue-100 rounded-full flex items-center gap-2">
                                    <img src="{{asset('img/2021/challenges/icons/fi_clock.svg')}}" />
                                    <p class="text-slate-500 p-0 text-default font-semibold">@lang('challenges.common.1-hour')</p>
                                </div>
                            </div>
                            <div>
                                <p class="font-normal text-2xl p-0 mb-4">@lang('challenges.common.experience')</p>
                                <div class="w-fit px-4 py-1.5 bg-light-blue-100 rounded-full flex items-center gap-2">
                                    <img src="{{asset('img/2021/challenges/icons/fi_lightbulb.svg')}}" />
                                    <p class="text-slate-500 p-0 text-default font-semibold">@lang('challenges.common.intermediate')</p>
                                </div>
                            </div>
                        </div>
                        <div class="bg-white p-6 rounded-lg">
                            <p class="font-normal text-2xl p-0 mb-4">@lang('challenges.common.target-audience')</p>
                            <ol class="list-decimal ml-4">
                                <li class="text-slate-500 p-0 text-default font-normal leading-7">@lang('challenges.common.teachers')</li>
                                <li class="text-slate-500 p-0 text-default font-normal leading-7">@lang('challenges.common.students') (12-18)</li>
                            </ol>
                        </div>
                        <div class="bg-white p-6 rounded-lg">
                            <p class="font-normal text-2xl p-0 mb-4">@lang('challenges.common.purpose')</p>
                            <ol class="list-decimal ml-4">
                                <li class="text-slate-500 p-0 text-default font-normal leading-7">@lang("challenges-content.$slug.purposes.0")</li>
                                <li class="text-slate-500 p-0 text-default font-normal leading-7">@lang("challenges-content.$slug.purposes.1")</li>
                                <li class="text-slate-500 p-0 text-default font-normal leading-7">@lang("challenges-content.$slug.purposes.2")</li>
                            </ol>
                        </div>
                        <div class="bg-white p-6 rounded-lg">
                            <p class="font-normal text-2xl p-0 mb-4">@lang('challenges.common.materials')</p>
                            <ol class="list-decimal ml-4">
                                <li class="text-slate-500 p-0 text-default font-normal leading-7"><a class="text-dark-blue" href="https://earsketch.gatech.edu/landing/#/" target="_blank">Earsketch</a></li>
                            </ol>
                        </div>
                    </div>
                    <div class="col-span-2">
                        <div class=" bg-white px-6 py-8 lg:p-16 rounded-lg">
                            <p class="text-dark-blue font-['Montserrat'] font-medium text-[22px] leading-7 md:text-4xl p-0 mb-6">@lang("challenges-content.$slug.title")</p>
                            <div class="flex flex-wrap gap-2 mb-6">
                                <div class="px-4 py-1.5 bg-light-blue-100 rounded-full flex items-center gap-2">
                                    <img src="{{asset('img/2021/challenges/icons/fi_users.svg')}}" />
                                    <p class="text-slate-500 p-0 text-default font-semibold">@lang('challenges.common.teachers')</p>
                                </div>
                                <div class="px-4 py-1.5 bg-light-blue-100 rounded-full flex items-center gap-2">
                                    <img src="{{asset('img/2021/challenges/icons/fi_users.svg')}}" />
                                    <p class="text-slate-500 p-0 text-default font-semibold">@lang('challenges.common.students') (12-18)</p>
                                </div>
                            </div>
                            <div class="mb-6">
                                <p class="font-semibold text-2xl p-0 mb-2">@lang('challenges.common.description')</p>
                                <p class="font-normal text-default md:text-xl p-0 text-slate-500 leading-[22px] md:leading-[30px]">@lang("challenges-content.$slug.description")</p>
                            </div>
                            <div class="mb-6">
                                <p class="font-semibold text-2xl p-0 mb-2">@lang('challenges.common.instructions')</p>
                                <ol class="list-disc ml-4 [&_li]:my-2 leading-[22px] md:leading-[30px]">
                                    <li class="font-normal text-default md:text-xl p-0 text-slate-500">
                                        @lang("challenges-content.$slug.instructions.0") <a class="text-dark-blue underline" target="_blank" href="https://earsketch.gatech.edu/landing/#/">Earsketch</a>.
                                    </li>
                                    <li class="font-normal text-default md:text-xl p-0 text-slate-500">
                                        <strong>@lang("challenges-content.$slug.instructions.1")</strong>. @lang("challenges-content.$slug.instructions.2") <strong>Python</strong> @lang("challenges-content.$slug.instructions.3").
                                    </li>
                                    <li class="font-normal text-default md:text-xl p-0 text-slate-500">
                                        @lang("challenges-content.$slug.instructions.4") <span class="text-blue-500 font-['Montserrat']">setTempo(120)</span> @lang("challenges-content.$slug.instructions.5") <span class="text-blue-500 font-['Montserrat']">finish()</span> @lang("challenges-content.$slug.instructions.6").
                                    </li>
                                    <li class="font-normal text-default md:text-xl p-0 text-slate-500">
                                        @lang("challenges-content.$slug.instructions.7") <strong>@lang("challenges-content.$slug.instructions.8")</strong> @lang("challenges-content.$slug.instructions.9").
                                    </li>
                                    <li class="font-normal text-default md:text-xl p-0 text-slate-500">
                                        @lang("challenges-content.$slug.instructions.10") <span class="text-blue-500 font-['Montserrat']">fitMedia()</span>. @lang("challenges-content.$slug.instructions.11"):
                                    </li>
                                    <ul class="list-decimal m-0 ml-4">
                                        <li class="font-normal text-default md:text-xl p-0 text-slate-500"><strong>@lang("challenges-content.$slug.instructions.12"):</strong> @lang("challenges-content.$slug.instructions.13").</li>
                                        <li class="font-normal text-default md:text-xl p-0 text-slate-500"><strong>@lang("challenges-content.$slug.instructions.14"):</strong> @lang("challenges-content.$slug.instructions.15"). </li>
                                        <li class="font-normal text-default md:text-xl p-0 text-slate-500"><strong>@lang("challenges-content.$slug.instructions.16"):</strong> @lang("challenges-content.$slug.instructions.17").</li>
                                        <li class="font-normal text-default md:text-xl p-0 text-slate-500"><strong><strong>@lang("challenges-content.$slug.instructions.18"):</strong> @lang("challenges-content.$slug.instructions.19").</li>
                                    </ul>
                                    <li class="font-normal text-default md:text-xl p-0 text-slate-500">
                                        @lang("challenges-content.$slug.instructions.20"):
                                        <span class="text-blue-500 font-['Montserrat']">fitMedia (HOUSE_DEEP_AIRYCHORD_002, 2, 2, 8)</span>
                                    </li>
                                    <img class="w-full my-3" src="{{asset('img/2021/challenges/compose-song-1.png')}}"/>
                                    <li class="font-normal text-default md:text-xl p-0 text-slate-500">
                                        @lang("challenges-content.$slug.instructions.21")
                                    </li>
                                    <li class="font-normal text-default md:text-xl p-0 text-slate-500">
                                        @lang("challenges-content.$slug.instructions.22") <span class="text-blue-500 font-['Montserrat']">setEffect()</span>. @lang("challenges-content.$slug.instructions.23").
                                    </li>
                                    <li class="font-normal text-default md:text-xl p-0 text-slate-500">
                                        @lang("challenges-content.$slug.instructions.24"):
                                        <span class="text-blue-500 font-['Montserrat']">setEffect (1, VOLUME, GAIN, -40, 1, 0, 4)</span>
                                        @lang("challenges-content.$slug.instructions.25"):
                                        <span class="text-blue-500 font-['Montserrat']">setEffect (5, VOLUME, GAIN, 0, 8, -15, 10)</span>
                                    </li>
                                </ol>
                            </div>
                            @include('2021.challenges._share')
                            <div class="mb-6">
                                <p class="font-semibold text-2xl p-0 mb-2">@lang('challenges.common.example')</p>
                                <div class="font-normal text-default md:text-xl text-slate-500 leading-[22px] md:leading-[30px]">
                                    @lang("challenges-content.$slug.example.0") <a class="text-dark-blue" href="https://earsketch.gatech.edu/earsketch2/?sharing=eQgzojvIKsMLrum8CBYj1g" target="_blank">@lang("challenges-content.$slug.example.1")</a>. @lang("challenges-content.$slug.example.2").
                                </div>
                                <div class="mt-4">
                                    <iframe class="max-w-full w-full" width="600" height="400" src="https://earsketch.gatech.edu/earsketch2/?sharing=eQgzojvIKsMLrum8CBYj1g&embedded=true"></iframe>
                                </div>
                            </div>
                            @include('2021.challenges._download',['url'=>"https://codeweek-s3.s3.eu-west-1.amazonaws.com/cw2021/EUCW+Challenge+Compose+a+song.docx"])
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </section>
@endsection
