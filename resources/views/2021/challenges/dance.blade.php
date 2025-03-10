@extends('layout.base')

@section('title', 'Dance – A Creative Coding Challenge')
@section('description', 'Combine coding and dance in this exciting challenge. Program movements and animations to create a unique digital dance performance.')

<x-tailwind></x-tailwind>

@section('content')

    @php
        $slug = 'dance'
    @endphp

    <section id="codeweek-schools-page" class="codeweek-page">

        <section class="flex flex-row justify-between" style="background-color: #FB6823">
            <div class="flex justify-center items-center w-full">
                <div class="text-center m-12">
                    <div class="text-xl text-white w-full"><a class="text-white" href="{{route('challenges')}}">@lang('challenges.title')</a></div>
                    <div class="text-5xl mt-2" style="color: #fed354">@lang("challenges-content.$slug.title")</div>
                </div>
            </div>


                <div class="md:w-10/12 md:mb-2 md:flex hidden">
                <img src="{{asset('img/2021/challenges/thumbnails/dance.png')}}">

            </div>

        </section>

        <section class="codeweek-content-wrapper">
            <div class="m-6">

                @include('2021.challenges._author', ['author' => __("challenges-content.$slug.author")])

                <section class="grid grid-cols-1 gap-6 md:grid-cols-5 mx-6 my-4">


                    <div>
                        <div class="text-xl text-left text-blue-600">@lang('challenges.common.target-audience')</div>
                        <ol class="list-disc ml-5">
                            <li>@lang('challenges.common.teachers')</li>
                            <li>@lang('challenges.common.students') (8-12)</li>
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
                            <li><a href="https://www.tynker.com/" target="_blank" rel="noreferer noopener">Tynker</a></li>
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
                            @lang("challenges-content.$slug.description")
                        </div>
                    </section>



                    <section class="p-2">
                        <div class="leading-8">
                            <div class="mt-6 orange text-3xl">@lang('challenges.common.instructions')</div>
                            <ul class="leading-7 ml-2 mt-0 checklist mt-2">
                                <li>@lang("challenges-content.$slug.instructions.0") <a href="https://www.tynker.com/">Tynker</a> @lang("challenges-content.$slug.instructions.1")</li>
                                <li>@lang("challenges-content.$slug.instructions.2") <strong>Create a project – Blank Block Coding Project</strong> @lang("challenges-content.$slug.instructions.3"). </li>
                                <li>@lang("challenges-content.$slug.instructions.4") <strong>Stage</strong> @lang("challenges-content.$slug.instructions.5")
                                    <img class="m-4" width="400" src="{{asset('img/2021/challenges/dance-1.png')}}"/>
                                </li>
                                <li>@lang("challenges-content.$slug.instructions.6") <strong>Add Actor</strong> @lang("challenges-content.$slug.instructions.7")</li>
                                <li>@lang("challenges-content.$slug.instructions.8"):
                                    <img class="m-4" width="250" src="{{asset('img/2021/challenges/dance-2.png')}}"/>
                                </li>
                                <li>@lang("challenges-content.$slug.instructions.9") <strong>@lang("challenges-content.$slug.instructions.10")</strong> @lang("challenges-content.$slug.instructions.11").
                                    <img class="m-4" width="600" src="{{asset('img/2021/challenges/dance-3.png')}}"/>
                                </li>

                            </ul>

                        </div>
                    </section>

                    @include('2021.challenges._share')


                    <section class="p-2">
                        <div class="mt-6 orange text-3xl">@lang('challenges.common.example')</div>
                        <div class="mt-2">@lang("challenges-content.$slug.example.0") <a target="_blank" rel="noreferer noopener" href="https://www.tynker.com/play/dancing-robots/612249dd2d3eb65f2b0c6b1f-728057XjzbT,f5GeQFBM,dlKC2n,wk">@lang("challenges-content.$slug.example.1")</a> @lang("challenges-content.$slug.example.2") <iframe width="660" height="408" src="//www.tynker.com/ide/embedded?p=612249dd2d3eb65f2b0c6b1f&controls=false&autostart=false" frameborder="0" allowfullscreen></iframe>
                        </div>
                    </section>


                </div>

                @include('2021.challenges._download',['url'=>'https://codeweek-s3.s3.eu-west-1.amazonaws.com/cw2021/EUCW+Challenge+Create+a++Dance.docx'])
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
