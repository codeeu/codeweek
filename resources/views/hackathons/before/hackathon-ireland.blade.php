@extends('layout.base')

@section('hackathons.header')
    @include('hackathons.before.header', ["enabled_language" => "en", "registration_link"=>"https://ec.europa.eu/eusurvey/runner/EUCWHackathonIreland"])
@endsection

@section('content')

    <section id="codeweek-hackathons-before-page" class="codeweek-page ireland">


        <section class="codeweek-banner hackathon">
            <div class="image">
                <div class="text">
                    <div class="text-inside">
                        <h1 style="font-weight: bold;">@lang('hackathons.title')</h1>
                        <h2>@lang('hackathon-ireland.subtitle')</h2>
                    </div>
                </div>
                <div class="paragraph">
                    <p>@lang('hackathon-ireland.sections.1.content.0')<br/>
                </div>
                <img src="/images/hackathons/banner_hackathon_before.svg" class="static-image desktop">
            </div>
        </section>

        <section class="codeweek-content-wrapper">

            <p>
                @lang('hackathon-ireland.sections.1.content.1')
                @lang('hackathon-ireland.sections.1.content.2')<br/><br/>
                @lang('hackathon-ireland.sections.1.content.3')


            </p>

        </section>

        <section class="questions">
            <div class="left-wrapper">
                <div class="expect">
{{--                    <h1>@lang('hackathon-ireland.sections.2.title')</h1>--}}
{{--                    <ul>--}}
{{--                        <li>@lang('hackathon-ireland.sections.2.content.0')</li>--}}
{{--                        <li>@lang('hackathon-ireland.sections.2.content.1')</li>--}}
{{--                        <li>@lang('hackathon-ireland.sections.2.content.2')</li>--}}

{{--                    </ul>--}}
                </div>
                <div class="bring">
                    <h1>@lang('hackathon-ireland.sections.2.title')</h1>
                    <ul>
                        <li>@lang('hackathon-ireland.sections.2.content.0')</li>
                        <li>@lang('hackathon-ireland.sections.2.content.1')</li>
                        <li>@lang('hackathon-ireland.sections.2.content.2')</li>
                        <li>@lang('hackathon-ireland.sections.2.content.3')</li>
                        <li>@lang('hackathon-ireland.sections.2.content.4')</li>
                        <li>@lang('hackathon-ireland.sections.2.content.5')</li>
                    </ul>
                </div>
            </div>

        </section>

        <section class="registration">
            <div class="register-wrapper">
                <div class="register">
                    <div class="title">@lang('hackathon-ireland.title')</div>
                    <div class="city">@lang('hackathons.cities.2.country')</div>
                    <div class="date">@lang('hackathons.cities.2.date')</div>
                    <a target="_blank" href="https://ec.europa.eu/eusurvey/runner/EUCWHackathonIreland"
                       class="codeweek-action-link-button">@lang('login.register')</a>
                </div>
            </div>
        </section>

{{--        <section id="challenge">--}}
{{--            <img src="/images/hackathons/ideation.png" class="desktop">--}}
{{--            <div class="text">--}}
{{--                <div class="challenge-text">--}}
{{--                    <h1>@lang('hackathon-ireland.sections.4.title')</h1>--}}
{{--                    <p>@lang('hackathon-ireland.sections.4.content.0')</p>--}}
{{--                    <div class="button">--}}
{{--                        <a target="_blank" href="https://ec.europa.eu/eusurvey/runner/EUCodeWeek2020_Challenges_Ireland"--}}
{{--                           class="codeweek-action-link-button">@lang('hackathon-ireland.sections.4.content.1')</a>--}}
{{--                    </div>--}}

{{--                </div>--}}
{{--            </div>--}}
{{--        </section>--}}

        <section id="programme" id="pratical-info">
            <h1>@lang('hackathon-ireland.sections.9.title')</h1>

            @lang('hackathon-ireland.sections.9.content.0')<br/>
            @lang('hackathon-ireland.sections.9.content.1')


            <br/><br/>
            <h1>@lang('hackathon-ireland.sections.8.title')</h1>
            @lang('hackathon-ireland.sections.8.content.0')
            <ol>
                <li>@lang('hackathon-ireland.sections.8.content.1')</li>
                <li>@lang('hackathon-ireland.sections.8.content.2')</li>
                <li>@lang('hackathon-ireland.sections.8.content.3')</li>
            </ol>
        <div>
            @lang('hackathon-ireland.sections.8.content.4')<br/><br/>

            @lang('hackathon-ireland.sections.8.content.5')<br/><br/>
            @lang('hackathon-ireland.sections.8.content.6')<br/><br/>
            @lang('hackathon-ireland.sections.8.content.7')<br/><br/>
            @lang('hackathon-ireland.sections.8.content.8')<br/><br/>
        </div>
        </section>


