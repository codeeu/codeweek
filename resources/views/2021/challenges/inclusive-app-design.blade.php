@extends('layout.base')

@section('title', 'Inclusive App Design – Coding for Everyone')
@section('description', 'In this activity, students will come up with an app idea on a topic they care about, then discover how to design apps with inclusion and accessibility in mind.')

<x-tailwind></x-tailwind>

@section('content')
    @php
        $slug = 'inclusive-app-design';
    $url = 'https://apple.co/eucodeweek';
    switch(strtolower(app()->getLocale())){
        case 'da':
        case 'nl':
        case 'fi':
        case 'fr':
        case 'de':
        case 'it':
        case 'pl':
        case 'pt':
        case 'es':
        case 'sv':
            $url = 'https://apple.co/eucodeweek_' . strtoupper(app()->getLocale());
            break;
        case 'en':
            $url = 'https://apple.co/eucodeweek_UK';
            break;

        default:
            $url = 'https://apple.co/eucodeweek';
    }
    @endphp
    <section id="codeweek-schools-page" class="codeweek-page">


        <section class="flex flex-row justify-between" style="background-color: #FA7C22">
            <div class="flex justify-center items-center w-full">
                <div class="text-center m-12">
                    <div class="text-xl text-white w-full"><a class="text-black"
                                                              href="{{route('challenges')}}">@lang('challenges.title')</a>
                    </div>
                    <div class="text-5xl mt-2" style="color: #f9f6f5">@lang("challenges-content.$slug.title")</div>
                </div>
            </div>

            <div class="md:w-10/12 md:flex hidden">
                <img src="{{asset('img/2021/challenges/thumbnails/inclusive-app-design.png')}}">


            </div>

        </section>

        <section class="codeweek-content-wrapper">
            <div class="m-6">

                @include('2021.challenges._author', ['author' => __("challenges-content.$slug.author")])

                <section class="grid grid-cols-1 gap-6 md:grid-cols-3 mx-6 my-4">


                    <div>
                        <div class="text-xl text-left text-blue-600">@lang('challenges.common.target-audience')</div>
                        <ol class="list-disc ml-5">
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
                            <li>@lang("challenges-content.$slug.duration")</li>
                        </ol>
                    </div>


                </section>

                <section class="grid grid-cols-1 gap-6 md:grid-cols-2 mx-6 my-4">
                    <div>

                        <div class="text-xl text-left text-blue-600">@lang('challenges.common.purpose')</div>
                        <ol class="list-disc ml-5">

                            <li>@lang("challenges-content.$slug.purposes.0")</li>

                        </ol>


                    </div>

                    <div>
                        <div class="text-xl text-left text-blue-600">@lang('challenges.common.materials')</div>
                        <ol class="list-disc ml-5">
                            <li>
                                @lang("challenges-content.$slug.materials.0"): <a
                                        href="{{$url}}">{{$url}}</a>. @lang("challenges-content.$slug.materials.1")
                            </li>
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
                            <div class="mt-6 mb-2 orange text-3xl">@lang('challenges.common.instructions')</div>
                            @lang("challenges-content.$slug.instructions.0"): <a href="{{$url}}">{{$url}}</a><br/>
                            @lang("challenges-content.$slug.instructions.1"):
                            <ul class="leading-7 ml-2 checklist mt-2">

                                <li>@lang("challenges-content.$slug.instructions.2")</li>
                                <li>@lang("challenges-content.$slug.instructions.3")</li>
                                <li>@lang("challenges-content.$slug.instructions.4")</li>
                                <li>@lang("challenges-content.$slug.instructions.5")</li>
                                <li>@lang("challenges-content.$slug.instructions.6")</li>

                            </ul>
                        </div>
                    </section>

                    @include('2021.challenges._share')


                </div>

                @include('2021.challenges._download',['url'=>'https://codeweek-s3.s3.eu-west-1.amazonaws.com/cw2021/Inclusive+App+Design.docx'])
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
