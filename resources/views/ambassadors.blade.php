@extends('layout.base')

@section('content')

    <section id="codeweek-ambassadors-page" class="codeweek-page">

        <section class="codeweek-banner ambassadors">
            <div class="text">
                <h2>#Codeweek</h2>
                <h1>@lang('menu.ambassadors')</h1>
            </div>
            <div class="image">
                <img src="images/banner_ambassadors.svg" class="static-image">
            </div>
        </section>

        <section class="codeweek-searchbox">
            <multiselect :options="{{ $countries }}" name="countries" label="event.countries"></multiselect>
        </section>

        <section class="codeweek-content-wrapper">

            @if(auth()->user() && auth()->user()->country)
                <div class="container clearfix h-full mt-8 mb-8">
                    @lang('ambassador.your_current_country'):
                    <a href="/ambassadors">@lang('countries.'.auth()->user()->country->name)</a>
                </div>
            @endif


            @if(app('request')->input('country_iso'))
                @foreach ($countries as $country)
                    @if($country->iso === app('request')->input('country_iso'))

                        {{--<h1>
                            @lang('countries.'.$country->name)
                        </h1>--}}

                        <div class="codeweek-tools">

                            @if($country->facebook)
                                <a href="{{$country->facebook}}" class="codeweek-blank-button">
                                    @lang('ambassador.visit_the') <span>@lang('ambassador.local_facebook_page')</span>
                                </a>
                            @endif

                            @if($country->website)
                                <a href="{{$country->website}}" class="codeweek-blank-button">
                                    @lang('ambassador.visit_the') <span>@lang('ambassador.local_website')</span>
                                </a>
                            @endif

                        </div>
                    @endif
                @endforeach
            @endif


            <div class="codeweek-grid-layout">
                @forelse ($ambassadors as $ambassador)
                    <div class="codeweek-card">
                        <img src="{{$ambassador->avatar}}" class="card-image">
                        <div class="card-content">
                            <h5 class="card-title">{{ $ambassador->fullName() }}</h5>
                            <p class="card-description">{{ $ambassador->bio }}</p>
                        </div>
                        <div class="card-actions">
                                {{--Ambassador email--}}
                                @if($ambassador->email_display)
                                    <a href="mailto:{{ $ambassador->email_display }}"
                                       class="codeweek-svg-button">
                                        <img src="/images/mail.svg" alt="Twitter">
                                    </a>
                                @elseif($ambassador->email)
                                    <a href="mailto:{{ $ambassador->email }}"
                                       class="codeweek-svg-button">
                                        <img src="/images/mail.svg" alt="Twitter">
                                    </a>
                                @endif
                                {{--Ambassdor twitter--}}
                                @if($ambassador->twitter)
                                    <a href="http://twitter.com/{{ $ambassador->twitter }}"
                                       class="codeweek-svg-button">
                                        <img src="/images/twitter.svg" alt="Twitter">
                                    </a>
                                @endif
                                {{--Ambassador website--}}
                                @if($ambassador->website)
                                    <a href="{{ $ambassador->website }}"
                                       class="codeweek-svg-button">
                                        <img src="/images/globe.svg" alt="Twitter">
                                    </a>
                                @endif
                        </div>
                    </div>
                @empty
                    @lang('ambassador.no_ambassadors') :(<br/>
                @endforelse
            </div>


                    {{--<div id="showcountries">

                        <ul class="clearfix list-style-none">
                            <li style="clear:left">@lang('ambassador.countries_with_ambassadors')</li>

                            @foreach ($countries_with_ambassadors as $country)


                                <li>
                                    <a href="/ambassadors?country_iso={{$country->country_iso}}">
                                        <div class="country-link" data-name="{{$country->country_iso}}">

                                            <img src="https://s3-eu-west-1.amazonaws.com/codeweek-s3/flags/{{strtolower($country->country_iso)}}.png"
                                                 alt="{{$country->country_iso}}">

                                            <div class="country-name {{strtolower($country->name)}}">
                                                @lang('countries.'.$country->name) ({{$country->total}})
                                            </div>
                                        </div>
                                    </a>
                                </li>

                            @endforeach


                        </ul>
                        <br/>
                        <p style="text-align: center"><a
                                    href="/beambassador">@lang('ambassador.why_dont_you_volunteer')</a></p>


                        {{ $ambassadors->appends(['country_iso'=>app('request')->input('country_iso')])->links() }}

                    </div>--}}

            </section>
    </section>

@endsection