@extends('layout.base')

<x-tailwind></x-tailwind>

@section('content')

    <section id="codeweek-schools-page" class="codeweek-page">


        <section class="flex flex-row justify-between" style="background-color: #EA8BA5">
            <div class="flex justify-center items-center w-full">
                <div class="text-center m-12">
                    <div class="text-xl text-white w-full"><a class="text-white" href="{{route('challenges')}}">EU CODE
                            WEEK CHALLENGES</a></div>
                    <div class="text-5xl mt-2" style="color: #2a3756">Family Care</div>
                </div>
            </div>

            <div class="md:w-10/12 md:flex hidden">
                <img src="{{asset('img/2021/challenges/thumbnails/family-care.png')}}">


            </div>

        </section>

        <section class="codeweek-content-wrapper">
            <div class="m-6">

                @include('2021.challenges._author', ['author' => 'Allen Yan / MakeX'])

                <section class="grid grid-cols-1 gap-6 md:grid-cols-3 mx-6 my-4">


                    <div>
                        <div class="text-xl text-left text-blue-600">Target audience</div>
                        <ol class="list-disc ml-5">
                            <li>For students aged from 6 to 13</li>
                        </ol>
                    </div>

                    <div>
                        <div class="text-xl text-left text-blue-600">Experience</div>
                        <ol class="list-disc ml-5">
                            <li>Open for all</li>
                        </ol>
                    </div>

                    <div>
                        <div class="text-xl text-left text-blue-600">Duration</div>
                        <ol class="list-disc ml-5">
                            <li>5 to 10 hours</li>
                        </ol>
                    </div>






                </section>

                <section class="grid grid-cols-1 gap-6 md:grid-cols-2 mx-6 my-4">
                    <div>
                        <div class="text-xl text-left text-blue-600">Recommended materials</div>
                        <ol class="list-disc ml-5">
                            <li>Coding tool: <a href="https://ide.mblock.cc/">mBlock 5</a> or download the <a href="https://mblock.makeblock.com/en-us/download/">PC version</a>. mBlock is a programming language based off of Scratch</li>

                            <li>This challenge is also adapted from MakeX Global Spark Competition, a project-based creative design program for young people aged 6 to 13. </li>
                            <li>The participating team will need to focus on the specific theme and devise a solution through software programming and hardware construction.</li>
                            <li>Students are encouraged to complete the challenge in Codeweek and take it to the international level to communicate with other students and win prices.</li>
                            <li>For more information, please check: <a href="https://spark.makex.io/2021-makex-spark-code-for-health/">https://spark.makex.io/2021-makex-spark-code-for-health/</a> or contact us at <a href="mailto:allen.yan@makeblock.com">allen.yan@makeblock.com</a></li>
                        </ol>


                    </div>


                    <div>
                        <div class="text-xl text-left text-blue-600">Purpose</div>
                        <ol class="list-disc ml-5">
                            <li>To research on issue ‘family care’ that we face on a daily basis;</li>
                            <li>To see problems as opportunities and generate creative solutions;</li>
                            <li>To use code to innovatively realize your solutions;</li>
                            <li>To design posters and present your solutions to others;</li>
                            <li>To use social media to create impacts of your projects.</li>
                        </ol>


                    </div>
                </section>





                <div class="leading-6 text-base text-left">

                    <section class="bg-blue-100 p-2 mt-6">
                        <div class="orange text-3xl mt-2">
                            Description
                        </div>


                        <div class="mt-2">
                            What comes to you when we talk about home? A nice house? A big dinner prepared by parents? A secret space for yourself? A warm home refuels our bodies and spirit like a gas station.
                            Amid the hustle and bustle of modern life, parents are always busy for work. When you hang out with friends, you cannot leave your kitties behind. But how to look after your company when you are apart? The theme of the challenge is <strong>Family Care</strong>. <br/>Based on this theme, students are encouraged to develop an idea to pass love and care through coding and hardware. Here are some questions for you to think about:<br/>
                            1) How many family members are there in your home? Who are they? Have you met any problems when staying with them? What kinds of care do they need?<br/>
                            2) Do you know anyone who lacks family care more than others in your community? How can you help them?
                        </div>
                    </section>


                    <section class="p-2">
                        <div class="leading-6">
                            <div class="mt-6 orange text-3xl">Instructions</div>
                            <ul class="leading-7 ml-2 checklist mt-2">
                                <li>Brainstorm and Research on the theme of family care</li>
                                <li>List of any problems</li>
                                <li>Generate possible solutions</li>
                                <li>Select a solution</li>
                                <li>Program and build up the structure</li>
                                <li>Design a poster to layout your project</li>
                                <li>Present it to your teachers and family members</li>
                            </ul>
                        </div>
                    </section>

                    @include('2021.challenges._share')

                    <section class="p-2">
                        <div class="orange text-3xl">Example</div>
                        <div class="mt-2">
                            Please find some examples from here: <a href="https://www.makex.cc/en/blog/238431">https://www.makex.cc/en/blog/238431</a> and <a href="https://www.makex.cc/en/blog/235153">https://www.makex.cc/en/blog/235153</a>

                            <div class="w-10/12">
                                <img src="{{asset('img/2021/challenges/family-care.png')}}"/>
                            </div>




                        </div>

                    </section>


                </div>

                @include('2021.challenges._download',['url'=>'https://codeweek-s3.s3.eu-west-1.amazonaws.com/cw2021/Family+Care.docx'])
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
