@extends('layout.base')

@section('title', 'Craft Magic – Create Magical Coding Projects')
@section('description', 'Use coding to create magical, interactive projects in this fun and creative challenge. Bring your imaginative ideas to life through programming!')

<x-tailwind></x-tailwind>

@section('content')

    @php
        $slug = 'craft-magic'
    @endphp

    <section id="codeweek-schools-page" class="codeweek-page">


        <section class="flex flex-row justify-between" style="background-color: #F5B740">
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
                            <li>@lang('challenges-content.common.audience.1')</li>
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
                            <li>@lang("challenges-content.$slug.duration.0")</li>
                            <li>@lang("challenges-content.$slug.duration.1")</li>
                        </ol>
                    </div>

                    <div>
                        <div class="text-xl text-left text-blue-600">@lang('challenges.common.materials')</div>
                        <ol class="list-disc ml-5">
                            <li><a href="https://ai.thestempedia.com">@lang("challenges-content.$slug.materials.0")</a>
                            </li>
                                    <li class="ml-4">@lang("challenges-content.$slug.materials.1")</li>
                                    <li class="ml-4">@lang("challenges-content.$slug.materials.2")</li>


                            <li>@lang("challenges-content.$slug.materials.3")</li>
                            <li>@lang("challenges-content.$slug.materials.4")</li>


                        </ol>
                    </div>

                </section>

                <section class="grid grid-cols-1 gap-6 md:grid-cols-4 mx-6 my-4">


                    <div>

                        <div class="text-xl text-left text-blue-600">@lang('challenges.common.purpose')</div>
                        <ol class="list-disc ml-5">
                            <li>@lang("challenges-content.$slug.purposes.0")</li>
                            <li>@lang("challenges-content.$slug.purposes.1")</li>


                        </ol>

                    </div>
                    <div>

                        <ol class="list-disc ml-5 mt-8">
                            <li>@lang("challenges-content.$slug.purposes.2")</li>
                            <li>@lang("challenges-content.$slug.purposes.3")</li>

                        </ol>

                    </div>

                    <div>

                        <ol class="list-disc ml-5 mt-8">
                            <li>@lang("challenges-content.$slug.purposes.4")</li>
                            <li>@lang("challenges-content.$slug.purposes.5")</li>
                        </ol>

                    </div>

                    <div>

                        <ol class="list-disc ml-5 mt-8">
                            <li>@lang("challenges-content.$slug.purposes.6")</li>
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


                                <li><a href="https://ai.thestempedia.com">@lang("challenges-content.$slug.instructions.0")</a></li>
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
                            <img src="{{asset('img/2021/challenges/craft-magic-example.png')}}"/>
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
