@extends('layout.base')

@section('title', 'Paper Circuit – Create Interactive Art with Code')
@section('description', 'Design and build interactive paper circuits using coding principles in this creative and hands-on challenge.')

<x-tailwind></x-tailwind>

@section('content')

    @php
    $slug = 'paper-circuit'
    @endphp
    <section id="codeweek-schools-page" class="codeweek-page">

        <section class="flex flex-row justify-between" style="background-color: #3B0049">
            <div class="flex justify-center items-center w-full">
                <div class="text-center m-12">
                    <div class="text-xl text-white w-full"><a class="text-white" href="{{route('challenges')}}">@lang('challenges.title')</a></div>
                    <div class="text-5xl mt-2" style="color: #3beac5">@lang("challenges-content.$slug.title")</div>
                </div>
            </div>

            <div class="md:w-10/12 md:mb-2 md:flex hidden">
                <img src="{{asset('img/2021/challenges/thumbnails/paper-circuit.png')}}">

            </div>

        </section>

        <section class="codeweek-content-wrapper">
            <div class="m-6">

                @include('2021.challenges._author', ['author' => __("challenges-content.$slug.author")])


                <section class="grid grid-cols-1 gap-6 md:grid-cols-5 mx-6 my-4">


                    <div>

                        <ol class="list-disc ml-5">
                            <li>@lang('challenges.common.teachers')</li>
                            <li>@lang('challenges.common.students') (7-14)</li>
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
                            <li>@lang("challenges-content.$slug.materials.0")</li>
                            <li>@lang("challenges-content.$slug.materials.1")</li>
                            <li>@lang("challenges-content.$slug.materials.2")</li>
                            <li>@lang("challenges-content.$slug.materials.3")</li>
                            <li>@lang("challenges-content.$slug.materials.4")</li>
                            <li>@lang("challenges-content.$slug.materials.5")</li>

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


                <div class="leading-6 text-base text-left">

                    <section class="bg-blue-100 p-2 mt-6">
                        <div class="orange text-3xl mt-2">
                            @lang('challenges.common.description')
                        </div>


                        <div class="mt-2">
                            @lang("challenges-content.$slug.description.0") <a href="{{route('toolkits')}}">@lang("challenges-content.$slug.description.1")</a> @lang("challenges-content.$slug.description.2")
                        </div>
                    </section>



                    <section class="p-2">
                        <div class="leading-8">
                            <div class="mt-6 orange text-3xl">@lang('challenges.common.instructions')</div>
                            <ul class="leading-7 ml-2 mt-0 checklist mt-2">
                                <li>@lang("challenges-content.$slug.instructions.0").</li>
                                <li>@lang("challenges-content.$slug.instructions.1").</li>
                                <li>@lang("challenges-content.$slug.instructions.2").</li>
                                <li>@lang("challenges-content.$slug.instructions.3").</li>
                                <li>@lang("challenges-content.$slug.instructions.4").</li>
                                <li>@lang("challenges-content.$slug.instructions.5").</li>
                                <li>@lang("challenges-content.$slug.instructions.6").</li>

                            </ul>

                        </div>


                    </section>

                    @include('2021.challenges._share')

                    <section class="p-2">
                        <div class="orange text-3xl">@lang('challenges.common.example')</div>
                        <div class="mt-2">@lang("challenges-content.$slug.example"):

                        </div>
                        <div>
                            <img src="{{asset('img/2021/challenges/paper-circuit-example-1.png')}}"/>
                        </div>
                    </section>


                </div>

                @include('2021.challenges._download',['url'=>'https://codeweek-s3.s3.eu-west-1.amazonaws.com/cw2021/EUCW+Challenge+Make+a+paper+circuit.docx'])
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
