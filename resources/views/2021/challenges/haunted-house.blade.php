@extends('layout.base')

@section('title', 'Haunted House – A Spooky Coding Challenge')
@section('description', 'Code your own interactive haunted house and bring spooky surprises to life!  Every time the code is run a new story will be created. ')

<x-tailwind></x-tailwind>

@section('content')


    @php
        $slug = 'haunted-house'
    @endphp

    <section id="codeweek-schools-page" class="codeweek-page">


        <section class="flex flex-row justify-between" style="background-color: #222220">
            <div class="flex justify-center items-center w-full">
                <div class="text-center m-12">
                    <div class="text-xl text-white w-full"><a class="text-white"
                                                              href="{{route('challenges')}}">@lang('challenges.title')</a>
                    </div>
                    <div class="text-5xl mt-2" style="color: #EEE91F">@lang("challenges-content.$slug.title")</div>
                </div>
            </div>

            <div class="md:w-10/12 md:flex hidden">
                <img src="{{asset('img/2021/challenges/thumbnails/haunted-house.png')}}">


            </div>

        </section>

        <section class="codeweek-content-wrapper">
            <div class="m-6">

                @include('2021.challenges._author', ['author' => __("challenges-content.$slug.author")])

                <section class="grid grid-cols-1 gap-6 md:grid-cols-4 mx-6 my-4">


                    <div>
                        <div class="text-xl text-left text-blue-600">@lang('challenges.common.target-audience')</div>
                        <ol class="list-disc ml-5">
                            <li>@lang("challenges-content.$slug.audience")</li>
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
                            <li>     @lang("challenges-content.$slug.materials.0") <a href="https://www.hedycode.com">hedycode.com</a>, @lang("challenges-content.$slug.materials.1")
                            </li>
                        </ol>


                    </div>


                </section>

                <div class="mx-6 my-4">

                    <div class="text-xl text-left text-blue-600">@lang('challenges.common.purpose')</div>
                    <ol class="list-disc ml-5">

                        <li>@lang("challenges-content.$slug.purposes.0")</li>
                        <li>@lang("challenges-content.$slug.purposes.1")</li>
                    </ol>


                </div>


                <div class="leading-6 text-base text-left">

                    <section class="bg-blue-100 p-2 mt-6">
                        <div class="orange text-3xl mt-2"> @lang('challenges.common.description')
                        </div>


                        <div class="mt-2"> @lang("challenges-content.$slug.description")
                        </div>
                    </section>


                    <section class="p-2">
                        <div class="leading-6">
                            <div class="mt-6 orange text-3xl">@lang('challenges.common.instructions')</div>
                            <ul class="leading-7 ml-2 checklist mt-2">
                                <li>@lang("challenges-content.$slug.instructions.0")</li>
                                <li>@lang("challenges-content.$slug.instructions.1")</li>
                                <li>@lang("challenges-content.$slug.instructions.2")</li>
                                <li>@lang("challenges-content.$slug.instructions.3") <a href="https://www.hedycode.com/hedy#haunted">@lang("challenges-content.$slug.instructions.4")</a>.</li>
                                <li>@lang("challenges-content.$slug.instructions.5") <a href="https://www.youtube.com/watch?v=EdqT313rM40&t=1s">@lang("challenges-content.$slug.instructions.6")</a>.</li>
                            </ul>
                        </div>
                    </section>

                    @include('2021.challenges._share')

                    <section class="p-2">
                        <div class="orange text-3xl">@lang('challenges.common.example')</div>
                        <ul class="leading-7 ml-2 checklist mt-2">
                            <li><a href="https://www.hedycode.com/hedy/2#haunted">@lang("challenges-content.$slug.example") 2</a></li>
                            <li><a href="https://www.hedycode.com/hedy/4#haunted">@lang("challenges-content.$slug.example") 4</a></li>
                        </ul>

                        <div class="mt-2 w-10/12">
                            <img src="{{asset('img/2021/challenges/haunted-house-1.png')}}"/>


                        </div>


                    </section>


                </div>

                @include('2021.challenges._download',['url'=>'https://codeweek-s3.s3.eu-west-1.amazonaws.com/cw2021/Haunted+House+in+Hedy.docx'])
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
