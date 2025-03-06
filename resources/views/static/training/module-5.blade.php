@extends('layout.base')

@section('title', 'Robotics & Tinkering – EU Code Week Training')
@section('description', 'The integration of coding, tinkering, robotics, and microelectronics as teaching and learning tools in the school curricula is key in 21st century education.')

@section('content')

    <section id="codeweek-training-page" class="codeweek-page">

        @include('static.training.banner')

        <section class="codeweek-content-wrapper">

            <section class="codeweek-content-wrapper-inside">

                <h1>@lang('training.lessons.5.title')</h1>
                <span>@lang('training.lessons.5.author')</span>

                @lang('training.lessons.5.text')

            </section>

            @include('static.youtube', ['video_id' => '5V9G-vWWSik'])

            <section class="codeweek-content-wrapper-inside">

                <p>
                    <a href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/docs/training/{{strtoupper(App::getLocale())}}/CODEWEEK-TRAINING-005-VIDEO-SCRIPT-{{strtoupper(App::getLocale())}}.DOCX">
                        @lang('training.download_video_script')
                    </a>
                </p>

                <h2>@lang('training.ready_to_share')</h2>

                <p>
                    @lang('training.choose_lessons')
                </p>

                <ul>
                    <li>
                        <a href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/docs/training/{{strtoupper(App::getLocale())}}/CODEWEEK-TRAINING-005-ACTIVITY-01-{{strtoupper(App::getLocale())}}.DOCX">
                            @lang('training.lessons.5.activities.1')
                        </a>
                    </li>
                    <li>
                        <a href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/docs/training/{{strtoupper(App::getLocale())}}/CODEWEEK-TRAINING-005-ACTIVITY-02-{{strtoupper(App::getLocale())}}.DOCX">
                            @lang('training.lessons.5.activities.2')
                        </a>
                    </li>
                    <li>
                        <a href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/docs/training/{{strtoupper(App::getLocale())}}/CODEWEEK-TRAINING-005-ACTIVITY-03-{{strtoupper(App::getLocale())}}.DOCX">
                            @lang('training.lessons.5.activities.3')
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