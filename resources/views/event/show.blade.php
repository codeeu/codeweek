@extends('layout.new_base')

<x-tailwind></x-tailwind>

@section('title', $event->title)

@php
    $list = [
        (object) ['label' => 'Activities & Events', 'href' => ''],
    ];
    $event->load('themes');
    $event->load('audiences');
    $event->load('tags');
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
        .leaflet-pane {
          z-index: 10;
        }

        #map-controls {
            @apply absolute top-4 right-4 z-50 flex flex-col gap-2;
        }
    </style>
@endsection

@section('content')
    <section id="codeweek-show-event-page" class="font-['Blinker'] overflow-hidden">

        @can('approve', $event)
            <div>
              @if($event->certificate_url)
                <reported-event :event="{{$event}}"></reported-event>
            @else
                <moderate-event :event="{{$event}}" :pending-counter="{{auth()->user()->getEventsToReviewCount()}}"
                                :next-pending="'{{optional(auth()->user()->getNextPendingEvent($event))->path()}}'"></moderate-event>
            @endif
            </div>
        @endcan

        @can('report', $event)
            <report-event :event="{{$event}}"></report-event>
        @endcan

        @if(Auth::check() &&
            $event->creator_id === auth()->user()->id &&
            is_null($event->reported_at) &&
            $event->status === 'PENDING')

            <div class="event-is-pending">
                <strong>@lang('eventdetails.note')</strong>@lang('eventdetails.pending_warning')
                <a href="{{route('ambassadors')}}">@lang('eventdetails.pending_link')</a>.
            </div>
        @endif

        <section>
            <img class="w-full h-auto lg:h-[520px] object-cover" src="{{$event->picture_detail_path()}}"/>
        </section>

        @canany(['edit', 'delete'], $event)
            <section class="relative z-10">
                <div class="relative z-10 pt-10 codeweek-container-lg flex justify-center">
                    <div class="flex gap-4 w-full max-w-[880px]">
                        @can('edit', $event)
                            <a
                              class="flex justify-center items-center gap-2 text-[#1C4DA1] border-solid border-2 border-[#1C4DA1] rounded-full py-2 px-6 font-semibold text-lg transition-all duration-300 hover:bg-[#E8EDF6] group"
                              href="{{route('edit_event',$event->id)}}"
                            >
                              <span>@lang('eventdetails.edit')</span>
                            </a>
                        @endcan

                        @can('delete', $event)
                            @if(Auth::check() && $event->creator_id === auth()->user()->id)
                                <a
                                  class="block bg-[#F95C22] rounded-full py-2 px-6 font-['Blinker'] hover:bg-hover-orange duration-300"
                                  href="{{route('delete_event',$event->id)}}"
                                >
                                  <span class="text-lg font-semibold text-black">
                                    @lang('base.delete')
                                  </span>
                                </a>
                            @endif
                        @endcan
                    </div>
            </section>
        @endcanany

        <event-detail
          :can-approve="{{ auth()->check() && auth()->user()->can('approve', $event) ? 'true' : 'false' }}"
          :can-edit="{{ auth()->check() && auth()->user()->can('edit', $event) ? 'true' : 'false' }}"
          :event="{{ $event }}"
          event-picture-url="{{ $event->picture_detail_path() }}"
          map-tile-url="https://api.mapbox.com/styles/v1/mapbox/streets-v11/tiles/{z}/{x}/{y}?access_token={{ config('codeweek.MAPS_MAPBOX_ACCESS_TOKEN') }}"

          from-text="{{ Carbon\Carbon::parse($event->start_date)->isoFormat('LLL') }}"
          to-text="{{ Carbon\Carbon::parse($event->end_date)->isoFormat('LLL') }}"
          last-update-text="{{ Carbon\Carbon::parse($event->updated_at)->isoFormat('LLL') }}"
          app-url="{{config('codeweek.app_url')}}"
          share-url="{{config('codeweek.app_url')}}{{$event->path()}}"
          event-path="{{ $event->path() }}"
          email-href="mailto:?subject=@lang('eventdetails.email.subject')&amp;body=@lang('eventdetails.email.body_1'){{ $event->title }}@lang('eventdetails.email.body_2'){{config('codeweek.app_url')}}{{$event->path()}}"
        ></event-detail>

        <section class="relative overflow-hidden pt-20 md:pt-48">
            <div
                    class="absolute w-full h-[800px] bg-yellow-50 md:hidden top-0"
                    style="clip-path: ellipse(270% 90% at 38% 90%)"
            ></div>
            <div
                    class="absolute w-full h-[800px] bg-yellow-50 hidden md:block top-0"
                    style="clip-path: ellipse(88% 90% at 50% 90%)"
            ></div>
            <div class="bg-yellow-50 pb-16 md:pb-28">
              <div class="codeweek-container-lg relative">
                  <h2 class="text-center text-dark-blue text-[22px] md:text-4xl leading-7 md:leading-[44px] font-medium font-['Montserrat'] mb-10">
                      Nearby upcoming events
                  </h2>
                  <div class="grid grid-cols-1 lg:grid-cols-2 xl:grid-cols-3 gap-6 xl:gap-10">
                      @foreach($event->getClosest() as $evt)
                          <event-card :event="{{$evt}}"></event-card>
                      @endforeach
                  </div>
              </div>
            </div>
        </section>
    </section>

@endsection

@push('scripts')

    <script>
      window.event_details = {!! json_encode($event->getJavascriptData()) !!};
      window.event_coordinates = event_details.geoposition.split(",");
    </script>
    <link href="{{asset('css/MarkerCluster.css')}}" media="screen" rel="stylesheet"/>
    <link href="{{asset('css/MarkerCluster.Default.css')}}" media="screen" rel="stylesheet"/>
@endpush

@push('extra-css')
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"
        integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin="" />
@endpush
@push('scripts')
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"
        integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>
@endpush

@push('scripts')
    <script>
      document.dispatchEvent(new CustomEvent('leaflet-ready'));
    </script>
@endpush
