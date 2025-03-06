@extends('layout.base')

@section('title', 'Creative Scratch Laboratory – Explore Coding with Scratch')
@section('description', 'Unleash creativity with Scratch! Learn how to develop fun and interactive projects in this hands-on coding training.')

@section('content')

    <section id="codeweek-training-page" class="codeweek-page">

        @include('static.training.banner')

        <section class="codeweek-content-wrapper">

            <section class="codeweek-content-wrapper-inside">

                <h1>@lang('training.lessons.19.title')</h1>
                <span style="font-weight: bold">@lang('training.lessons.19.author')</span>

                <p>@lang('training.lessons.19.text.0')</p>
                <p>@lang('training.lessons.19.text.1')</p>
                <p>@lang('training.lessons.19.text.2')</p>


            </section>

            @include('static.youtube', ['video_id' => 'Pf86hYW1Rgw'])

            <section class="codeweek-content-wrapper-inside">


                {{--                <p>--}}
                {{--                    <a href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/docs/training/{{strtoupper(App::getLocale())}}/CODEWEEK-TRAINING-015-VIDEO-SCRIPT-{{strtoupper(App::getLocale())}}.DOCX">--}}
                {{--                        @lang('training.download_video_script')--}}
                {{--                    </a>--}}
                {{--                </p>--}}


                <h2>@lang('training.ready_to_share')</h2>


                <p>
                    @lang('training.choose_lessons')
                </p>


                <ol style="list-style-type: decimal;margin-left:40px; margin-top:-4px;">
                    <li>
                        <a href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/docs/training/{{strtoupper(App::getLocale())}}/CODEWEEK-TRAINING-019-ACTIVITY-01.docx">
                            @lang('training.lessons.19.activities.1')
                        </a>
                    </li>
                    <li>
                        <a href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/docs/training/{{strtoupper(App::getLocale())}}/CODEWEEK-TRAINING-019-ACTIVITY-02.docx">
                            @lang('training.lessons.19.activities.2')
                        </a>
                    </li>
                    <li>
                        <a href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/docs/training/{{strtoupper(App::getLocale())}}/CODEWEEK-TRAINING-019-ACTIVITY-03.docx">
                            @lang('training.lessons.19.activities.3')
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
