@extends('layout.base')

@section('title', 'Coding Training for Teachers – EU Code Week')
@section('description', 'Enhance your coding teaching skills with specialized training courses and resources from EU Code Week.')

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

                <div class="codeweek-card-grid">
                    <a href="/training/coding-for-sustainable-development-goals">
                        <img src="/img/learning/coding-for-sustainable-development-goals.png">
                        <div class="title">@lang('training.lessons.12.title')</div>
                        <div class="author">@lang('training.lessons.12.author')</div>
                    </a>
                </div>

                <div class="codeweek-card-grid">
                    <a href="/training/introduction-to-artificial-intelligence-in-the-classroom">
                        <img src="/img/learning/introduction-to-artificial-intelligence-in-the-classroom.png">
                        <div class="title">@lang('training.lessons.13.title')</div>
                        <div class="author">@lang('training.lessons.13.author')</div>
                    </a>
                </div>
                <div class="codeweek-card-grid">
                    <a href="/training/learning-in-the-age-of-intelligent-machines">
                        <img src="/img/learning/learning-in-the-age-of-intelligent-machines.png">
                        <div class="title">@lang('training.lessons.14.title')</div>
                        <div class="author">@lang('training.lessons.14.author')</div>
                    </a>
                </div>
                <div class="codeweek-card-grid">
                    <a href="/training/mining-media-literacy">
                        <img src="/img/learning/mining-media-literacy.png">
                        <div class="title">@lang('training.lessons.15.title')</div>
                        <div class="author">@lang('training.lessons.15.author')</div>
                    </a>
                </div>
                <div class="codeweek-card-grid">
                    <a href="/training/story-telling-with-hedy">
                        <img src="/img/learning/story-telling-with-hedy.png">
                        <div class="title">@lang('training.lessons.16.title')</div>
                        <div class="author">@lang('training.lessons.16.author')</div>
                    </a>
                </div>

                <div class="codeweek-card-grid">
                    <a href="/training/feel-the-code">
                        <img src="/img/learning/feel-the-code.jpg">
                        <div class="title">@lang('training.lessons.17.title')</div>
                        <div class="author">@lang('training.lessons.17.author')</div>
                    </a>
                </div>

                <div class="codeweek-card-grid">
                    <a href="/training/sos-water">
                        <img src="/img/learning/sos-water.png">
                        <div class="title">@lang('training.lessons.18.title')</div>
                        <div class="author">@lang('training.lessons.18.author')</div>
                    </a>
                </div>

                <div class="codeweek-card-grid">
                    <a href="/training/creative-scratch-laboratory">
                        <img src="/img/learning/creative-scratch-laboratory.png">
                        <div class="title">@lang('training.lessons.19.title')</div>
                        <div class="author">@lang('training.lessons.19.author')</div>
                    </a>
                </div>

                <div class="codeweek-card-grid">
                    <a href="/training/code-through-art">
                        <img src="/img/learning/code-through-art.png">
                        <div class="title">@lang('training.lessons.20.title')</div>
                        <div class="author">@lang('training.lessons.20.author')</div>
                    </a>
                </div>

                <div class="codeweek-card-grid">
                    <a href="/training/making-and-coding">
                        <img src="/img/learning/making-and-coding.png">
                        <div class="title">@lang('training.lessons.21.title')</div>
                        <div class="author">@lang('training.lessons.21.author')</div>
                    </a>
                </div>
            </section>

            <section class="codeweek-content-wrapper-inside">

                <h2 class="subtitle">2. @lang('mooc.free-online-courses')</h2>

                <p>
                    @lang('mooc.intro')
                </p>

{{--                <h4>@lang('mooc.icebreaker.title')</h4>--}}
{{--                <p>--}}
{{--                    @lang('mooc.icebreaker.text.0')--}}
{{--                    <a href="https://www.europeanschoolnetacademy.eu/courses/course-v1:CodeWeek+Icebreaker+2020/about">@lang('mooc.icebreaker.text.1')</a>--}}
{{--                    @lang('mooc.icebreaker.text.2')--}}
{{--                </p>--}}

{{--                <p> @lang('mooc.icebreaker.text.3')--}}
{{--                    <br/><br/>--}}
{{--                    <a href="https://www.europeanschoolnetacademy.eu/courses/course-v1:CodeWeek+Icebreaker+2020/about">{{Illuminate\Support\Str::replaceFirst('2019','2020',__('mooc.icebreaker.check-out'))}}</a><br/><br/>--}}


{{--                </p>--}}

{{--                <h4>@lang('mooc.deep-dive.title')</h4>--}}
{{--                <p>@lang('mooc.deep-dive.text.0') <a--}}
{{--                            href="https://codeweek.eu/resources/teach">@lang('mooc.deep-dive.text.1')</a> @lang('mooc.deep-dive.text.2')--}}
{{--                </p>--}}


{{--                <p>--}}
{{--                    <a href="https://www.europeanschoolnetacademy.eu/courses/course-v1:CodeWeek+CWDive+2020/about">{{Illuminate\Support\Str::replaceFirst('2019','2020',__('mooc.deep-dive.course-link'))}}</a>--}}
{{--                </p>--}}

                <p>@lang('mooc.social-media.0') <a
                            href="https://twitter.com/CodeWeekEU">@lang('mooc.social-media.1')</a> @lang('mooc.social-media.2')
                    .</p>


                <h2 class="subtitle">3. @lang('event.main_title')</h2>
                @lang('training.text_2')

            </section>


            @include("include.licence")


        </section>

    </section>

@endsection
