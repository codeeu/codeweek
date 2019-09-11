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
                @if(App::getLocale() == 'en')
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
                @endif
            </section>

            <section class="codeweek-content-wrapper-inside">

                @lang('training.text_2')

            </section>

        </section>

    </section>

@endsection