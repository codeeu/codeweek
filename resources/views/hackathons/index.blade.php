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

                @lang('hackathons.sections.1.content.1')<br/><br/>


                @lang('hackathons.sections.1.content.2')

            </p>

        </section>

        <section class="hackathons_section take_part">
            <img src="{{asset('images/hackathons/take_part.svg')}}" class="static-image">
            <div class="text-inside">
                <h1>@lang('hackathons.sections.2.title')</h1>
                <p>@lang('hackathons.sections.2.content.1')</p>
            </div>
        </section>

        <section class="hackathons_section look_like">
            <div class="text-inside">
                <h1>@lang('hackathons.sections.4.title')</h1>
                <p>
                    @lang('hackathons.sections.4.content.1')<br/><br/>
                    @lang('hackathons.sections.4.content.2')
                </p>
            </div>
        </section>

        <section class="codeweek-content-wrapper">

            <h1 class="align-center">@lang('hackathons.sections.7.title')</h1>

            <section class="hackathons-content-grid">
                <div class="codeweek-card-grid">
                    <a href="{{route('hackathon-romania')}}" target="_blank">
                        <div class="city-image">
                            <img src="/images/hackathons/flags/romania.png">
                            <div class="transparent"></div>
                            <div class="text">
                                <div class="title hackaton">@lang('hackathons.cities.1.country')</div>
                            </div>
                        </div>
                        <div class="date">@lang('hackathons.cities.1.date')</div>
                    </a>
                </div>
                <div class="codeweek-card-grid">
                    <a href="{{route('hackathon-ireland')}}" target="_blank">
                        <div class="city-image">
                            <img src="/images/hackathons/flags/ireland.png">
                            <div class="transparent"></div>
                            <div class="text">
                                <div class="title hackaton">@lang('hackathons.cities.2.country')</div>
                            </div>
                        </div>
                        <div class="date">@lang('hackathons.cities.2.date')</div>
                    </a>
                </div>



                <div class="codeweek-card-grid">
                    <a href="{{route('hackathon-italy')}}" target="_blank">
                        <div class="city-image">
                            <img src="/images/hackathons/flags/italy.png">
                            <div class="transparent"></div>
                            <div class="text">
                                <div class="title hackaton">@lang('hackathons.cities.3.country')</div>
                            </div>
                        </div>
                        <div class="date">@lang('hackathons.cities.3.date')</div>
                    </a>
                </div>
                <div class="codeweek-card-grid">
                    <a href="{{route('hackathon-greece')}}" target="_blank">
                        <div class="city-image">
                            <img src="/images/hackathons/flags/greece.png">
                            <div class="transparent"></div>
                            <div class="text">
                                <div class="title hackaton">@lang('hackathons.cities.4.country')</div>
                            </div>
                        </div>
                        <div class="date">@lang('hackathons.cities.4.date')</div>
                    </a>
                </div>
                <div class="codeweek-card-grid">
                    <a href="{{route('hackathon-slovenia')}}" target="_blank">
                        <div class="city-image">
                            <img src="/images/hackathons/flags/slovenia.png">
                            <div class="transparent"></div>
                            <div class="text">
                                <div class="title hackaton">@lang('hackathons.cities.5.country')</div>
                            </div>
                        </div>
                        <div class="date">{{ucfirst(__('hackathons.cities.5.date'))}}</div>
                    </a>
                </div>
                <div class="codeweek-card-grid">
                    <a href="{{route('hackathon-latvia')}}" target="_blank">
                        <div class="city-image">
                            <img src="/images/hackathons/flags/latvia.png">
                            <div class="transparent"></div>
                            <div class="text">
                                <div class="title hackaton">@lang('hackathons.cities.6.country')</div>
                            </div>
                        </div>

                        <div class="date">{{ucfirst(__('hackathons.cities.6.date'))}}</div>
                    </a>
                </div>

            </section>

        </section>

        <section class="hackathons_section how_coding">
            <div class="text-inside">
                <h1>@lang('hackathons.sections.5.title')</h1>
                <p>@lang('hackathons.sections.5.content.1')</p>
            </div>
            <img src="{{asset('images/hackathons/how_coding.svg')}}" class="static-image">
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

        <!--<section class="codeweek-content-wrapper">

            <h1 class="align-center">Our partners</h1>

        </section>-->

    </section>

@endsection
