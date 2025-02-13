@extends('layout.new_base')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/nice-select2@2.1.0/dist/css/nice-select2.css">
@section('non-vue-content')
    <section id="codeweek-ambassadors-page" class="codeweek-page font-['Blinker']">
        @php
        $list = [
            (object) ['label' => __('community.titles.0'), 'href' => ''],
            ];
        @endphp
        @section('layout.breadcrumb')
            @include('layout.breadcrumb', ['list' => $list])
        @endsection

<style>
.hero-image {
    clip-path: ellipse(71% 73% at 40% 20%);
}
@media (min-width: 768px) {
    .hero-image {
        clip-path: ellipse(70% 120% at 70% -2%);
    }
}
</style>

<section class="relative flex flex-col overflow-hidden bg-violet-gradient">
    <div class="relative w-full transition-all">
        <div class="relative flex flex-col justify-end w-full overflow-hidden md:p-0 md:flex-row md:items-center h-[760px]">
            <div class="relative flex items-center justify-start w-full h-full duration-1000 home-activity">
                <!-- Image with clip-path -->
                <img 
                    class="absolute top-0 right-0 w-full md:w-[60vw] h-[50%]  md:h-full object-cover transition-all duration-300 hero-image" 
                    src="images/community/mobile-header.png" 
                    srcset="images/community/mobile-header.png 768w, images/community/1.jpg 769w"
                />
                <div class="flex flex-col-reverse items-center justify-between w-full mx-auto max-md:h-full md:flex-row codeweek-container-lg">
                    <div class="flex items-center justify-center w-full md:w-1/2">
                        <div class="px-6 py-10 md:px-14 md:py-[4.5rem] bg-white rounded-[32px] z-10 w-full max-w-[40rem] h-fit relative -top-6">
                            <h2 class="text-[#1C4DA1] text-[30px] md:text-[60px] leading-9 md:leading-[72px] font-normal font-['Montserrat'] mb-4">
                                @lang('community.titles.0')
                            </h2>
                            <p class="text-xl md:text-2xl leading-8 text-[#333E48] p-0 mb-4 max-md:max-w-full max-w-[525px]">
                                Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel
                                illum dolore eu feugiat nulla facilisis at vero.
                            </p>
                            <a class="inline-block bg-primary hover:bg-hover-orange rounded-full py-4 px-6 md:px-10 font-semibold text-base w-full md:w-auto text-center text-[#20262C] transition-all duration-300"
                                href="#">
                                Learn More
                            </a>
                        </div>
                    </div>
                    <button class="flex items-center justify-center w-full md:w-1/2 group max-md:h-full">
                        <svg class="z-50 transition-all duration-300" width="80" height="80" viewBox="0 0 80 80" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <rect width="80" height="80" rx="40" class="transition-all duration-300 fill-[#FFD700] group-hover:fill-white"/>
                            <path d="M31.3335 25L54.6668 40L31.3335 55V25Z" stroke="black" stroke-width="3.33333" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                    </button>
                </div>
            </div>
        </div>
    </div>
