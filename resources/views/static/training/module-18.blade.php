@extends('layout.base')

@section('title', 'SOS Water – Coding for Environmental Awareness')
@section('description', 'Discover how coding can address environmental challenges in this EU Code Week training.')

@section('content')

    <section id="codeweek-training-page" class="codeweek-page">

        @include('static.training.banner')

        <section class="codeweek-content-wrapper">

            <section class="codeweek-content-wrapper-inside">

                <h1>@lang('training.lessons.18.title')</h1>
                <span style="font-weight: bold">@lang('training.lessons.18.author')</span>

                <p>@lang('training.lessons.18.text.0')</p>
                <p>@lang('training.lessons.18.text.1')</p>
                <p>@lang('training.lessons.18.text.2')</p>
                <p>@lang('training.lessons.18.text.3')</p>


            </section>

{{--            <div style="height:700px;">--}}
{{--                <div style="width: 100%;">--}}
{{--                    <div style="position: relative; padding-bottom: 56.25%; padding-top: 0; height: 0;">--}}
{{--                        <iframe frameborder="0" width="1200" height="675"--}}
{{--                                style="position: absolute; top: 0; left: 0; width: 100%; height: 100%;"--}}
{{--                                src="https://view.genial.ly/629299576bc63f0012075f0f" type="text/html"--}}
{{--                                allowscriptaccess="always" allowfullscreen="true" scrolling="yes"--}}
{{--                                allownetworking="all"></iframe>--}}
{{--                    </div>--}}
{{--                </div>--}}

{{--            </div>--}}

            <div style="width: 100%;"><div style="position: relative; padding-bottom: 56.25%; padding-top: 0; height: 0;"><iframe title="SOS Water" frameborder="0" width="1200px" height="675px" style="position: absolute; top: 0; left: 0; width: 100%; height: 100%;" src=https://view.genial.ly/644c14ab06a30e001abf5033 type="text/html" allowscriptaccess="always" allowfullscreen="true" scrolling="yes" allownetworking="all"></iframe> </div> </div>


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
                        <a href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/docs/training/{{strtoupper(App::getLocale())}}/CODEWEEK-TRAINING-018-ACTIVITY-01.docx">
                            @lang('training.lessons.18.activities.1')
                        </a>
                    </li>
                    <li>
                        <a href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/docs/training/{{strtoupper(App::getLocale())}}/CODEWEEK-TRAINING-018-ACTIVITY-02.docx">
                            @lang('training.lessons.18.activities.2')
                        </a>
                    </li>
                    <li>
                        <a href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/docs/training/{{strtoupper(App::getLocale())}}/CODEWEEK-TRAINING-018-ACTIVITY-03.docx">
                            @lang('training.lessons.18.activities.3')
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
