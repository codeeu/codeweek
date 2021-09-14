@extends('layout.base')

<x-tailwind></x-tailwind>

@section('content')

    <section id="codeweek-schools-page" class="codeweek-page">


        <section class="flex flex-row justify-between" style="background-color: #DED7BC">
            <div class="flex justify-center items-center w-full">
                <div class="text-center m-12">
                    <div class="text-xl text-white w-full"><a class="text-black" href="{{route('challenges')}}">EU CODE
                            WEEK CHALLENGES</a></div>
                    <div class="text-5xl mt-2" style="color: #d84d96">CS First Unplugged activities</div>
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

                        <div class="text-xl text-left text-blue-600">Purpose</div>
                        <ol class="list-disc ml-5">
                            <li>To support students who are learning from home.</li>
                            <li>To give everyone a break from their screens.</li>

                        </ol>

                    </div>




                </section>

                <div class="mx-6 my-4">


                    <div class="text-xl text-left text-blue-600">Recommended materials</div>
                    <ol class="list-disc ml-5">
                        <li>In addition to the activity booklet, some activities require or optionally benefit from additional materials.</li>
                        <li>Small counters (like dried beans) to use on the Network a Neighborhood map.</li>
                        <li>Scissors to cut out the Send a Secret Message cipher wheel.</li>
                        <li>Cardboard and glue to provide additional stiffness to the Send a Secret Message cipher wheel.</li>
                        <li>A thumbtack, toothpick, or straightened paper clip to connect the Send a Secret Message cipher wheel.</li>
                    </ol>

                </div>


                <div class="leading-6 text-base text-left">

                    <section class="bg-blue-100 p-2 mt-6">
                        <div class="orange text-3xl mt-2">
                            Description
                        </div>


                        <div class="mt-2">
                            CS First Unplugged is a set of activities that introduce students to CS concepts without a computer. We’ve designed this lesson to demonstrate that Computer Science is a lot more than just code.
                        </div>
                    </section>


                    <section class="p-2">
                        <div class="leading-6">
                            <div class="mt-6 orange text-3xl">Instructions</div>
                            <ul class="leading-7 ml-2 checklist mt-2">
                                <li>You will find the booklet to all activities in English at this <a href="https://drive.google.com/file/d/1F2k68YD4q899KFSs1RX3zNp9jvJ0AC7i/view?usp=sharing">link</a>, as well as Lesson Plan in English at this <a href="https://drive.google.com/file/d/1U8xf25xtWQJk8T-qpfkDMqcMUka_osat/view?usp=sharing">link</a>.</li>
                                <li>The activities in this lesson can be completed individually and in any order.</li>
                                <li>Teacher can take a picture of the learning process and share it on Instagram using #CodeWeekChallengeGoogle</li>
                            </ul>
                        </div>
                    </section>

                    @include('2021.challenges._share')

                    <section class="p-2">
                        <div class="orange text-3xl">Example</div>

                            <div class="mt-2">

                                    <img src="{{asset('img/2021/challenges/cs-first-unplugged-activities.png')}}"/>


                            </div>


                    </section>


                </div>

                @include('2021.challenges._download',['url'=>'https://codeweek-s3.s3.eu-west-1.amazonaws.com/cw2021/CS+First+Unplugged+activities.docx'])
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
