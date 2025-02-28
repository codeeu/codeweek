@extends('layout.tall')

@section('content')



    <section id="codeweek-ambassadors-page" class="codeweek-page">


        <section class="codeweek-banner ambassadors">
            <div class="text">
                <h2>#EUCodeWeek</h2>
                <h1>@lang('community.titles.0')</h1>
            </div>
            <div class="image">
                <img src="images/banner_ambassadors.svg" class="static-image">
            </div>
        </section>

        <section class="codeweek-content-wrapper">


            <p style="line-height: 30px;">@lang('community.intro.0').<br/>@lang('community.intro.1')</p>
            <h3>@lang('community.intro.2')</h3>

            <section class="codeweek-searchbox">
                <form method="get" action="/community" enctype="multipart/form-data">
                    <select id="id_country" name="country_iso" onchange="this.form.submit()"
                            class="codeweek-input-select">
                        @foreach ($countries as $country)
                            <option value="{{$country->iso}}" {{app('request')->input('country_iso') == $country->iso ? 'selected' : ''}}>{{$country->translation}}</option>
                        @endforeach
                    </select>
                </form>
            </section>


            <section class="codeweek-blue-box">



                <section class="community_type_section">
                    <h2 class="subtitle">@lang('community.titles.1')</h2>
                    <div class="community_type">
                        <div class="text">
                            <p>
                                @lang('community.ambassadors')
                            </p>
                        </div>
                        <div class="image">
                            <img src="{{asset('/images/ambassadors.png')}}">
                        </div>
                    </div>
                </section>

                <div style="display: flex; align-items: center; justify-content: center; margin-bottom: 16px">

                    @if(app('request')->input('country_iso'))
                        @foreach ($countries as $country)
                            @if($country->iso === app('request')->input('country_iso'))

                                @if($country->facebook)
                                    <a href="{{$country->facebook}}" class="codeweek-orange-button" target="_blank">
                                        @lang('ambassador.visit_the')
                                        <span>@lang('ambassador.local_facebook_page')</span>
                                    </a>
                                @endif

                                @if($country->website)
                                    <a href="{{$country->website}}" class="codeweek-orange-button" target="_blank">
                                        @lang('ambassador.visit_the') <span>@lang('ambassador.local_website')</span>
                                    </a>
                                @endif

                            @endif
                        @endforeach
                    @endif


                </div>

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

                 {{-- Display this section only if a country is selected and has specific content --}}
                    @php
                        $country = app('request')->input('country_iso');
                        $supportedCountries = ['GR', 'CY', 'MT', 'IT', 'BG', 'TR', 'UA','PL','IE','FR','LU','NL','BE','SK','CZ','NO','IS','FI','SE','PT','ES','LV','LT','HR','SI','DE','AT','CH','RO','MD','DK'];
                    @endphp

                    @if(in_array($country, $supportedCountries))
                        <section class="community_type_section">
                            <div class="community_type">
                                <div class="text">
                                    {{-- Dynamically construct the language keys based on country code --}}                                    
                                    <h2 class="subtitle">@lang("community.hub_level_{$country}")</h2>
                                    <br/><h3><b>@lang("community.hub_{$country}")</b></h3>
                                    <p>@lang("community.hub_desc_{$country}")</p>
                                </div>
                                <div class="image">
                                    <img src="{{ asset('/images/hub.png') }}">
                                </div>
                            </div>
                        </section>
                    @endif

                    {{-- Germany-specific additional section --}}
                    @if($country === 'DE')
                        <section class="community_type_section">
                            <div class="community_type">
                                <div class="text">@lang('community.codeweek_de')  </div>
                            </div>
                        </section>
                    @endif

                <section class="community_type_section">
                    <h2 class="subtitle">@lang('community.titles.2')</h2>
                    <div class="community_type">
                        <div class="text">
                                {{-- Belgium-teachers for NL --}}
                                @if($country === 'BE')
                                    <p> @lang('community.leading-teachers_be')</p>
                                @else
                                    <p> @lang('community.leading-teachers')</p>
                                @endif
                                <h3>@lang('community.cta')</h3>
                        </div>

                        <div class="image">
                            <img src="{{asset('/images/leading_teachers.png')}}">
                        </div>
                    </div>
                </section>

                <div id="mapid" style="width: 100%; height: 400px; z-index: 10000"></div>

                <section class="community_type_section">
                    <h2 class="subtitle">@lang('community.titles.3')</h2>
                    <div class="community_type">
                        <div class="text">
                            <p>
                                @lang('community.edu')
                            </p>
                        </div>
                        <div class="image">
                            <img src="{{asset('/images/edu_coordinators.png')}}">
                        </div>
                    </div>
                </section>
                <section class="community_type_section">
                    <h2 class="subtitle">@lang('community.titles.4')</h2>
                    <div class="community_type">
                        <div class="text">
                            {{--                            <p>--}}
                            {{--                                @lang('community.volunteer.0')--}}
                            {{--                            </p>--}}
                            {{--                            <p>--}}
                            {{--                                @lang('community.volunteer.1')--}}
                            {{--                            </p>--}}
                            {{--                            <p>--}}
                            {{--                                @lang('community.volunteer.2')--}}
                            {{--                            </p>--}}

                            <p>
                                @lang('community.volunteer.0') <a
                                        href="{{route('events_map')}}">@lang('community.volunteer.1')</a> @lang('community.volunteer.2')
                                <a href="{{route('about')}}">@lang('community.volunteer.3')</a>
                                @lang('community.volunteer.4') <a
                                        href="{{route('our-values')}}">@lang('community.volunteer.5')</a> @lang('community.volunteer.6')
                                .
                            </p>


                            <p>
                                @lang('community.volunteer.7') <a
                                        href="{{route('leading-teachers-document')}}">@lang('community.volunteer.8')</a>.
                                <!--@lang('community.volunteer.9') <a
                                        href="https://ec.europa.eu/eusurvey/runner/CallforLeadingTeachers">@lang('community.volunteer.10')</a>--> @lang('community.volunteer.11')
                            </p>

                            <p>
                                @lang('community.volunteer.12') <a
                                        href="{{route('beambassador')}}">@lang('community.volunteer.13')</a> @lang('community.volunteer.14') @lang('community.volunteer.15')

                            </p>
                        </div>
                        <div class="image">
                            <img src="{{asset('/images/volunteers.png')}}">
                        </div>
                    </div>
                </section>
            </section>
        </section>






    </section>

