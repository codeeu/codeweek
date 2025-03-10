@extends('layout.base')

@section('title', 'AI Hour of Code – Explore Artificial Intelligence')
@section('description', 'Dive into the world of AI with the "AI Hour of Code" challenge. Learn how artificial intelligence works and create your own AI projects in this interactive coding experience.')

<x-tailwind></x-tailwind>

@section('content')

    <section id="codeweek-schools-page" class="codeweek-page">

        {{--        <section class="codeweek-banner about">--}}
        {{--            <div class="text">--}}
        {{--                <div class="text-5xl text-white"><a class="text-white underline" href="{{route('challenges')}}">@lang('challenges.title')</a></div>--}}
        {{--                <h2>Unplug and code: Create a paper circuit</h2>--}}
        {{--            </div>--}}
        {{--            <div class="image">--}}
        {{--                <img src="/images/banner_about.svg" class="static-image">--}}

        {{--            </div>--}}

        {{--        </section>--}}

        <section class="flex flex-row justify-between" style="background-color: #78C2C5">
            <div class="flex justify-center items-center w-full">
                <div class="text-center m-12">
                    <div class="text-xl text-white w-full"><a class="text-white"
                                                              href="{{route('challenges')}}">@lang('challenges.title')</a>
                    </div>
                    <div class="text-5xl mt-2"
                         style="color: #1756a0">@lang('challenges-content.ai-hour-of-code.title')</div>
                </div>
            </div>

            <div class="md:w-10/12 md:flex hidden">
                <img src="{{asset('img/2021/challenges/thumbnails/ai-hour-of-code.png')}}">

            </div>

        </section>

        <section class="codeweek-content-wrapper">
            <div class="m-6">

                @include('2021.challenges._author', ['author' => __('challenges-content.ai-hour-of-code.author')])

                <section class="grid grid-cols-1 gap-6 md:grid-cols-4 mx-6 my-4">


                    <div>
                        <div class="text-xl text-left text-blue-600">@lang('challenges.common.target-audience')</div>
                        <ol class="list-disc ml-5">
                            <li>@lang("resources.resources.levels.Pre-primary education") (3-5)</li>
                            <li>@lang("resources.resources.levels.Primary school (5-12)")</li>
                            <li>@lang("resources.resources.levels.Lower secondary school (12-16)")</li>
                            <li>@lang("resources.resources.levels.Upper secondary school (16-18)")</li>
                            <li>@lang("resources.resources.levels.Higher Education") (18-20)</li>

                        </ol>
                    </div>

                    <div>
                        <div class="text-xl text-left text-blue-600">@lang('challenges.common.experience')</div>
                        <ol class="list-disc ml-5">
                            <li>@lang('challenges.common.beginner')</li>
                        </ol>
                    </div>

                    <div>
                        <div class="text-xl text-left text-blue-600">@lang('challenges.common.duration')</div>
                        <ol class="list-disc ml-5">
                            <li>@lang('challenges.common.1-hour')</li>
                        </ol>
                    </div>

                    <div>
                        <div class="text-xl text-left text-blue-600">@lang('challenges.common.materials')</div>
                        <ol class="list-disc ml-5">
                            <li>@lang('challenges-content.ai-hour-of-code.materials.0')</li>
                            <li>@lang('challenges-content.ai-hour-of-code.materials.1') <a
                                        href="https://education.minecraft.net/en-us/lessons/minecraft-hour-of-code">@lang('challenges-content.ai-hour-of-code.materials.2')</a>
                            </li>
                        </ol>


                    </div>


                </section>

                <div class="mx-6 my-4">
                    <div class="text-xl text-left text-blue-600">@lang('challenges.common.purpose')</div>
                    <ol class="list-disc ml-5">

                        <li>@lang('challenges-content.ai-hour-of-code.purposes.0').</li>
                        <li>@lang('challenges-content.ai-hour-of-code.purposes.1').</li>
                        <li>@lang('challenges-content.ai-hour-of-code.purposes.2').</li>
                    </ol>

                </div>


                <div class="leading-6 text-base text-left">

                    <section class="bg-blue-100 p-2 mt-6">
                        <div class="orange text-3xl mt-2">
                            @lang('challenges.common.description')
                        </div>


                        <div class="mt-2">
                            @lang('challenges-content.ai-hour-of-code.description')<br/>
                        </div>
                    </section>


                    <section class="p-2">
                        <div class="leading-8">
                            <div class="mt-6 orange text-3xl">@lang('challenges.common.instructions')</div>



                             <a
                                    href="https://meedownloads.blob.core.windows.net/learning-experience/HOC%202019/EducatorGuide_en_US.pdf">@lang('challenges-content.ai-hour-of-code.instructions')</a>


                        </div>


                    </section>

                    @include('2021.challenges._share')

                    <section class="p-2">
                        <div class="orange text-3xl">@lang('challenges.common.example')</div>
                        <div class="mt-2"><img src="{{asset('img/2021/challenges/ai-hour-of-code-1.png')}}"/>

                        </div>

                    </section>


                </div>

                @include('2021.challenges._download',['url'=>'https://codeweek-s3.s3.eu-west-1.amazonaws.com/cw2021/AI+Hour+of+Code.docx'])
            </div>
            <div style="text-align: center">@include('include.licence')</div>
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
    </style>
@endsection
