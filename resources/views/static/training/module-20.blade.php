@extends('layout.base')

@section('title', 'Code Through Art – Combine Creativity and Coding')
@section('description', 'Learn how to integrate coding with art in this interactive training. Explore ways to create digital artwork through programming.')

@section('content')

    <section id="codeweek-training-page" class="codeweek-page">

        @include('static.training.banner')

        <section class="codeweek-content-wrapper">

            <section class="codeweek-content-wrapper-inside">

                <h1>@lang('training.lessons.20.title')</h1>
                <span style="font-weight: bold">@lang('training.lessons.20.author')</span>

                <p>@lang('training.lessons.20.text.0')</p>
                <p>@lang('training.lessons.20.text.1')</p>
                <p>@lang('training.lessons.20.text.2')</p>
                <p>@lang('training.lessons.20.text.3')</p>


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
            <div style="width: 100%;"><div style="position: relative; padding-bottom: 56.25%; padding-top: 0; height: 0;"><iframe title="Code through Art_EU Code Week Learning Bit" frameborder="0" width="1200px" height="675px" style="position: absolute; top: 0; left: 0; width: 100%; height: 100%;" src="https://view.genially.com/65e459b267e85f0013a34d9a" type="text/html" allowscriptaccess="always" allowfullscreen="true" scrolling="yes" allownetworking="all"></iframe> </div> </div>


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

                @php
                    $missingLocales = ['DA', 'FI', 'ME', 'MT', 'PL'];
                    $currentLocale = app()->getLocale();
                @endphp

                @if(in_array(strtoupper($currentLocale), $missingLocales))
                    <ol style="list-style-type: decimal;margin-left:40px; margin-top:-4px;">
                        <li>
                            <a href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/docs/training/EN/CODEWEEK-TRAINING-020-ACTIVITY-01.docx">
                                @lang('training.lessons.20.activities.1')
                            </a>
                        </li>
                        <li>
                            <a href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/docs/training/EN/CODEWEEK-TRAINING-020-ACTIVITY-02.docx">
                                @lang('training.lessons.20.activities.2')
                            </a>
                        </li>
                        <li>
                            <a href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/docs/training/EN/CODEWEEK-TRAINING-020-ACTIVITY-03.docx">
                                @lang('training.lessons.20.activities.3')
                            </a>
                        </li>
                    </ol>
                @else
                    <ol style="list-style-type: decimal;margin-left:40px; margin-top:-4px;">
                        <li>
                            <a href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/docs/training/{{strtoupper(App::getLocale())}}/CODEWEEK-TRAINING-020-ACTIVITY-01.docx">
                                @lang('training.lessons.20.activities.1')
                            </a>
                        </li>
                        <li>
                            <a href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/docs/training/{{strtoupper(App::getLocale())}}/CODEWEEK-TRAINING-020-ACTIVITY-02.docx">
                                @lang('training.lessons.20.activities.2')
                            </a>
                        </li>
                        <li>
                            <a href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/docs/training/{{strtoupper(App::getLocale())}}/CODEWEEK-TRAINING-020-ACTIVITY-03.docx">
                                @lang('training.lessons.20.activities.3')
                            </a>
                        </li>
                    </ol>
                @endif




                <h2>@lang('training.footer.title')</h2>
                @lang('training.footer.text')

            </section>
            @include('include.licence')
        </section>

    </section>

@endsection
