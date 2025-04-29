@extends('layout.new_base')

@php
    $list = [
      (object) ['label' => 'Resources', 'href' => '/resources'],
      (object) ['label' => 'Role models', 'href' => '/matchmaking-tool'],
      (object) ['label' => 'Sara Dawson', 'href' => ''],
    ];
@endphp

@section('layout.breadcrumb')
    @include('layout.breadcrumb', ['list' => $list])
@endsection

@section('non-vue-content')
  <style>
    .leaflet-top.leaflet-left {
        display: none;
    }

    .leaflet-tile {
        visibility: inherit;
    }
  </style>
@endsection

@section('content')
    <section id="codeweek-matchmaking-tool" class="font-['Blinker'] overflow-hidden">
        <section class="relative flex overflow-hidden">
            <div class="flex codeweek-container-lg py-10 tablet:py-20">
                <div class="flex flex-col lg:flex-row gap-12 tablet:gap-20 xl:gap-32 2xl:gap-[260px]">
                    <div>
                        <h2 class="text-dark-blue text-[30px] md:text-4xl leading-[44px] font-normal md:font-medium font-['Montserrat'] mb-6">
                            Sara Dawson
                        </h2>
                        <p class="text-[#20262C] font-normal text-2xl p-0 mb-10">
                            About...Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero.
                        </p>

                        <h3 class="text-dark-blue text-[22px] md:text-3xl leading-[36px] font-medium font-['Montserrat'] mb-6">
                            About me
                        </h3>
                        <div class="accordion">
                            <div class="bg-transparent border-b-2 border-solid border-[#A4B8D9]">
                                <div class="py-4 cursor-pointer flex items-center justify-between duration-300 accordion-item-header">
                                    <p class="text-[#20262C] font-semibold text-lg">Introduction</p>
                                    <button class="bg-yellow hover:bg-primary rounded-full min-w-12 min-h-12 duration-300 flex justify-center items-center">
                                        <img class="duration-300" src="/images/digital-girls/arrow.svg" />
                                    </button>
                                </div>
                                <div class="overflow-hidden max-h-0 transition-all duration-300">
                                    <div class="pb-4 pt-2 text-slate-500 text-xl font-normal">
                                        Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent.
                                    </div>
                                </div>
                            </div>
                            <div class="bg-transparent border-b-2 border-solid border-[#A4B8D9]">
                                <div class="py-4 cursor-pointer flex items-center justify-between duration-300 accordion-item-header">
                                    <p class="text-[#20262C] font-semibold text-lg">Why am I volunteering?</p>
                                    <button class="bg-yellow hover:bg-primary rounded-full min-w-12 min-h-12 duration-300 flex justify-center items-center">
                                        <img class="duration-300" src="/images/digital-girls/arrow.svg" />
                                    </button>
                                </div>
                                <div class="overflow-hidden max-h-0 transition-all duration-300">
                                    <div class="pb-4 pt-2 text-slate-500 text-xl font-normal">
                                        Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent.
                                    </div>
                                </div>
                            </div>
                            <div class="bg-transparent border-b-2 border-solid border-[#A4B8D9]">
                                <div class="py-4 cursor-pointer flex items-center justify-between duration-300 accordion-item-header">
                                    <p class="text-[#20262C] font-semibold text-lg">What I can offer</p>
                                    <button class="bg-yellow hover:bg-primary rounded-full min-w-12 min-h-12 duration-300 flex justify-center items-center">
                                        <img class="duration-300" src="/images/digital-girls/arrow.svg" />
                                    </button>
                                </div>
                                <div class="overflow-hidden max-h-0 transition-all duration-300">
                                    <div class="pb-4 pt-2 text-slate-500 text-xl font-normal">
                                        Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent.
                                    </div>
                                </div>
                            </div>
                            <div class="bg-transparent border-b-2 border-solid border-[#A4B8D9]">
                                <div class="py-4 cursor-pointer flex items-center justify-between duration-300 accordion-item-header">
                                    <p class="text-[#20262C] font-semibold text-lg">Fields of interest</p>
                                    <button class="bg-yellow hover:bg-primary rounded-full min-w-12 min-h-12 duration-300 flex justify-center items-center">
                                        <img class="duration-300" src="/images/digital-girls/arrow.svg" />
                                    </button>
                                </div>
                                <div class="overflow-hidden max-h-0 transition-all duration-300">
                                    <div class="pb-4 pt-2 text-slate-500 text-xl font-normal">
                                        Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent.
                                    </div>
                                </div>
                            </div>
                            <div class="bg-transparent border-b-2 border-solid border-[#A4B8D9]">
                                <div class="py-4 cursor-pointer flex items-center justify-between duration-300 accordion-item-header">
                                    <p class="text-[#20262C] font-semibold text-lg">Who I want to work for?</p>
                                    <button class="bg-yellow hover:bg-primary rounded-full min-w-12 min-h-12 duration-300 flex justify-center items-center">
                                        <img class="duration-300" src="/images/digital-girls/arrow.svg" />
                                    </button>
                                </div>
                                <div class="overflow-hidden max-h-0 transition-all duration-300">
                                    <div class="pb-4 pt-2 text-slate-500 text-xl font-normal">
                                        Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent.
                                    </div>
                                </div>
                            </div>
                            <div class="bg-transparent border-b-2 border-solid border-[#A4B8D9]">
                                <div class="py-4 cursor-pointer flex items-center justify-between duration-300 accordion-item-header">
                                    <p class="text-[#20262C] font-semibold text-lg">Stet clita ea et gubergren?</p>
                                    <button class="bg-yellow hover:bg-primary rounded-full min-w-12 min-h-12 duration-300 flex justify-center items-center">
                                        <img class="duration-300" src="/images/digital-girls/arrow.svg" />
                                    </button>
                                </div>
                                <div class="overflow-hidden max-h-0 transition-all duration-300">
                                    <div class="pb-4 pt-2 text-slate-500 text-xl font-normal">
                                        Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent.
                                    </div>
                                </div>
                            </div>
                            <div class="bg-transparent border-b-2 border-solid border-[#A4B8D9]">
                                <div class="py-4 cursor-pointer flex items-center justify-between duration-300 accordion-item-header">
                                    <p class="text-[#20262C] font-semibold text-lg">Consetetur sadipscing elitr, sed diam nonumy eirmod?</p>
                                    <button class="bg-yellow hover:bg-primary rounded-full min-w-12 min-h-12 duration-300 flex justify-center items-center">
                                        <img class="duration-300" src="/images/digital-girls/arrow.svg" />
                                    </button>
                                </div>
                                <div class="overflow-hidden max-h-0 transition-all duration-300">
                                    <div class="pb-4 pt-2 text-slate-500 text-xl font-normal">
                                        Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent.
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="lg:max-w-[460px] w-full">
                        <div class="rounded-xl overflow-hidden border-2 border-[#ADB2B6] mb-4">
                            <img src="/images/matchmaking-tool/tool-detail.png" />
                        </div>
                        <p class="text-[#20262C] font-semibold text-lg p-0 mb-10">Sandra Dawson, Ambassador</p>
                        <p class="text-[#20262C] text-2xl md:text-3xl leading-[36px] font-medium font-['Montserrat'] mb-4 italic">
                            “Quote/ short intro Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do”
                        </p>
                        <div class="border-l-[4px] border-[#F95C22] pl-4">
                            <p class="p-0 text-slate-500 text-xl font-normal">
                                "Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent."
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="relative overflow-hidden">
            <div class="absolute w-full h-full bg-yellow-50 md:hidden" style="clip-path: ellipse(270% 90% at 38% 90%);"></div>
            <div class="absolute w-full h-full bg-yellow-50 hidden md:block lg:hidden" style="clip-path: ellipse(188% 90% at 50% 90%);"></div>
            <div class="absolute w-full h-full bg-yellow-50 hidden lg:block xl:hidden" style="clip-path: ellipse(128% 90% at 50% 90%);"></div>
            <div class="absolute w-full h-full bg-yellow-50 hidden xl:block" style="clip-path: ellipse(93% 90% at 50% 90%);"></div>
            <div class="codeweek-container-lg relative pt-20 pb-16 md:pt-40 md:pb-28">
                <h2 class="text-dark-blue tablet:text-center text-[30px] md:text-4xl leading-7 md:leading-[44px] font-normal md:font-medium font-['Montserrat'] mb-10 tablet:mb-8">
                    Contact details
                </h2>
                <div class="bg-white px-5 py-10 lg:p-16 rounded-[32px] flex flex-col tablet:flex-row w-full gap-10 lg:gap-0">
                    <div class="flex-1">
                        <h3 class="text-dark-blue text-[22px] md:text-4xl leading-7 md:leading-[44px] font-medium font-['Montserrat'] mb-4">
                            Location
                        </h3>
                        <span class="bg-dark-blue text-white py-1 px-4 text-sm font-semibold rounded-full whitespace-nowrap flex items-center gap-2 w-fit mb-6">
                                <img src="/images/star.svg" class="w-4 h-4" />
                                <span>
                                  Can teach Online <span class="font-sans">&</span> In-person
                                </span>
                            </span>
                        <div class="flex gap-4 mb-6">
                            <img src="/images/map.svg" class="w-6 h-6" />
                            <div>
                                <p class="p-0 text-slate-500 text-xl font-normal">28, Foster Avenue</p>
                                <p class="p-0 text-slate-500 text-xl font-normal">Blackrock</p>
                                <p class="p-0 text-slate-500 text-xl font-normal">D04 A021</p>
                                <p class="p-0 text-slate-500 text-xl font-normal">Ireland</p>
                            </div>
                        </div>
                        <div class="flex gap-4 mb-6">
                            <img src="/images/phone.svg" class="w-6 h-6" />
                            <a class="text-dark-blue underline cursor-pointer text-xl font-semibold" href="tel:+353 83 045 87 46">+353 83 045 87 46</a>
                        </div>
                        <div class="flex gap-4 mb-6">
                            <img src="/images/message.svg" class="w-6 h-6" />
                            <a class="text-dark-blue underline cursor-pointer text-xl font-semibold" href="mailto:sara.dawson@company.ie">sara.dawson@company.ie</a>
                        </div>
                        <div class="flex gap-4 mb-6">
                            <img src="/images/profile.svg" class="w-6 h-6" />
                            <a class="text-dark-blue underline cursor-pointer text-xl font-semibold" href="/">Personal site or LinkedIn </a>
                        </div>
                        <div class="text-xl font-semibold text-[#20262C] mb-2">My availability</div>
                        <div class="flex gap-4">
                            <img src="/images/map.svg" class="w-6 h-6" />
                            <div>
                                <p class="p-0 text-slate-500 text-xl font-normal">Mon - Fri</p>
                                <p class="p-0 text-slate-500 text-xl font-normal">Sat - Sun </p>
                                <p class="p-0 text-slate-500 text-xl font-normal">Bank Holidays</p>
                            </div>
                            <div class="ml-4">
                                <p class="p-0 text-slate-500 text-xl font-normal">09:00 - 20:00</p>
                                <p class="p-0 text-slate-500 text-xl font-normal">10:00 - 17:00</p>
                                <p class="p-0 text-slate-500 text-xl font-normal">10:00 – 16:00</p>
                            </div>
                        </div>
                    </div>
                    <div class="flex-1">
                      <div id="map-id" class="relative z-50 w-full h-64 md:h-full rounded-2xl">
                      </div>
                    </div>
                </div>
            </div>
        </section>
    </section>
