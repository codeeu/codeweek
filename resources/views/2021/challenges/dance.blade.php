@extends('layout.base')

<x-tailwind></x-tailwind>

@section('content')

    <section id="codeweek-schools-page" class="codeweek-page">

        <section class="codeweek-banner about">
            <div class="text">
                <div class="text-5xl text-white"><a class="text-white underline" href="{{route('challenges')}}">EU CODE WEEK CHALLENGES</a></div>
                <h2>Create a dance</h2>
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
                            <li>Students (8-12)</li>
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
                        <div class="text-xl text-left text-blue-600">Recommended tool</div>
                        <ol class="list-disc ml-5">
                            <li><a href="https://www.tynker.com/" target="_blank">Tynker</a></li>
                    </div>

                    <div>
                        <div class="text-xl text-left text-blue-600">Purpose</div>
                        <ol class="list-disc ml-5">
                            <li>To learn basic coding concepts</li>
                            <li>To learn how to animate characters</li>
                        </ol>

                    </div>


                </section>


                <div class="leading-6 text-base text-left">

                    <section class="bg-blue-100 p-2 mt-6">
                        <div class="orange text-3xl mt-2">
                            Description
                        </div>


                        <div class="mt-2">
                            In this challenge you will create a set of characters who will dance together. You will use a built-in media library to select characters and music clips, or you can create your own. You will animate the characters to dance and talk to each other.
                        </div>
                    </section>



                    <section class="p-2">
                        <div class="leading-8">
                            <div class="mt-6 orange text-3xl">Instructions</div>
                            <ul class="leading-7 ml-2 mt-0 checklist mt-2">
                                <li>Log in to <a href="https://www.tynker.com/">Tynker</a> as a teacher. Create student accounts and share them with your students. Alternatively share a class code and have your students register with their school email address. If you are a student, you can join as a student, but you will be asked to provide your parent’s email address so that they can approve your account.</li>
                                <li>Click <strong>Create a project – Blank Block Coding Project</strong> and give it a title. </li>
                                <li>Go to <strong>Stage</strong> to add a background by clicking on the gear icon. Choose a background from the Media Library, upload your own image or you can even take a picture and upload it. Choose an audio clip and add it to the stage:
                                    <img class="m-4" width="400" src="{{asset('img/2021/challenges/dance-1.png')}}"/>
                                </li>
                                <li>Click the <strong>Add Actor</strong> button to add characters or objects that you will animate so that they can move, talk and interact with each other. Add two or three characters of your choice. You can draw your own actors or modify the existing ones. Add different costumes to your character by clicking the pencil icon.</li>
                                <li>Click on each actor and animate it by adding the following blocks:
                                    <img class="m-4" width="250" src="{{asset('img/2021/challenges/dance-2.png')}}"/>
                                </li>
                                <li>Add a <strong>say block</strong> and have your actors talk to each other. Change the shape of the speech bubbles and the font and the size of your text.
                                    <img class="m-4" width="600" src="{{asset('img/2021/challenges/dance-3.png')}}"/>
                                </li>

                            </ul>

                        </div>
                    </section>

                    <section class="p-2">
                        <div class="mt-6 orange text-3xl">Example</div>
                        <div class="mt-2">Check out <a target="_blank" href="https://www.tynker.com/play/dancing-robots/612249dd2d3eb65f2b0c6b1f-728057XjzbT,f5GeQFBM,dlKC2n,wk">this example</a> of dancing robots. Feel free to use it and remix it. <iframe width="660" height="408" src="//www.tynker.com/ide/embedded?p=612249dd2d3eb65f2b0c6b1f&controls=false&autostart=false" frameborder="0" allowfullscreen></iframe>
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
