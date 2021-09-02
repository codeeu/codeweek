@extends('layout.base')

<x-tailwind></x-tailwind>

@section('content')

    <section id="codeweek-schools-page" class="codeweek-page">

{{--        <section class="codeweek-banner about">--}}
{{--            <div class="text">--}}
{{--                <div class="text-5xl text-white"><a class="text-white underline" href="{{route('challenges')}}">EU CODE WEEK CHALLENGES</a></div>--}}
{{--                <h2>Make a video sensing game</h2>--}}
{{--            </div>--}}
{{--            <div class="image">--}}
{{--                <img src="/images/banner_about.svg" class="static-image">--}}

{{--            </div>--}}

{{--        </section>--}}

        <section class="flex flex-row justify-between" style="background-color: #8E90B5">
            <div class="flex justify-center items-center w-full">
                <div class="text-center m-12">
                    <div class="text-xl text-white w-full"><a class="text-white" href="{{route('challenges')}}">EU CODE WEEK CHALLENGES</a></div>
                    <div class="text-5xl mt-2" style="color: #FFCC54">Make a video sensing game</div>
                </div>
            </div>

            <div class="md:w-full md:flex hidden">
                <img src="{{asset('img/2021/challenges/thumbnails/sensing-game.png')}}">
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
                            <li>Students (10-14)</li>
                        </ol>
                    </div>

                    <div>
                        <div class="text-xl text-left text-blue-600">Experience</div>
                        <ol class="list-disc ml-5">
                            <li>Intermediate</li>
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
                            <li><a href="https://scratch.mit.edu/" target="_blank">Scratch</a></li>
                        </ol>

                    </div>




                </section>

                <div class="mx-6 my-4">
                    <div class="text-xl text-left text-blue-600">Purpose</div>
                    <ol class="list-disc ml-5">
                        <li>To code animated objects</li>
                        <li>To develop understanding of how to control digital animation with physical movement</li>
                        <li>To compose a song by mixing sound clips</li>
                    </ol>

                </div>


                <div class="leading-6 text-base text-left">

                    <section class="bg-blue-100 p-2 mt-6">
                        <div class="orange text-3xl mt-2">
                            Description
                        </div>


                        <div class="mt-2">
                            In this challenge you will create a simple game that uses a video camera as a sensor to detect motion, which means that you will be able to control your animation with physical movement. In this game, the task is to collect as many EU Code Week bubbles as possible in 30 seconds. Instead of collecting bubbles, you can create a game in which you chase a character or pop balloons with your hands.
                        </div>
                    </section>



                    <section class="p-2">
                        <div class="leading-8">
                            <div class="mt-6 orange text-3xl">Instructions</div>
                            <ul class="leading-7 ml-2 mt-0 checklist mt-2">
                                <li>Log in to <a href="https://scratch.mit.edu/">Scratch</a>.</li>
                                <li>Click <strong>Add an extension</strong> and choose <strong>Video Sensing</strong>. It will detect how fast an object is moving. If the number is lower, it will be more sensitive to movement.
                                    <img class="m-4" width="250" src="{{asset('img/2021/challenges/sensing-game-1.png')}}"/>
                                </li>
                                <li>Add a sprite. Choose a sound and add it to your sprite. If you want, you can add <strong>Create a clone</strong> to duplicate your sprite. </li>
                                <li>Create two variables: one for <strong>Score</strong> and the other for <strong>Timer</strong> and add them to the sprite. Set the Timer to 30 and add <strong>Change Timer by -1</strong>.</li>
                                <li>Create a new sprite <strong>Game Over</strong> to finish the game. You can also create a sprite with the title of your game, e.g., Collect all E U Code Week bubbles.
                                    <img class="m-4" width="600" src="{{asset('img/2021/challenges/sensing-game-2.png')}}"/>
                                </li>
                            </ul>

                        </div>
                    </section>

                    <section class="p-2">
                        <div class="mt-6 orange text-3xl">Example</div>
                        <div class="mt-2">
                            Play a video sensing game Collect all EU Code Week Bubbles. Feel free to remix <a href="https://scratch.mit.edu/projects/563163565" target="_blank">this project</a>.
                        </div>
                        <div class="mt-4">
                            <a href="https://scratch.mit.edu/projects/563163565" target="_blank">
                                <img class="m-4" width="600" src="{{asset('img/2021/challenges/sensing-game-3.png')}}"/>
                            </a>

                        </div>
                    </section>


                </div>

                @include('2021.challenges._download',['url'=>'https://codeweek-s3.s3.eu-west-1.amazonaws.com/cw2021/EUCW+Challenge+Make+a+video+sensing+game.docx'])
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
