@extends('layout.base')

@section('content')

    <section id="codeweek-training-page" class="codeweek-page">

        @include('static.training.banner')

        <section class="codeweek-content-wrapper">

            <section class="codeweek-content-wrapper-inside">

                <h1>@lang('training.lessons.16.title')</h1>
                <span style="font-weight: bold">@lang('training.lessons.16.author')</span>

                <p>@lang('training.lessons.16.text.0')</p>
                <p>@lang('training.lessons.16.text.1')</p>
                <p>@lang('training.lessons.16.text.2')</p>
                <p>@lang('training.lessons.16.text.3')</p>


            </section>

            <div style="height:700px;">
                <iframe src="https://hedy.org/hedy#haunted" height="700" width="1000" title="Hedy Story"></iframe>
            </div>



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
                        <a href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/docs/training/{{strtoupper(App::getLocale())}}/CODEWEEK-TRAINING-016-ACTIVITY-01.docx">
                            @lang('training.lessons.16.activities.1')
                        </a>
                    </li>
                    <li>
                        <a href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/docs/training/{{strtoupper(App::getLocale())}}/CODEWEEK-TRAINING-016-ACTIVITY-02.docx">
                            @lang('training.lessons.16.activities.2')
                        </a>
                    </li>
                    <li>
                        <a href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/docs/training/{{strtoupper(App::getLocale())}}/CODEWEEK-TRAINING-016-ACTIVITY-03.docx">
                            @lang('training.lessons.16.activities.3')
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
