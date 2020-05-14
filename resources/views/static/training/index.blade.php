@extends('layout.base')

@section('content')

    <section id="codeweek-training-page" class="codeweek-page">

        @include('static.training.banner')

        <section class="codeweek-content-wrapper">

            <section class="codeweek-content-wrapper-inside">

                <h1>@lang('training.title')</h1>


                @lang('training.text')

            </section>

            <section class="codeweek-content-grid">
                <div class="codeweek-card-grid">
                    <a href="/training/coding-without-computers">
                        <img src="/img/learning/coding-without-computers.png">
                        <div class="title">@lang('training.lessons.1.title')</div>
                        <div class="author">@lang('training.lessons.1.author')</div>
                    </a>
                </div>
                <div class="codeweek-card-grid">
                    <a href="/training/computational-thinking-and-problem-solving">
                        <img src="/img/learning/computational-thinking-and-problem-solving.png">
                        <div class="title">@lang('training.lessons.2.title')</div>
                        <div class="author">@lang('training.lessons.2.author')</div>
                    </a>
                </div>
                <div class="codeweek-card-grid">
                    <a href="/training/visual-programming-introduction-to-scratch">
                        <img src="/img/learning/visual-programming-introduction-to-scratch.png">
                        <div class="title">@lang('training.lessons.3.title')</div>
                        <div class="author">@lang('training.lessons.3.author')</div>
                    </a>
                </div>
                <div class="codeweek-card-grid">
                    <a href="/training/creating-educational-games-with-scratch">
                        <img src="/img/learning/creating-educational-games-with-scratch.png">
                        <div class="title">@lang('training.lessons.4.title')</div>
                        <div class="author">@lang('training.lessons.4.author')</div>
                    </a>
                </div>
                <div class="codeweek-card-grid">
                    <a href="/training/making-robotics-and-tinkering-in-the-classroom">
                        <img src="/img/learning/making-robotics-and-tinkering-in-the-classroom.png">
                        <div class="title">@lang('training.lessons.5.title')</div>
                        <div class="author">@lang('training.lessons.5.author')</div>
                    </a>
                </div>
                <div class="codeweek-card-grid">
                    <a href="/training/developing-creative-thinking-through-mobile-app-development">
                        <img src="/img/learning/developing-creative-thinking-through-mobile-app-development.png">
                        <div class="title">@lang('training.lessons.6.title')</div>
                        <div class="author">@lang('training.lessons.6.author')</div>
                    </a>
                </div>
                <div class="codeweek-card-grid">
                    <a href="/training/tinkering-and-making">
                        <img src="/img/learning/tinkering-and-making.png">
                        <div class="title">@lang('training.lessons.7.title')</div>
                        <div class="author">@lang('training.lessons.7.author')</div>
                    </a>
                </div>
                <div class="codeweek-card-grid">
                    <a href="/training/coding-for-all-subjects">
                        <img src="/img/learning/coding-for-all-subjects.png">
                        <div class="title">@lang('training.lessons.8.title')</div>
                        <div class="author">@lang('training.lessons.8.author')</div>
                    </a>
                </div>
                <div class="codeweek-card-grid">
                    <a href="/training/making-an-automaton-with-microbit">
                        <img src="/img/learning/making-an-automaton-with-microbit.png">
                        <div class="title">@lang('training.lessons.9.title')</div>
                        <div class="author">@lang('training.lessons.9.author')</div>
                    </a>
                </div>
                <div class="codeweek-card-grid">
                    <a href="/training/creative-coding-with-python">
                        <img src="/img/learning/creative-coding-with-python.png">
                        <div class="title">@lang('training.lessons.10.title')</div>
                        <div class="author">@lang('training.lessons.10.author')</div>
                    </a>
                </div>
                <div class="codeweek-card-grid">
                    <a href="/training/coding-for-inclusion">
                        <img src="/img/learning/coding-for-inclusion.png">
                        <div class="title">@lang('training.lessons.11.title')</div>
                        <div class="author">@lang('training.lessons.11.author')</div>
                    </a>
                </div>
            </section>

            <section class="codeweek-content-wrapper-inside">

                <h2 class="subtitle">2. @lang('mooc.free-online-courses')</h2>

                <p>
                    @lang('mooc.intro')
                </p>

                <h4>@lang('mooc.icebreaker.title')</h4>
                <p>
                    @lang('mooc.icebreaker.text.0')
                    <a href="https://www.europeanschoolnetacademy.eu/courses/course-v1:CodeWeek+Icebreaker+2020/about">@lang('mooc.icebreaker.text.1')</a>
                    @lang('mooc.icebreaker.text.2')
                </p>

                <p>You do not need any previous experience or knowledge in coding to participate in this course, just a
                    curious mind. </p>
                <p><a href="https://www.europeanschoolnetacademy.eu/courses/course-v1:CodeWeek+Icebreaker+2020/about">Registrations
                        are open here</a> for the course that runs between 11 May and 15 June 2020. Please note
                    that you need to create an account in the European Schoolnet Academy to register. </p>
                <p><a href="https://www.europeanschoolnetacademy.eu/courses/course-v1:CodeWeek+Icebreaker+2019/about">Check
                        out the 2019 edition</a>.</p>

                <h4>The in-depth “Deep Dive” course</h4>
                <p>The EU Code Week Deep Dive online course is a twenty-five-hour course in English that offers teachers
                    the opportunity to get familiarised with coding related principles and gain the knowledge and
                    confidence to organize easy and fun, interactive coding activities with their students. Teachers
                    discover EU Code Week’s free <a href="https://codeweek.eu/resources/teach">resources</a> and
                    training materials available in 29 languages, and
                    particular aspects of coding, such as computational thinking, unplugged activities, and the endless
                    possibilities of robotics, tinkering and making, visual programming languages, app creation and much
                    more.</p>
                <p>Check out <a
                            href="https://www.europeanschoolnetacademy.eu/courses/course-v1:CodeWeek+CWDive+2019/about">the
                        2019 “Deep dive” course.</a></p>
                <p>Follow <a href="https://twitter.com/CodeWeekEU">EU Code Week on social media</a> to find out when the
                    next course will start.</p>


                <h2 class="subtitle">3. @lang('event.main_title')</h2>
                @lang('training.text_2')

            </section>


            <div class="copyright">
                @lang('copyright.title') ©<br/>
                <a href="#">@lang('copyright.training.0')</a> @lang('copyright.training.1'). <br/>
                @lang('copyright.licence.0') <a
                        href="@lang('copyright.licence.1')">@lang('copyright.licence.2')</a><br/>
                @lang('copyright.creative-commons').<br/>
                @lang('copyright.third-party').
            </div>


        </section>

    </section>

@endsection