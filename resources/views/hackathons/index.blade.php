@extends('layout.base')

@section('content')

    <section id="codeweek-hackathons-page" class="codeweek-page">

        <section class="codeweek-banner hackathons">
            <div class="image">
                <div class="text">
                    <div class="text-inside">
                        <h1 style="font-weight: bold;">@lang('hackathons.title')</h1>
                        <h2>@lang('hackathons.subtitle')</h2>
                    </div>
                </div>
                <img src="{{asset('images/hackathons/banner_hackathons.svg')}}" class="static-image desktop">
                <img src="{{asset('images/hackathons/banner_hackathons_mobile.svg')}}" class="static-image mobile">
            </div>
        </section>

        <section class="codeweek-content-wrapper">

            <h1 class="align-center">@lang('hackathons.sections.1.title')</h1>
            <p>
                @lang('hackathons.sections.1.content.1')
                @lang('hackathons.sections.1.content.2')
            </p>

            <section class="hackathons-content-grid">
                <div class="codeweek-card-grid">
                    <a href="{{route("ireland")}}" target="_blank">
                        <div class="city-image">
                            <img src="/images/hackathons/dublin_ireland_small.png">
                            <div class="transparent"></div>
                            <div class="text">
                                <div class="title hackaton">Dublin</div>
                            </div>
                        </div>
                        <div class="date">17-18 {{ucfirst(__('hackathons.cities.1.date'))}}</div>
                        <div class="location">Dublin - @lang('hackathons.cities.1.country')</div>
                    </a>
                </div>
                <div class="codeweek-card-grid">
                    <a href="https://ec.europa.eu/eusurvey/runner/PreregistrationEUCWhackathonSpain" target="_blank">
                        <div class="city-image">
                            <img src="/images/hackathons/palafrugell_spain_small.png">
                            <div class="transparent"></div>
                            <div class="text">
                                <div class="title hackaton">Palafrugell</div>
                            </div>
                        </div>
                        <div class="date">7-8 {{ucfirst(__('hackathons.cities.4.date'))}}</div>
                        <div class="location">Palafrugell - @lang('hackathons.cities.4.country')</div>
                    </a>
                </div>
                <div class="codeweek-card-grid">
                    <a href="https://ec.europa.eu/eusurvey/runner/preregistrationEUCWhackathonRomania" target="_blank">
                        <div class="city-image">
                            <img src="/images/hackathons/iasi_romania_small.png">
                            <div class="transparent"></div>
                            <div class="text">
                                <div class="title hackaton">Iasi</div>
                            </div>
                        </div>
                        <div class="date">9-10 {{ucfirst(__('hackathons.cities.3.date'))}}</div>
                        <div class="location">Iasi - @lang('hackathons.cities.3.country')</div>
                    </a>
                </div>
                <div class="codeweek-card-grid">
                    <a href="https://ec.europa.eu/eusurvey/runner/PreregistrationEUCWhackathonSlovenia" target="_blank">
                        <div class="city-image">
                            <img src="/images/hackathons/nova_gorica_slovenia_small.png">
                            <div class="transparent"></div>
                            <div class="text">
                                <div class="title hackaton">Nova Gorica</div>
                            </div>
                        </div>
                        <div class="date">30-31 {{ucfirst(__('hackathons.cities.2.date'))}}</div>
                        <div class="location">Nova Gorica - @lang('hackathons.cities.2.country')</div>
                    </a>
                </div>
                <div class="codeweek-card-grid">
                    <a href="https://ec.europa.eu/eusurvey/runner/PreregistrationEUCWhackathonLatvia" target="_blank">
                        <div class="city-image">
                            <img src="/images/hackathons/riga_latvia_small.png">
                            <div class="transparent"></div>
                            <div class="text">
                                <div class="title hackaton">Riga</div>
                            </div>
                        </div>
                        <div class="date">19-20 {{ucfirst(__('hackathons.cities.5.date'))}}</div>
                        <div class="location">Riga - @lang('hackathons.cities.5.country')</div>
                    </a>
                </div>
                <div class="codeweek-card-grid">
                    <a href="https://ec.europa.eu/eusurvey/runner/PreregistrationEUCWhackathonItaly" target="_blank">
                        <div class="city-image">
                            <img src="/images/hackathons/urbino_italy_small.png">
                            <div class="transparent"></div>
                            <div class="text">
                                <div class="title hackaton">Urbino</div>
                            </div>
                        </div>
                        <div class="date">{{ucfirst(__('hackathons.cities.6.date'))}}</div>
                        <div class="location">Urbino - @lang('hackathons.cities.6.country')</div>
                    </a>
                </div>

            </section>

        </section>

        <section class="hackathons_section take_part">
            <img src="{{asset('images/hackathons/take_part.svg')}}" class="static-image">
            <div class="text-inside">
                <h1>@lang('hackathons.sections.2.title')</h1>
                <p>@lang('hackathons.sections.2.content.1')</p>
            </div>
        </section>

        <section class="hackathons_section organisers">
            <img src="{{asset('images/hackathons/organisers.svg')}}" class="static-image">
            <div class="text-inside">
                <h1>@lang('hackathons.sections.3.title')</h1>
                <p>
                    @lang('hackathons.sections.3.content.1')
                    <a href="{{route('ambassadors')}}">@lang('hackathons.sections.3.content.2')</a>
                    @lang('hackathons.sections.3.content.3')
                </p>
            </div>
        </section>

        <section class="hackathons_section look_like">
            <div class="text-inside">
                <h1>@lang('hackathons.sections.4.title')</h1>
                <p>
                    @lang('hackathons.sections.4.content.1')
                    @lang('hackathons.sections.4.content.2')
                </p>
            </div>
        </section>

        <section class="hackathons_section how_coding">
            <div class="text-inside">
                <h1>@lang('hackathons.sections.5.title')</h1>
                <p>@lang('hackathons.sections.5.content.1')</p>
            </div>
            <img src="{{asset('images/hackathons/how_coding.svg')}}" class="static-image">
        </section>

        <!--<section class="codeweek-content-wrapper">

            <h1 class="align-center">Our partners</h1>

        </section>-->

    </section>

@endsection
