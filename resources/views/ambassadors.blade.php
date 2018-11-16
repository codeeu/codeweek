@extends('layout.base')

@section('content')
    <section>


        <div class="container">


            <div class="content-wrap nopadding">


                <div class="container clearfix ">


                    <div class="flex flex-col justify-center text-center w-full mb-8 uppercase">
                        <h1>@lang('ambassador.title')</h1>
                        <span></span>
                    </div>

                    @if(auth()->user() && auth()->user()->country)
                        <div class="container clearfix h-full mt-8 mb-8">
                            @lang('ambassador.your_current_country'):
                            <a href="/ambassadors">@lang('countries.'.auth()->user()->country->name)</a>
                        </div>
                    @endif


                    @if(app('request')->input('country_iso'))
                        @foreach ($countries as $country)
                            @if($country->iso === app('request')->input('country_iso'))

                                <h2 class="flex justify-center text-center">
                                 @lang('countries.'.$country->name)
                                </h2>

                                @if($country->facebook)
                                    <div class="justify-center text-center">@lang('ambassador.visit_the') <a href="{{$country->facebook}}">@lang('ambassador.local_facebook_page')</a></div>
                                @endif

                                @if($country->website)
                                    <div class="justify-center text-center mb-8">@lang('ambassador.visit_the') <a href="{{$country->website}}">@lang('ambassador.local_website')</a></div>
                                @endif
                            @endif
                        @endforeach
                    @endif



                    <div class="fancy-title title-border">
                        <h3>@lang('ambassador.ambassadors')</h3>
                    </div>


                    <div style="display: flex;flex-wrap: wrap;flex-direction: row;">
                        @forelse ($ambassadors as $ambassador)

                            <div class="bottommargin flex" style="padding:0px 15px;flex: 0 0 {{$ambassadors->count() > 2 ? '33.3%' : '50%'}};">
                                <div class="team">
                                    <div class="team-image">
                                        <img src="{{$ambassador->avatar}}" alt="" width="80" height="80" class="img-circle">
                                    </div>

                                    <div class="team-desc">
                                        <div class="team-title">
                                            <h4>{{ $ambassador->fullName() }}</h4>
                                        </div>
                                        <div class="team-content">
                                            <p>{{ $ambassador->bio }}</p>
                                        </div>

                                        @if($ambassador->email)
                                            <a href="mailto:{{ $ambassador->email }}"
                                               class="social-icon inline-block si-small si-light si-rounded si-mail">
                                                <i class="icon-line-mail"></i>
                                                <i class="icon-line-mail"></i>
                                            </a>
                                        @endif
                                        @if($ambassador->twitter)

                                            <a href="http://twitter.com/{{ $ambassador->twitter }}"
                                               class="social-icon inline-block si-small si-light si-rounded si-twitter">
                                                <i class="icon-twitter"></i>
                                                <i class="icon-twitter"></i>
                                            </a>
                                        @endif

                                        @if($ambassador->website)

                                            <a href="{{ $ambassador->website }}"
                                               class="social-icon inline-block si-small si-light si-rounded si-gplus">
                                                <i class="icon-world"></i>
                                                <i class="icon-world"></i>
                                            </a>
                                        @endif
                                    </div>
                                </div>
                            </div>

                        @empty
                            @lang('ambassador.no_ambassadors') :(<br/>
                        @endforelse
                    </div>


                </div>


                <div id="showcountries">

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


                </div>


                {{ $ambassadors->appends(['country_iso'=>app('request')->input('country_iso')])->links() }}


            </div>
        </div>

    </section>

@endsection