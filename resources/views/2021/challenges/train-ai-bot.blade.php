@extends('layout.base')

<x-tailwind></x-tailwind>

@section('content')

    <section id="codeweek-schools-page" class="codeweek-page">


        <section class="flex flex-row justify-between" style="background-color: #1BA8E2">
            <div class="flex justify-center items-center w-full">
                <div class="text-center m-12">
                    <div class="text-xl text-white w-full"><a class="text-white" href="{{route('challenges')}}">EU CODE
                            WEEK CHALLENGES</a></div>
                    <div class="text-5xl mt-2" style="color: #eee91f">Train an AI bot!</div>
                </div>
            </div>

            <div class="md:w-10/12 md:flex hidden">
                <img src="{{asset('img/2021/challenges/thumbnails/train-ai-bot.png')}}">
            </div>

        </section>

        <section class="codeweek-content-wrapper">
            <div class="m-6">

                @include('2021.challenges._author', ['author' => 'Code.org'])

                <section class="grid grid-cols-1 gap-6 md:grid-cols-4 mx-6 my-4">


                    <div>
                        <div class="text-xl text-left text-blue-600">Target audience</div>
                        <ol class="list-disc ml-5">
                            <li>Primary School students (6 to 12 years)</li>
                        </ol>
                    </div>

                    <div>
                        <div class="text-xl text-left text-blue-600">Experience</div>
                        <ol class="list-disc ml-5">
                            <li>Beginner</li>
                        </ol>
                    </div>

                    <div>
                        <div class="text-xl text-left text-blue-600">Duration</div>
                        <ol class="list-disc ml-5">
                            <li>1 hour</li>
                        </ol>
                    </div>

                    <div>
                        <div class="text-xl text-left text-blue-600">Recommended materials</div>
                        <ol class="list-disc ml-5">
                            <li>
                                Tutorial can be found: <a
                                        href="https://code.org/oceans">https://code.org/oceans</a><br/>
                                (This tutorial is available in over 25 languages)
                            </li>
                        </ol>


                    </div>


                </section>

                <div class="mx-6 my-4">

                    <div class="text-xl text-left text-blue-600">Purpose</div>
                    <ol class="list-disc ml-5">
                        <li>To learn about artificial intelligence (AI), machine learning, training data, and bias,
                            while exploring ethical issues and how AI can be used to address world problems.
                        </li>

                    </ol>


                </div>


                <div class="leading-6 text-base text-left">

                    <section class="bg-blue-100 p-2 mt-6">
                        <div class="orange text-3xl mt-2">
                            Description
                        </div>

                        <div class="mt-2 w-1/2">
                            <img src="{{asset('img/2021/challenges/train-ai-bot-1.png')}}"/>
                        </div>


                        <div class="mt-2">
                            Train an AI bot with AI for Oceans. In this activity, you will program or train AI
                            (artificial intelligence) to identify fish or trash. Let's clean up the ocean!
                        </div>
                    </section>


                    <section class="p-2">
                        <div class="leading-6">
                            <div class="mt-6 mb-2 orange text-3xl">Instructions</div>
                            <div class="mb-2">
                                Instructions are shown as videos within the tutorial (<a href="https://code.org/oceans">https://code.org/oceans</a>)
                                and also written at the top of each level.
                            </div>
                        </div>
                    </section>

                    @include('2021.challenges._share')

                    <section class="p-2">
                        <div class="orange text-3xl">Example</div>


                        <div class="mt-2 w-1/2">
                            <a href="https://code.org/oceans">
                                <img src="{{asset('img/2021/challenges/train-ai-bot-2.png')}}"/>
                            </a>


                        </div>


                    </section>


                </div>

                @include('2021.challenges._download',['url'=>'https://codeweek-s3.s3.eu-west-1.amazonaws.com/cw2021/Train+an+AI+bot!.docx'])
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
