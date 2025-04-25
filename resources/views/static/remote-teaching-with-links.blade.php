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

                <ul class="checklist">

                    <li><a href="{{route('coding@home')}}">@lang('menu.coding@home')</a>: @lang('remote-teaching.intro.points.1')</li>
                    <li><a href="https://codeweek-s3.s3.eu-west-1.amazonaws.com/docs/EU+Code+Week_Deep+Dive+MOOC+2020_Module+1_+Actitivities+at+home+.pdf">@lang('remote-teaching.intro.points.2.0')</a>: @lang('remote-teaching.intro.points.2.1')</li>
                    <li>
                        <a href="{{route('training.index')}}">@lang('training.learning_bits')</a>
                        : @lang('remote-teaching.intro.points.3.1')
                        <a href="{{route('training.module-12')}}">@lang('remote-teaching.intro.points.3.2')</a>
                        @lang('remote-teaching.intro.points.3.3')
                        <a href="{{route('training.module-13')}}">@lang('remote-teaching.intro.points.3.4')</a>
                        @lang('remote-teaching.intro.points.3.5')
                    </li>
                    <li>
                        <a href="{{route('resources_all')}}">@lang('remote-teaching.intro.points.4.0')</a>:
                        @lang('remote-teaching.intro.points.4.1')
                        <a href="{{route('resources_all')}}">@lang('remote-teaching.intro.points.4.2')</a>
                        @lang('remote-teaching.intro.points.4.3')
                        <a href="{{route('resources_all')}}">@lang('remote-teaching.intro.points.4.4')</a>
                        @lang('remote-teaching.intro.points.4.5')

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
                        <a href="">@lang('remote-teaching.tips.points.4.2')</a>
                        @lang('remote-teaching.tips.points.4.3')
                        <a href="https://scratch.mit.edu/">Scratch</a>,
                        <a href="https://appinventor.mit.edu/">App Inventor</a>,
                        <a href="https://code.org/">Code.org</a>,
                        <a href="https://earsketch.gatech.edu/landing/#/">EarSketch</a>,
                        <a href="https://sonic-pi.net/">Sonic Pi</a>,

                        @lang('remote-teaching.tips.points.4.4')
                        <a href="{{route('training.index')}}">@lang('remote-teaching.tips.points.4.5')</a>
                        @lang('remote-teaching.tips.points.4.6')
                    </li>
                    <li>
                        <strong>@lang('remote-teaching.tips.points.5.0')</strong>
                        @lang('remote-teaching.tips.points.5.1')
                        <a href="https://codycolor.codemooc.net/#!/">CodyColor</a>
                        @lang('remote-teaching.tips.points.5.2')
                    </li>
                    <li>
                        <strong>@lang('remote-teaching.tips.points.6.0')</strong>
                        @lang('remote-teaching.tips.points.6.1')
                        <a href="https://zoom.us/">Zoom</a>,
                        <a href="https://www.microsoft.com/en-us/microsoft-365/microsoft-teams/group-chat-software">Microsoft Teams</a>,
                        <a href="https://www.gotomeeting.com/en-gb">GoToMeeting</a>,
                        @lang('remote-teaching.tips.points.6.2')
                        <a href="https://jitsi.org/">Jitsi</a>,
                        @lang('remote-teaching.tips.points.6.3')
                        <a href="https://kahoot.com/">Kahoot</a>,
                        <a href="https://www.mentimeter.com/">Mentimeter</a>,
                        <a href="https://www.google.com/forms/about/">Google Forms</a>,
                        @lang('remote-teaching.tips.points.6.4')
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