</section>
        <section class="flex flex-col py-20 overflow-hidden text-xl text-gray-700 px-36 max-md:px-5">
            <div class="relative w-full mx-auto max-w-[1350px]">
                <div class="max-w-full mx-auto overflow-hidden leading-8 max-md:max-w-full">
                    @lang('community.intro.0').<br />@lang('community.intro.1')
                </div>
                <div class="flex flex-col w-full mt-10 max-md:max-w-full">
                    <h3 class="font-bold max-md:max-w-full">
                        @lang('community.intro.2')
                    </h3>
                    <div role="button" tabindex="0" aria-haspopup="listbox"
                        class="flex py-6">
            
                            <form class="w-full" method="get" action="/community" enctype="multipart/form-data">
                                    <select 
                                        id="country-select"
                                        name="country_iso"
                                        class="flex flex-wrap gap-10 justify-between items-center px-6 py-2.5 text-xl text-gray-700 whitespace-nowrap rounded-3xl border-2 border-indigo-300 border-solid w-full max-w-[582px] max-md:px-5">
                                        @foreach ($countries as $country)
                                            <option value="{{ $country->iso }}"
                                                {{ app('request')->input('country_iso') == $country->iso ? 'selected' : '' }}>
                                                {{ $country->translation }}
                                            </option>
                                        @endforeach
                                    </select>
                                </form>
                        
                    </div>
                </div>
            </div>
        </section>

        <section class="relative overflow-hidden animation-section bg-[#FFFBE5]">
            <div class="relative z-10 flex flex-col-reverse items-center gap-12 py-16 codeweek-container-lg md:flex-row">
                <div class="flex-1">
                    <div class="relative inline-block observer-element">
                        <img class="relative z-10 w-full max-w-xl" loading="lazy" src="/images/community/2.png" />
                        <img class="animation-element move-background duration-[1.5s] absolute top-0 left-0 w-full max-w-xl"
                            loading="lazy" src="/images/shape.png" style="transform: translate(-16px, -24px)" />
                    </div>
                </div>
                <div class="flex-1">
                    <h2 class="text-[#1C4DA1] text-2xl md:text-4xl leading-[44px] font-medium font-['Montserrat'] mb-6">
                        @lang('community.titles.1')
                    </h2>
                    <p class="text-[#333E48] text-lg md:text-xl leading-7 p-0 mb-10">
                        @lang('community.ambassadors')
                    </p>

                </div>
            </div>
            <div class="animation-element move-background duration-[1.5s] absolute z-0 bottom-10 md:bottom-auto md:top-1/3 -right-14 md:-right-36 w-28 md:w-72 h-28 md:h-72 bg-[#F95C22] rounded-full lg:hidden xl:block"
                style="transform: translate(-16px, -24px)"></div>
            <div class="animation-element move-background duration-[1.5s] absolute z-0 bottom-12 right-20 w-28 h-28 hidden xl:block bg-[#F95C22] rounded-full"
                style="transform: translate(-16px, -24px)"></div>
        </section>

        <section class="relative overflow-hidden bg-[#FFFBE5]">
            <div class="absolute w-full h-full bg-blue-gradient md:hidden" style="clip-path: ellipse(170% 90% at 38% 90%);">
            </div>
            <div class="absolute hidden w-full h-full bg-blue-gradient md:block"
                style="clip-path: ellipse(88% 90% at 50% 90%);"></div>
            <div
                class="relative z-10 flex flex-col items-center gap-12 pb-16 codeweek-container-lg md:flex-row pt-28 md:pt-48">
                <div class="flex-1">
                    <h2 class="text-white text-2xl md:text-4xl leading-[44px] font-medium font-['Montserrat'] mb-6">
                        @lang('community.titles.2')
                    </h2>
                    <p class="p-0 mb-10 text-lg leading-7 text-white md:text-xl">
                        {{-- Belgium-teachers for NL --}}
                        @if ($country === 'BE')
                            @lang('community.leading-teachers_be')
                        @else
                            @lang('community.leading-teachers')
                        @endif
                        @lang('community.cta')
                    </p>
                </div>
                <div class="relative flex justify-center flex-1 observer-element">
                    <img class="z-10 w-full duration-700 animation-element fade-scale-bottom" loading="lazy"
                        src="/images/community/3.png" />
                </div>
            </div>
            <div id="mapid"
                style="width: 100%; height: 400px; z-index: 10000; max-width: 1428px; margin:auto; margin-botom: 8rem;">
            </div>
            <div style="display: flex; align-items: center; justify-content: center; margin-bottom: 16px">

                @if (app('request')->input('country_iso'))
                    @foreach ($countries as $country)
                        @if ($country->iso === app('request')->input('country_iso'))
                            @if ($country->facebook)
                                <a href="{{ $country->facebook }}" class="codeweek-orange-button" target="_blank">
                                    @lang('ambassador.visit_the')
                                    <span>@lang('ambassador.local_facebook_page')</span>
                                </a>
                            @endif

                            @if ($country->website)
                                <a href="{{ $country->website }}" class="codeweek-orange-button" target="_blank">
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
                            <img src="{{ $ambassador->avatar }}" class="card-image-avatar">
                        </div>
                        <div class="card-content">
                            <h5 class="card-title">{{ $ambassador->fullName() }}</h5>
                            <p class="card-description">{{ $ambassador->bio }}</p>
                        </div>
                        <div class="card-actions">
                            {{-- Ambassador email --}}
                            @if ($ambassador->email_display)
                                <a href="mailto:{{ $ambassador->email_display }}" class="codeweek-svg-button">
                                    <img src="/images/mail.svg" alt="Twitter">
                                </a>
                            @elseif($ambassador->email)
                                <a href="mailto:{{ $ambassador->email }}" class="codeweek-svg-button">
                                    <img src="/images/mail.svg" alt="Twitter">
                                </a>
                            @endif
                            {{-- Ambassador twitter --}}
                            @if ($ambassador->twitter)
                                <a href="http://twitter.com/{{ $ambassador->twitter }}" target="_blank"
                                    class="codeweek-svg-button">
                                    <img src="/images/x-twitter.svg" alt="Twitter">
                                </a>
                            @endif
                            {{-- Ambassador website --}}
                            @if ($ambassador->website)
                                <a href="{{ $ambassador->website }}" target="_blank" class="codeweek-svg-button">
                                    <img src="/images/globe.svg" alt="Twitter">
                                </a>
                            @endif
                        </div>
                    </div>
                @empty
                    @lang('ambassador.no_ambassadors') :(<br />
                @endforelse
            </div>
        </section>
        
       <svg xmlns="http://www.w3.org/2000/svg" width="119" height="126" viewBox="0 0 119 126" fill="none" class="absolute left-0 z-50">
        <circle cx="125.533" cy="125.533" r="125.533" transform="matrix(-0.952889 0.30332 0.30332 0.952889 74.2422 -157.995)" fill="#99E1F4"/>
        </svg>
        <section class="relative animation-section">
            <div class="absolute w-full h-full bg-white md:hidden" style="clip-path: ellipse(100% 58% at 38% 39%)"></div>
            <div class="absolute hidden w-full h-full bg-white md:block" style="clip-path: ellipse(70% 60% at 50% 40%);">
            </div>
            <div
                class="relative z-10 flex flex-col items-center gap-12 codeweek-container-lg md:flex-row pt-[7rem]">
                <div class="flex-1">
                    <div class="relative inline-block observer-element">
                        <img class="relative z-10 w-full max-w-xl" loading="lazy" src="/images/community/4.png" />
                        <img class="animation-element move-background duration-[1.5s] absolute top-0 left-0 w-full max-w-xl"
                            loading="lazy" src="/images/shape.png" style="transform: translate(-16px, -24px)" />
                    </div>
                </div>
                <div class="flex-1">
                    <h2 class="text-[#1C4DA1] text-2xl md:text-4xl leading-[44px] font-medium font-['Montserrat'] mb-6">
                        @lang('community.titles.3')
                    </h2>
                    <p class="text-[#333E48] text-lg md:text-xl leading-7 p-0 mb-10">
                        @lang('community.edu')
                    </p>
                </div>
            </div>
        </section>
            <svg xmlns="http://www.w3.org/2000/svg" width="94" height="131" viewBox="0 0 94 131" fill="none" class="absolute right-0 z-50">
            <circle cx="64.8986" cy="64.8986" r="64.8986" transform="matrix(-0.952889 0.30332 0.30332 0.952889 107.682 -16)" fill="#410098"/>
            </svg>
        {{-- Display this section only if a country is selected and has specific content --}}
        @php
            $country = app('request')->input('country_iso');
            $supportedCountries = [
                'GR',
                'CY',
                'MT',
                'IT',
                'BG',
                'TR',
                'UA',
                'PL',
                'IE',
                'FR',
                'LU',
                'NL',
                'BE',
                'SK',
                'CZ',
                'NO',
                'IS',
                'FI',
                'SE',
                'PT',
                'ES',
                'LV',
                'LT',
                'HR',
                'SI',
                'DE',
                'AT',
                'CH',
                'RO',
                'MD',
                'DK',
            ];
        @endphp
        @if (in_array($country, $supportedCountries))
            <section class="relative animation-section">
                <div class="absolute w-full h-full bg-white md:hidden" style="clip-path: ellipse(100% 58% at 38% 39%)">
                </div>
                <div class="absolute hidden w-full h-full bg-white md:block"
                    style="clip-path: ellipse(70% 60% at 50% 40%);"></div>
                <div
                    class="relative z-10 flex flex-col-reverse items-center gap-12 py-16 pb-32 codeweek-container-lg md:flex-row md:pb-48">
                    <div class="flex-1">
                        <h2
                            class="text-[#1C4DA1] text-2xl md:text-4xl leading-[44px] font-medium font-['Montserrat'] mb-6">
                            @lang("community.hub_level_{$country}")
                        </h2>
                        <p class="text-[#333E48] text-lg md:text-xl leading-7 p-0 mb-10">
                            @lang("community.hub_desc_{$country}")
                        </p>
                        @if ($country === 'DE')
                            <section class="community_type_section">
                                <div class="community_type">
                                    <div class="text">@lang('community.codeweek_de') </div>
                                </div>
                            </section>
                        @endif
                    </div>
                    <div class="flex-1">
                        <div class="relative inline-block observer-element">
                            <img class="relative z-10 w-full max-w-xl" loading="lazy"
                                src="/images/community/5.png" />
                            <img class="animation-element move-background duration-[1.5s] absolute top-0 left-0 w-full max-w-xl"
                                loading="lazy" src="/images/shape.png" style="transform: translate(-16px, -24px)" />
                        </div>
                    </div>
                </div>
            </section>
        @endif

    @endsection

    @push('extra-css')
        <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"
            integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin="" />
    @endpush
    @push('scripts')
        <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"
            integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>


        {{--    <link href="{{asset('css/MarkerCluster.css')}}" media="screen" rel="stylesheet"/> --}}
        {{--    <link href="{{asset('css/MarkerCluster.Default.css')}}" media="screen" rel="stylesheet"/> --}}

        {{--    <script src="{{asset('js/leaflet.markercluster.js')}}" type="text/javascript"/> --}}
    @endpush


    @section('extra-js')
    <script src="https://cdn.jsdelivr.net/npm/nice-select2@2.1.0/dist/js/nice-select2.js">
    
    </script>
    <script>
                     document.addEventListener('DOMContentLoaded', function() {
                const select = document.getElementById('country-select');
                const niceSelect = NiceSelect.bind(document.getElementById('country-select'), {
                    searchable: true,
                    placeholder: 'Select a country'
                });
                
                // Handle the change event
                select.addEventListener('change', function() {
                    this.closest('form').submit();
                });
            });
            </script>
        <script src="{{ asset('js/countriesGeoCentroids.js') }}" type="text/javascript"></script>
        <script>
            // var map = L.map('mapid').setView([51.505, -0.09], 13);
            //
            // L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
            //     maxZoom: 19,
            //     attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
            // }).addTo(map);

            var mymap = L.map('mapid');

            L.tileLayer(
                'https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token={{ config('codeweek.MAPS_MAPBOX_ACCESS_TOKEN') }}', {
                    maxZoom: 18,
                    attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors, ' +
                        'Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
                    id: 'mapbox/streets-v11',
                    tileSize: 512,
                    zoomOffset: -1
                }).addTo(mymap);


            @foreach ($teachers->groupBy('city_id') as $cityId => $teachersInCity)
                @if ($teachersInCity[0]->city && $teachersInCity[0]->city->latitude && $teachersInCity[0]->city->longitude)
                    var marker = L.marker([{{ $teachersInCity[0]->city->latitude }},
                        {{ $teachersInCity[0]->city->longitude }}]).addTo(mymap);

                    var teachersList = "";
                    @foreach ($teachersInCity as $teacher)
                        teachersList +=
                            "&#9679;&nbsp;<b><a href=\"mailto:{{ $teacher->email }}\">{{ $teacher->firstname }} {{ $teacher->lastname }}</a></b> ({{ $teacher->city->city }}) <br/>{{ implode(', ', $teacher->expertises->pluck('name')->toArray()) }}<br/><br/>";
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


            const countryInfo = centroids.find(ctrds => ctrds.iso === '{{ $country_iso }}');
            if (countryInfo) {
                centerInfo = countryInfo;
            }

            const latlng = new L.LatLng(centerInfo.latitude, centerInfo.longitude);
            mymap.setView(latlng, centerInfo.zoom, {
                animation: true
            });
        </script>
    @endsection
</section>
