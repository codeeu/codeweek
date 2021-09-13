@extends('layout.base')

<x-tailwind></x-tailwind>

@section('content')

    <section id="codeweek-schools-page" class="codeweek-page">


        <section class="flex flex-row justify-between" style="background-color: #E759FD">
            <div class="flex justify-center items-center w-full">
                <div class="text-center m-12">
                    <div class="text-xl text-white w-full"><a class="text-white" href="{{route('challenges')}}">EU CODE
                            WEEK CHALLENGES</a></div>
                    <div class="text-5xl mt-2" style="color: #fdeefd">Create a dance with the Ode to Code!</div>
                </div>
            </div>

            <div class="md:w-10/12 md:flex hidden">
                <img src="{{asset('img/2021/challenges/thumbnails/create-a-dance.png')}}">


            </div>

        </section>

        <section class="codeweek-content-wrapper">
            <div class="m-6">

                @include('2021.challenges._author', ['author' => 'Code.org'])

                <section class="grid grid-cols-1 gap-6 md:grid-cols-5 mx-6 my-4">


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
                            <li><a href="https://code.org/dance">The Code.org tutorial</a></li>
                        </ol>


                    </div>

                    <div>
                        <div class="text-xl text-left text-blue-600">Purpose</div>
                        <ol class="list-disc ml-5">
                            <li>To practice coding in a fun way and feel connected with the EU Code Week community.</li>
                        </ol>


                    </div>


                </section>


                <div class="leading-6 text-base text-left">

                    <section class="bg-blue-100 p-2 mt-6">
                        <div class="orange text-3xl mt-2">
                            Description
                        </div>
                        <div class="mt-2 w-1/2">
                            <img src="{{asset('img/2021/challenges/create-a-dance-2.jpg')}}"/>
                        </div>

                        <div class="mt-2">
                            Create a dance with the Ode to Code! Use the <a href="https://code.org/dance">Dance Party tutorial</a> to code a
                            dance to the Ode to Code. The official EU Code Week anthem is listed as a selection in Dance
                            Party.
                        </div>
                    </section>


                    <section class="p-2">
                        <div class="leading-6">
                            <div class="mt-6 orange text-3xl">Instructions</div>
                            <ul class="leading-7 ml-2 checklist mt-2">
                                <li>Instructions are shown as videos within <a href="https://code.org/dance">the
                                        tutorial</a> and also written at the top of each level.
                                </li>
                            </ul>
                        </div>
                    </section>

                    @include('2021.challenges._share')

                    <section class="p-2">
                        <div class="orange text-3xl">Example</div>
                        <div class="mt-2">Featured student creations can be found on the following page: <a
                                    href="https://code.org/dance">https://code.org/dance</a>
                            <div class="mt-2">
                                <a href="https://code.org/dance">
                                    <img src="{{asset('img/2021/challenges/create-a-dance-1.gif')}}"/>
                                </a>


                            </div>

                    </section>


                </div>

                @include('2021.challenges._download',['url'=>'https://codeweek-s3.s3.eu-west-1.amazonaws.com/cw2021/Create+a+dance+with+the+Ode+to+Code!.docx'])
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
