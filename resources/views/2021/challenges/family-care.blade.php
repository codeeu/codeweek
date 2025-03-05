@extends('layout.base')

@section('title', 'Family Care – Code for a Better Tomorrow')
@section('description', 'Use coding to create solutions that promote family well-being and care. Explore how technology can support families in this impactful challenge.')

<x-tailwind></x-tailwind>

@section('content')


    @php
        $slug = 'family-care'
    @endphp

    <section id="codeweek-schools-page" class="codeweek-page">


        <section class="flex flex-row justify-between" style="background-color: #EA8BA5">
            <div class="flex justify-center items-center w-full">
                <div class="text-center m-12">
                    <div class="text-xl text-white w-full"><a class="text-white"
                                                              href="{{route('challenges')}}">@lang('challenges.title')</a>
                    </div>
                    <div class="text-5xl mt-2" style="color: #2a3756">@lang("challenges-content.$slug.title")</div>
                </div>
            </div>

            <div class="md:w-10/12 md:flex hidden">
                <img src="{{asset('img/2021/challenges/thumbnails/family-care.png')}}">


            </div>

        </section>

        <section class="codeweek-content-wrapper">
            <div class="m-6">

                @include('2021.challenges._author', ['author' => 'Allen Yan / MakeX'])

                <section class="grid grid-cols-1 gap-6 md:grid-cols-3 mx-6 my-4">


                    <div>
                        <div class="text-xl text-left text-blue-600">@lang('challenges.common.target-audience')</div>
                        <ol class="list-disc ml-5">
                            <li>@lang('challenges.common.students') (6-13)</li>
                        </ol>
                    </div>

                    <div>
                        <div class="text-xl text-left text-blue-600">@lang('challenges.common.experience')</div>
                        <ol class="list-disc ml-5">
                            <li>@lang("challenges-content.$slug.experience")</li>
                        </ol>
                    </div>

                    <div>
                        <div class="text-xl text-left text-blue-600">@lang('challenges.common.duration')</div>
                        <ol class="list-disc ml-5">
                            <li>@lang("challenges-content.$slug.duration")</li>
                        </ol>
                    </div>


                </section>

                <section class="grid grid-cols-1 gap-6 md:grid-cols-2 mx-6 my-4">
                    <div>
                        <div class="text-xl text-left text-blue-600">@lang('challenges.common.materials')</div>
                        <ol class="list-disc ml-5">
                            <li>@lang("challenges-content.$slug.materials.0") <a href="https://ide.mblock.cc/">mBlock 5</a> @lang("challenges-content.$slug.materials.1") <a
                                        href="https://mblock.makeblock.com/en-us/download/">@lang("challenges-content.$slug.materials.2")</a>. @lang("challenges-content.$slug.materials.3")
                            </li>

                            <li>@lang("challenges-content.$slug.materials.4")
                            </li>
                            <li>@lang("challenges-content.$slug.materials.5")
                            </li>
                            <li>@lang("challenges-content.$slug.materials.6")
                            </li>
                            <li>@lang("challenges-content.$slug.materials.7") <a
                                        href="https://spark.makex.io/2021-makex-spark-code-for-health/">https://spark.makex.io/2021-makex-spark-code-for-health/</a>
                                @lang("challenges-content.$slug.materials.8") <a href="mailto:allen.yan@makeblock.com">allen.yan@makeblock.com</a>
                            </li>
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
                        </ol>


                    </div>
                </section>


                <div class="leading-6 text-base text-left">

                    <section class="bg-blue-100 p-2 mt-6">
                        <div class="orange text-3xl mt-2">
                            @lang('challenges.common.description')
                        </div>


                        <div class="mt-2">
                            @lang("challenges-content.$slug.description.0") <strong>@lang("challenges-content.$slug.description.1")</strong>. <br/>
                            @lang("challenges-content.$slug.description.2"):<br/>
                            1) @lang("challenges-content.$slug.description.3")<br/>
                            2) @lang("challenges-content.$slug.description.4")
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
                            @lang("challenges-content.$slug.example.0"): <a href="https://www.makex.cc/en/blog/238431">https://www.makex.cc/en/blog/238431</a>
                            @lang("challenges-content.$slug.example.1") <a href="https://www.makex.cc/en/blog/235153">https://www.makex.cc/en/blog/235153</a>

                            <div class="w-10/12">
                                <img src="{{asset('img/2021/challenges/family-care.png')}}"/>
                            </div>


                        </div>

                    </section>


                </div>

                @include('2021.challenges._download',['url'=>'https://codeweek-s3.s3.eu-west-1.amazonaws.com/cw2021/Family+Care.docx'])
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
