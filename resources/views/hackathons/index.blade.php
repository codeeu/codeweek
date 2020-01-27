@extends('layout.base')

@section('content')

    <section id="codeweek-ambassadors-page" class="codeweek-page">

        <section class="codeweek-banner ambassadors">
            <div class="text">
                <h2>@lang('hackathons.title')</h2>
                <h1>@lang('hackathons.subtitle')</h1>
            </div>
            <div class="image">
                <img src="images/banner_ambassadors.svg" class="static-image">
            </div>
        </section>



        <section class="codeweek-content-wrapper">

            <section class="codeweek-content-wrapper-inside">

                <h1>@lang('hackathons.sections.1.title')</h1>
                <div>@lang('hackathons.sections.1.content.1')</div>
                <div>@lang('hackathons.sections.1.content.2')</div>



            </section>

            <section class="codeweek-content-wrapper-inside">

                <h2>@lang('hackathons.sections.2.title')</h2>
                <div>@lang('hackathons.sections.2.content.1')</div>

            </section>

            <section class="codeweek-content-wrapper-inside">

                <h2>@lang('hackathons.sections.3.title')</h2>
                <div>@lang('hackathons.sections.3.content.1') <a href="{{route('ambassadors')}}">@lang('hackathons.sections.3.content.2')</a> @lang('hackathons.sections.3.content.3')</div>

            </section>

            <section class="codeweek-content-wrapper-inside">

                <h2>@lang('hackathons.sections.4.title')</h2>
                <div>@lang('hackathons.sections.4.content.1')</div>
                <div>@lang('hackathons.sections.4.content.2')</div>

            </section>

            <section class="codeweek-content-wrapper-inside">

                <h2>@lang('hackathons.sections.5.title')</h2>
                <div>@lang('hackathons.sections.5.content.1')</div>

            </section>

            <section class="codeweek-content-wrapper-inside">

                <h2>@lang('hackathons.sections.6.title')</h2>
                <div>@lang('hackathons.sections.6.content.1')</div>
                <div>@lang('hackathons.sections.6.content.2')</div>
                <div>@lang('hackathons.sections.6.content.3')</div>
                <div>@lang('hackathons.sections.6.content.4')</div>
                <div>@lang('hackathons.sections.6.content.5')</div>
                <div>@lang('hackathons.sections.6.content.6')</div>

            </section>



        </section>


        <section class="codeweek-content-wrapper">

            <section class="hackathons-content-grid">
                <div class="codeweek-card-grid">
                    <a href="#">
                        <img src="/img/hackathons/hackathon-brussels.jpg">
                        <div class="title">@lang('hackathons.cities.1.title')</div>
                        <div class="title">@lang('hackathons.cities.1.subtitle')</div>
                        <div class="author">@lang('hackathons.cities.1.date')</div>
                        <div class="author">@lang('hackathons.cities.1.location')</div>
                        <div class="more"><a href="#" target="_blank" class="codeweek-action-link-button" style="margin:5px;">@lang('hackathons.more-info')</a></div>
                    </a>
                </div>

                <div class="codeweek-card-grid">
                    <a href="#">
                        <img src="/img/hackathons/hackathon-brussels.jpg">
                        <div class="title">@lang('hackathons.cities.2.title')</div>
                        <div class="title">@lang('hackathons.cities.2.subtitle')</div>
                        <div class="author">@lang('hackathons.cities.2.date')</div>
                        <div class="author">@lang('hackathons.cities.2.location')</div>
                        <div class="more"><a href="#" target="_blank" class="codeweek-action-link-button" style="margin:5px;">@lang('hackathons.more-info')</a></div>
                    </a>
                </div>

                <div class="codeweek-card-grid">
                    <a href="#">
                        <img src="/img/learning/coding-without-computers.png">
                        <div class="title">@lang('hackathons.cities.3.title')</div>
                        <div class="title">@lang('hackathons.cities.3.subtitle')</div>
                    </a>
                </div>

                <div class="codeweek-card-grid">
                    <a href="#">
                        <img src="/img/learning/coding-without-computers.png">
                        <div class="title">@lang('hackathons.cities.4.title')</div>
                        <div class="title">@lang('hackathons.cities.4.subtitle')</div>
                    </a>
                </div>

                <div class="codeweek-card-grid">
                    <a href="#">
                        <img src="/img/learning/coding-without-computers.png">
                        <div class="title">@lang('hackathons.cities.5.title')</div>
                        <div class="title">@lang('hackathons.cities.5.subtitle')</div>
                    </a>
                </div>

                <div class="codeweek-card-grid">
                    <a href="#">
                        <img src="/img/learning/coding-without-computers.png">
                        <div class="title">@lang('hackathons.cities.6.title')</div>
                        <div class="title">@lang('hackathons.cities.6.subtitle')</div>
                    </a>
                </div>







            </section>


        </section>






    </section>

@endsection