@extends('layout.base')

<x-tailwind></x-tailwind>

@section('content')

    <section id="codeweek-schools-page" class="codeweek-page">

        <section class="flex flex-row justify-between" style="background-color: #6DB4B4">
            <div class="flex justify-center items-center w-full">
                <div class="text-center m-12">
                    <div class="text-xl text-white w-full"><a class="text-white" href="{{route('challenges')}}">EU CODE WEEK CHALLENGES</a></div>
                    <div class="text-5xl mt-2" style="color: #fecc54">Make a musical composition</div>
                </div>
            </div>

            <div class="md:w-10/12 md:mb-2 md:flex hidden">
                <img src="{{asset('img/2021/challenges/thumbnails/compose-song.png')}}">

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
                            <li>Students (12-18)</li>
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
                            <li><a href="https://earsketch.gatech.edu/landing/#/" target="_blank">Earsketch</a></li>
                        </ol>

                    </div>




                </section>

                <div class="mx-6 my-4">
                    <div class="text-xl text-left text-blue-600">Purpose</div>
                    <ol class="list-disc ml-5">
                        <li>To learn coding through music</li>
                        <li>To distinguish music genres and instruments</li>
                        <li>To compose a song by mixing sound clips</li>
                    </ol>

                </div>


                <div class="leading-6 text-base text-left">

                    <section class="bg-blue-100 p-2 mt-6">
                        <div class="orange text-3xl mt-2">
                            Description
                        </div>


                        <div class="mt-2">
                            In this challenge you will create a musical composition by using a programming language. You can use built-in sound clips or record your own and mix them to create a musical composition. Run your code in the Digital Audio Workstation and listen to the music you have coded. Play with different sounds and effects to modify your piece of music.
                        </div>
                    </section>



                    <section class="p-2">
                        <div class="leading-8">
                            <div class="mt-6 orange text-3xl">Instructions</div>
                            <ul class="leading-7 ml-2 mt-0 checklist mt-2">
                                <li>Log in to <a href="https://earsketch.gatech.edu/landing/#/">Earsketch</a>.</li>
                                <li>Click <strong>Click here to make a script</strong>. Name your script and choose <strong>Python</strong> as a programming language.</li>
                                <li>Start writing your code between the <span class="text-blue-500 font-mono">setTempo(120)</span> and <span class="text-blue-500 font-mono">finish()</span> lines.</li>
                                <li>Browse the music clips in the <strong>Sound Library</strong> and select the music genres, artists and instruments you like.</li>
                                <li>To add a sound clip to your song, type <span class="text-blue-500 font-mono">fitMedia()</span>. Between the parenthesis there should be the following 4 parameters, separated by commas:
                                <ol class="ml-8 list-decimal">
                                    <li><strong>Sound clip:</strong> Place your cursor between the parenthesis, go to the Sound Library, select a clip, and paste it by clicking on the blue paste icon.</li>
                                    <li><strong>Track number:</strong> tracks help you organize your sounds by instrument-type (vocals, bass, drums, keyboards, etc.). Add as many tracks (instruments) as you want. Tracks are displayed as rows that run across the Digital Audio Workstation. </li>
                                    <li><strong>Start measure:</strong> indicates when your sound will start playing. Measures are musical time units. One measure is 4 beats.</li>
                                    <li><strong>End measure:</strong> indicates when your sound will stop playing.</li>
                                </ol>
                                </li>
                                <li>Such a line of code will look like this:
                                    <span class="text-blue-500 font-mono">fitMedia (HOUSE_DEEP_AIRYCHORD_002, 2, 2, 8)</span>
                                    <img class="m-4" width="550" src="{{asset('img/2021/challenges/compose-song-1.png')}}"/>
                                </li>
                                <li>You can add different effects, such as volume to enhance the sound of your composition. Volume ranges from -60.0 decibels to 12.0 decibels with 0.0 being the original volume. </li>
                                <li>Write <span class="text-blue-500 font-mono">setEffect()</span>. In the parenthesis, write the number of track, VOLUME, GAIN, level of the volume, the measure when it starts, the level and measure when it ends.</li>
                                <li>This is an example of a fade-in effect:
                                    <div class="text-blue-500 font-mono">setEffect (1, VOLUME, GAIN, -40, 1, 0, 4)</div>
                                    and a fade-out effect:
                                    <div class="text-blue-500 font-mono">setEffect (5, VOLUME, GAIN, 0, 8, -15, 10)</div>
                                </li>


                            </ul>

                        </div>
                    </section>

                    <section class="p-2">
                        <div class="mt-6 orange text-3xl">Example</div>
                        <div class="mt-2">
                            Listen to <a href="https://earsketch.gatech.edu/earsketch2/?sharing=eQgzojvIKsMLrum8CBYj1g" target="_blank">an example of a song coded with Earsketch</a>. You can import the code and edit it.
                        </div>
                        <div class="mt-4">
                            <iframe width="600" height="400" src="https://earsketch.gatech.edu/earsketch2/?sharing=eQgzojvIKsMLrum8CBYj1g&embedded=true"></iframe>
                        </div>
                    </section>


                </div>

                @include('2021.challenges._download',['url'=>'https://codeweek-s3.s3.eu-west-1.amazonaws.com/cw2021/EUCW+Challenge+Compose+a+song.docx'])
            </div>
        </section>
    </section>

@endsection

@section('extra-css')
    <style>
        ul.checklist>li:before {
            content: '• ';
            color: #ee6a2c;
            font-weight: bold;
        }
    </style>
@endsection
