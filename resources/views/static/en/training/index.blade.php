@extends('layout.base')

@section('content')

    <section>

        <div class="container">

            <div class="content-wrap nopadding">


                <div class="container clearfix ">


                    <div class="flex flex-col justify-center text-center w-full mb-8 uppercase">
                        <h1>Code Week Learning Bits</h1>
                        <span></span>
                    </div>

                    <hr>

                    <p>
                        Are you considering participating in EU Code Week but you don’t know where to start?
                    </p>

                    <p>
                        Here you can find free training materials & resources that will help you get started and plan your next innovative lesson.
                    </p>

                    <p>
                        No previous coding or programming experience is needed, and each module takes only around 15 minutes to complete. The modules introduce you to key concepts related to coding and computational thinking activities. In addition, the modules also give you practical tips and advice on how to integrate the concepts in your classroom.
                    </p>

                    <div class="flex flex-wrap" style="margin-bottom: 30px;">
                        <div class="learning-card">
                            <a href="/training/coding-without-computers">
                                <img src="img/learning/coding-without-computers.png">
                                <div class="text-xl">Coding without digital technology (unplugged)</div>
                                <div class="text-base text-black">By Alessandro Bogliolo</div>
                            </a>
                        </div>
                        <div class="learning-card">
                            <a href="/training/computational-thinking-and-problem-solving">
                                <img src="img/learning/computational-thinking-and-problem-solving.png">
                                <div class="text-xl">Computational thinking and problem solving</div>
                                <div class="text-base text-black">By Miles Berry</div>
                            </a>
                        </div>
                        <div class="learning-card">
                            <a href="/training/visual-programming-introduction-to-scratch">
                                <img src="img/learning/visual-programming-introduction-to-scratch.png">
                                <div class="text-xl">Visual programming – introduction to Scratch</div>
                                <div class="text-base text-black">By Margo Tinawi</div>
                            </a>
                        </div>
                        <div class="learning-card">
                            <a href="/training/creating-educational-games-with-scratch">
                                <img src="img/learning/creating-educational-games-with-scratch.png">
                                <div class="text-xl">Creating educational games with Scratch</div>
                                <div class="text-base text-black">By Jesús Moreno León</div>
                            </a>
                        </div>
                        <div class="learning-card">
                            <a href="/training/making-robotics-and-tinkering-in-the-classroom">
                                <img src="img/learning/making-robotics-and-tinkering-in-the-classroom.png">
                                <div class="text-xl">Making, robotics and tinkering in the classroom</div>
                                <div class="text-base text-black">By Tullia Urschitz</div>
                            </a>
                        </div>
                    </div>

                    <p>
                        Now that you have completed one or more Code Week Learning Bits, we hope that you feel comfortable enough to bring some digital creativity to your classroom and pin your activity on the <a href="/events">Code Week Map</a>!
                    </p>

                    <p>
                        You can easily organise a lesson in your classroom, an open day, or an event at your school. Just find a date and register your activity on the  <a href="/events">Code Week map</a>. Each activity organiser will get a certificate of participation for their effort.
                    </p>

                    <p>
                        If you would like to connect with an international group of enthusiastic teachers, join the <a href="https://www.facebook.com/groups/774720866253044/?source_id=377506999042215">EU Code Week Facebook group for teachers</a>! To take a step further and collaborate with other schools in your country or across borders – join the <a href="codeweek4all">Code Week 4 All challenge</a>.
                    </p>

                </div>
            </div>
        </div>

    </section>

@endsection