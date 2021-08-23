@extends('layout.base')

<x-tailwind></x-tailwind>

@section('content')

    <section id="codeweek-schools-page" class="codeweek-page">

        <section class="codeweek-banner about">
            <div class="text">
                <div class="text-5xl text-white">EU CODE WEEK CHALLENGES</div>
                <h2>Make a chatbot</h2>
            </div>
            <div class="image">
                <img src="/images/banner_about.svg" class="static-image">

            </div>

        </section>

        <section class="codeweek-content-wrapper">
            <div class="m-6">

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
                        <div>Advanced</div>
                    </div>

                    <div>
                        <div class="text-xl text-left text-blue-600">Duration</div>
                        <div>1 hour</div>
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
                                <li>Use blocks or text-based mode to write your riddle.</li>
                                <li>Alternatively, you can use <a href="https://abfromz.pencilcode.net/edit/Riddle"
                                                                  target="_blank">this code</a> and adapt it to your
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


                </div>

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
