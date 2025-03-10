@extends('layout.base')

@section('title', 'Emobot Kliki – Create Your Own Interactive Robot')
@section('description', 'Design and program Emobot Kliki, an interactive robot, in this fun coding challenge that combines creativity and technology.')

<x-tailwind></x-tailwind>

@section('content')

    @php
        $slug = 'emobot-kliki'
    @endphp

    <section id="codeweek-schools-page" class="codeweek-page">


        <section class="flex flex-row justify-between" style="background-color: #5AABAE">
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
                            <li>@lang('challenges-content.common.audience.0')</li>
                            <li>@lang('challenges-content.common.audience.2')</li>

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

                        <div class="text-xl text-left text-blue-600">@lang('challenges.common.purpose')</div>
                        <ol class="list-disc ml-5">
                            <li>@lang("challenges-content.$slug.purposes.0")</li>
                            <li>@lang("challenges-content.$slug.purposes.1")</li>
                            <li>@lang("challenges-content.$slug.purposes.2")</li>
                            <li>@lang("challenges-content.$slug.purposes.3")</li>
                        </ol>

                    </div>


                </section>

                <div class="mx-6 my-4">


                    <div class="text-xl text-left text-blue-600">@lang('challenges.common.materials')</div>
                    <ol class="list-disc ml-5">
                        <li><a href="https://machinelearningforkids.co.uk/">Machine learning for kids</a></li>
                        <li><a href="https://scratch.mit.edu/">Scratch</a></li>
                        <li><a href="https://www.bing.com/create">Microsoft Bing Image Creator</a></li>

                    </ol>

                </div>


                <div class="leading-6 text-base text-left">

                    <section class="bg-blue-100 p-2 mt-6">
                        <div class="orange text-3xl mt-2">
                            @lang('challenges.common.description')
                        </div>


                        <div class="mt-2">
                            @lang("challenges-content.$slug.description.0")
                            @lang("challenges-content.$slug.description.1")
                        </div>
                    </section>


                    <section class="p-2">
                        <div class="leading-6">
                            <div class="mt-6 orange text-3xl">@lang('challenges.common.instructions')</div>
                            <ul class="leading-7 ml-2 checklist mt-2">


                                <li>@lang("challenges-content.$slug.instructions.0")</li>
                                <li>@lang("challenges-content.$slug.instructions.1")</li>
                                <li>@lang("challenges-content.$slug.instructions.2")</li>
                                <li>@lang("challenges-content.$slug.instructions.3")</li>
                                <li>@lang("challenges-content.$slug.instructions.4")</li>
                                <li>@lang("challenges-content.$slug.instructions.5")</li>


                                <img width='500px' src="{{asset('img/2021/challenges/emobot-kliki-1.png')}}"/>

                            </ul>
                        </div>
                    </section>

                    @include('2021.challenges._share')



                    <section class="p-2">
                        <div class="orange text-3xl">@lang('challenges.common.example')</div>

                        <div class="mt-2">
                            <a href="https://machinelearningforkids.co.uk/#!/mlproject/auth0%257C642ff7b023f96cf587fba498/be048650-ddda-11ed-8768-6d044a8149b1/training">
                            <img src="{{asset('img/2021/challenges/emobot-kliki-2.png')}}"/>
                            </a>
                        </div>

                        <div>@lang("challenges-content.$slug.example.0")</div>
                        <div>@lang("challenges-content.$slug.example.1")</div>

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
