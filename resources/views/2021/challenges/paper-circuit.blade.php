@extends('layout.base')

<x-tailwind></x-tailwind>

@section('content')

    <section id="codeweek-schools-page" class="codeweek-page">

{{--        <section class="codeweek-banner about">--}}
{{--            <div class="text">--}}
{{--                <div class="text-5xl text-white"><a class="text-white underline" href="{{route('challenges')}}">EU CODE WEEK CHALLENGES</a></div>--}}
{{--                <h2>Unplug and code: Create a paper circuit</h2>--}}
{{--            </div>--}}
{{--            <div class="image">--}}
{{--                <img src="/images/banner_about.svg" class="static-image">--}}

{{--            </div>--}}

{{--        </section>--}}

        <section class="flex flex-row justify-between" style="background-color: #3B0049">
            <div class="flex justify-center items-center w-full">
                <div class="text-center m-12">
                    <div class="text-xl text-white w-full"><a class="text-white" href="{{route('challenges')}}">EU CODE WEEK CHALLENGES</a></div>
                    <div class="text-5xl mt-2" style="color: #3beac5">Unplug and code: Create a paper circuit</div>
                </div>
            </div>

            <div class="md:w-10/12 md:mb-2 md:flex hidden">
                <img src="{{asset('img/2021/challenges/thumbnails/paper-circuit.png')}}">

            </div>

        </section>

        <section class="codeweek-content-wrapper">
            <div class="m-6">

                @include('2021.challenges._author', ['author' => 'EU Code Week Team'])

                <section class="grid grid-cols-1 gap-6 md:grid-cols-5 mx-6 my-4">


                    <div>
                        <div class="text-xl text-left text-blue-600">Target audience</div>
                        <ol class="list-disc ml-5">
                            <li>Teachers</li>
                            <li>Students (7-14)</li>
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
                            <li>45 minutes</li>
                        </ol>
                    </div>

                    <div>
                        <div class="text-xl text-left text-blue-600">Recommended materials</div>
                        <ol class="list-disc ml-5">
                            <li>paper or cardboard</li>
                            <li>crayons or marker</li>
                            <li>coin-cell battery</li>
                            <li>copper tape</li>
                            <li>LED circuit stickers</li>
                            <li>paper clip</li>
                        </ol>


                    </div>

                    <div>
                        <div class="text-xl text-left text-blue-600">Purpose</div>
                        <ol class="list-disc ml-5">
                            <li>Enhance creativity</li>
                            <li>Develop problem-solving skills</li>
                        </ol>

                    </div>


                </section>


                <div class="leading-6 text-base text-left">

                    <section class="bg-blue-100 p-2 mt-6">
                        <div class="orange text-3xl mt-2">
                            Description
                        </div>


                        <div class="mt-2">
                            Draw and object of your choice. It can be a night sky, a ladybird, a robot, a Christmas tree
                            or anything you can think of. Feel free to personalize your project with EU Code Week
                            visuals: you can explore the <a href="{{route('toolkits')}}">EU Code Week teacher toolkit</a> and download any logo or visual
                            you wish. You can even create a paper circuit invitation to EU Code Week. Add a motivating
                            message to your circuit to encourage other teachers to join Code Week and/or to check the
                            website dedicated to schools.
                        </div>
                    </section>



                    <section class="p-2">
                        <div class="leading-8">
                            <div class="mt-6 orange text-3xl">Instructions</div>
                            <ul class="leading-7 ml-2 mt-0 checklist mt-2">
                                <li>Draw an object and decide which parts will be illuminated (e.g. stars).</li>
                                <li>Make a hole through the paper with a pencil and insert a LED sticker in each
                                    illuminated part.
                                </li>
                                <li>Draw a circle where you will place the coin-cell battery.</li>
                                <li>Draw a + and a - track on the other side of the paper. Make sure that the longer leg
                                    of the LED circuit sticker is connected to the “+” side of the battery and the
                                    shorter to the “-” side of the battery.
                                </li>
                                <li>Lay the copper tape on the tracks.</li>
                                <li>Create a fold so that when the paper covers the battery the LED is illuminated. You
                                    can use a paper clip to ensure good contact with the copper tape.
                                </li>
                                <li>Take a picture of your paper circuit and share it on Instagram, explaining why you
                                    think it is worth it to take part in this initiative.
                                </li>
                            </ul>

                        </div>


                    </section>

                    <section class="p-2">
                        <div class="orange text-3xl">Example</div>
                        <div class="mt-2">See some examples of paper circuits:

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
