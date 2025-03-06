@extends('layout.base')

@section('title', 'Compose a Song – A Creative Coding Challenge')
@section('description', 'Use coding to create your own music! Design and program a melody in this fun and artistic challenge.')

<x-tailwind></x-tailwind>

@section('content')

    @php
        $slug = 'compose-song'
    @endphp

    <section id="codeweek-schools-page" class="codeweek-page">

        <section class="flex flex-row justify-between" style="background-color: #6DB4B4">
            <div class="flex justify-center items-center w-full">
                <div class="text-center m-12">
                    <div class="text-xl text-white w-full"><a class="text-white" href="{{route('challenges')}}">@lang('challenges.title')</a></div>
                    <div class="text-5xl mt-2" style="color: #fecc54">@lang("challenges-content.$slug.title")</div>
                </div>
            </div>

            <div class="md:w-10/12 md:mb-2 md:flex hidden">
                <img src="{{asset('img/2021/challenges/thumbnails/compose-song.png')}}">

            </div>

        </section>

        <section class="codeweek-content-wrapper">
            <div class="m-6">

                @include('2021.challenges._author', ['author' => __("challenges-content.$slug.author")])

                <section class="grid grid-cols-1 gap-6 md:grid-cols-5 mx-6 my-4">


                    <div>
                        <div class="text-xl text-left text-blue-600">@lang('challenges.common.target-audience')</div>
                        <ol class="list-disc ml-5">
                            <li>@lang('challenges.common.teachers')</li>
                            <li>@lang('challenges.common.students') (12-18)</li>
                        </ol>
                    </div>

                    <div>
                        <div class="text-xl text-left text-blue-600">@lang('challenges.common.experience')</div>
                        <ol class="list-disc ml-5">
                            <li>@lang('challenges.common.intermediate')</li>
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
                            <li><a href="https://earsketch.gatech.edu/landing/#/" target="_blank">Earsketch</a></li>
                        </ol>

                    </div>




                </section>

                <div class="mx-6 my-4">
                    <div class="text-xl text-left text-blue-600">@lang('challenges.common.purpose')</div>
                    <ol class="list-disc ml-5">
                        <li>@lang("challenges-content.$slug.purposes.0")</li>
                        <li>@lang("challenges-content.$slug.purposes.1")</li>
                        <li>@lang("challenges-content.$slug.purposes.2")</li>
                    </ol>

                </div>


                <div class="leading-6 text-base text-left">

                    <section class="bg-blue-100 p-2 mt-6">
                        <div class="orange text-3xl mt-2">
                            @lang('challenges.common.description')
                        </div>


                        <div class="mt-2">
                            @lang("challenges-content.$slug.description")
                        </div>
                    </section>



                    <section class="p-2">
                        <div class="leading-8">
                            <div class="mt-6 orange text-3xl">@lang('challenges.common.instructions')</div>
                            <ul class="leading-7 ml-2 mt-0 checklist mt-2">
                                <li>@lang("challenges-content.$slug.instructions.0") <a href="https://earsketch.gatech.edu/landing/#/">Earsketch</a>.</li>
                                <li><strong>@lang("challenges-content.$slug.instructions.1")</strong>. @lang("challenges-content.$slug.instructions.2") <strong>Python</strong> @lang("challenges-content.$slug.instructions.3").</li>
                                <li>@lang("challenges-content.$slug.instructions.4") <span class="text-blue-500 font-mono">setTempo(120)</span> @lang("challenges-content.$slug.instructions.5") <span class="text-blue-500 font-mono">finish()</span> @lang("challenges-content.$slug.instructions.6").</li>
                                <li>@lang("challenges-content.$slug.instructions.7") <strong>@lang("challenges-content.$slug.instructions.8")</strong> @lang("challenges-content.$slug.instructions.9").</li>
                                <li>@lang("challenges-content.$slug.instructions.10") <span class="text-blue-500 font-mono">fitMedia()</span>. @lang("challenges-content.$slug.instructions.11"):
                                <ol class="ml-8 list-decimal">
                                    <li><strong>@lang("challenges-content.$slug.instructions.12"):</strong> @lang("challenges-content.$slug.instructions.13").</li>
                                    <li><strong>@lang("challenges-content.$slug.instructions.14"):</strong> @lang("challenges-content.$slug.instructions.15"). </li>
                                    <li><strong>@lang("challenges-content.$slug.instructions.16"):</strong> @lang("challenges-content.$slug.instructions.17").</li>
                                    <li><strong>@lang("challenges-content.$slug.instructions.18"):</strong> @lang("challenges-content.$slug.instructions.19").</li>
                                </ol>
                                </li>
                                <li>@lang("challenges-content.$slug.instructions.20"):
                                    <span class="text-blue-500 font-mono">fitMedia (HOUSE_DEEP_AIRYCHORD_002, 2, 2, 8)</span>
                                    <img class="m-4" width="550" src="{{asset('img/2021/challenges/compose-song-1.png')}}"/>
                                </li>
                                <li>@lang("challenges-content.$slug.instructions.21") </li>
                                <li>@lang("challenges-content.$slug.instructions.22") <span class="text-blue-500 font-mono">setEffect()</span>. @lang("challenges-content.$slug.instructions.23").</li>
                                <li>@lang("challenges-content.$slug.instructions.24"):
                                    <div class="text-blue-500 font-mono">setEffect (1, VOLUME, GAIN, -40, 1, 0, 4)</div>
                                    @lang("challenges-content.$slug.instructions.25"):
                                    <div class="text-blue-500 font-mono">setEffect (5, VOLUME, GAIN, 0, 8, -15, 10)</div>
                                </li>


                            </ul>

                        </div>
                    </section>

                    @include('2021.challenges._share')

                    <section class="p-2">
                        <div class="mt-6 orange text-3xl">@lang('challenges.common.example')</div>
                        <div class="mt-2">
                            @lang("challenges-content.$slug.example.0") <a href="https://earsketch.gatech.edu/earsketch2/?sharing=eQgzojvIKsMLrum8CBYj1g" target="_blank">@lang("challenges-content.$slug.example.1")</a>. @lang("challenges-content.$slug.example.2").
                        </div>
                        <div class="mt-4">
                            <iframe width="600" height="400" src="https://earsketch.gatech.edu/earsketch2/?sharing=eQgzojvIKsMLrum8CBYj1g&embedded=true"></iframe>
                        </div>
                    </section>


                </div>

                @include('2021.challenges._download',['url'=>'https://codeweek-s3.s3.eu-west-1.amazonaws.com/cw2021/EUCW+Challenge+Compose+a+song.docx'])
            </div>
            <div style="text-align: center">@include('include.licence')</div>
        </section>
    </section>

@endsection

@section('extra-css')
    <style>
        ul.checklist>li:before {
            content: '• ';
            color: #ee6a2c;
            font-weight: bold;
        }
    </style>
@endsection
