@extends('layout.base')

<x-tailwind></x-tailwind>

@section('hackathons.header')
    @include('hackathons.before.header', ["enabled_language" => "el","registration_link"=>"https://ec.europa.eu/eusurvey/runner/EUCWHackathonGreece"])
@endsection

@section('content')

    <section id="codeweek-hackathons-before-page" class="codeweek-page">


        <section class="codeweek-banner hackathon">
            <div class="image">
                <div class="text">
                    <div class="text-inside">
                        <h1 style="font-weight: bold;">@lang('hackathons.title')</h1>
                        <h2>@lang('hackathon-greece.subtitle')</h2>
                    </div>
                </div>
                <div class="paragraph">
                    <p>@lang('hackathon-greece.sections.1.content.0')<br/>
                </div>
                <img src="/images/hackathons/banner_hackathon_before.svg" class="static-image desktop">
            </div>
        </section>

        <section class="codeweek-content-wrapper">

            <p>
                @lang('hackathon-greece.sections.1.content.1')
                @lang('hackathon-greece.sections.1.content.2')<br/><br/>
                @lang('hackathon-greece.sections.1.content.3')


            </p>

        </section>

        <section class="questions">
            <div class="left-wrapper">
                <div class="expect">
                    {{--                    <h1>@lang('hackathon-greece.sections.2.title')</h1>--}}
                    {{--                    <ul>--}}
                    {{--                        <li>@lang('hackathon-greece.sections.2.content.0')</li>--}}
                    {{--                        <li>@lang('hackathon-greece.sections.2.content.1')</li>--}}
                    {{--                        <li>@lang('hackathon-greece.sections.2.content.2')</li>--}}

                    {{--                    </ul>--}}
                </div>
                <div class="bring">
                    <h1>@lang('hackathon-greece.sections.2.title')</h1>
                    <ul>
                        <li>@lang('hackathon-greece.sections.2.content.0')</li>
                        <li>@lang('hackathon-greece.sections.2.content.1')</li>
                        <li>@lang('hackathon-greece.sections.2.content.2')</li>
                        <li>@lang('hackathon-greece.sections.2.content.3')</li>
                        <li>@lang('hackathon-greece.sections.2.content.4')</li>
                        <li>@lang('hackathon-greece.sections.2.content.5')</li>
                    </ul>
                </div>
            </div>

        </section>

        <section class="registration">
            <div class="register-wrapper">
                <div class="register">
                    <div class="title">@lang('hackathon-greece.title')</div>
                    <div class="city">@lang('hackathons.cities.4.country')</div>
                    <div class="date">@lang('hackathons.cities.4.date')</div>
                    <a target="_blank" href="https://ec.europa.eu/eusurvey/runner/EUCWHackathonGreece"
                       class="codeweek-action-link-button">@lang('login.register')</a>
                </div>
            </div>
        </section>

        {{--        <section id="challenge">--}}
        {{--            <img src="/images/hackathons/ideation.png" class="desktop">--}}
        {{--            <div class="text">--}}
        {{--                <div class="challenge-text">--}}
        {{--                    <h1>@lang('hackathon-greece.sections.4.title')</h1>--}}
        {{--                    <p>@lang('hackathon-greece.sections.4.content.0')</p>--}}
        {{--                    <div class="button">--}}
        {{--                        <a target="_blank" href="https://ec.europa.eu/eusurvey/runner/CodeWeekHacks_EL_voting"--}}
        {{--                           class="codeweek-action-link-button">@lang('hackathon-greece.sections.4.content.1')</a>--}}
        {{--                    </div>--}}

        {{--                </div>--}}
        {{--            </div>--}}
        {{--        </section>--}}

        <section id="programme" id="pratical-info">
            <h1>@lang('hackathon-greece.sections.9.title')</h1>

            @lang('hackathon-greece.sections.9.content.0')<br/>
            @lang('hackathon-greece.sections.9.content.1')


            <br/><br/>
            <h1>@lang('hackathon-greece.sections.8.title')</h1>
            @lang('hackathon-greece.sections.8.content.0')
            <ol>
                <li>@lang('hackathon-greece.sections.8.content.1')</li>
                <li>@lang('hackathon-greece.sections.8.content.2')</li>
                <li>@lang('hackathon-greece.sections.8.content.3')</li>
            </ol>
            <div>
                @lang('hackathon-greece.sections.8.content.4')<br/><br/>

                @lang('hackathon-greece.sections.8.content.5')<br/><br/>
                @lang('hackathon-greece.sections.8.content.6')<br/><br/>
                @lang('hackathon-greece.sections.8.content.7')<br/><br/>
                @lang('hackathon-greece.sections.8.content.8')<br/><br/>
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
        {{--                            <p>Dream Space, Microsoft Greece</p>--}}
        {{--                            <p>South Country Business Park, Leopardstown, Dublin 18, D18 P521</p>--}}
        {{--                        </div>--}}
        {{--                    </div>--}}
        {{--                </section>--}}

        <section id="jury-mentors">

            <h1>@lang('hackathon-greece.sections.10.title')</h1>
            <p>
                @lang('hackathon-greece.sections.10.content.0')
            </p>
            <div class="jury-grid">

                <div class="item">
                    <div class="flex justify-center">
                        <img src="{{asset('/images/hackathons/profiles/greece/dimirios-tzimas.png')}}">
                    </div>
                    <h2 class="text-center">@lang('hackathon-greece.sections.mentors.1.0')</h2>
                    <div class="text-sm">@lang('hackathon-greece.sections.mentors.1.1')<br/>
                        @lang('hackathon-greece.sections.mentors.1.2')
                    </div>
                </div>
                <div class="item">
                    <div class="flex justify-center">
                        <img src="{{asset('/images/hackathons/profiles/greece/ioannis-papikas.png')}}">
                    </div>
                    <h2 class="text-center">@lang('hackathon-greece.sections.mentors.2.0')</h2>
                    <div class="text-sm">@lang('hackathon-greece.sections.mentors.2.1')<br/>
                        @lang('hackathon-greece.sections.mentors.2.2')
                    </div>
                </div>
                <div class="item">
                    <div class="flex justify-center">
                        <img src="{{asset('/images/hackathons/profiles/greece/john-fanidis.png')}}">
                    </div>
                    <h2 class="text-center">@lang('hackathon-greece.sections.mentors.3.0')</h2>
                    <div class="text-sm">@lang('hackathon-greece.sections.mentors.3.1')<br/>
                        @lang('hackathon-greece.sections.mentors.3.2')
                    </div>
                </div>
                <div class="item">
                    <div class="flex justify-center">
                        <img src="{{asset('/images/hackathons/profiles/greece/lida-paptzika.png')}}">
                    </div>
                    <h2 class="text-center">@lang('hackathon-greece.sections.mentors.4.0')</h2>
                    <div class="text-sm">@lang('hackathon-greece.sections.mentors.4.1')

                    </div>
                </div>
                <div class="item">
                    <div class="flex justify-center">
                        <img src="{{asset('/images/hackathons/profiles/greece/nikolas-goulias.jpg')}}">
                    </div>
                    <h2 class="text-center">@lang('hackathon-greece.sections.mentors.5.0')</h2>
                    <div class="text-sm">@lang('hackathon-greece.sections.mentors.5.1')
                    </div>
                </div>

                <div class="item">
                    <div class="flex justify-center">
                        <img src="{{asset('/images/hackathons/profiles/greece/2/achilleas-yfantis.png')}}">
                    </div>
                    <h2 class="text-center">@lang('hackathon-greece.sections.mentors.6.0')</h2>
                    <div class="text-sm">@lang('hackathon-greece.sections.mentors.6.1')<br/>
                        @lang('hackathon-greece.sections.mentors.6.2')
                    </div>
                </div>

                <div class="item">
                    <div class="flex justify-center">
                        <img src="{{asset('/images/hackathons/profiles/greece/2/alex-papadakis.png')}}">
                    </div>
                    <h2 class="text-center">@lang('hackathon-greece.sections.mentors.7.0')</h2>
                    <div class="text-sm">@lang('hackathon-greece.sections.mentors.7.1')<br/>
                        @lang('hackathon-greece.sections.mentors.7.2')
                    </div>
                </div>

                <div class="item">
                    <div class="flex justify-center">
                        <img src="{{asset('/images/hackathons/profiles/greece/2/andriana-vera.png')}}">
                    </div>
                    <h2 class="text-center">@lang('hackathon-greece.sections.mentors.8.0')</h2>
                    <div class="text-sm">@lang('hackathon-greece.sections.mentors.8.1')<br/>
                        @lang('hackathon-greece.sections.mentors.8.2')
                    </div>
                </div>

                <div class="item">
                    <div class="flex justify-center">
                        <img src="{{asset('/images/hackathons/profiles/greece/2/antigoni-kakouri.png')}}">
                    </div>
                    <h2 class="text-center">@lang('hackathon-greece.sections.mentors.9.0')</h2>
                    <div class="text-sm">@lang('hackathon-greece.sections.mentors.9.1')
                    </div>
                </div>

                <div class="item">
                    <div class="flex justify-center">
                        <img src="{{asset('/images/hackathons/profiles/greece/2/athaniasios-dimou.png')}}">
                    </div>
                    <h2 class="text-center">@lang('hackathon-greece.sections.mentors.10.0')</h2>
                    <div class="text-sm">@lang('hackathon-greece.sections.mentors.10.1')<br/>
                        @lang('hackathon-greece.sections.mentors.10.2')
                    </div>
                </div>

                <div class="item">
                    <div class="flex justify-center">
                        <img src="{{asset('/images/hackathons/profiles/greece/2/despoina-ioannidou.png')}}">
                    </div>
                    <h2 class="text-center">@lang('hackathon-greece.sections.mentors.11.0')</h2>
                    <div class="text-sm">@lang('hackathon-greece.sections.mentors.11.1')
                    </div>
                </div>

                <div class="item">
                    <div class="flex justify-center">
                        <img src="{{asset('/images/hackathons/profiles/greece/2/evangelia-iakovaki.png')}}">
                    </div>
                    <h2 class="text-center">@lang('hackathon-greece.sections.mentors.12.0')</h2>
                    <div class="text-sm">@lang('hackathon-greece.sections.mentors.12.1')
                    </div>
                </div>

                <div class="item">
                    <div class="flex justify-center">
                        <img src="{{asset('/images/hackathons/profiles/greece/2/giannis-prapas.png')}}">
                    </div>
                    <h2 class="text-center">@lang('hackathon-greece.sections.mentors.13.0')</h2>
                    <div class="text-sm">@lang('hackathon-greece.sections.mentors.13.1')<br/>
                        @lang('hackathon-greece.sections.mentors.13.2')
                    </div>
                </div>

                <div class="item">
                    <div class="flex justify-center">
                        <img src="{{asset('/images/hackathons/profiles/greece/2/ilias-karabasis.png')}}">
                    </div>
                    <h2 class="text-center">@lang('hackathon-greece.sections.mentors.14.0')</h2>
                    <div class="text-sm">@lang('hackathon-greece.sections.mentors.14.1')<br/>
                        @lang('hackathon-greece.sections.mentors.14.2')
                    </div>
                </div>

                <div class="item">
                    <div class="flex justify-center">
                        <img src="{{asset('/images/hackathons/profiles/greece/2/konstantinos-fouskas.png')}}">
                    </div>
                    <h2 class="text-center">@lang('hackathon-greece.sections.mentors.15.0')</h2>
                    <div class="text-sm">@lang('hackathon-greece.sections.mentors.15.1')<br/>
                        @lang('hackathon-greece.sections.mentors.15.2')
                    </div>
                </div>

                <div class="item">
                    <div class="flex justify-center">
                        <img src="{{asset('/images/hackathons/profiles/greece/2/marina.png')}}">
                    </div>
                    <h2 class="text-center">@lang('hackathon-greece.sections.mentors.16.0')</h2>
                    <div class="text-sm">@lang('hackathon-greece.sections.mentors.16.1')
                    </div>
                </div>

                <div class="item">
                    <div class="flex justify-center">
                        <img src="{{asset('/images/hackathons/profiles/greece/2/nikos-zachariadis.png')}}">
                    </div>
                    <h2 class="text-center">@lang('hackathon-greece.sections.mentors.17.0')</h2>
                    <div class="text-sm">@lang('hackathon-greece.sections.mentors.17.1')<br/>
                        @lang('hackathon-greece.sections.mentors.17.2')
                    </div>
                </div>

                <div class="item">
                    <div class="flex justify-center">
                        <img src="{{asset('/images/hackathons/profiles/greece/2/rodanthi-alexiou.png')}}">
                    </div>
                    <h2 class="text-center">@lang('hackathon-greece.sections.mentors.18.0')</h2>
                    <div class="text-sm">@lang('hackathon-greece.sections.mentors.18.1')
                    </div>
                </div>

                <div class="item">
                    <div class="flex justify-center">
                        <img src="{{asset('/images/hackathons/profiles/greece/2/triantafyllos-paschaleris.png')}}">
                    </div>
                    <h2 class="text-center">@lang('hackathon-greece.sections.mentors.19.0')</h2>
                    <div class="text-sm">@lang('hackathon-greece.sections.mentors.19.1')
                    </div>
                </div>





                <div class="item">
                    <div class="flex justify-center">
                        <img src="{{asset('/images/hackathons/profiles/greece/3/aikaterini-katmada.png')}}">
                    </div>
                    <h2 class="text-center">@lang('hackathon-greece.sections.mentors.20.0')</h2>
                    <div class="text-sm">@lang('hackathon-greece.sections.mentors.20.1')<br/>
                        @lang('hackathon-greece.sections.mentors.20.2')
                    </div>
                </div>

                <div class="item">
                    <div class="flex justify-center">
                        <img src="{{asset('/images/hackathons/profiles/greece/3/alexandra-hatsiou.png')}}">
                    </div>
                    <h2 class="text-center">@lang('hackathon-greece.sections.mentors.21.0')</h2>
                    <div class="text-sm">@lang('hackathon-greece.sections.mentors.21.1')
                    </div>
                </div>

                <div class="item">
                    <div class="flex justify-center">
                        <img src="{{asset('/images/hackathons/profiles/greece/3/demetris-bakas.png')}}">
                    </div>
                    <h2 class="text-center">@lang('hackathon-greece.sections.mentors.22.0')</h2>
                    <div class="text-sm">@lang('hackathon-greece.sections.mentors.22.1')
                    </div>
                </div>

                <div class="item">
                    <div class="flex justify-center">
                        <img src="{{asset('/images/hackathons/profiles/greece/3/dimitra-iordanidou.png')}}">
                    </div>       <h2 class="text-center">@lang('hackathon-greece.sections.mentors.23.0')</h2>
                    <div class="text-sm">@lang('hackathon-greece.sections.mentors.23.1')
                    </div>
                </div>

                <div class="item">
                    <div class="flex justify-center">
                        <img src="{{asset('/images/hackathons/profiles/greece/3/Dimosiaris.png')}}">
                    </div>       <h2 class="text-center">@lang('hackathon-greece.sections.mentors.24.0')</h2>
                    <div class="text-sm">@lang('hackathon-greece.sections.mentors.24.1')
                    </div>
                </div>

                <div class="item">
                    <div class="flex justify-center">
                        <img src="{{asset('/images/hackathons/profiles/greece/3/georgia-maria.png')}}">
                    </div>       <h2 class="text-center">@lang('hackathon-greece.sections.mentors.25.0')</h2>
                    <div class="text-sm">@lang('hackathon-greece.sections.mentors.25.1')
                    </div>
                </div>

                <div class="item">
                    <div class="flex justify-center">
                        <img src="{{asset('/images/hackathons/profiles/greece/3/konstantinos-chalisaos.png')}}">
                    </div>       <h2 class="text-center">@lang('hackathon-greece.sections.mentors.26.0')</h2>
                    <div class="text-sm">@lang('hackathon-greece.sections.mentors.26.1')
                    </div>
                </div>

                <div class="item">
                    <div class="flex justify-center">
                        <img src="{{asset('/images/hackathons/profiles/greece/3/kostas-kalogirou.png')}}">
                    </div>       <h2 class="text-center">@lang('hackathon-greece.sections.mentors.27.0')</h2>
                    <div class="text-sm">@lang('hackathon-greece.sections.mentors.27.1')
                    </div>
                </div>

                <div class="item">
                    <div class="flex justify-center">
                        <img src="{{asset('/images/hackathons/profiles/greece/3/maria-anastasia-moustaka.png')}}">
                    </div>       <h2 class="text-center">@lang('hackathon-greece.sections.mentors.28.0')</h2>
                    <div class="text-sm">@lang('hackathon-greece.sections.mentors.28.1')
                    </div>
                </div>

                <div class="item">
                    <div class="flex justify-center">
                        <img src="{{asset('/images/hackathons/profiles/greece/3/mixalis-nikolaidis.png')}}">
                    </div>       <h2 class="text-center">@lang('hackathon-greece.sections.mentors.29.0')</h2>
                    <div class="text-sm">@lang('hackathon-greece.sections.mentors.29.1')
                    </div>
                </div>

                <div class="item">
                    <div class="flex justify-center">
                        <img src="{{asset('/images/hackathons/profiles/greece/3/nikiforos-botis.png')}}">
                    </div>       <h2 class="text-center">@lang('hackathon-greece.sections.mentors.30.0')</h2>
                    <div class="text-sm">@lang('hackathon-greece.sections.mentors.30.1')
                    </div>
                </div>

                <div class="item">
                    <div class="flex justify-center">
                        <img src="{{asset('/images/hackathons/profiles/greece/3/panayiotis-antoniou.png')}}">
                    </div>       <h2 class="text-center">@lang('hackathon-greece.sections.mentors.31.0')</h2>
                    <div class="text-sm">@lang('hackathon-greece.sections.mentors.31.1')
                    </div>
                </div>

                <div class="item">
                    <div class="flex justify-center">
                        <img src="{{asset('/images/hackathons/profiles/greece/3/papadopoulou-anastasia.png')}}">
                    </div>       <h2 class="text-center">@lang('hackathon-greece.sections.mentors.32.0')</h2>
                    <div class="text-sm">@lang('hackathon-greece.sections.mentors.32.1')
                    </div>
                </div>

                <div class="item">
                    <div class="flex justify-center">
                        <img src="{{asset('/images/hackathons/profiles/greece/3/konstantina-tagkopoulou.png')}}">
                    </div>       <h2 class="text-center">@lang('hackathon-greece.sections.mentors.33.0')</h2>
                    <div class="text-sm">@lang('hackathon-greece.sections.mentors.33.1')
                    </div>
                </div>


            </div>
        </section>

        {{--                <section id="side-events">--}}
        {{--                    <div class="left">--}}
        {{--                        <h1>@lang('hackathon-greece.sections.11.title')</h1>--}}
        {{--                        <p>@lang('hackathon-greece.sections.11.content.0')</p>--}}
        {{--                        <a href="" class="codeweek-action-link-button">@lang('login.register')</a>--}}
        {{--                    </div>--}}
        {{--                    <img src="/images/hackathons/side_events.png">--}}
        {{--                </section>--}}

        <section id="partners">
            <div>
                <h1>@lang('hackathon-greece.misc.2')</h1>
            </div>

            <div class="partners-grid">


                <div class="item">
                    <div class="flex justify-center">
                        <img src="{{asset('/images/hackathons/partners/aws.png')}}">
                    </div>
                </div>

                <div class="item">
                    <div class="flex justify-center">
                        <img src="{{asset('/images/hackathons/partners/google.png')}}">
                    </div>
                </div>

                <div class="item">
                    <div class="flex justify-center">
                        <img src="{{asset('/images/hackathons/partners/greece/greek-computer-society.png')}}">
                    </div>
                </div>


            </div>


            <div class="partners-grid">


                <div class="item">
                    <div class="flex justify-center">
                        <img src="{{asset('/images/hackathons/partners/greece/greek-digital-skills.png')}}">
                    </div>
                </div>

                <div class="item">
                    <div class="flex justify-center">
                        <img src="{{asset('/images/hackathons/partners/imagilabs.png')}}">
                    </div>
                </div>

                <div class="item">
                    <div class="flex justify-center">
                        <img src="{{asset('/images/hackathons/partners/greece/lancom.png')}}">
                    </div>
                </div>


            </div>


            <div class="partners-grid">

                <div class="item">
                    <div class="flex justify-center">
                        <img src="{{asset('/images/hackathons/partners/microsoft.png')}}">
                    </div>
                </div>

                <div class="item">
                    <div class="flex justify-center">
                        <img src="{{asset('/images/hackathons/partners/greece/noris.png')}}">
                    </div>
                </div>

                <div class="item">
                    <div class="flex justify-center">
                        <img src="{{asset('/images/hackathons/partners/redhat.png')}}">
                    </div>
                </div>


            </div>


            <div class="partners-grid">

                <div class="item">
                    <div class="flex justify-center">
                        <img src="{{asset('/images/hackathons/partners/greece/social-innov.png')}}">
                    </div>
                </div>

                <div class="item">
                    <div class="flex justify-center">
                        <img src="{{asset('/images/hackathons/partners/greece/2/alexander-innovation-zone.png')}}">
                    </div>
                </div>

                <div class="item">
                    <div class="flex justify-center">
                        <img src="{{asset('/images/hackathons/partners/greece/2/exandia.png')}}">
                    </div>
                </div>


            </div>

            <div class="partners-grid">

                <div class="item">
                    <div class="flex justify-center">
                        <img src="{{asset('/images/hackathons/partners/greece/2/greek-girls-code.png')}}">
                    </div>
                </div>

                <div class="item">
                    <div class="flex justify-center">
                        <img src="{{asset('/images/hackathons/partners/greece/2/kaktus-design.png')}}">
                    </div>
                </div>

                <div class="item">
                    <div class="flex justify-center">
                        <img src="{{asset('/images/hackathons/partners/makeblock-makex.png')}}">
                    </div>
                </div>


            </div>
        </section>

        <section id="about-codeweek">
            <div class="text">
                <h1>@lang('hackathon-greece.sections.12.title')</h1>
                <p>@lang('hackathon-greece.sections.12.content.0') @lang('hackathon-greece.sections.12.content.1') @lang('hackathon-greece.sections.12.content.2')</p>
                <br/><br/>
                <p>@lang('hackathon-greece.sections.12.content.3')
                    <b>@lang('hackathon-greece.sections.12.content.4')</b> @lang('hackathon-greece.sections.12.content.5')
                    <b>@lang('hackathon-greece.sections.12.content.6')</b>
                    @lang('hackathon-greece.sections.12.content.7')
                    <b>@lang('hackathon-greece.sections.12.content.8')</b>
                </p><br/><br/>
            </div>
            <img src="/images/hackathons/about_codeweek.svg" class="static-image">
            <a target="_blank" href="https://codeweek.eu/about"
               class="codeweek-action-link-button">@lang('hackathon-greece.sections.12.content.9')</a>
        </section>

    </section>

@endsection

