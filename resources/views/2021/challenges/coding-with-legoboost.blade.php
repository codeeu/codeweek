@extends('layout.base')

@section('title', 'Coding with LEGO Boost – Build & Program Robots')
@section('description', 'Combine coding and creativity by building and programming robots with LEGO Boost in this interactive challenge.')

<x-tailwind></x-tailwind>

@section('content')

    @php
        $slug = 'coding-with-legoboost'
//    @endphp

    <section id="codeweek-schools-page" class="codeweek-page">


        <section class="flex flex-row justify-between" style="background-color: #3EB4D0">
            <div class="flex items-center justify-center w-full">
                <div class="m-12 text-center">
                    <div class="w-full text-xl text-white"><a class="text-black"
                                                              href="{{route('challenges')}}">@lang('challenges.title')</a>
                    </div>
                    <div class="mt-2 text-5xl" style="color: #ffffff">@lang("challenges-content.$slug.title")</div>
                </div>
            </div>

            <div class="hidden md:w-10/12 md:flex">
                <img src="{{asset('img/2021/challenges/thumbnails/'.$slug.'.png')}}">


            </div>

        </section>

        <section class="codeweek-content-wrapper">
            <div class="m-6">

                @include('2021.challenges._author', ['author' => __("challenges-content.$slug.author")])

                <section class="grid grid-cols-1 gap-6 mx-6 my-4 md:grid-cols-4">


                    <div>
                        <div class="text-xl text-left text-blue-600">@lang('challenges.common.target-audience')</div>
                        <ol class="ml-5 list-disc">
                            <li>@lang('challenges-content.common.audience.1')</li>
                            <li>@lang('challenges-content.common.audience.2')</li>
                        </ol>
                    </div>


                    <div>

                        <div class="text-xl text-left text-blue-600">@lang('challenges.common.purpose')</div>
                        <ol class="ml-5 list-disc">
                            <li>@lang("challenges-content.$slug.purposes.0")</li>
                            <li>@lang("challenges-content.$slug.purposes.1")</li>
                            <li>@lang("challenges-content.$slug.purposes.2")</li>

                        </ol>

                    </div>

                    <div>
                        <div class="text-xl text-left text-blue-600">@lang('challenges.common.duration')</div>
                        <ol class="ml-5 list-disc">
                            <li>@lang("challenges-content.$slug.duration")</li>
                        </ol>
                    </div>

                    <div>
                        <div class="text-xl text-left text-blue-600">@lang('challenges.common.experience')</div>
                        <ol class="ml-5 list-disc">
                            <li>@lang('challenges.common.intermediate')</li>
                        </ol>
                    </div>

                </section>

                <section class="grid grid-cols-1 gap-6 mx-6 my-4 md:grid-cols-4">


                    <div>
                        <div class="text-xl text-left text-blue-600">@lang('challenges.common.materials')</div>
                        <ol class="ml-5 list-disc">
                            <li><a href="https://scratch.mit.edu/download/scratch-link">Scratch Link</a></li>
                            <li><a href="https://scratch.mit.edu/">Scratch online</a></li>
                            <li>
                                <a href="https://play.google.com/store/apps/details?id=com.lego.boost.boost&hl=en">Android
                                    App LegoBoost</a></li>
                        </ol>
                    </div>


                </section>


                <div class="text-base leading-6 text-left">

                    <section class="p-2 mt-6 bg-blue-100">
                        <div class="mt-2 text-3xl orange">
                            @lang('challenges.common.description')
                        </div>


                        <div class="mt-2">
                            @lang("challenges-content.$slug.description")
                        </div>
                    </section>


                    <section class="p-2">
                        <div class="leading-6">
                            <div class="mt-6 text-3xl orange">@lang('challenges.common.instructions')</div>
                            <ul class="mt-2 ml-2 leading-7 checklist">


                                <li>@lang("challenges-content.$slug.instructions.0")</li>
                                <li>@lang("challenges-content.$slug.instructions.1")</li>
                                <li>@lang("challenges-content.$slug.instructions.2")</li>
                                <li>@lang("challenges-content.$slug.instructions.3")</li>
                                <li>@lang("challenges-content.$slug.instructions.4")</li>
                                <li>@lang("challenges-content.$slug.instructions.5")</li>
                                <li>@lang("challenges-content.$slug.instructions.6")</li>
                                <li>@lang("challenges-content.$slug.instructions.7")</li>
                                <li>@lang("challenges-content.$slug.instructions.8")</li>


                            </ul>
                        </div>
                    </section>

                    @include('2021.challenges._share')

                    <section class="p-2">
                        <div class="text-3xl orange">@lang('challenges.common.example')</div>

                        <div class="mt-2">
                            <a href="https://scratch.mit.edu/projects/896188895/editor/">https://scratch.mit.edu/projects/896188895/editor/</a>
                        </div>

                        <div class="mt-2">

                            <img width="700px"
                                 src="{{asset('img/2021/challenges/coding-with-legoboost-1.png')}}"/>

                            <img width="500px"
                                 src="{{asset('img/2021/challenges/coding-with-legoboost-2.png')}}"/>

                            <img width="700px"
                                 src="{{asset('img/2021/challenges/coding-with-legoboost-3.png')}}"/>


                        </div>

                        <div class="mt-2">@lang("challenges-content.$slug.example.0")</div>
                        <div class="mt-2">@lang("challenges-content.$slug.example.1")</div>
                        <div class="mt-2">@lang("challenges-content.$slug.example.2")</div>
                        <div class="mt-2">@lang("challenges-content.$slug.example.3")</div>
                        <div class="mt-2">@lang("challenges-content.$slug.example.4")</div>
                        <div class="mt-2">@lang("challenges-content.$slug.example.5")</div>
                        <div class="mt-2">@lang("challenges-content.$slug.example.6")</div>
                        <div class="mt-2">
                        <a href="https://drive.google.com/drive/folders/1gvapCHY3b6rENV2HBIIbM35XGdufj1U0?usp=sharing">https://drive.google.com/drive/folders/1gvapCHY3b6rENV2HBIIbM35XGdufj1U0?usp=sharing</a>
                        </div>

                    </section>


                </div>

                @include('2021.challenges._download',['url'=>"https://codeweek-s3.s3.eu-west-1.amazonaws.com/cw2023/$slug.docx"])
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
