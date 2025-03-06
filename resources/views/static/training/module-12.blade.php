@extends('layout.base')

@section('title', 'Coding for Sustainable Development Goals – Tech for Change')
@section('description', 'Explore how coding can be used to address global challenges and contribute to achieving the Sustainable Development Goals in this training.')

@section('content')

    <section id="codeweek-training-page" class="codeweek-page">

        @include('static.training.banner')

        <section class="codeweek-content-wrapper">

            <section class="codeweek-content-wrapper-inside">

                <h1>@lang('training.lessons.12.title')</h1>
                <span style="font-weight: bold">@lang('training.lessons.12.author')</span>

                <p>@lang('training.lessons.12.text.1')</p>
                <p>@lang('training.lessons.12.text.2')</p>
                <p>@lang('training.lessons.12.text.3')</p>
                <p>@lang('training.lessons.12.text.4')</p>
                <ul style="list-style-type: circle;margin-left:40px; margin-top:-4px; font-weight: bold">
                    <li>@lang('training.lessons.12.text.5')</li>
                    <li>@lang('training.lessons.12.text.6')</li>
                    <li>@lang('training.lessons.12.text.7')</li>
                </ul>

            </section>

            @include('static.youtube', ['video_id' => 'onjRnnAdDpA'])

            <section class="codeweek-content-wrapper-inside">


                <p>
                    <a href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/docs/training/{{strtoupper(App::getLocale())}}/CODEWEEK-TRAINING-012-VIDEO-SCRIPT-{{strtoupper(App::getLocale())}}.docx">
                        @lang('training.download_video_script')
                    </a>
                </p>


                <h2>@lang('training.ready_to_share')</h2>

                <p>
                    @lang('training.choose_lessons')
                </p>

                <ul style="list-style-type: circle;margin-left:40px; margin-top:-4px;">
                    <li>
                        <a href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/docs/training/{{strtoupper(App::getLocale())}}/CODEWEEK-TRAINING-012-ACTIVITY-02-{{strtoupper(App::getLocale())}}.docx">
                            @lang('training.lessons.12.activities.2')
                        </a>
                    </li>
                    <li>
                        <a href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/docs/training/{{strtoupper(App::getLocale())}}/CODEWEEK-TRAINING-012-ACTIVITY-03-{{strtoupper(App::getLocale())}}.docx">
                            @lang('training.lessons.12.activities.3')
                        </a>
                    </li>
                    <li>
                        <a href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/docs/training/{{strtoupper(App::getLocale())}}/CODEWEEK-TRAINING-012-ACTIVITY-01-{{strtoupper(App::getLocale())}}.docx">
                            @lang('training.lessons.12.activities.1')
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