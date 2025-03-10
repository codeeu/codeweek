@extends('layout.base')

@section('title', 'Coding at Home – Fun & Educational Activities for All')
@section('description', 'Explore EU Code Week’s Coding at Home series—fun, interactive coding activities for kids, families, and educators.')

@section('content')

    <section id="codeweek-training-page" class="codeweek-page">

        @include('codingathome.banner')


        <section class="codeweek-content-wrapper">


            <section class="codeweek-content-wrapper-inside">

                <h1>Coding@Home</h1>

                <div>
                    <p>

                        @lang('coding-at-home.texts.1')

                    </p>
                    <p>
                        @lang('coding-at-home.texts.2')
                    </p>

                </div>


            </section>

            <section class="codeweek-content-grid" style="grid-template-columns: 1fr 1fr 1fr;">
                <div class="codeweek-card-grid">
                    <a href="{{route('codingathome-introduction')}}">
                        <img src="/img/codingathome/0.jpg">
                        <div class="title" style="text-align:center">@lang('coding-at-home.intro.title')</div>
                    </a>
                </div>


                <div class="codeweek-card-grid">
                    <a href="{{route('codingathome-the-explorer')}}">
                        <img src="/img/codingathome/1.jpg">
                        <div class="title" style="text-align:center">@lang('coding-at-home.explorer.title')</div>
                    </a>
                </div>

                <div class="codeweek-card-grid">
                    <a href="{{route('codingathome-right-and-left')}}">
                        <img src="/img/codingathome/2.jpg">
                        <div class="title" style="text-align:center">@lang('coding-at-home.right-and-left.title')</div>
                    </a>
                </div>


                <div class="codeweek-card-grid">
                    <a href="{{route('codingathome-keep-off-my-path')}}">
                        <img src="/img/codingathome/3.jpg">
                        <div class="title"
                             style="text-align:center">@lang('coding-at-home.keep-off-my-path.title')</div>
                    </a>
                </div>


                <div class="codeweek-card-grid">
                    <a href="{{route('codingathome-tug-of-war')}}">
                        <img src="/img/codingathome/4.jpg">
                        <div class="title" style="text-align:center">@lang('coding-at-home.tug-of-war.title')</div>
                    </a>
                </div>

                <div class="codeweek-card-grid">
                    <a href="{{route('codingathome-explorer-without-footprints')}}">
                        <img src="/img/codingathome/5.jpg">
                        <div class="title"
                             style="text-align:center">@lang('coding-at-home.explorer-without-footprints.title')</div>
                    </a>
                </div>

                <div class="codeweek-card-grid">
                    <a href="{{route('codingathome-walk-as-long-as-you-can')}}">
                        <img src="/img/codingathome/6.jpg">
                        <div class="title"
                             style="text-align:center">@lang('coding-at-home.walk-as-long-as-you-can.title')</div>
                    </a>
                </div>

{{--                <div class="codeweek-card-grid">--}}
{{--                    <a href="{{route('codingathome-ada-charles-roby')}}">--}}
{{--                    <a href="#">--}}
{{--                        <img src="/img/codingathome/7.jpg" style=" opacity: 0.4;filter: alpha(opacity=40);">--}}
{{--                        <div class="title"--}}
{{--                             style="text-align:center">@lang('coding-at-home.ada-charles-roby.title')</div>--}}
{{--                    </a>--}}
{{--                    <div class="text-center text-xl title">@lang('coding-at-home.ada-charles-roby.title')<br/>(Coming soon)</div>--}}
{{--                </div>--}}

                <div class="codeweek-card-grid">
                    <a href="{{route('codingathome-cody-and-roby')}}">
                        <img src="/img/codingathome/8.jpg">
                        <div class="title"
                             style="text-align:center">@lang('coding-at-home.cody-and-roby.title')</div>
                    </a>
                </div>

                <div class="codeweek-card-grid">
                    <a href="{{route('codingathome-the-tourist')}}">
                        <img src="/img/codingathome/9.jpg">
                        <div class="title"
                             style="text-align:center">@lang('coding-at-home.the-tourist.title')</div>
                    </a>
                </div>

                <div class="codeweek-card-grid">
                    <a href="{{route('codingathome-catch-the-robot')}}">
                    <img src="/img/codingathome/10.png">
                    <div class="title"
                    style="text-align:center">@lang('coding-at-home.catch-the-robot.title')</div>
                    </a>
                </div>


                <div class="codeweek-card-grid">
                    <a href="{{route('codingathome-the-snake')}}">
                        <img src="/img/codingathome/12.png">
                        <div class="title"
                             style="text-align:center">@lang('coding-at-home.the-snake.title')</div>
                    </a>
                </div>

                <div class="codeweek-card-grid">
                    <a href="{{route('codingathome-storytelling')}}">
                        <img src="/img/codingathome/11.png">
                        <div class="title"
                             style="text-align:center">@lang('coding-at-home.storytelling.title')</div>
                    </a>
                </div>

                <div class="codeweek-card-grid">
                    <a href="{{route('codingathome-two-snakes')}}">
                        <img src="/img/codingathome/13.png">
                        <div class="title"
                             style="text-align:center">@lang('coding-at-home.two-snakes.title')</div>
                    </a>
                </div>

                <div class="codeweek-card-grid">
                    <a href="{{route('codingathome-round-trip')}}">
                        <img src="/img/codingathome/14.png">
                        <div class="title"
                             style="text-align:center">@lang('coding-at-home.round-trip.title')</div>
                    </a>
                </div>

                <div class="codeweek-card-grid">
                    <a href="{{route('codingathome-meeting-point')}}">
                        <img src="/img/codingathome/15.png">
                        <div class="title"
                             style="text-align:center">@lang('coding-at-home.meeting-point.title')</div>
                    </a>
                </div>

                <div class="codeweek-card-grid">
                    <a href="{{route('codingathome-follow-the-music')}}">
                        <img src="/img/codingathome/16.png">
                        <div class="title"
                             style="text-align:center">@lang('coding-at-home.follow-the-music.title')</div>
                    </a>
                </div>

                <div class="codeweek-card-grid">
                    <a href="{{route('codingathome-colour-everything')}}">
                        <img src="/img/codingathome/17.png">
                        <div class="title"
                             style="text-align:center">@lang('coding-at-home.colour-everything.title')</div>
                    </a>
                </div>

                <div class="codeweek-card-grid">
                    <a href="{{route('codingathome-codyplotter-and-codyprinter')}}">
                        <img src="/img/codingathome/18.png">
                        <div class="title"
                             style="text-align:center">@lang('coding-at-home.codyplotter-and-codyprinter.title')</div>
                    </a>
                </div>

                <div class="codeweek-card-grid">
                    <a href="{{route('codingathome-boring-pixels')}}">
                        <img src="/img/codingathome/19.png">
                        <div class="title"
                             style="text-align:center">@lang('coding-at-home.boring-pixels.title')</div>
                    </a>
                </div>

                <div class="codeweek-card-grid">
                    <a href="{{route('codingathome-turning-code-into-pictures')}}">
                        <img src="/img/codingathome/20.png">
                        <div class="title"
                             style="text-align:center">@lang('coding-at-home.turning-code-into-pictures.title')</div>
                    </a>
                </div>

            </section>

            <section class="codeweek-content-wrapper-inside">

                <div>
                    <p>
                        @lang('coding-at-home.texts.3')


                    </p>

                </div>


            </section>

            @include("include.licence")
        </section>

@endsection
