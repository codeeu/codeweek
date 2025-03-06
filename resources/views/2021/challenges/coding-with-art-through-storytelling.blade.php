@extends('layout.base')

@section('title', 'Coding with Art & Storytelling – A Creative Challenge')
@section('description', 'Combine coding and creativity to bring stories to life through interactive digital art.')

<x-tailwind></x-tailwind>

@section('content')

    @php
        $slug = 'coding-with-art-through-storytelling'
//    @endphp

    <section id="codeweek-schools-page" class="codeweek-page">


        <section class="flex flex-row justify-between" style="background-color: #8A88B2">
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
                            <li>@lang('challenges.common.pre-primary') (3-6)</li>
                            <li>@lang('challenges-content.common.audience.1')</li>


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

                    <div>
                        <div class="text-xl text-left text-blue-600">@lang('challenges.common.duration')</div>
                        <ol class="list-disc ml-5">
                            <li>@lang("challenges-content.coding-escape-room.duration")</li>
                        </ol>
                    </div>

                    <div>
                        <div class="text-xl text-left text-blue-600">@lang('challenges.common.experience')</div>
                        <ol class="list-disc ml-5">
                            <li>@lang('challenges.common.intermediate')</li>
                        </ol>
                    </div>

                </section>

                <section class="grid grid-cols-1 gap-6 md:grid-cols-4 mx-6 my-4">






                    <div>
                        <div class="text-xl text-left text-blue-600">@lang('challenges.common.materials')</div>
                        <ol class="list-disc ml-5">
                            <li>@lang("challenges-content.$slug.materials.0")</li>
                            <li>@lang("challenges-content.$slug.materials.1")</li>
                        </ol>
                    </div>

                    <div>
                        <div class="text-xl text-left text-blue-600">@lang('challenges.common.materials')</div>
                        <ol class="list-disc ml-5">
                            <li><a href="https://drive.google.com/file/d/1Zk5g4WJ-dCK0AMwjBcz3GTSLXRR6XtwU/view?usp=sharing">https://drive.google.com/file/d/1Zk5g4WJ-dCK0AMwjBcz3GTSLXRR6XtwU/view?usp=sharing</a> (@lang("challenges-content.$slug.materials.2"))</li>
                            <li><a href="https://drive.google.com/file/d/1xLupy-TCYw3vd2Y30m2ivOrpwCt-_tug/view?usp=sharing">https://drive.google.com/file/d/1xLupy-TCYw3vd2Y30m2ivOrpwCt-_tug/view?usp=sharing</a> (@lang("challenges-content.$slug.materials.2"))</li>
                        </ol>
                    </div>

                    <div>
                        <div class="text-xl text-left text-blue-600">@lang('challenges.common.materials')</div>
                        <ol class="list-disc ml-5">
                            <li>@lang("challenges-content.$slug.materials.3") <a href="https://pz.harvard.edu/thinking-routines">https://pz.harvard.edu/thinking-routines</a></li>
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


                                <li>@lang("challenges-content.$slug.instructions.0")</li>
                                <li>@lang("challenges-content.$slug.instructions.1")</li>
                                <li>@lang("challenges-content.$slug.instructions.2")</li>
                                <li>@lang("challenges-content.$slug.instructions.3")</li>
                                <li>@lang("challenges-content.$slug.instructions.4")</li>


                            </ul>
                        </div>
                    </section>

                    @include('2021.challenges._share')

                    <section class="p-2">
                        <div class="orange text-3xl">@lang('challenges.common.example')</div>
                        <div class="mt-2">@lang("challenges-content.$slug.example.0")</div>
                        <div class="mt-2">@lang("challenges-content.$slug.example.1")</div>
                        <div class="mt-2">@lang("challenges-content.$slug.example.2")</div>
                        <div class="mt-2">@lang("challenges-content.$slug.example.3")</div>

                        <div class="mt-2">

                            <img width="700px" src="{{asset('img/2021/challenges/coding-with-art-through-storytelling-1.png')}}"/>


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
