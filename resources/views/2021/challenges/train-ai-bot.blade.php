@extends('layout.new_base')

@php
    $slug = 'train-ai-bot';
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

@section('title', 'Train AI Bot – Build and Train Your Own AI')
@section('description', 'Dive into the world of artificial intelligence by coding and training your own AI bot in this exciting challenge.')

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
                                    <p class="text-slate-500 p-0 text-default font-semibold">@lang('challenges.common.beginner')</p>
                                </div>
                            </div>
                        </div>
                        <div class="bg-white p-6 rounded-lg">
                            <p class="font-normal text-2xl p-0 mb-4">@lang('challenges.common.target-audience')</p>
                            <ol class="list-decimal ml-4">
                                <li class="text-slate-500 p-0 text-default font-normal leading-7">@lang("resources.resources.levels.Primary school (5-12)")</li>
                            </ol>
                        </div>
                        <div class="bg-white p-6 rounded-lg">
                            <p class="font-normal text-2xl p-0 mb-4">@lang('challenges.common.purpose')</p>
                            <ol class="list-decimal ml-4">
                                <li class="text-slate-500 p-0 text-default font-normal leading-7">@lang("challenges-content.$slug.purposes.0")</li>
                            </ol>
                        </div>
                        <div class="bg-white p-6 rounded-lg">
                            <p class="font-normal text-2xl p-0 mb-4">@lang('challenges.common.materials')</p>
                            <ol class="list-decimal ml-4">
                                <li class="text-slate-500 p-0 text-default font-normal leading-7">
                                    @lang("challenges-content.$slug.materials.0"): <a class="text-dark-blue" target="_blank"
                                                                                      href="https://code.org/oceans">https://code.org/oceans</a><br/>
                                    (@lang("challenges-content.$slug.materials.1"))
                                </li>
                            </ol>
                        </div>
                    </div>
                    <div class="col-span-2">
                        <div class=" bg-white px-6 py-8 lg:p-16 rounded-lg">
                            <p class="text-dark-blue font-['Montserrat'] font-medium text-[22px] leading-7 md:text-4xl p-0 mb-6">@lang("challenges-content.$slug.title")</p>
                            <div class="flex flex-wrap gap-2 mb-6">
                                <div class="px-4 py-1.5 bg-light-blue-100 rounded-full flex items-center gap-2">
                                    <img src="{{asset('img/2021/challenges/icons/fi_users.svg')}}" />
                                    <p class="text-slate-500 p-0 text-default font-semibold">@lang("resources.resources.levels.Primary school (5-12)")</p>
                                </div>
                            </div>
                            <div class="mb-6">
                                <p class="font-semibold text-2xl p-0 mb-2">@lang('challenges.common.description')</p>
                                <img class="w-full mb-2" src="{{asset('img/2021/challenges/train-ai-bot-1.png')}}"/>
                                <p class="font-normal text-default md:text-xl p-0 text-slate-500 leading-[22px] md:leading-[30px]">
                                    @lang("challenges-content.$slug.description")
                                </p>
                            </div>
                            <div class="mb-6">
                                <p class="font-semibold text-2xl p-0 mb-2">@lang('challenges.common.instructions')</p>
                                <ol class="list-disc ml-4 [&_li]:my-2 leading-[22px] md:leading-[30px]">
                                    <li class="font-normal text-default md:text-xl p-0 text-slate-500">
                                        @lang("challenges-content.$slug.instructions.0") (<a class="text-dark-blue" target="_blank" href="https://code.org/oceans">https://code.org/oceans</a>) @lang("challenges-content.$slug.instructions.1").
                                    </li>
                                </ol>
                            </div>
                            @include('2021.challenges._share')
                            <div class="mb-6">
                                <p class="font-semibold text-2xl p-0 mb-2">@lang('challenges.common.example')</p>
                                <a class="block my-3" href="https://code.org/oceans">
                                    <img src="{{asset('img/2021/challenges/train-ai-bot-2.png')}}"/>
                                </a>
                            </div>
                            @include('2021.challenges._download',['url'=>"https://codeweek-s3.s3.eu-west-1.amazonaws.com/cw2021/Train+an+AI+bot!.docx"])
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </section>
@endsection