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
                <img src="images/hackathons/banner_hackathons.svg" class="static-image desktop">
                <img src="images/hackathons/banner_hackathons_mobile.svg" class="static-image mobile">
            </div>
        </section>

        <section class="codeweek-content-wrapper">

            <h1 class="align-center">@lang('hackathons.sections.1.title')</h1>
            <p class="align-center">
                @lang('hackathons.sections.1.content.1')
                @lang('hackathons.sections.1.content.2')
            </p>

            <section class="hackathons-content-grid">
                <div class="codeweek-card-grid">
                    <a href="#">
                        <div class="city-image">
                            <img src="/images/hackathons/city_image_1.png">
                            <div class="transparent"></div>
                            <div class="text">
                                <div class="title hackaton">@lang('hackathons.cities.1.title')</div>
                                <div class="title name">@lang('hackathons.cities.1.subtitle')</div>
                            </div>
                        </div>
                        <div class="date">@lang('hackathons.cities.1.date')</div>
                        <div class="location">@lang('hackathons.cities.1.location')</div>
                    </a>
                </div>
                <div class="codeweek-card-grid">
                    <a href="#">
                        <div class="city-image">
                            <img src="/images/hackathons/city_image_2.png">
                            <div class="transparent"></div>
                            <div class="text">
                                <div class="title hackaton">@lang('hackathons.cities.2.title')</div>
                                <div class="title name">@lang('hackathons.cities.2.subtitle')</div>
                            </div>
                        </div>
                        <div class="date">@lang('hackathons.cities.2.date')</div>
                        <div class="location">@lang('hackathons.cities.2.location')</div>
                    </a>
                </div>
                <div class="codeweek-card-grid">
                    <a href="#">
                        <div class="city-image">
                            <img src="/images/hackathons/city_image_2.png">
                            <div class="transparent"></div>
                            <div class="text">
                                <div class="title hackaton">@lang('hackathons.cities.3.title')</div>
                                <div class="title name">@lang('hackathons.cities.3.subtitle')</div>
                            </div>
                        </div>
                        <div class="date">@lang('hackathons.cities.3.date')</div>
                        <div class="location">@lang('hackathons.cities.3.location')</div>
                    </a>
                </div>
                <div class="codeweek-card-grid">
                    <a href="#">
                        <div class="city-image">
                            <img src="/images/hackathons/city_image_2.png">
                            <div class="transparent"></div>
                            <div class="text">
                                <div class="title hackaton">@lang('hackathons.cities.4.title')</div>
                                <div class="title name">@lang('hackathons.cities.4.subtitle')</div>
                            </div>
                        </div>
                        <div class="date">@lang('hackathons.cities.4.date')</div>
                        <div class="location">@lang('hackathons.cities.4.location')</div>
                    </a>
                </div>
                <div class="codeweek-card-grid">
                    <a href="#">
                        <div class="city-image">
                            <img src="/images/hackathons/city_image_2.png">
                            <div class="transparent"></div>
                            <div class="text">
                                <div class="title hackaton">@lang('hackathons.cities.5.title')</div>
                                <div class="title name">@lang('hackathons.cities.5.subtitle')</div>
                            </div>
                        </div>
                        <div class="date">@lang('hackathons.cities.5.date')</div>
                        <div class="location">@lang('hackathons.cities.5.location')</div>
                    </a>
                </div>
                <div class="codeweek-card-grid">
                    <a href="#">
                        <div class="city-image">
                            <img src="/images/hackathons/city_image_2.png">
                            <div class="transparent"></div>
                            <div class="text">
                                <div class="title hackaton">@lang('hackathons.cities.6.title')</div>
                                <div class="title name">@lang('hackathons.cities.6.subtitle')</div>
                            </div>
                        </div>
                        <div class="date">@lang('hackathons.cities.6.date')</div>
                        <div class="location">@lang('hackathons.cities.6.location')</div>
                    </a>
                </div>

            </section>

        </section>

        <section class="hackathons_section take_part">
            <img src="images/hackathons/take_part.svg" class="static-image">
            <div class="text-inside">
                <h1>@lang('hackathons.sections.2.title')</h1>
                <p>@lang('hackathons.sections.2.content.1')</p>
            </div>
        </section>

        <section class="hackathons_section organisers">
            <img src="images/hackathons/organisers.svg" class="static-image">
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
            <img src="images/hackathons/how_coding.svg" class="static-image">
        </section>

        <!--<section class="codeweek-content-wrapper">

            <h1 class="align-center">Our partners</h1>

        </section>-->

    </section>

@endsection
