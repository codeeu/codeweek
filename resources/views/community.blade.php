@extends('layout.new_base')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/nice-select2@2.1.0/dist/css/nice-select2.css">
@section('non-vue-content')
    <section id="codeweek-ambassadors-page" class="codeweek-page font-['Blinker']">
        @php
            $list = [(object) ['label' => __('community.titles.0'), 'href' => '']];
        @endphp
    @section('layout.breadcrumb')
        @include('layout.breadcrumb', ['list' => $list])
    @endsection

    <style>

        .nice-select .option.selected {
            color: black!important;
        }
        .leaflet-top.leaflet-left {
            display: none;
        }

        #map-controls {
            @apply absolute top-4 right-4 z-50 flex flex-col gap-2;
        }

        #custom-zoom,
        #home-button {
            @apply cursor-pointer bg-white rounded-lg p-2 shadow-md hover:bg-gray-200 transition-all;
        }

        .hero-image {
            clip-path: ellipse(71% 73% at 40% 20%);
        }

        @media (min-width: 768px) {
            .hero-image {
                clip-path: ellipse(70% 120% at 70% -2%);
            }
        }

        .nice-select.open .nice-select-dropdown {
            opacity: 1;
            pointer-events: auto;
            transform: scale(1) translateY(0);
            width: 100%;
            z-index: 9999999;
        }

        .nice-select .option.focus,
        .nice-select .option.selected.focus {
            background-color: #1C4DA1;
            color: white;
        }

        .nice-select .option:hover {
            background-color: #F95C22;
            color: black;
        }

        .nice-select ul {
            margin: 0px;
        }

        /* Style the scrollbar */
        #teacher-details::-webkit-scrollbar {
            border-radius: 8px;
        }

        /* Style the scrollbar thumb (draggable part) */
        #teacher-details::-webkit-scrollbar-thumb {
            background: #1C4DA1;
            border-radius: 6px;
            min-height: 150px !important;
            /* Increased minimum height */
        }

        /* Firefox scrollbar styling */
        #teacher-details {
            scrollbar-width: auto;
            scrollbar-color: #1C4DA1 #D6D8DA;
        }

        /* Style the scrollbar track (background) */
        #teacher-details::-webkit-scrollbar-track {
            background: #D6D8DA;
            border-radius: 8px;
        }
    </style>

    <section class="relative flex flex-col overflow-hidden bg-violet-gradient">
        <div class="relative w-full transition-all">
            <div
                class="relative flex flex-col justify-end w-full overflow-hidden md:p-0 md:flex-row md:items-center h-[760px]">
                <div class="relative flex items-center justify-start w-full h-full duration-1000 home-activity">
                    <!-- Image with clip-path -->
                    <img class="absolute top-0 right-0 w-full md:w-[60vw] h-[50%]  md:h-full object-cover transition-all duration-300 hero-image"
                        src="images/community/mobile-header.png"
                        srcset="images/community/mobile-header.png 768w, images/community/1.jpg 769w" />
                    <div
                        class="flex flex-col-reverse items-center justify-between w-full mx-auto max-md:h-full md:flex-row codeweek-container-lg">
                        <div class="flex items-center justify-center w-full md:w-1/2">
                            <div
                                class="px-6 py-10 md:px-14 md:py-[4.5rem] bg-white rounded-[32px] z-10 w-full max-w-[40rem] h-fit relative -top-6">
                                <h4
                                    class="text-[#1C4DA1] text-[30px] md:text-[60px] leading-9 md:leading-[72px] font-normal font-['Montserrat'] mb-4">
                                    @lang('community.titles.0')
                                </h4>
                                <p
                                    class="text-xl  md:text-2xl leading-8 text-[#333E48] p-0 mb-4 max-md:max-w-full max-w-[525px]">
                                    A vibrant network of educators, volunteers and ambassadors driving EU Code Week forward. Connect, collaborate and inspire the next generation of digital innovators in your country — and beyond.
                                </p>
                                <a class="hidden bg-primary hover:bg-hover-orange rounded-full py-4 px-6 md:px-10 font-semibold text-base w-full md:w-auto text-center text-[#20262C] transition-all duration-300"
                                    href="#">
                                    Learn More
                                </a>
                            </div>
                        </div>
                        <button class="items-center justify-center hidden w-full md:w-1/2 group max-md:h-full">
                            <svg class="z-50 transition-all duration-300" width="80" height="80"
                                viewBox="0 0 80 80" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <rect width="80" height="80" rx="40"
                                    class="transition-all duration-300 fill-[#FFD700] group-hover:fill-white" />
                                <path d="M31.3335 25L54.6668 40L31.3335 55V25Z" stroke="black" stroke-width="3.33333"
                                    stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="flex flex-col py-8 text-xl text-gray-700 lg:py-20 px-36 max-md:px-5">
        <div class="relative w-full mx-auto max-w-[1350px]">
            <div class="max-w-full mx-auto overflow-hidden leading-8 max-md:max-w-full">
                @lang('community.intro.0').<br />@lang('community.intro.1')
            </div>
            <div class="flex flex-col w-full mt-10 max-md:max-w-full">
                <h3 class="font-bold max-md:max-w-full">
                    @lang('community.intro.2')
                </h3>
                <div role="button" tabindex="0" aria-haspopup="listbox" class="flex pt-2 pb-6">

                    <form class="w-full" method="get" action="/community" enctype="multipart/form-data">
                        <select id="country-select" name="country_iso"
                            class="flex flex-wrap gap-10 justify-between items-center px-6 py-2.5 text-xl text-gray-700 whitespace-nowrap rounded-3xl border-2 border-secondary border-solid w-full max-w-[582px] max-md:px-5 h-[50px]">
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
                <h4 class="text-[#1C4DA1] text-2xl md:text-4xl leading-[44px] font-medium font-['Montserrat'] mb-6">
                    @lang('community.titles.1')
                </h4>
                <p class="text-[#333E48] text-lg md:text-xl leading-7 p-0 mb-10">
                    @lang('community.ambassadors')
                </p>

            </div>
        </div>

        <div class="grid grid-cols-2 gap-8 mx-auto mb-12 max-lg:grid-cols-1 codeweek-container-lg max-xl:px-5">
            @forelse ($ambassadors as $ambassador)
                <div class="relative z-50 flex p-4 bg-transparent border-2 border-solid rounded-2xl border-secondary max-sm:w-full "
                    role="article" aria-labelledby="profile-name">
                    <img class="object-cover w-32 h-32" src="{{ $ambassador->avatar }}" class="card-image-avatar">
                    <div class="flex flex-col flex-1 ml-8 max-sm:ml-8">
                        <div class="flex flex-col gap-1 mt-1">
                            <h4 id="profile-name" class="text-2xl font-medium leading-7 text-blue-800">
                                {{ $ambassador->fullName() }}</h4>
                            <p class="text-lg font-medium leading-6 text-gray-700">{{ $ambassador->bio }}</p>
                        </div>
                        <div class="flex items-center w-full gap-4 mt-4">
                            @if ($ambassador->email)
                                <a class="group flex gap-2 items-start my-auto text-base font-semibold leading-none text-[#1C4DA1] hover:text-white overflow-hidden px-6 w-auto whitespace-nowrap py-2.5 rounded-3xl border-2 border-[#1C4DA1] border-solid hover:bg-[#1C4DA1]"
                                    href="mailto:{{ $ambassador->email }}">
                                    <span class="my-auto">Get in touch</span>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                        viewBox="0 0 16 16" fill="none"
                                        class="text-[#1C4DA1] group-hover:text-white">
                                        <path d="M3.11865 8H12.452" stroke="currentColor" stroke-width="1.33333"
                                            stroke-linecap="round" stroke-linejoin="round"></path>
                                        <path d="M7.78516 3.33337L12.4518 8.00004L7.78516 12.6667" stroke="currentColor"
                                            stroke-width="1.33333" stroke-linecap="round" stroke-linejoin="round">
                                        </path>
                                    </svg>
                                </a>
                            @endif
                            @if ($ambassador->twitter)
                                <a class="group" target="_blank" href="http://twitter.com/{{ $ambassador->twitter }}">
                                    <svg width="40" height="40" viewBox="0 0 40 40" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <rect width="40" height="40" rx="20" fill="#E8EDF6"
                                            class="group-hover:fill-[#1C4DA1] transition-colors duration-300"></rect>
                                        <g clip-path="url(#clip0_671_8155)">
                                            <mask id="mask0_671_8155" style="mask-type:luminance"
                                                maskUnits="userSpaceOnUse" x="8" y="8" width="24" height="24">
                                                <path d="M8 8H32V32H8V8Z" fill="white"></path>
                                            </mask>
                                            <g mask="url(#mask0_671_8155)">
                                                <path
                                                    d="M24.8875 12.0001H27.4946L21.7996 18.7769L28.5 28.0001H23.2543L19.1427 22.4074L14.4434 28.0001H11.8339L17.9248 20.7491L11.5 12.0013H16.8793L20.5901 17.1123L24.8875 12.0001ZM23.9707 26.3758H25.4157L16.09 13.5398H14.5406L23.9707 26.3758Z"
                                                    class="fill-[#000000] group-hover:fill-[#ffffff]"></path>
                                            </g>
                                        </g>
                                        <defs>
                                            <clipPath id="clip0_671_8155">
                                                <rect width="24" height="24" fill="white"
                                                    transform="translate(8 8)"></rect>
                                            </clipPath>
                                        </defs>
                                    </svg>

                                </a>
                            @endif
                        </div>
                    </div>
                </div>
            @empty
              
            @endforelse
        </div>



        <div class="animation-element move-background duration-[1.5s] absolute z-0 bottom-10 md:bottom-auto md:top-1/3 -right-14 md:-right-36 w-28 md:w-72 h-28 md:h-72 bg-[#F95C22] rounded-full lg:hidden xl:block"
            style="transform: translate(-16px, -24px)"></div>
        <div class="animation-element move-background duration-[1.5s] absolute z-0 bottom-12 right-20 w-28 h-28 hidden xl:block bg-[#F95C22] rounded-full"
            style="transform: translate(-16px, -24px)"></div>
    </section>
    <section class="relative overflow-hidden bg-[#FFFBE5]">
        <div class="absolute w-full h-full bg-blue-gradient md:hidden"
            style="clip-path: ellipse(170% 90% at 38% 90%);">
        </div>
        <div class="absolute hidden w-full h-full bg-blue-gradient md:block"
            style="clip-path: ellipse(88% 90% at 50% 90%);"></div>
        <div
            class="relative z-10 flex flex-col items-center gap-12 pb-16 codeweek-container-lg md:flex-row pt-28 md:pt-48">
            <div class="flex-1">
                <h4 class="text-white text-2xl md:text-4xl leading-[44px] font-medium font-['Montserrat'] mb-6">
                    @lang('community.titles.2')
                </h4>
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
        <div
            class="flex flex-col md:flex-row w-full max-w-[1428px] h-auto md:h-[642px] items-center  rounded-lg mt-16 mx-auto mb-8 px-0 md:px-5 xl:px-0 md:pl-2">
            <!-- Map Container -->
            <div id="mapid"
                class="w-full h-full rounded-tl-lg rounded-bl-lg md:rounded-tl-lg max-md:rounded-none max-md:h-[386px] relative">
                <div style="z-index: 999;" id="map-controls" class="absolute z-50 flex flex-col top-4 left-2">
                    <!-- Home Button -->
                    <div id="home-button" class="pb-2 cursor-pointer group">
                        <svg width="40" height="40" viewBox="0 0 40 40" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <rect width="40" height="40" rx="8"
                                class="fill-white transition-colors duration-300 group-hover:fill-[#1C4DA1]" />
                            <path
                                d="M17 30V20H23V30M11 17L20 10L29 17V28C29 28.5304 28.7893 29.0391 28.4142 29.4142C28.0391 29.7893 27.5304 30 27 30H13C12.4696 30 11.9609 29.7893 11.5858 29.4142C11.2107 29.0391 11 28.5304 11 28V17Z"
                                class="stroke-[#414141] group-hover:stroke-[#ffffff]" stroke-width="2"
                                stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                    </div>

                    <!-- Zoom In Button -->
                    <div id="zoom-in" class="pb-2 cursor-pointer group">
                        <svg width="40" height="40" viewBox="0 0 40 40" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <rect width="40" height="40" rx="8"
                                class="fill-white transition-colors duration-300 group-hover:fill-[#1C4DA1]" />
                            <path d="M20 13V27M13 20H27" class="stroke-[#414141] group-hover:stroke-[#ffffff]"
                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>

                    </div>

                    <!-- Zoom Out Button -->
                    <div id="zoom-out" class="pb-2 cursor-pointer group">
                        <svg width="40" height="40" viewBox="0 0 40 40" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <rect width="40" height="40" rx="8"
                                class="fill-white transition-colors duration-300 group-hover:fill-[#1C4DA1]" />
                            <path d="M13 20H27" class="stroke-[#414141] group-hover:stroke-[#ffffff]" stroke-width="2"
                                stroke-linecap="round" stroke-linejoin="round" />
                        </svg>

                    </div>
                </div>

            </div>
            <div id="teacher-details"
                class="w-full max-w-full lg:max-w-[429px] md:overflow-y-scroll md:rounded-tr-lg rounded-none md:rounded-br-lg h-full">
            </div>
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
    </section>

    <svg xmlns="http://www.w3.org/2000/svg" width="119" height="126" viewBox="0 0 119 126" fill="none"
        class="absolute left-0 z-50">
        <circle cx="125.533" cy="125.533" r="125.533"
            transform="matrix(-0.952889 0.30332 0.30332 0.952889 74.2422 -157.995)" fill="#99E1F4" />
    </svg>
    <section class="relative bg-white animation-section">
        <div class="absolute w-full h-full bg-white md:hidden" style="clip-path: ellipse(100% 58% at 38% 39%)"></div>
        <div class="absolute hidden w-full h-full bg-white md:block" style="clip-path: ellipse(70% 60% at 50% 40%);">
        </div>
        <div class="relative z-10 flex flex-col items-center gap-12 codeweek-container-lg md:flex-row pt-[7rem]">
            <div class="flex-1">
                <div class="relative inline-block observer-element">
                    <img class="relative z-10 w-full max-w-xl" loading="lazy" src="/images/community/4.png" />
                    <img class="animation-element move-background duration-[1.5s] absolute top-0 left-0 w-full max-w-xl"
                        loading="lazy" src="/images/shape.png" style="transform: translate(-16px, -24px)" />
                </div>
            </div>
            <div class="flex-1">
                <h4 class="text-[#1C4DA1] text-2xl md:text-4xl leading-[44px] font-medium font-['Montserrat'] mb-6">
                    @lang('community.titles.3')
                </h4>
                <p class="text-[#333E48] text-lg md:text-xl leading-7 p-0 mb-10">
                    @lang('community.edu')
                </p>
            </div>
        </div>
    </section>
    <svg xmlns="http://www.w3.org/2000/svg" width="94" height="131" viewBox="0 0 94 131" fill="none"
        class="absolute right-0 z-50">
        <circle cx="64.8986" cy="64.8986" r="64.8986"
            transform="matrix(-0.952889 0.30332 0.30332 0.952889 107.682 -16)" fill="#410098" />
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
        <section class="relative bg-white animation-section">
            <div class="absolute w-full h-full bg-white md:hidden" style="clip-path: ellipse(100% 58% at 38% 39%)">
            </div>
            <div class="absolute hidden w-full h-full bg-white md:block"
                style="clip-path: ellipse(70% 60% at 50% 40%);"></div>
            <div
                class="relative z-10 flex flex-col-reverse items-center gap-12 py-16 pb-32 codeweek-container-lg md:flex-row md:pb-48">
                <div class="flex-1">
                    <h4
                        class="text-[#1C4DA1] text-2xl md:text-4xl leading-[44px] font-medium font-['Montserrat'] mb-6">
                        @lang("community.hub_level_{$country}")
                    </h4>
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
                        <img class="relative z-10 w-full max-w-xl" loading="lazy" src="/images/community/5.png" />
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
    <script src="https://cdn.jsdelivr.net/npm/nice-select2@2.1.0/dist/js/nice-select2.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Initialize Nice Select for the country select element
            const select = document.getElementById('country-select');
            const niceSelect = NiceSelect.bind(select, {
                searchable: true,
                placeholder: 'Select a country'
            });
            // Handle the change event to submit the form
            select.addEventListener('change', function() {
                this.closest('form').submit();
            });

            // Initialize the Leaflet map
            var mymap = L.map('mapid');
            L.tileLayer(
                'https://api.mapbox.com/styles/v1/mapbox/streets-v11/tiles/{z}/{x}/{y}?access_token={{ config('codeweek.MAPS_MAPBOX_ACCESS_TOKEN') }}', {
                    maxZoom: 18,
                    attribution: '© <a href="https://www.mapbox.com/">Mapbox</a>',
                    tileSize: 512,
                    zoomOffset: -1,
                    zoomControl: false
                }
            ).addTo(mymap);

            // Define Blue Marker SVG (Default)
            var blueIcon = L.icon({
                iconUrl: 'data:image/svg+xml;base64,' + btoa(`
                    <svg xmlns="http://www.w3.org/2000/svg" width="44" height="62" viewBox="0 0 44 62" fill="none">
                        <path d="M21.6982 0C9.71943 0 0 8.79472 0 19.6317C0 37.0821 21.6982 61.0764 21.6982 61.0764C21.6982 61.0764 43.3964 37.0821 43.3964 19.6317C43.3964 8.79472 33.6769 0 21.6982 0ZM21.6982 30.5382C19.9816 30.5382 18.3035 30.0265 16.8762 29.0677C15.4489 28.109 14.3365 26.7463 13.6796 25.152C13.0227 23.5577 12.8508 21.8033 13.1857 20.1108C13.5206 18.4183 14.3472 16.8636 15.561 15.6433C16.7748 14.4231 18.3213 13.5921 20.0049 13.2554C21.6886 12.9188 23.4337 13.0916 25.0196 13.752C26.6055 14.4123 27.961 15.5307 28.9147 16.9655C29.8684 18.4004 30.3775 20.0873 30.3775 21.813C30.3749 24.1263 29.4597 26.3441 27.8326 27.9798C26.2054 29.6156 23.9993 30.5357 21.6982 30.5382Z" fill="#1254C5"/>
                    </svg>
                `),
                iconSize: [44, 62],
                iconAnchor: [22, 62],
                popupAnchor: [0, -60]
            });

            // Define Orange Marker SVG (Selected)
            var orangeIcon = L.icon({
                iconUrl: 'data:image/svg+xml;base64,' + btoa(`
                    <svg xmlns="http://www.w3.org/2000/svg" width="44" height="62" viewBox="0 0 44 62" fill="none">
                        <path d="M21.6982 0C9.71943 0 0 8.91045 0 19.89C0 37.57 21.6982 61.88 21.6982 61.88C21.6982 61.88 43.3964 37.57 43.3964 19.89C43.3964 8.91045 33.6769 0 21.6982 0ZM21.6982 30.94C19.9816 30.94 18.3035 30.4215 16.8762 29.4502C15.4489 28.4788 14.3365 27.0982 13.6796 25.4829C13.0227 23.8676 12.8508 22.0902 13.1857 20.3754C13.5206 18.6606 14.3472 17.0855 15.561 15.8492C16.7748 14.6129 18.3213 13.771 20.0049 13.4299C21.6886 13.0888 23.4337 13.2638 25.0196 13.9329C26.6055 14.602 27.961 15.735 28.9147 17.1888C29.8684 18.6425 30.3775 20.3516 30.3775 22.1C30.3749 24.4437 29.4597 26.6907 27.8326 28.348C26.2054 30.0053 23.9993 30.9374 21.6982 30.94Z" fill="#F95C22"/>
                    </svg>
                `),
                iconSize: [44, 62],
                iconAnchor: [22, 62],
                popupAnchor: [0, -60]
            });

            // Global variables to store markers and teachers
            var markers = {};
            var selectedMarker = null;
            var allTeachers = [];

            // Function to populate teacher information in the right sidebar
            function populateTeacherInfo(teachers, city = null) {
                let teacherDetails =
                    `<h3 class="hidden mb-3 text-lg font-bold">${city ? 'Teachers in ' + city : 'Teachers in Selected Country'}</h3>`;
                if (city) {
                    teacherDetails +=
                        `<button onclick="populateTeacherInfo(allTeachers)" class="hidden text-blue-600 hover:underline">Show All Teachers</button>`;
                }
                teacherDetails +=
                    `<ul class="m-0 relative z-50 list-none bg-white h-auto h-[400px] md:h-[642px] overflow-x-scroll md:overflow-x-hidden overflow-y-hidden md:overflow-y-scroll flex flex-row md:flex-col">`;
                teachers.forEach(function(teacher) {
                    let shortBio = teacher.bio ? teacher.bio.split(' ').slice(0, 14).join(' ') :
                        'No bio available';
                    let fullBio = teacher.bio || 'No bio available';
                    teacherDetails += `
                        <li data-city="${teacher.city}" class="flex flex-col-reverse max-md:justify-end justify-between min-w-[353px] md:flex-row flex gap-4 items-start p-6 w-11/12 md:w-full h-full 
                            md:border-l-[5px] md:border-l-orange-500 hover:md:border-l-[#1C4DA1]
                            max-md:border-t-[5px] max-md:border-t-orange-500 hover:max-md:border-t-orange-500 hover:max-md:border-t-transparent hover:max-md:bg-primary-[#1C4DA1]
                            max-md:border-r-2 max-md:border-r-[#D6D8DA] md:border-b-2 md:border-b-[#D6D8DA] hover:cursor-pointer">
                            <div class="flex flex-col justify-center">
                                <div class="flex flex-col justify-center w-full font-semibold">
                                    <h4 class="text-xl leading-snug text-black">${teacher.firstname} ${teacher.lastname}</h4>
                                    <span class="text-sm text-gray-600">${teacher.city ? teacher.city + ', ' : ''}${teacher.country_iso}</span>
                                    ${teacher.expertises && teacher.expertises.length > 0 ? `
                                            <div class="flex items-center w-full gap-1 mt-1 text-sm leading-none text-gray-700">
                                                <span class="my-auto font-blinker text-sm font-semibold leading-[20px]">
                                                    ${teacher.expertises.join(', ')}
                                                </span>
                                            </div>` : ''
                                    }
                                </div>
                                <div class="mt-2 text-[16px] leading-6 text-black">
                                    <span class="font-[Blinker] text-[16px] font-normal leading-[22px] text-[#333E48]" data-expanded="false">${shortBio}...</span>
                                    <!-- Removed inline onclick; toggle via event listener -->
                                    <button class="font-semibold text-[#1C4DA1] underline toggle-bio" data-full-bio="${fullBio}">Read full bio</button>
                                </div>
                                <div class="flex items-center w-full gap-4 pt-2 mt-2">
                                    <a href="mailto:${teacher.email}" class="group flex gap-2 items-start my-auto text-base font-semibold leading-none text-[#1C4DA1] hover:text-white overflow-hidden px-6 py-2.5 rounded-3xl border-2 border-[#1C4DA1] border-solid hover:bg-[#1C4DA1]">
                                        <span class="my-auto">Get in touch</span>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16" fill="none" class="text-[#1C4DA1] group-hover:text-white">
                                            <path d="M3.11865 8H12.452" stroke="currentColor" stroke-width="1.33333" stroke-linecap="round" stroke-linejoin="round"/>
                                            <path d="M7.78516 3.33337L12.4518 8.00004L7.78516 12.6667" stroke="currentColor" stroke-width="1.33333" stroke-linecap="round" stroke-linejoin="round"/>
                                        </svg>
                                    </a>
                                    <a class="group" target="_blank" href="https://twitter.com/${teacher.twitter}">
                                         <svg width="40" height="40" viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <rect width="40" height="40" rx="20" fill="#E8EDF6" class="group-hover:fill-[#1C4DA1] transition-colors duration-300"/>
                                        <g clip-path="url(#clip0_671_8155)">
                                        <mask id="mask0_671_8155" style="mask-type:luminance" maskUnits="userSpaceOnUse" x="8" y="8" width="24" height="24">
                                        <path d="M8 8H32V32H8V8Z" fill="white"/>
                                        </mask>
                                        <g mask="url(#mask0_671_8155)">
                                        <path d="M24.8875 12.0001H27.4946L21.7996 18.7769L28.5 28.0001H23.2543L19.1427 22.4074L14.4434 28.0001H11.8339L17.9248 20.7491L11.5 12.0013H16.8793L20.5901 17.1123L24.8875 12.0001ZM23.9707 26.3758H25.4157L16.09 13.5398H14.5406L23.9707 26.3758Z" class="fill-[#000000] group-hover:fill-[#ffffff]" />
                                        </g>
                                        </g>
                                        <defs>
                                        <clipPath id="clip0_671_8155">
                                        <rect width="24" height="24" fill="white" transform="translate(8 8)"/>
                                        </clipPath>
                                        </defs>
                                        </svg>

                                    </a>
                                </div>
                            </div>
                            ${ teacher.avatar_path 
                                ? `<img src="${teacher.avatar_path}" alt="Avatar" class="object-cover w-[88px] h-[88px] border-2 border-[#DBECF0] border-solid rounded-full">`
                                : '' }
                        </li>
                    `;
                });
                teacherDetails += `</ul>`;
                document.getElementById('teacher-details').innerHTML = teacherDetails;

                // Attach event listeners to toggle bio buttons
                document.querySelectorAll('#teacher-details button.toggle-bio').forEach(function(btn) {
                    btn.addEventListener('click', function(event) {
                        event.stopPropagation(); // Prevent the li's click event
                        const bioText = btn.previousElementSibling;
                        const fullBio = btn.getAttribute('data-full-bio');
                        if (bioText.dataset.expanded === "true") {
                            bioText.innerHTML = fullBio.split(' ').slice(0, 14).join(' ') + '...';
                            bioText.dataset.expanded = "false";
                            btn.innerHTML = 'Read full bio';
                        } else {
                            bioText.innerHTML = fullBio;
                            bioText.dataset.expanded = "true";
                            btn.innerHTML = 'Read Less';
                        }
                    });
                });

                // Add click event listener to each teacher list item to highlight the corresponding marker
                document.querySelectorAll('#teacher-details li').forEach(function(li) {
                    li.addEventListener('click', function() {
                        const teacherCity = li.getAttribute('data-city');
                        for (const key in markers) {
                            const marker = markers[key];
                            if (marker.cityName === teacherCity) {
                                if (selectedMarker && selectedMarker !== marker) {
                                    selectedMarker.setIcon(blueIcon);
                                }
                                marker.setIcon(orangeIcon);
                                selectedMarker = marker;
                                mymap.panTo(marker.getLatLng());
                                break;
                            }
                        }
                    });
                });
            }

            // Attach event listener to the Home icon to reset the filter
            document.getElementById('home-button').addEventListener('click', function() {
                // Reset teacher filter to show all teachers
                populateTeacherInfo(allTeachers);
                // Reset all markers to blue and clear the selected marker
                for (const key in markers) {
                    markers[key].setIcon(blueIcon);
                }
                selectedMarker = null;
                // Reset map view to default center
                let centerInfo = {
                    latitude: 51,
                    longitude: 10,
                    zoom: 5
                };
                mymap.setView([centerInfo.latitude, centerInfo.longitude], centerInfo.zoom);
            });

            // Populate the global teachers array from PHP data
            @foreach ($teachers->groupBy('city_id') as $cityId => $teachersInCity)
                @foreach ($teachersInCity as $teacher)
                    allTeachers.push({
                        firstname: "{{ $teacher->firstname }}",
                        lastname: "{{ $teacher->lastname }}",
                        email: "{{ $teacher->email }}",
                        country_iso: "{{ $teacher->country_iso }}",
                        twitter: "{{ $teacher->twitter }}",
                        website: "{{ $teacher->website }}",
                        bio: "{{ $teacher->bio }}",
                        avatar_path: "{{ $teacher->avatar_path }}",
                        city: "{{ $teacher->city->city ?? 'N/A' }}",
                        latitude: "{{ $teacher->city->latitude ?? '' }}",
                        longitude: "{{ $teacher->city->longitude ?? '' }}",
                        expertises: @json($teacher->expertises->pluck('name')->toArray())
                    });
                @endforeach
            @endforeach

            // Initially populate teacher info with all teachers
            populateTeacherInfo(allTeachers);

            // Define default map center and zoom and set the view
            let centerInfo = {
                latitude: 51,
                longitude: 10,
                zoom: 5
            };
            mymap.setView([centerInfo.latitude, centerInfo.longitude], centerInfo.zoom);

            // Loop through teachers and place markers on the map
            @foreach ($teachers->groupBy('city_id') as $cityId => $teachersInCity)
                @if ($teachersInCity[0]->city && $teachersInCity[0]->city->latitude && $teachersInCity[0]->city->longitude)
                    var cityId = "{{ $cityId }}";
                    var marker = L.marker(
                        [{{ $teachersInCity[0]->city->latitude }},
                        {{ $teachersInCity[0]->city->longitude }}], {
                            icon: blueIcon
                        }
                    ).addTo(mymap);

                    // Store the city name on the marker for later matching
                    marker.cityName = "{{ $teachersInCity[0]->city->city }}";
                    markers[cityId] = marker;

                    var teacherList = [
                        @foreach ($teachersInCity as $teacher)
                            {
                                firstname: "{{ $teacher->firstname }}",
                                lastname: "{{ $teacher->lastname }}",
                                email: "{{ $teacher->email }}",
                                country_iso: "{{ $teacher->country_iso }}",
                                twitter: "{{ $teacher->twitter }}",
                                website: "{{ $teacher->website }}",
                                bio: "{{ $teacher->bio }}",
                                avatar_path: "{{ $teacher->avatar_path }}",
                                city: "{{ $teacher->city->city ?? 'N/A' }}",
                                expertises: @json($teacher->expertises->pluck('name')->toArray())
                            },
                        @endforeach
                    ];

                    // Wrap the marker click event handler in an IIFE to capture the current marker data correctly
                    marker.on('click', (function(marker, teacherList, cityName) {
                        return function() {
                            if (selectedMarker && selectedMarker !== marker) {
                                selectedMarker.setIcon(blueIcon);
                            }
                            marker.setIcon(orangeIcon);
                            selectedMarker = marker;
                            populateTeacherInfo(teacherList, cityName);
                        };
                    })(marker, teacherList, "{{ $teachersInCity[0]->city->city }}"));
                @endif
            @endforeach

            // Adjust map center based on country centroids if available
            if (typeof centroids !== 'undefined') {
                const countryInfo = centroids.find(function(ctrds) {
                    return ctrds.iso === '{{ $country_iso }}';
                });
                if (countryInfo) {
                    centerInfo = countryInfo;
                }
            }
            mymap.setView([centerInfo.latitude, centerInfo.longitude], centerInfo.zoom);
        });
    </script>
    <script src="{{ asset('js/countriesGeoCentroids.js') }}" type="text/javascript"></script>
@endsection

</section>
