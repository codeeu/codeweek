@extends('layout.base')

<x-tailwind></x-tailwind>

@section('content')

    <section id="codeweek-ambassadors-page" class="codeweek-page">

        <section class="codeweek-banner ambassadors">
            <div class="text">
                <h2>#EUCodeWeek</h2>
                <h1>@lang('menu.ambassadors')</h1>

            </div>
            <div class="image">

                <img src="images/banner_ambassadors.svg" class="static-image">
                @if(request()->get("country_iso") == "IT" || request()->get("country_iso") == "GR" || request()->get("country_iso") == "LT")
                <div class="absolute mt-16 mr-8">
                    <img src="{{asset('images/ally.png')}}" width="100px">
                </div>
                    @endif
            </div>


        </section>

        <section class="codeweek-searchbox">

            <form method="get" action="/ambassadors" enctype="multipart/form-data">
                <select id="id_country" name="country_iso" onchange="this.form.submit()" class="codeweek-input-select">
                    @foreach ($countries as $country)
                        <option value="{{$country->iso}}" {{app('request')->input('country_iso') == $country->iso ? 'selected' : ''}}>{{$country->translation}}</option>
                    @endforeach
                </select>


            </form>
        </section>

        <section class="codeweek-content-wrapper">

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
                            <p class="card-description">{!!  nl2br(e($ambassador->bio)) !!}</p>
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
                            {{--Ambassador twitter--}}
                            @if($ambassador->twitter)
                                <a href="http://twitter.com/{{ $ambassador->twitter }}"
                                   target="_blank" class="codeweek-svg-button">
                                    <img src="/images/x-twitter.svg" alt="Twitter">
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
