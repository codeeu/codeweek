@extends('layout.base')

<x-tailwind></x-tailwind>

@section('content')

    <section id="codeweek-schools-page" class="codeweek-page">


        <section class="flex flex-row justify-between" style="background-color: #8B0DC4">
            <div class="flex justify-center items-center w-full">
                <div class="text-center m-12">
                    <div class="text-xl text-white w-full"><a class="text-white" href="{{route('challenges')}}">EU CODE WEEK CHALLENGES</a></div>
                    <div class="text-5xl mt-2" style="color: #eb9940">Calming LEDs: create a simple device with micro:bit</div>
                </div>
            </div>

            <div class="md:w-10/12 md:flex hidden">
                <img src="{{asset('img/2021/challenges/thumbnails/calming-leds.png')}}">

            </div>

        </section>

        <section class="codeweek-content-wrapper">
            <div class="m-6">

                @include('2021.challenges._author', ['author' => 'Micro:bit Educational Foundation'])

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
                            <li>20 minutes</li>
                        </ol>
                    </div>

                    <div>
                        <div class="text-xl text-left text-blue-600">Recommended materials</div>
                        <ol class="list-disc ml-5">
                            <li>a micro:bit device and battery pack (if available)</li>
                            <li>a laptop or tablet with which you can visit Microsoft MakeCode and Youtube</li>
                            <li>microbit.org for the activity resources</li>
                        </ol>


                    </div>



                </section>

                <div class="mx-6 my-4">
                    <div class="text-xl text-left text-blue-600">Purpose</div>
                    <ol class="list-disc ml-5">
                        <li>To design a simple digital artefact with a helpful purpose</li>
                        <li>To explore sequences and animations and how they work</li>
                        <li>To test and debug simple code</li>
                        <li>To iterate a design by making the animations faster or slower</li>
                    </ol>

                </div>


                <div class="leading-6 text-base text-left">

                    <section class="bg-blue-100 p-2 mt-6">
                        <div class="orange text-3xl mt-2">
                            Description
                        </div>


                        <div class="mt-2">
                            Students create a digital device using LEDs that can help them to regulate their breathing and feel calmer. They will be asked to write some simple code, exploring animations and sequences.
                        </div>
                    </section>



                    <section class="p-2">
                        <div class="leading-6">
                            <div class="mt-6 orange text-3xl">Instructions</div>
                            <ul class="leading-7 ml-2 checklist mt-2">
                                <li>The goal is to create a working 'Calming LED' device that you can use to regulate your breathing. This device can be created on a physical micro:bit board, or on the simulator in the MakeCode editor.</li>
                                <li>The challenge can be completed by using the MakeCode editor and writing a simple sequence of code as shown in the video/screenshot.</li>
                                <li>To develop the challenge, students can explore different animations and get creative with the animation they would like to see to help them feel calm or happy.</li>
                                <li>More information and video instructions at <a href="https://microbit.org/news/2020-05-01/microbit-at-home-calming-leds/">this link</a>.</li>
                            </ul>
                        </div>
                    </section>

@include('2021.challenges._share')

                    <section class="p-2">
                        <div class="orange text-3xl">Example</div>
                        <div class="mt-2">Visit <a href="https://microbit.org/news/2020-05-01/microbit-at-home-calming-leds/">this page</a> for instructions and videos of the completed challenge plus how to code</div>
                        <div class="mt-2">
                            <a href="https://microbit.org/news/2020-05-01/microbit-at-home-calming-leds/">
                            <img src="{{asset('img/2021/challenges/calming-leds-1.png')}}"/>
                            </a>

                        </div>

                    </section>


                </div>

                @include('2021.challenges._download',['url'=>'https://codeweek-s3.s3.eu-west-1.amazonaws.com/cw2021/Calming+LEDs.docx'])
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