@endsection

@push('extra-css')
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"
        integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin="" />
@endpush

@push('scripts')
    <script
      src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"
      integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo="
      crossorigin=""
    ></script>
@endpush

@push('scripts')
    <script>
      const myMap = L.map('map-id');
      L.tileLayer(
      'https://api.mapbox.com/styles/v1/mapbox/streets-v11/tiles/{z}/{x}/{y}?access_token={{ config('codeweek.MAPS_MAPBOX_ACCESS_TOKEN') }}', {
          maxZoom: 18,
          attribution: '© <a href="https://www.mapbox.com/">Mapbox</a>',
          tileSize: 512,
          zoomOffset: -1,
          zoomControl: false
        }
      ).addTo(myMap);

      // Define Orange Marker SVG (Selected)
      const markerIcon = L.icon({
        iconUrl: 'data:image/svg+xml;base64,' + btoa(`
          <svg xmlns="http://www.w3.org/2000/svg" width="44" height="62" viewBox="0 0 44 62" fill="none">
              <path d="M21.6982 0C9.71943 0 0 8.91045 0 19.89C0 37.57 21.6982 61.88 21.6982 61.88C21.6982 61.88 43.3964 37.57 43.3964 19.89C43.3964 8.91045 33.6769 0 21.6982 0ZM21.6982 30.94C19.9816 30.94 18.3035 30.4215 16.8762 29.4502C15.4489 28.4788 14.3365 27.0982 13.6796 25.4829C13.0227 23.8676 12.8508 22.0902 13.1857 20.3754C13.5206 18.6606 14.3472 17.0855 15.561 15.8492C16.7748 14.6129 18.3213 13.771 20.0049 13.4299C21.6886 13.0888 23.4337 13.2638 25.0196 13.9329C26.6055 14.602 27.961 15.735 28.9147 17.1888C29.8684 18.6425 30.3775 20.3516 30.3775 22.1C30.3749 24.4437 29.4597 26.6907 27.8326 28.348C26.2054 30.0053 23.9993 30.9374 21.6982 30.94Z" fill="#F95C22"/>
          </svg>
        `),
        iconSize: [44, 62],
        iconAnchor: [22, 62],
        popupAnchor: [0, -60]
      });

      const coordinate = {
        latitude: 51,
        longitude: 10,
      };

      myMap.setView([coordinate.latitude, coordinate.longitude], 15);
      L.marker([coordinate.latitude, coordinate.longitude], { icon: markerIcon }).addTo(myMap);
    </script>
@endpush

@push('scripts')
    <script type="text/javascript">
      const accordionItemHeaders = document.querySelectorAll(".accordion-item-header");

      accordionItemHeaders.forEach(accordionItemHeader => {
        accordionItemHeader.addEventListener("click", event => {

          accordionItemHeader.classList.toggle("active");

          const button = accordionItemHeader.querySelector("button");

          button.classList.toggle("!bg-primary");
          button.classList.toggle("!hover:bg-hover-orange");

          const arrowIcon = accordionItemHeader.querySelector("svg");

          arrowIcon.classList.toggle("rotate-180");


          const accordionItemBody = accordionItemHeader.nextElementSibling;
          if(accordionItemHeader.classList.contains("active")) {
            accordionItemBody.style.maxHeight = accordionItemBody.scrollHeight + "px";
          }
          else {
            accordionItemBody.style.maxHeight = 0;
          }

        });
      });
    </script>
@endpush