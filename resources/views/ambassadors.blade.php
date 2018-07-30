@extends('layout.base')

@section('content')
    <section>


        <div class="container">

            <div class="tab-content clearfix">

                <div class="fancy-title title-border">
                    <h3>Ambassadors</h3>
                </div>


                @if(app('request')->input('country_iso'))
                    @foreach ($countries as $country)
                        @if($country->iso === app('request')->input('country_iso'))
                            Country: {{$country->name}}

                            @if($country->facebook)
                                <div>Visit the <a href="{{$country->facebook}}">local Facebook page</a></div>
                            @endif

                            @if($country->website)
                                <div><a href="{{$country->website}}">Local Website</a></div>
                            @endif
                        @endif
                    @endforeach
                @endif







                @forelse ($ambassadors as $ambassador)

                    <div class="col-md-3 col-sm-6 bottommargin">
                        <div class="team">
                            <div class="team-image">
                                {{$ambassador->avatar_path}}
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
                    No ambassadors yet :(<br/>
                @endforelse


            </div>


            <div id="showcountries">

                <ul class="clearfix list-style-none">
                    <li style="clear:left">Countries with ambassadors</li>

                    @foreach ($countries_with_ambassadors as $country)



                        <li>
                            <a href="/ambassadors?country_iso={{$country->country_iso}}">
                                <div class="country-link" data-name="{{$country->country_iso}}">

                                    <img src="https://s3-eu-west-1.amazonaws.com/codeweek-s3/flags/{{strtolower($country->country_iso)}}.png"
                                         alt="{{$country->country_iso}}">

                                    <div class="country-name">
                                        {{$country->name}} ({{$country->total}})
                                    </div>
                                </div>
                            </a>
                        </li>

                    @endforeach


                </ul>
                <br/>
                <p style="text-align: center">Why don't you <a
                            href="http://codeweek.eu/beambassador">volunteer</a>?</p>


            </div>


            {{ $ambassadors->appends(['country_iso'=>app('request')->input('country_iso')])->links() }}


        </div>
    </section>

@endsection