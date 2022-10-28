@extends('layout.base')

<x-tailwind></x-tailwind>

@section('content')

    @php
        $slug = 'european-astro-pi'
    @endphp

    <section id="codeweek-schools-page" class="codeweek-page">


        <section class="flex flex-row justify-between" style="background-color: #DED7BC">
            <div class="flex justify-center items-center w-full">
                <div class="text-center m-12">
                    <div class="text-xl text-white w-full"><a class="text-black"
                                                              href="{{route('challenges')}}">@lang('challenges.title')</a>
                    </div>
                    <div class="text-5xl mt-2" style="color: #d84d96">@lang("challenges-content.$slug.title")</div>
                </div>
            </div>

            <div class="md:w-10/12 md:flex hidden">
                <img src="{{asset('img/2021/challenges/thumbnails/cs-first-unplugged-activities.png')}}">


            </div>

        </section>

        <section class="codeweek-content-wrapper">
            <div class="m-6">

                @include('2021.challenges._author', ['author' => ''])

                <section class="grid grid-cols-1 gap-6 md:grid-cols-4 mx-6 my-4">


                    <div>
                        <div class="text-xl text-left text-blue-600">@lang('challenges.common.target-audience')</div>
                        <ol class="list-disc ml-5">
                            <li>@lang('challenges.common.teachers')</li>
                            <li>@lang("resources.resources.levels.Primary school (5-12)")</li>
                            <li>@lang("resources.resources.levels.Lower secondary school (12-16)")</li>
                            <li>@lang("resources.resources.levels.Upper secondary school (16-18)")</li>
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

                        <div class="text-xl text-left text-blue-600">@lang('challenges.common.purpose')</div>
                        <ol class="list-disc ml-5">
                            <li>@lang("challenges-content.$slug.purposes")</li>
                        </ol>

                    </div>


                </section>

                <div class="mx-6 my-4">


                    <div class="text-xl text-left text-blue-600">@lang('challenges.common.materials')</div>
                    <ol class="list-disc ml-5">
                        <li>@lang("challenges-content.$slug.materials")</li>

                    </ol>

                </div>


                <div class="leading-6 text-base text-left">

                    <section class="bg-blue-100 p-2 mt-6">
                        <div class="orange text-3xl mt-2">
                            @lang('challenges.common.description')
                        </div>


                        <div class="mt-2">
                            @lang("challenges-content.$slug.description.0")<br/>
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
                                <li>@lang("challenges-content.$slug.instructions.6")</li>
                            </ul>
                        </div>
                    </section>

                    @include('2021.challenges._share')

                    <section class="p-2">
                        <div class="orange text-3xl">@lang('challenges.common.example')</div>

                        <div class="mt-2">
                            <code>
                                from sense_hat import SenseHat<br/>
                                sense = SenseHat()<br/>
                                sense.set_rotation(270)<br/><br/>



                                w = (255, 255, 255)<br/>

                                b = (0, 0, 0)<br/>

                                g = (50,50,50)<br/>

                                s = (200,255,200)<br/>

                                r = (255,0,0)<br/><br/>



                                picture = [<br/>

                                g, b, b, b, b, b, b, g,<br/>

                                b, g, g, g, g, g, g, b,<br/>

                                b, g, b, b, g, w, g, g,<br/>

                                b, g, b, b, g, g, g, g,<br/>

                                b, g, g, g, s, s, g, g,<br/>

                                b, g, r, g, g, g, g, g,<br/>

                                b, g, g, g, g, g, g, b,<br/>

                                g, b, b, b, b, b, b, g<br/>

                                ]<br/><br/>



                                sense.set_pixels(picture)
                            </code>

                            <img class="mt-6" src="https://codeweek-s3.s3.eu-west-1.amazonaws.com/cw2022/fu-pic.png">

                            <img class="mt-6" src="https://codeweek-s3.s3.eu-west-1.amazonaws.com/cw2022/wet-dry.png">

                        </div>


                    </section>


                </div>

                @include('2021.challenges._download',['url'=>'https://codeweek-s3.s3.eu-west-1.amazonaws.com/cw2022/build-calliope.docx'])
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
