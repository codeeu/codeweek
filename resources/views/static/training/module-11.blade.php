@extends('layout.base')

@section('content')

    <section id="codeweek-training-page" class="codeweek-page">

        @include('static.training.banner')

        <section class="codeweek-content-wrapper">

            <section class="codeweek-content-wrapper-inside">

                <h1>@lang('training.lessons.11.title')</h1>
                <span>@lang('training.lessons.11.author')</span>

                @lang('training.lessons.11.text')

            </section>

            @include('static.youtube', ['video_id' => '6tTD4CJqzAs'])

            <section class="codeweek-content-wrapper-inside">

                <p>
                    <a href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/docs/training/EN/CODEWEEK-TRAINING-011-VIDEO-SCRIPT-EN.DOCX">
                        @lang('training.download_video_script')
                    </a> (EN)
                </p>

                <h2>@lang('training.ready_to_share')</h2>

                <p>
                    @lang('training.choose_lessons')
                </p>

                <ul>
                    <li>
                        <a href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/docs/training/EN/CODEWEEK-TRAINING-011-ACTIVITY-01-EN.DOCX">
                            @lang('training.lessons.11.activities.1')
                        </a> (EN)
                    </li>
                    <li>
                        <a href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/docs/training/EN/CODEWEEK-TRAINING-011-ACTIVITY-02-EN.DOCX">
                            @lang('training.lessons.11.activities.2')
                        </a> (EN)
                    </li>
                    <li>
                        <a href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/docs/training/EN/CODEWEEK-TRAINING-011-ACTIVITY-03-EN.DOCX">
                            @lang('training.lessons.11.activities.3')
                        </a> (EN)
                    </li>
                </ul>

                <h2>@lang('training.footer.title')</h2>
                @lang('training.footer.text')

            </section>

        </section>

    </section>

@endsection