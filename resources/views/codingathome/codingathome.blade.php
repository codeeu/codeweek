@extends('layout.base')

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

                @if(strtoupper(App::getLocale()) === "EN")
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
                @endif
            </section>

            <section class="codeweek-content-wrapper-inside">

                <div>
                    <p>
                        @lang('coding-at-home.texts.3')


                    </p>

                </div>


            </section>


        </section>

@endsection