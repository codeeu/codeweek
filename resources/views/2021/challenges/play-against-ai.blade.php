@extends('layout.base')

@section('title', 'Play Against AI – Challenge Your Coding Skills')
@section('description', 'Code a game where you compete against artificial intelligence. Test your coding abilities and learn how to create responsive AI.')

<x-tailwind></x-tailwind>

@section('content')

    @php
        $slug = 'play-against-ai'
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

                @include('2021.challenges._author', ['author' => 'Kristina Slišurić'])

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
                            <li>@lang("challenges-content.$slug.duration")</li>
                        </ol>
                    </div>

                    <div>

                        <div class="text-xl text-left text-blue-600">@lang('challenges.common.purpose')</div>
                        <ol class="list-disc ml-5">
                            <li>@lang("challenges-content.$slug.purposes.0")</li>
                            <li>@lang("challenges-content.$slug.purposes.1")</li>
                            <li>@lang("challenges-content.$slug.purposes.2")</li>
                            <li>@lang("challenges-content.$slug.purposes.3")</li>
                            <li>@lang("challenges-content.$slug.purposes.4")</li>
                            <li>@lang("challenges-content.$slug.purposes.5")</li>
                        </ol>

                    </div>


                </section>

                <div class="mx-6 my-4">


                    <div class="text-xl text-left text-blue-600">@lang('challenges.common.materials')</div>
                    <ol class="list-disc ml-5">
                        <li><a href="https://teachablemachine.withgoogle.com/">Teachable Machine</a></li>
                        <li><a href="https://pictoblox.ai/">Pictoblox</a></li>

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
                            <div class="mt-6 orange text-3xl">@lang('challenges.common.instructions')</div>
                            <ul class="leading-7 ml-2 checklist mt-2">


                                <li>@lang("challenges-content.$slug.instructions.0")</li>
                                <li>@lang("challenges-content.$slug.instructions.1")</li>
                                <div class="text-xl text-left text-blue-600 mt-6">Teachable Machine:</div>


                                <li>
    @lang("challenges-content.$slug.instructions.2")
    <img width="400px"  src="{{asset('img/2021/challenges/play-against-ai-1.png')}}"/>
</li>

                                <li>@lang("challenges-content.$slug.instructions.3")
                                    <img width="400px"  src="{{asset('img/2021/challenges/play-against-ai-2.png')}}"/></li>


                                <div class="text-xl text-left text-blue-600 mt-6">Pictoblox:</div>

                                <li>@lang("challenges-content.$slug.instructions.4")
                                    <img width="400px" src="{{asset('img/2021/challenges/play-against-ai-3.png')}}"/>
                                </li>

                                <li>@lang("challenges-content.$slug.instructions.5")
                                    <img width="400px" src="{{asset('img/2021/challenges/play-against-ai-4.png')}}"/>
                                </li>
                                <li>@lang("challenges-content.$slug.instructions.6")
                                    <img width="400px" src="{{asset('img/2021/challenges/play-against-ai-5.png')}}"/>
                                </li>

                                <li>@lang("challenges-content.$slug.instructions.7")
                                    <img width="400px" src="{{asset('img/2021/challenges/play-against-ai-6.png')}}"/>
                                </li>

                                <li>@lang("challenges-content.$slug.instructions.8")
                                    <img width="400px" src="{{asset('img/2021/challenges/play-against-ai-7.png')}}"/>
                                </li>

                                <li>@lang("challenges-content.$slug.instructions.9")
                                    <img width="400px" src="{{asset('img/2021/challenges/play-against-ai-8.png')}}"/>
                                </li>

                                <li>@lang("challenges-content.$slug.instructions.10")
                                    <img width="400px" src="{{asset('img/2021/challenges/play-against-ai-9.png')}}"/>
                                </li>

                                <li>@lang("challenges-content.$slug.instructions.11")
                                    <img width="400px" src="{{asset('img/2021/challenges/play-against-ai-10.png')}}"/>
                                </li>

                                <li>A) @lang("challenges-content.$slug.instructions.12")
                                    <img width="400px" src="{{asset('img/2021/challenges/play-against-ai-11.png')}}"/>
                                </li>
                                <li>B) @lang("challenges-content.$slug.instructions.13")
                                    <img width="400px" src="{{asset('img/2021/challenges/play-against-ai-12.png')}}"/>
                                </li>
                                <li>C) @lang("challenges-content.$slug.instructions.14")
                                    <img width="400px" src="{{asset('img/2021/challenges/play-against-ai-13.png')}}"/>
                                </li>

                                <li>@lang("challenges-content.$slug.instructions.15")
                                    <img width="400px" src="{{asset('img/2021/challenges/play-against-ai-14.png')}}"/>
                                </li>
                                <li>@lang("challenges-content.$slug.instructions.16")
                                    <img width="400px" src="{{asset('img/2021/challenges/play-against-ai-15.png')}}"/>
                                </li>



                            </ul>
                        </div>
                    </section>

                    @include('2021.challenges._share')



                    <section class="p-2">
                        <div class="orange text-3xl">@lang('challenges.common.example')</div>

                        <div class="mt-2">
                                <img src="{{asset('img/2021/challenges/play-against-ai-example.png')}}"/>
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
