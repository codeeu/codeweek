@extends('layout.base')

@section('content')

    <section id="codeweek-training-page" class="codeweek-page">

        @include('static.training.banner')

        <section class="codeweek-content-wrapper">

            <section class="codeweek-content-wrapper-inside">

                <h1>Are you considering participating in EU Code Week but you don’t know where to start?</h1>

                <p>
                    Here you can find free training materials & resources that will help you get started and plan your next innovative lesson.
                </p>

                <p>
                    No previous coding or programming experience is needed, and each module takes only around 15 minutes to complete. The modules introduce you to key concepts related to coding and computational thinking activities. In addition, the modules also give you practical tips and advice on how to integrate the concepts in your classroom.
                </p>

            </section>

            <section class="codeweek-content-grid">
                <div class="codeweek-card-grid">
                    <a href="/training/coding-without-computers">
                        <img src="/img/learning/coding-without-computers.png">
                        <div class="title">Coding without digital technology (unplugged)</div>
                        <div class="author">By Alessandro Bogliolo</div>
                    </a>
                </div>
                <div class="codeweek-card-grid">
                    <a href="/training/computational-thinking-and-problem-solving">
                        <img src="/img/learning/computational-thinking-and-problem-solving.png">
                        <div class="title">Computational thinking and problem solving</div>
                        <div class="author">By Miles Berry</div>
                    </a>
                </div>
                <div class="codeweek-card-grid">
                    <a href="/training/visual-programming-introduction-to-scratch">
                        <img src="/img/learning/visual-programming-introduction-to-scratch.png">
                        <div class="title">Visual programming – introduction to Scratch</div>
                        <div class="author">By Margo Tinawi</div>
                    </a>
                </div>
                <div class="codeweek-card-grid">
                    <a href="/training/creating-educational-games-with-scratch">
                        <img src="/img/learning/creating-educational-games-with-scratch.png">
                        <div class="title">Creating educational games with Scratch</div>
                        <div class="author">By Jesús Moreno León</div>
                    </a>
                </div>
                <div class="codeweek-card-grid">
                    <a href="/training/making-robotics-and-tinkering-in-the-classroom">
                        <img src="/img/learning/making-robotics-and-tinkering-in-the-classroom.png">
                        <div class="title">Making, robotics and tinkering in the classroom</div>
                        <div class="author">By Tullia Urschitz</div>
                    </a>
                </div>
                <div class="codeweek-card-grid">
                    <a href="/training/developing-creative-thinking-through-mobile-app-development">
                        <img src="/img/learning/developing-creative-thinking-through-mobile-app-development.png">
                        <div class="title">Developing creative thinking through mobile app development</div>
                        <div class="author">By Rosanna Kurrer</div>
                    </a>
                </div>

                <div class="codeweek-card-grid">
                    <a href="/training/tinkering-and-making">
                        <img src="/img/learning/tinkering-and-making.png">
                        <div class="title">Tinkering and Making</div>
                        <div class="author">By Diogo da Silva</div>
                    </a>
                </div>

                <div class="codeweek-card-grid">
                    <a href="/training/coding-for-all-subjects">
                        <img src="/img/learning/coding-for-all-subjects.png">
                        <div class="title">Coding for all subjects</div>
                        <div class="author">By M. Isabel Blanco, M. Concepción Fernández, Elisabetta Nanni, Debora Carmela Niutta, Stefania Altieri</div>

                    </a>
                </div>
            </section>

            <section class="codeweek-content-wrapper-inside">

                <p>
                    Now that you have completed one or more Code Week Learning Bits, we hope that you feel comfortable enough to bring some digital creativity to your classroom and pin your activity on the <a href="/events">Code Week Map</a>!
                </p>

                <p>
                    You can easily organise a lesson in your classroom, an open day, or an event at your school. Just find a date and register your activity on the  <a href="/events">Code Week map</a>. Each activity organiser will get a certificate of participation for their effort.
                </p>

                <p>
                    If you would like to connect with an international group of enthusiastic teachers, join the <a href="https://www.facebook.com/groups/774720866253044/?source_id=377506999042215">EU Code Week Facebook group for teachers</a>! To take a step further and collaborate with other schools in your country or across borders – join the <a href="codeweek4all">Code Week 4 All challenge</a>.
                </p>

            </section>

        </section>

    </section>

@endsection