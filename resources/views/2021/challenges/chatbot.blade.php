@extends('layout.base')

@section('title', 'Chatbot – Build Your Own Interactive Chatbot')
@section('description', 'Learn how to design and program a chatbot that can interact with users in this engaging coding challenge.')

<x-tailwind></x-tailwind>

@section('content')

    @php
        $slug = 'chatbot'
    @endphp

    <section id="codeweek-schools-page" class="codeweek-page">

        <section class="flex flex-row justify-between" style="background-color: #EEA44E">
            <div class="flex justify-center items-center w-full">
                <div class="text-center m-12">
                    <div class="text-xl text-white w-full"><a class="text-white"
                                                              href="{{route('challenges')}}">@lang('challenges.title')</a>
                    </div>
                    <div class="text-5xl mt-2" style="color: #1756a0">@lang("challenges-content.$slug.title")</div>
                </div>
            </div>

            <div class="md:w-10/12 md:mb-2 md:flex hidden">
                <img src="{{asset('img/2021/challenges/thumbnails/chatbot.png')}}">

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
                            <li>@lang('challenges.common.advanced')</li>
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
                            <li><a href="https://pencilcode.net/" target="_blank">Pencil code</a></li>
                            <li><a href="https://machinelearningforkids.co.uk/" target="_blank">Machine learning for
                                    kids</a></li>
                    </div>

                    <div>
                        <div class="text-xl text-left text-blue-600">@lang('challenges.common.purpose')</div>
                        <ol class="list-disc ml-5">
                            <li>@lang("challenges-content.$slug.purposes.0")</li>
                            <li>@lang("challenges-content.$slug.purposes.1")</li>
                        </ol>

                    </div>


                </section>


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
                                <li>@lang("challenges-content.$slug.instructions.0").</li>
                                <li>@lang("challenges-content.$slug.instructions.1") <a href="https://pencilcode.net/"
                                                                                        target="_blank">Pencil
                                        Code</a> @lang("challenges-content.$slug.instructions.2")
                                </li>
                                <li>@lang("challenges-content.$slug.instructions.3").</li>
                                <li>@lang("challenges-content.$slug.instructions.4").
                                    <img class="m-4" width="550" src="{{asset('img/2021/challenges/chatbot-1.png')}}"/>
                                    <img class="m-4" width="550" src="{{asset('img/2021/challenges/chatbot-2.png')}}"/>

                                </li>
                                <li>
                                    @lang("challenges-content.$slug.instructions.5")
                                    <a href="https://abfromz.pencilcode.net/edit/Riddle"
                                       target="_blank">@lang("challenges-content.$slug.instructions.6")</a> <a
                                            href="#pencil-code"><sup>1</sup></a> @lang("challenges-content.$slug.instructions.7")
                                    .
                                </li>
                            </ul>

                        </div>
                    </section>

                    @include('2021.challenges._share')

                    <section class="p-2">
                        <div class="mt-6 orange text-3xl">@lang('challenges.common.example')</div>
                        <div class="mt-2">@lang("challenges-content.$slug.example")
                            <iframe src="//abfromz.pencilcode.net/home/Riddle" width="640" height="640" frameborder="0"
                                    allowfullScreen></iframe>
                        </div>
                    </section>

                    <div id="pencil-code" class="text-sm">
                        1. @lang("challenges-content.$slug.more.0") <a
                                href="https://gym.pencilcode.net/imagine/#/imagine/troll.html"
                                target="_blank">@lang("challenges-content.$slug.more.1")</a>
                    </div>


                </div>

                @include('2021.challenges._download',['url'=>'https://codeweek-s3.s3.eu-west-1.amazonaws.com/cw2021/EUCW+Challenge+Make+a+chatbot.docx'])

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
