@extends('layout.base')

@section('title', 'Tinkering and Making – Hands-On Coding and Creation')
@section('description', 'Explore the world of tinkering and making in this hands-on training. Learn how to combine creativity, technology, and coding for innovative projects.')

@section('content')

    <section id="codeweek-training-page" class="codeweek-page">

        @include('static.training.banner')

        <section class="codeweek-content-wrapper">

            <section class="codeweek-content-wrapper-inside">

                <h1>@lang('training.lessons.7.title')</h1>
                <span>@lang('training.lessons.7.author')</span>

                @lang('training.lessons.7.text')

            </section>

            @include('static.youtube', ['video_id' => 'BbbLe2g-SLQ'])

            <section class="codeweek-content-wrapper-inside">

                <p>
                    <a href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/docs/training/{{strtoupper(App::getLocale())}}/CODEWEEK-TRAINING-007-VIDEO-SCRIPT-{{strtoupper(App::getLocale())}}.DOCX">
                        @lang('training.download_video_script')
                    </a>
                </p>

                <h2>@lang('training.ready_to_share')</h2>

                <p>
                    @lang('training.choose_lessons')
                </p>

                <ul>
                    <li>
                        <a href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/docs/training/{{strtoupper(App::getLocale())}}/CODEWEEK-TRAINING-007-ACTIVITY-01-{{strtoupper(App::getLocale())}}.DOCX">
                            @lang('training.lessons.7.activities.1')
                        </a>
                    </li>
                    <li>
                        <a href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/docs/training/{{strtoupper(App::getLocale())}}/CODEWEEK-TRAINING-007-ACTIVITY-02-{{strtoupper(App::getLocale())}}.DOCX">
                            @lang('training.lessons.7.activities.2')
                        </a>
                    </li>
                    <li>
                        <a href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/docs/training/{{strtoupper(App::getLocale())}}/CODEWEEK-TRAINING-007-ACTIVITY-03-{{strtoupper(App::getLocale())}}.DOCX">
                            @lang('training.lessons.7.activities.3')
                        </a>
                    </li>
                </ul>

                <h2>@lang('training.footer.title')</h2>
                @lang('training.footer.text')

            </section>
            @include('include.licence')
        </section>

    </section>

@endsection