{{--            <div class="conditions-participation">--}}
{{--                <img src="/images/tick.svg" class="static-image">--}}
{{--                <a target="_blank"--}}
{{--                   href="https://codeweek-s3.s3-eu-west-1.amazonaws.com/hackathons/CONDITIONS_PARTICIPATION_CWHACKATHON_IE.pdf">Conditions--}}
{{--                    of Participation</a>--}}
{{--            </div>--}}


{{--        </section>--}}

{{--                <section id="pratical-info">--}}
{{--                    <div class="info">--}}
{{--                        <h1>Practical Info</h1>--}}
{{--                        <div class="info-details">--}}
{{--                            <h3>Date</h3>--}}
{{--                            <p>April 17-18, 2020</p>--}}
{{--                        </div>--}}
{{--                        <div class="info-details">--}}
{{--                            <h3>Address</h3>--}}
{{--                            <p>Dream Space, Microsoft Ireland</p>--}}
{{--                            <p>South Country Business Park, Leopardstown, Dublin 18, D18 P521</p>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </section>--}}

        <section id="jury-mentors">

            <h1>@lang('hackathon-ireland.sections.10.title')</h1>
            <p>
                @lang('hackathon-ireland.sections.10.content.0')
            </p>
            <div class="jury-grid">
                <div class="item">
                    <img src="{{asset('/images/hackathons/profiles/_blank1.png')}}">
                    <h2>To Be Announced</h2>
                    {{--                    <h3>Function,</h3>--}}
                    {{--                    <h3>INSTITUTION</h3>--}}
                </div>
                <div class="item">
                    <img src="{{asset('/images/hackathons/profiles/_blank2.png')}}">
                    <h2>To Be Announced</h2>
                    {{--                    <h3>Function,</h3>--}}
                    {{--                    <h3>INSTITUTION</h3>--}}
                </div>
                <div class="item">
                    <img src="{{asset('/images/hackathons/profiles/_blank3.png')}}">
                    <h2>To Be Announced</h2>
                    {{--                    <h3>Function,</h3>--}}
                    {{--                    <h3>INSTITUTION</h3>--}}
                </div>
                <div class="item">
                    <img src="{{asset('/images/hackathons/profiles/_blank4.png')}}">
                    <h2>To Be Announced</h2>
                    {{--                    <h3>Function,</h3>--}}
                    {{--                    <h3>INSTITUTION</h3>--}}
                </div>
            </div>
        </section>

{{--                <section id="side-events">--}}
{{--                    <div class="left">--}}
{{--                        <h1>@lang('hackathon-ireland.sections.11.title')</h1>--}}
{{--                        <p>@lang('hackathon-ireland.sections.11.content.0')</p>--}}
{{--                        <a href="" class="codeweek-action-link-button">@lang('login.register')</a>--}}
{{--                    </div>--}}
{{--                    <img src="/images/hackathons/side_events.png">--}}
{{--                </section>--}}

        <section id="about-codeweek">
            <div class="text">
                <h1>@lang('hackathon-ireland.sections.12.title')</h1>
                <p>@lang('hackathon-ireland.sections.12.content.0') @lang('hackathon-ireland.sections.12.content.1') @lang('hackathon-ireland.sections.12.content.2')</p><br/><br/>
                <p>@lang('hackathon-ireland.sections.12.content.3') <b>@lang('hackathon-ireland.sections.12.content.4')</b> @lang('hackathon-ireland.sections.12.content.5') <b>@lang('hackathon-ireland.sections.12.content.6')</b>
                    @lang('hackathon-ireland.sections.12.content.7') <b>@lang('hackathon-ireland.sections.12.content.8')</b>
                </p><br/><br/>
            </div>
            <img src="/images/hackathons/about_codeweek.svg" class="static-image">
            <a target="_blank" href="https://codeweek.eu/about" class="codeweek-action-link-button">@lang('hackathon-ireland.sections.12.content.9')</a>
        </section>

    </section>

@endsection

