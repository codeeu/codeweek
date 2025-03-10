@extends('layout.base')

@section('title', 'Coding Escape Room – Solve Puzzles with Code')
@section('description', 'Use your coding skills to crack puzzles and escape in this fun and interactive challenge.')

<x-tailwind></x-tailwind>

@section('content')

    @php
        $slug = 'coding-escape-room'
    @endphp

    <section id="codeweek-schools-page" class="codeweek-page">


        <section class="flex flex-row justify-between" style="background-color: #253658">
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
                            <li>@lang('challenges-content.common.audience.3')</li>

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
                        </ol>

                    </div>


                </section>

                <div class="mx-6 my-4">


                    <div class="text-xl text-left text-blue-600">@lang('challenges.common.materials')</div>
                    <ol class="list-disc ml-5">
                        <li>@lang("challenges-content.$slug.materials.0")</li>

                    </ol>

                </div>


                <div class="leading-6 text-base text-left">

                    <section class="bg-blue-100 p-2 mt-6">
                        <div class="orange text-3xl mt-2">
                            @lang('challenges.common.description')
                        </div>


                        <div class="mt-2">
                            @lang("challenges-content.$slug.description.0") <a
                                    href="https://forms.gle/btEHZx6X1muHoJfx7">https://forms.gle/btEHZx6X1muHoJfx7</a><br/>
                            @lang("challenges-content.$slug.description.1")
                        </div>
                    </section>


                    <section class="p-2">
                        <div class="leading-6">
                            <div class="mt-6 orange text-3xl">@lang('challenges.common.instructions')</div>

                            <div class="mb-6">

                                @lang("challenges-content.$slug.instructions") <a
                                        href="https://forms.gle/btEHZx6X1muHoJfx7">https://forms.gle/btEHZx6X1muHoJfx7</a>

                                @php
                                    $languages = explode(",",config("codeweek.LOCALES"));
                                      $locale = app()->getLocale();
                                @endphp
                                @if($locale !== 'me')
                                    <div>
                                        <a href="https://codeweek-s3.s3.eu-west-1.amazonaws.com/cw2023/{{strtolower($locale)}}_escape_coding.docx">WORD
                                            DOCUMENT</a>
                                    </div>

                                @endif
                            </div>


                        </div>
                    </section>

                    @include('2021.challenges._share')


                    <section class="p-2">
                        <div class="orange text-3xl">@lang('challenges.common.example')</div>

                        <div class="mt-2">

                            <div class="mb-4">@lang("challenges-content.$slug.example.0")</div>
                            <div class="mb-4">@lang("challenges-content.$slug.example.1")</div>
                            <div class="mb-4">@lang("challenges-content.$slug.example.2")</div>


                        </div>


                    </section>


                </div>

                <div class="justify-center bg-blue-200 p-2 mt-6">
                    @if($locale !== 'me')
                    Click <a class="uppercase text-blue-800 underline" href="https://codeweek-s3.s3.eu-west-1.amazonaws.com/cw2023/{{strtolower($locale)}}_escape_coding.docx">HERE</a> to download the questions for the escape room in your language as a word document.<br/>
                    @endif
                    @lang('challenges.download.0') <a href="https://codeweek-s3.s3.eu-west-1.amazonaws.com/cw2023/{{$slug}}.docx" class="uppercase text-blue-800 underline">@lang('challenges.download.1')</a> @lang('challenges.download.2').

                </div>

{{--                @include('2021.challenges._download',['url'=>"https://codeweek-s3.s3.eu-west-1.amazonaws.com/cw2023/$slug.docx"])--}}
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
