@extends('layout.base')

@section('content')

    <section id="codeweek-training-page" class="codeweek-page">

        <section class="codeweek-banner learn-teach">
            <div class="text">
                <h1>#CodeWeek</h1>
                <h2>Coding@Home – video tutorials</h2>
            </div>
            <div class="image">
                <img src="/images/banner_training.svg" class="static-image">
            </div>
        </section>


        <section class="codeweek-content-wrapper">


            <section class="codeweek-content-wrapper-inside">

                <h1>Coding@Home</h1>

                <div>
                    <p>
                        Coding@Home are short videos, do-it-yourself materials, puzzles, games, and coding challenges
                        for everyday use in the family as well as at school. You do not need any previous knowledge or
                        electronic devices to do the exercises. They will stimulate computational thinking and cultivate
                        the skills of pupils and teachers alike, beyond school hours and spaces.
                    </p>
                    <p>
                        EU Code Week’s Coding@Home series builds on the <a
                                href="https://www.raicultura.it/speciali/codinginfamiglia/" target="_blank">“Coding in
                            famiglia”</a> initiative of the
                        <a href="https://www.uniurb.it/" target="_blank">University of Urbino</a> and the CodeMOOCnet
                        Association in cooperation with <a href="https://www.raicultura.it/" target="_blank">Rai
                            Cultura</a>. Alessandro
                        Bogliolo who presents and explains the activities is the Professor of Information Processing
                        Systems at the University of Urbino. He is also the <a href="/ambassadors?country_iso=IT"
                                                                               target="_blank">Italian EU Code Week
                            ambassador</a> and
                        coordinator of all ambassadors as well as member of the Governing Board of the <a
                                href="https://ec.europa.eu/digital-single-market/en/digital-skills-jobs-coalition"
                                target="_blank">Digital Skills
                            and Jobs Coalition.</a>
                    </p>

                </div>


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
                    <a href="/training/coding-without-computers">
                        <img src="/img/learning/coding-without-computers.png">
                        <div class="title">@lang('training.lessons.1.title')</div>
                        <div class="author">@lang('training.lessons.1.author')</div>
                    </a>
                </div>
                <div class="codeweek-card-grid">
                    <a href="/training/coding-without-computers">
                        <img src="/img/learning/coding-without-computers.png">
                        <div class="title">@lang('training.lessons.1.title')</div>
                        <div class="author">@lang('training.lessons.1.author')</div>
                    </a>
                </div>
                <div class="codeweek-card-grid">
                    <a href="/training/coding-without-computers">
                        <img src="/img/learning/coding-without-computers.png">
                        <div class="title">@lang('training.lessons.1.title')</div>
                        <div class="author">@lang('training.lessons.1.author')</div>
                    </a>
                </div>
            </section>


        </section>

    </section>

@endsection