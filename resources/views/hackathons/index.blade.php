@extends('layout.base')

@section('content')

    <section id="codeweek-ambassadors-page" class="codeweek-page">

        <section class="codeweek-banner ambassadors">
            <div class="text">
                <h2>#CodeWeek</h2>
                <h1>@lang('hackathons.title')</h1>
            </div>
            <div class="image">
                <img src="images/banner_ambassadors.svg" class="static-image">
            </div>
        </section>



        <section class="codeweek-content-wrapper">

            <section class="codeweek-content-wrapper-inside">

                <h1>@lang('hackathons.intro')</h1>



            </section>

            <section class="hackathons-content-grid">
                <div class="codeweek-card-grid">
                    <a href="/training/coding-without-computers">
                        <img src="/img/learning/coding-without-computers.png">
                        <div class="title">@lang('hackathons.1.title')</div>
                        <div class="author">@lang('hackathons.1.details')</div>
                        <div class="more"><a href="https://www.42.us.org/" target="_blank" class="codeweek-action-link-button" style="margin:5px;">View</a></div>
                    </a>
                </div>

                <div class="codeweek-card-grid">
                    <a href="/training/coding-without-computers">
                        <img src="/img/learning/coding-without-computers.png">
                        <div class="title">@lang('hackathons.2.title')</div>
                        <div class="author">@lang('hackathons.2.details')</div>
                    </a>
                </div>

                <div class="codeweek-card-grid">
                    <a href="/training/coding-without-computers">
                        <img src="/img/learning/coding-without-computers.png">
                        <div class="title">@lang('hackathons.3.title')</div>
                        <div class="author">@lang('hackathons.3.details')</div>
                    </a>
                </div>

                <div class="codeweek-card-grid">
                    <a href="/training/coding-without-computers">
                        <img src="/img/learning/coding-without-computers.png">
                        <div class="title">@lang('hackathons.4.title')</div>
                        <div class="author">@lang('hackathons.4.details')</div>
                    </a>
                </div>

                <div class="codeweek-card-grid">
                    <a href="/training/coding-without-computers">
                        <img src="/img/learning/coding-without-computers.png">
                        <div class="title">@lang('hackathons.5.title')</div>
                        <div class="author">@lang('hackathons.5.details')</div>
                    </a>
                </div>

                <div class="codeweek-card-grid">
                    <a href="/training/coding-without-computers">
                        <img src="/img/learning/coding-without-computers.png">
                        <div class="title">@lang('hackathons.6.title')</div>
                        <div class="author">@lang('hackathons.6.details')</div>
                    </a>
                </div>



            </section>

            <section class="codeweek-content-wrapper-inside">

                @lang('hackathons.text')

            </section>

        </section>






    </section>

@endsection