@endsection

@push('extra-css')
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin="" />
@endpush
@push('scripts')


    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js" integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>


    {{--    <link href="{{asset('css/MarkerCluster.css')}}" media="screen" rel="stylesheet"/>--}}
    {{--    <link href="{{asset('css/MarkerCluster.Default.css')}}" media="screen" rel="stylesheet"/>--}}

    {{--    <script src="{{asset('js/leaflet.markercluster.js')}}" type="text/javascript"/>--}}


@endpush


@section('extra-js')
    <script src="{{asset('js/countriesGeoCentroids.js')}}" type="text/javascript"></script>
    <script>
        // var map = L.map('mapid').setView([51.505, -0.09], 13);
        //
        // L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
        //     maxZoom: 19,
        //     attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
        // }).addTo(map);

        var mymap = L.map('mapid');

        L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token={{config('codeweek.MAPS_MAPBOX_ACCESS_TOKEN')}}', {
            maxZoom: 18,
            attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors, ' +
                'Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
            id: 'mapbox/streets-v11',
            tileSize: 512,
            zoomOffset: -1
        }).addTo(mymap);


    @foreach($teachers->groupBy('city_id') as $cityId => $teachersInCity)
            @if($teachersInCity[0]->city && $teachersInCity[0]->city->latitude && $teachersInCity[0]->city->longitude)
                var marker = L.marker([{{$teachersInCity[0]->city->latitude}}, {{$teachersInCity[0]->city->longitude}}]).addTo(mymap);

                var teachersList = "";
                @foreach($teachersInCity as $teacher)
                    teachersList += "&#9679;&nbsp;<b><a href=\"mailto:{{$teacher->email}}\">{{$teacher->firstname}} {{$teacher->lastname}}</a></b> ({{$teacher->city->city}}) <br/>{{implode(", ",$teacher->expertises->pluck('name')->toArray())}}<br/><br/>";
                @endforeach

                marker.bindPopup(teachersList).openPopup();
            @endif
        @endforeach

        var popup = L.popup();



        let centerInfo = {
            latitude: 51,
            longitude: 4,
            zoom: 4
        };


        const countryInfo = centroids.find(ctrds => ctrds.iso === '{{$country_iso}}');
        if (countryInfo) {
            centerInfo = countryInfo;
        }

        const latlng = new L.LatLng(centerInfo.latitude, centerInfo.longitude);
        mymap.setView(latlng, centerInfo.zoom, {animation: true});



    </script>
@endsection
