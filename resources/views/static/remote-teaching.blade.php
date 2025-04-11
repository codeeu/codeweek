@extends('layout.base')

@section('title', 'Remote Teaching Resources for Coding Education')
@section('description', 'Access tools, guides, and best practices to teach coding remotely. Engage students in online learning with EU Code Week’s curated resources.')

@section('content')

    <section id="codeweek-about-page" class="codeweek-page">

        <section class="codeweek-banner scoreboard">
            <div class="text">
                <h1>@lang('remote-teaching.remote-teaching')</h1>

            </div>
            <div class="image">
                <img src="images/banner_scoreboard.svg" class="static-image">
            </div>
        </section>

        <section class="codeweek-content-wrapper">

            <div class="codeweek-about-blue-box" style="line-height: 22px;">

                <h3>@lang('remote-teaching.intro.title')</h3>
                <h4>@lang('remote-teaching.intro.text')</h4>
                <ul class="checklist">

                    <li><a href="{{route('coding@home')}}">@lang('menu.coding@home')</a>: @lang('remote-teaching.intro.points.1')</li>
                    <li><a href="https://codeweek-s3.s3.eu-west-1.amazonaws.com/docs/EU+Code+Week_Deep+Dive+MOOC+2020_Module+1_+Actitivities+at+home+.pdf">@lang('remote-teaching.intro.points.2.0')</a>: @lang('remote-teaching.intro.points.2.1')</li>
                    <li>
                        <a href="{{route('training.index')}}">@lang('remote-teaching.intro.points.3.0')</a>: @lang('remote-teaching.intro.points.3.1')

                    </li>
                    <li>
                        <a href="{{route('resources_all')}}">@lang('remote-teaching.intro.points.4.0')</a>:
                        @lang('remote-teaching.intro.points.4.1')


                    </li>
                    <li>
                        <a href="https://www.youtube.com/playlist?list=PLnqp3yQre_1i7U2QKr2mc98pt2WEhA7Ig">@lang('remote-teaching.intro.points.5.0')</a>: @lang('remote-teaching.intro.points.5.1')
                    </li>
                </ul>


                <h3>@lang('remote-teaching.tips.title')</h3>

                <ol class="tips">
                    <li>
                        <strong>@lang('remote-teaching.tips.points.1.0')</strong>
                        @lang('remote-teaching.tips.points.1.1')
                    </li>
                    <li>
                        <strong>@lang('remote-teaching.tips.points.2.0')</strong>
                        @lang('remote-teaching.tips.points.2.1')
                    </li>
                    <li>
                        <strong>@lang('remote-teaching.tips.points.3.0')</strong>
                        @lang('remote-teaching.tips.points.3.1')
                    </li>
                    <li>
                        <strong>@lang('remote-teaching.tips.points.4.0')</strong>
                        @lang('remote-teaching.tips.points.4.1')
                    </li>

                    <li>
                        <strong>@lang('remote-teaching.tips.points.5.0')</strong>
                        @lang('remote-teaching.tips.points.5.1')
                    </li>
                    <li>
                        <strong>@lang('remote-teaching.tips.points.6.0')</strong>
                        @lang('remote-teaching.tips.points.6.1')

                    </li>
                    <li>
                        <strong>@lang('remote-teaching.tips.points.7.0')</strong>
                        @lang('remote-teaching.tips.points.7.1')
                    </li>
                </ol>



            </div>


        </section>


    </section>

@endsection

@section('extra-css')
    <style>
        ul.checklist li:before {
            content: '• ';
            color: #054771;
            font-weight: bold;

        }

        ul.checklist li {
            margin:10px;
        }

        ol.tips li {
            margin-top: 20px;
            margin-bottom: 10px;
            margin-left: -18px;
        }
    </style>
@endsection
