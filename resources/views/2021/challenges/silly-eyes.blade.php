@extends('layout.base')

@section('title', 'Silly Eyes – A Fun Coding Challenge')
@section('description', 'You will design and create a silly eye character. The character’s large, silly eyes will follow the mouse pointer to bring your character to life.')

<x-tailwind></x-tailwind>

@section('content')


    @php
        $slug = 'silly-eyes'
    @endphp

    <section id="codeweek-schools-page" class="codeweek-page">


        <section class="flex flex-row justify-between" style="background-color: #0CA8E2">
            <div class="flex justify-center items-center w-full">
                <div class="text-center m-12">
                    <div class="text-xl text-white w-full"><a class="text-white" href="{{route('challenges')}}">@lang('challenges.title')</a></div>
                    <div class="text-5xl mt-2" style="color: #eee91f">@lang("challenges-content.$slug.title")</div>
                </div>
            </div>

            <div class="md:w-10/12 md:flex hidden">
                <img src="{{asset('img/2021/challenges/thumbnails/silly-eyes.png')}}">
            </div>

        </section>

        <section class="codeweek-content-wrapper">
            <div class="m-6">

                @include('2021.challenges._author', ['author' => __("challenges-content.$slug.author")])

                <section class="grid grid-cols-1 gap-6 md:grid-cols-4 mx-6 my-4">


                    <div>
                        <div class="text-xl text-left text-blue-600">@lang('challenges.common.target-audience')</div>
                        <ol class="list-disc ml-5">
                            <li>@lang("resources.resources.levels.Primary school (5-12)")</li>
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
                            <li>@lang("challenges-content.$slug.duration")</li>
                        </ol>
                    </div>

                    <div>
                        <div class="text-xl text-left text-blue-600">@lang('challenges.common.materials')</div>
                        <ol class="list-disc ml-5">
                            <li>
                                <a href="https://scratch.mit.edu/">Scratch</a>.
                            </li>
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
                        <div class="leading-6">
                            <div class="mt-6 mb-2 orange text-3xl">@lang('challenges.common.instructions')</div>
                                <div class="mb-2">
                                     <a href="https://projects.raspberrypi.org/en/projects/silly-eyes">@lang("challenges-content.$slug.instructions")</a>
                                </div>
                        </div>
                    </section>

                    @include('2021.challenges._share')

                    <section class="p-2">
                        <div class="orange text-3xl">@lang('challenges.common.example')</div>
                        <div class="mt-2">
                            @lang("challenges-content.$slug.example")
                        </div>


                        <div class="mt-2 w-10/12">

                            <img src="{{asset('img/2021/challenges/silly-eyes-1.png')}}"/>
                            <img src="{{asset('img/2021/challenges/silly-eyes-2.png')}}"/>
                            <img src="{{asset('img/2021/challenges/silly-eyes-3.png')}}"/>


                        </div>


                    </section>


                </div>

                @include('2021.challenges._download',['url'=>'https://codeweek-s3.s3.eu-west-1.amazonaws.com/cw2021/Silly+eyes.docx'])
            </div>
        </section>
    </section>
    <div style="text-align: center">@include('include.licence')</div>
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
