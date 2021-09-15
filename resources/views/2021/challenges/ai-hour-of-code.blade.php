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

        <section class="flex flex-row justify-between" style="background-color: #78C2C5">
            <div class="flex justify-center items-center w-full">
                <div class="text-center m-12">
                    <div class="text-xl text-white w-full"><a class="text-white" href="{{route('challenges')}}">EU CODE WEEK CHALLENGES</a></div>
                    <div class="text-5xl mt-2" style="color: #373737">AI hour of Code</div>
                </div>
            </div>

            <div class="md:w-10/12 md:flex hidden">
                <img src="{{asset('img/2021/challenges/thumbnails/ai-hour-of-code.png')}}">

            </div>

        </section>

        <section class="codeweek-content-wrapper">
            <div class="m-6">

                @include('2021.challenges._author', ['author' => 'Minecraft Education Edition'])

                <section class="grid grid-cols-1 gap-6 md:grid-cols-4 mx-6 my-4">


                    <div>
                        <div class="text-xl text-left text-blue-600">Target audience</div>
                        <ol class="list-disc ml-5">
                            <li>Pre-primary students (3 to 6 years)</li>
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
                            <li>1 h</li>
                        </ol>
                    </div>

                    <div>
                        <div class="text-xl text-left text-blue-600">Recommended materials</div>
                        <ol class="list-disc ml-5">
                            <li>Install Minecraft: Education Edition</li>
                            <li>After installing Minecraft Education Edition, the challenge is on <a href="https://education.minecraft.net/en-us/lessons/minecraft-hour-of-code">this website</a></li>
                        </ol>


                    </div>



                </section>

                <div class="mx-6 my-4">
                    <div class="text-xl text-left text-blue-600">Purpose</div>
                    <ol class="list-disc ml-5">
                        <li>To create coding solutions that include sequences, events, loops, and conditionals.</li>
                        <li>To decompose the steps needed to solve a problem into a precise sequence of instructions.</li>
                        <li>To explore coding concepts.</li>
                    </ol>

                </div>


                <div class="leading-6 text-base text-left">

                    <section class="bg-blue-100 p-2 mt-6">
                        <div class="orange text-3xl mt-2">
                            Description
                        </div>


                        <div class="mt-2">
                            A village is threatened by fire and needs you to code a solution! Meet your coding helper, the Minecraft Agent, then program the Agent to navigate the forest and collect data. This data will help the Agent predict where fires will occur. Then code the Agent to help prevent the spread of fire, save the village, and bring life back into the forest. Learn the basics of coding and explore a real-world example of artificial intelligence (AI).<br/>
                        </div>
                    </section>



                    <section class="p-2">
                        <div class="leading-8">
                            <div class="mt-6 orange text-3xl">Instructions</div>

                            Download the lesson plan <a href="https://meedownloads.blob.core.windows.net/learning-experience/HOC%202019/EducatorGuide_en_US.pdf">HERE</a>



                        </div>


                    </section>

@include('2021.challenges._share')

                    <section class="p-2">
                        <div class="orange text-3xl">Example</div>
                        <div class="mt-2">   <img src="{{asset('img/2021/challenges/ai-hour-of-code-1.png')}}"/>

                        </div>

                    </section>


                </div>

                @include('2021.challenges._download',['url'=>'https://codeweek-s3.s3.eu-west-1.amazonaws.com/cw2021/AI+Hour+of+Code.docx'])
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
