@extends('layout.base')

@section('title', 'Virtual Flower Field – Create a Digital Garden with Code')
@section('description', 'Use coding to create a beautiful virtual flower field. Explore programming and design while building a colorful, interactive garden.')

<x-tailwind></x-tailwind>

@section('content')

    @php
        $slug = 'virtual-flower-field'
    @endphp

    <section id="codeweek-schools-page" class="codeweek-page">


        <section class="flex flex-row justify-between" style="background-color: #EDD62F">
            <div class="flex justify-center items-center w-full">
                <div class="text-center m-12">
                    <div class="text-xl text-white w-full"><a class="text-black" href="{{route('challenges')}}">@lang('challenges.title')</a>
                    </div>
                    <div class="text-5xl mt-2" style="color: #4a990d">@lang("challenges-content.$slug.title")</div>
                </div>
            </div>

            <div class="md:w-10/12 md:flex hidden">
                <img src="{{asset('img/2021/challenges/thumbnails/virtual-flower-field.png')}}">


            </div>

        </section>

        <section class="codeweek-content-wrapper">
            <div class="m-6">

                @include('2021.challenges._author', ['author' => __("challenges-content.$slug.author")])

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
                            <li>@lang("challenges-content.$slug.duration")</li>
                        </ol>
                    </div>

                    <div>
                        <div class="text-xl text-left text-blue-600">@lang('challenges.common.materials')</div>
                        <ol class="list-disc ml-5">
                            <li>
                                @lang("challenges-content.$slug.materials.0") <a
                                        href="https://snap.berkeley.edu">Snap!</a>, @lang("challenges-content.$slug.materials.1")
                                <a href="https://scratch.mit.edu">Scratch</a>.
                            </li>
                        </ol>


                    </div>


                </section>

                <div class="mx-6 my-4">

                    <div class="text-xl text-left text-blue-600">@lang('challenges.common.purpose')</div>
                    <ol class="list-disc ml-5">

                        <li>@lang("challenges-content.$slug.purposes.0")</li>
                        <li>@lang("challenges-content.$slug.purposes.1")</li>
                        <li>@lang("challenges-content.$slug.purposes.2")</li>
                        <li>@lang("challenges-content.$slug.purposes.3")</li>
                        <li>@lang("challenges-content.$slug.purposes.4")</li>

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
                                <li> @lang("challenges-content.$slug.instructions.0") <a
                                            href="https://youtu.be/VcPc4VVDp2c">@lang("challenges-content.$slug.instructions.1")</a> @lang("challenges-content.$slug.instructions.2")
                                    <a href="https://tinyurl.com/virtualflowerfield">@lang("challenges-content.$slug.instructions.3")</a> @lang("challenges-content.$slug.instructions.4").
                                </li>
                                <li>@lang("challenges-content.$slug.instructions.5")
                                </li>
                                <li>@lang("challenges-content.$slug.instructions.6")
                                </li>
                                <li>@lang("challenges-content.$slug.instructions.7")</li>

                            </ul>
                        </div>
                    </section>

                    @include('2021.challenges._share')

                    <section class="p-2">
                        <div class="orange text-3xl">@lang('challenges.common.example')</div>

                        <div class="mt-2 w-1/2">

                            <img src="{{asset('img/2021/challenges/virtual-flower-field.png')}}"/>


                        </div>


                    </section>


                </div>

                @include('2021.challenges._download',['url'=>'https://codeweek-s3.s3.eu-west-1.amazonaws.com/cw2021/Grow+your+virtual+flower+field.docx'])
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
