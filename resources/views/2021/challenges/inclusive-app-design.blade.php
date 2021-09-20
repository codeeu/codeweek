@extends('layout.base')

<x-tailwind></x-tailwind>

@section('content')

    <section id="codeweek-schools-page" class="codeweek-page">


        <section class="flex flex-row justify-between" style="background-color: #FA7C22">
            <div class="flex justify-center items-center w-full">
                <div class="text-center m-12">
                    <div class="text-xl text-white w-full"><a class="text-black" href="{{route('challenges')}}">@lang('challenges.title')</a></div>
                    <div class="text-5xl mt-2" style="color: #f9f6f5">Inclusive App Design</div>
                </div>
            </div>

            <div class="md:w-10/12 md:flex hidden">
                <img src="{{asset('img/2021/challenges/thumbnails/inclusive-app-design.png')}}">


            </div>

        </section>

        <section class="codeweek-content-wrapper">
            <div class="m-6">

                @include('2021.challenges._author', ['author' => 'Apple Education'])

                <section class="grid grid-cols-1 gap-6 md:grid-cols-3 mx-6 my-4">


                    <div>
                        <div class="text-xl text-left text-blue-600">@lang('challenges.common.target-audience')</div>
                        <ol class="list-disc ml-5">
                            <li>Primary School students (6 to 12 years)</li>
                            <li>Lower Secondary School students (12 to 16 years)</li>
                            <li>Upper Secondary School students (16 to 18 years)</li>
                        </ol>
                    </div>

                    <div>
                        <div class="text-xl text-left text-blue-600">@lang('challenges.common.experience')</div>
                        <ol class="list-disc ml-5">
                            <li>Beginner</li>
                        </ol>
                    </div>

                    <div>
                        <div class="text-xl text-left text-blue-600">@lang('challenges.common.duration')</div>
                        <ol class="list-disc ml-5">
                            <li>60 minutes + optional extension activities</li>
                        </ol>
                    </div>




                </section>

                <section class="grid grid-cols-1 gap-6 md:grid-cols-2 mx-6 my-4">
                    <div>

                        <div class="text-xl text-left text-blue-600">@lang('challenges.common.purpose')</div>
                        <ol class="list-disc ml-5">

                            <li>To brainstorm, plan, prototype, and share an app idea that everyone could access and understand.</li>

                        </ol>


                    </div>

                    <div>
                        <div class="text-xl text-left text-blue-600">@lang('challenges.common.materials')</div>
                        <ol class="list-disc ml-5">
                            <li>
                                Explore the Inclusive App Design Activity at the Apple Teacher Learning Center: <a href="apple.co/eucodeweek">apple.co/eucodeweek</a> Keynote on iPad or Mac is recommended, but not required.
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
                            Great apps start with great ideas. In this activity, students will come up with an app idea on a topic they care about, then discover how to design apps with inclusion and accessibility in mind.
                        </div>
                    </section>


                    <section class="p-2">
                        <div class="leading-6">
                            <div class="mt-6 mb-2 orange text-3xl">@lang('challenges.common.instructions')</div>
                            You will find all instructions at this link: <a href="apple.co/eucodeweek">apple.co/eucodeweek</a><br/>
                            With this one-hour lesson plan, educators can guide students to:
                            <ul class="leading-7 ml-2 checklist mt-2">

                                <li>Learn about inclusive app design</li>
                                <li>Brainstorm topics they care about to find an app idea</li>
                                <li>Outline their app ideas and plan user activities</li>
                                <li>Prototype one part of their app in Keynote</li>
                                <li>Share demos of their prototypes and describe how they support users with diverse backgrounds and abilities</li>

                            </ul>
                        </div>
                    </section>

                    @include('2021.challenges._share')




                </div>

                @include('2021.challenges._download',['url'=>'https://codeweek-s3.s3.eu-west-1.amazonaws.com/cw2021/Inclusive+App+Design.docx'])
            </div>
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
