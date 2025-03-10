@extends('layout.base')

@section('title', 'CS First Unplugged – Screen-Free Coding Fun')
@section('description', 'Learn coding concepts through hands-on, unplugged activities from Google CS First.')

<x-tailwind></x-tailwind>

@section('content')

    @php
        $slug = 'cs-first-unplugged-activities'
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

                @include('2021.challenges._author', ['author' => 'Google'])

                <section class="grid grid-cols-1 gap-6 md:grid-cols-4 mx-6 my-4">


                    <div>
                        <div class="text-xl text-left text-blue-600">@lang('challenges.common.target-audience')</div>
                        <ol class="list-disc ml-5">
                            <li>@lang('challenges.common.students') (6-12)</li>
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
                            <li>@lang("challenges-content.$slug.purposes.0")</li>
                            <li>@lang("challenges-content.$slug.purposes.1")</li>

                        </ol>

                    </div>


                </section>

                <div class="mx-6 my-4">


                    <div class="text-xl text-left text-blue-600">@lang('challenges.common.materials')</div>
                    <ol class="list-disc ml-5">
                        <li>@lang("challenges-content.$slug.materials.0")</li>
                        <li>@lang("challenges-content.$slug.materials.1")</li>
                        <li>@lang("challenges-content.$slug.materials.2")</li>
                        <li>@lang("challenges-content.$slug.materials.3")</li>
                        <li>@lang("challenges-content.$slug.materials.4")</li>

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
                                <li>@lang("challenges-content.$slug.instructions.0") <a
                                            href="https://csfirst.withgoogle.com/c/cs-first/en/cs-first-unplugged/overview.html">@lang("challenges-content.$slug.instructions.1")</a>, @lang("challenges-content.$slug.instructions.2")
                                    <a href="https://docs.google.com/document/d/1OV0Ooodf2ge4_5xqxoKsIsp7xKNqhMFO4VrRY89Pdm0/edit">@lang("challenges-content.$slug.instructions.1")</a>.
                                </li>
                                <li>@lang("challenges-content.$slug.instructions.3").</li>
                                <li>@lang("challenges-content.$slug.instructions.4").</li>
                                <li>@lang("challenges-extra.$slug.0")
                                    <a href="@lang("challenges-extra.cs-first-link")">@lang("challenges-extra.$slug.1")</a>.
                                </li>
                            </ul>
                        </div>
                    </section>

                    @include('2021.challenges._share')

                    <section class="p-2">
                        <div class="orange text-3xl">@lang('challenges.common.example')</div>

                        <div class="mt-2">

                            <img src="{{asset('img/2021/challenges/cs-first-unplugged-activities.png')}}"/>


                        </div>


                    </section>


                </div>

                @include('2021.challenges._download',['url'=>'https://codeweek-s3.s3.eu-west-1.amazonaws.com/cw2021/CS+First+Unplugged+activities.docx'])
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
