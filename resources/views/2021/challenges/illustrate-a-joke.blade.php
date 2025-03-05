@extends('layout.base')

@section('title', 'Illustrate a Joke – A Fun Coding Challenge')
@section('description', 'The students design a game where the user finds the answer to a joke question when the figure hits an object on the playing field.')

<x-tailwind></x-tailwind>

@section('content')

    @php
        $slug = 'illustrate-a-joke'
    @endphp

    <section id="codeweek-schools-page" class="codeweek-page">


        <section class="flex flex-row justify-between" style="background-color: #C4C1F5">
            <div class="flex justify-center items-center w-full">
                <div class="text-center m-12">
                    <div class="text-xl text-white w-full"><a class="text-black"
                                                              href="{{route('challenges')}}">@lang('challenges.title')</a>
                    </div>
                    <div class="text-5xl mt-2" style="color: #ffffff">@lang("challenges-content.$slug.title")</div>
                </div>
            </div>

            <div class="md:w-10/12 md:flex hidden">
                <img src="{{asset('img/2021/challenges/thumbnails/'.$slug.'.png')}}">


            </div>

        </section>

        <section class="codeweek-content-wrapper">
            <div class="m-6">

                @include('2021.challenges._author', ['author' => __("challenges-content.$slug.author")])

                <section class="grid grid-cols-1 gap-6 md:grid-cols-4 mx-6 my-4">


                    <div>
                        <div class="text-xl text-left text-blue-600">@lang('challenges.common.target-audience')</div>
                        <ol class="list-disc ml-5">

                            <li>@lang('challenges-content.common.audience.1')</li>
                            <li>@lang('challenges-content.common.audience.2')</li>
                            <li>@lang('challenges-content.common.audience.3')</li>

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
                            <li>@lang("challenges-content.$slug.materials") <a href="https://make.bitsy.org">https://make.bitsy.org</a>
                            </li>


                        </ol>
                    </div>

                </section>

                <section class="grid grid-cols-1 gap-6 md:grid-cols-4 mx-6 my-4">


                    <div>

                        <div class="text-xl text-left text-blue-600">@lang('challenges.common.purpose')</div>
                        <ol class="list-disc ml-5">
                            <li>@lang("challenges-content.$slug.purposes")</li>
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
                        <div class="leading-6">
                            <div class="mt-6 orange text-3xl">@lang('challenges.common.instructions')</div>
                            <ul class="leading-7 ml-2 checklist mt-2">


                                <li>@lang("challenges-content.$slug.instructions.0")</li>
                                <li>@lang("challenges-content.$slug.instructions.1")</li>
                                <img width="100px" src="{{asset('img/2021/challenges/illustrate-a-joke-1.png')}}"/>
                                <li>@lang("challenges-content.$slug.instructions.4")</li>
                                <li>@lang("challenges-content.$slug.instructions.5")</li>
                                <img width="300px" src="{{asset('img/2021/challenges/illustrate-a-joke-2.png')}}"/>
                                <li>@lang("challenges-content.$slug.instructions.6")</li>
                                <img width="600px" src="{{asset('img/2021/challenges/illustrate-a-joke-3.png')}}"/>
                                <li>@lang("challenges-content.$slug.instructions.7")</li>


                            </ul>
                        </div>
                    </section>

                    @include('2021.challenges._share')


                    <section class="p-2">
                        <div class="orange text-3xl">@lang('challenges.common.example')</div>

                        <ul class="leading-7 ml-2 checklist mt-2">

                            <li>@lang("challenges-content.$slug.example") <a
                                        href="http://wordpress.space2code.de/?page_id=276">http://wordpress.space2code.de/?page_id=276</a>
                            </li>

                        </ul>

                        <div class="mt-2">
                            <img width="400px" src="{{asset('img/2021/challenges/illustrate-a-joke-4.png')}}"/>
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
