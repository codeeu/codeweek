@extends('layout.base')

<x-tailwind></x-tailwind>

@section('content')

    <section id="codeweek-schools-page" class="codeweek-page">

        <section class="flex flex-row justify-between" style="background-color: #EEA44E">
            <div class="flex justify-center items-center w-full">
                            <div class="text-center m-12">
                                <div class="text-xl text-white w-full"><a class="text-white" href="{{route('challenges')}}">EU CODE WEEK CHALLENGES</a></div>
                                <div class="text-5xl mt-2" style="color: #1756a0">Make a chatbot</div>
                            </div>
            </div>

            <div class="md:w-10/12 md:mb-2 md:flex hidden">
                <img src="{{asset('img/2021/challenges/thumbnails/chatbot.png')}}">

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
                            <li>Advanced</li>
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
                        <li><a href="https://pencilcode.net/" target="_blank">Pencil code</a></li>
                        <li><a href="https://machinelearningforkids.co.uk/" target="_blank">Machine learning for
                                kids</a></li>
                    </div>

                    <div>
                        <div class="text-xl text-left text-blue-600">Purpose</div>
                        <ol class="list-disc ml-5">
                            <li>Code interactive riddles</li>
                            <li>Use code to create dialogues between a chatbot and a user</li>
                        </ol>

                    </div>


                </section>


                <div class="leading-6 text-base text-left">

                    <section class="bg-blue-100 p-2 mt-6">
                    <div class="orange text-3xl mt-2">
                    Description
                </div>


                    <div class="mt-2">
                        Code a conversation between a chatbot and a user who is trying to solve a riddle. Try to make a
                        chatbot that can chat like a person. Instead of a riddle you can create a dialogue between a
                        chatbot and a user.
                    </div>
                    </section>



                    <section class="p-2">
                        <div class="leading-8">
                            <div class="mt-6 orange text-3xl">Instructions</div>
                            <ul class="leading-7 ml-2 mt-0 checklist mt-2">
                                <li>Think of a riddle.</li>
                                <li>Log in to <a href="https://pencilcode.net/" target="_blank">Pencil Code</a> or
                                    create a new account. (When creating a new account keep in mind that real names are
                                    not allowed on Pencil Code due to privacy reasons.)
                                </li>
                                <li>Click Imagine and Make your own.</li>
                                <li>Use blocks or text-based mode to write your riddle.
                                    <img class="m-4" width="550" src="{{asset('img/2021/challenges/chatbot-1.png')}}"/>
                                    <img class="m-4" width="550" src="{{asset('img/2021/challenges/chatbot-2.png')}}"/>

                                </li>
                                <li>Alternatively, you can use <a href="https://abfromz.pencilcode.net/edit/Riddle"
                                                                  target="_blank">this code</a> <a href="#pencil-code"><sup>1</sup></a> and adapt it to your
                                    riddle or you can select Answering a riddle from the menu and edit it.
                                </li>
                            </ul>

                        </div>
                    </section>

                    <section class="p-2">
                        <div class="mt-6 orange text-3xl">Example</div>
                        <div class="mt-2">Check out this  example of a riddle. <iframe src="//abfromz.pencilcode.net/home/Riddle" width="640" height="640" frameborder="0" allowfullScreen></iframe>
                        </div>
                    </section>

                    <div id="pencil-code" class="text-sm">
                        1. This code has been Adapted from Pencil Code activity <a href="https://gym.pencilcode.net/imagine/#/imagine/troll.html" target="_blank">Answering the Riddle</a>
                    </div>


                </div>

                @include('2021.challenges._download',['url'=>'https://codeweek-s3.s3.eu-west-1.amazonaws.com/cw2021/EUCW+Challenge+Make+a+chatbot.docx'])

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
