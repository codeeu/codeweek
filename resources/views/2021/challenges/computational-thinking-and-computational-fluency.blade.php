@extends('layout.base')

<x-tailwind></x-tailwind>

@section('content')

    <section id="codeweek-schools-page" class="codeweek-page">


        <section class="flex flex-row justify-between" style="background-color: #E3E3E3">
            <div class="flex justify-center items-center w-full">
                <div class="text-center m-12">
                    <div class="text-xl text-white w-full"><a href="{{route('challenges')}}">EU CODE WEEK CHALLENGES</a></div>
                    <div class="text-5xl mt-2" style="color: #6970a9">Computational Thinking and Computational Fluency with ScratchJr.</div>
                </div>
            </div>

            <div class="md:w-10/12 md:flex hidden">
                <img src="{{asset('img/2021/challenges/thumbnails/computational-thinking-and-computational-fluency.png')}}">

            </div>

        </section>

        <section class="codeweek-content-wrapper">
            <div class="m-6">

                @include('2021.challenges._author', ['author' => 'Stamatis Papadakis – EU Code Week Ambassador Greece'])

                <section class="grid grid-cols-1 gap-6 md:grid-cols-4 mx-6 my-4">


                    <div>
                        <div class="text-xl text-left text-blue-600">@lang('challenges.common.target-audience')</div>
                        <ol class="list-disc ml-5">
                            <li>Teachers</li>
                            <li>Pre-primary students (3 to 6 years)</li>
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
                            <li>90 minutes</li>
                        </ol>
                    </div>

                    <div>
                        <div class="text-xl text-left text-blue-600">@lang('challenges.common.materials')</div>
                        <ol class="list-disc ml-5">
                            <li>The free app <a href="www.scratchjr.org/">ScratchJr</a> works on various operating systems and types of smart devices.</li>
                            <li>Also, the <a href="www.scratchjr.org/">ScratchJr</a> website offers plenty of free educational material.</li>
                        </ol>


                    </div>



                </section>

                <div class="mx-6 my-4">
                    <div class="text-xl text-left text-blue-600">@lang('challenges.common.purpose')</div>
                    <ol class="list-disc ml-5">
                        <li>To get familiar with new commands and interface.</li>
                        <li>To create simple programs with simple cause-and-effect commands.</li>
                        <li>To perform simple debugging through trial and error.</li>
                    </ol>

                </div>


                <div class="leading-6 text-base text-left">

                    <section class="bg-blue-100 p-2 mt-6">
                        <div class="orange text-3xl mt-2">
                            @lang('challenges.common.description')
                        </div>


                        <div class="mt-2">
                            In this challenge children will integrate CT concepts into their projects by using the ScratchJr app to make their stories more engaging, exciting, and emotional.
                        </div>
                    </section>



                    <section class="p-2">
                        <div class="leading-6">
                            <div class="mt-6 orange text-3xl">@lang('challenges.common.instructions')</div>
                            <ul class="leading-7 ml-2 checklist mt-2">
                                <li>ScratchJr does not require children to be literate. All instructions and menu options are identifiable through symbols and colours. The challenge can be completed within the classroom, the lab or even in an open space as no internet is required.</li>
                                <li>Children use city as background and use coding blocks to make a car drive across the city.</li>
                            </ul>
                        </div>
                    </section>

@include('2021.challenges._share')

                    <section class="p-2">
                        <div class="orange text-3xl">@lang('challenges.common.example')</div>
                        <div class="mt-2">Children can use sound and motion blocks and start again blocks to make characters dance.<br/>
                            Children pick a background and a character and use a motion block to make a car drive across the city Children can use the speed block to speed up or slow down a character.</div>
                        <div class="mt-2">

                            <img src="{{asset('img/2021/challenges/computational-thinking-and-computational-fluency.png')}}"/>


                        </div>

                    </section>


                </div>

                @include('2021.challenges._download',['url'=>'https://codeweek-s3.s3.eu-west-1.amazonaws.com/cw2021/Computational+Thinking+and+Computational+Fluency+with+ScratchJr..docx'])
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
