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
            <form method="get" action="/ambassadors" enctype="multipart/form-data">
                <select id="id_country" name="country_iso" onchange="this.form.submit()" class="codeweek-input-select">
                    @foreach ($countries_with_ambassadors as $ctry)
                        <option value="{{$ctry->country_iso}}" {{app('request')->input('country_iso') == $ctry->country_iso ? 'selected' : ''}}>@lang('countries.'. $ctry->name)</option>
                    @endforeach
                </select>
            </form>
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
                                <a href="{{$country->facebook}}" class="codeweek-blank-button" target="_blank">
                                    @lang('ambassador.visit_the') <span>@lang('ambassador.local_facebook_page')</span>
                                </a>
                            @endif

                            @if($country->website)
                                <a href="{{$country->website}}" class="codeweek-blank-button" target="_blank">
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
                        <div class="card-avatar">
                            <img src="{{$ambassador->avatar}}" class="card-image-avatar">
                        </div>
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
                                       target="_blank" class="codeweek-svg-button">
                                        <img src="/images/twitter.svg" alt="Twitter">
                                    </a>
                                @endif
                                {{--Ambassador website--}}
                                @if($ambassador->website)
                                    <a href="{{ $ambassador->website }}"
                                       target="_blank" class="codeweek-svg-button">
                                        <img src="/images/globe.svg" alt="Twitter">
                                    </a>
                                @endif
                        </div>
                    </div>
                @empty
                    @lang('ambassador.no_ambassadors') :(<br/>
                @endforelse
            </div>

            </section>
    </section>

@endsection