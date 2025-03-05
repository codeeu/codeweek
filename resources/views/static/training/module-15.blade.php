@extends('layout.base')

@section('title', 'Mining Media Literacy – Free Training Course')
@section('description', 'This Learning Bit will enable you to implement various strategies and techniques to empower your students to become media literate.')

@section('content')

    <section id="codeweek-training-page" class="codeweek-page">

        @include('static.training.banner')

        <section class="codeweek-content-wrapper">

            <section class="codeweek-content-wrapper-inside">

                <h1>@lang('training.lessons.15.title')</h1>
                <span style="font-weight: bold">@lang('training.lessons.15.author')</span>

                <p>@lang('training.lessons.15.text.0')</p>
                <p>@lang('training.lessons.15.text.1')</p>


            </section>

            @include('static.youtube', ['video_id' => 'sZkXQ6-Nemk'])

            <section class="codeweek-content-wrapper-inside">


                {{--                <p>--}}
                {{--                    <a href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/docs/training/{{strtoupper(App::getLocale())}}/CODEWEEK-TRAINING-015-VIDEO-SCRIPT-{{strtoupper(App::getLocale())}}.DOCX">--}}
                {{--                        @lang('training.download_video_script')--}}
                {{--                    </a>--}}
                {{--                </p>--}}


                <h2>@lang('training.ready_to_share')</h2>


                <p>@lang('training.lessons.15.text.2')</p>


                <ol style="list-style-type: decimal;margin-left:40px; margin-top:-4px;">
                    <li>
                        <a href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/docs/training/{{strtoupper(App::getLocale())}}/CODEWEEK-TRAINING-015-ACTIVITY-01.docx">
                            @lang('training.lessons.15.activities.1')
                        </a>
                    </li>
                    <li>
                        <a href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/docs/training/{{strtoupper(App::getLocale())}}/CODEWEEK-TRAINING-015-ACTIVITY-02.docx">
                            @lang('training.lessons.15.activities.2')
                        </a>
                    </li>
                    <li>
                        <a href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/docs/training/{{strtoupper(App::getLocale())}}/CODEWEEK-TRAINING-015-ACTIVITY-03.docx">
                            @lang('training.lessons.15.activities.3')
                        </a>
                    </li>
                </ol>

                <h2>@lang('training.footer.title')</h2>
                @lang('training.footer.text')

            </section>
            @include('include.licence')
        </section>

    </section>

@endsection
