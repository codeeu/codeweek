@extends('layout.new_base')

@section('title', 'Find Coding Events Near You – EU Code Week')
@section('description', 'Search for coding events happening across Europe. Join workshops, hackathons, and coding activities for all skill levels.')

@push('scripts')
    <script defer src="{{asset('js/countriesGeoCentroids.js')}}" type="text/javascript"></script>
    <script defer src="//europa.eu/webtools/load.js" type="text/javascript"></script>
    <link href="{{asset('css/MarkerCluster.css')}}" media="screen" rel="stylesheet"/>
    <link href="{{asset('css/MarkerCluster.Default.css')}}" media="screen" rel="stylesheet"/>
    <script type="application/json">
        {
            "service" : "map",
            "version" : "2.0",
            "renderTo" : "home-map",
            "custom": ["js/customSearchMap.js","js/leaflet.markercluster.js"]
        }


    </script>

{{--    <script src="https://t003c459d.emailsys2a.net/form/26/4245/574a0c9b7e/popup.js" async></script>--}}
@endpush

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
    <section id="codeweek-resources-page">
        <search-page-component
            :prp-query="'{{$query}}'"
            :prp-selected-country="{{json_encode($selected_country)}}"
            :countrieslist="{{$active_countries->values()}}"
            :languages-object="{{ json_encode($languages) }}"
            :audienceslist="{{$audiences}}"
            :themeslist="{{$themes}}"
            :typeslist="{{$activity_types}}"
            map-tile-url="https://api.mapbox.com/styles/v1/mapbox/streets-v11/tiles/{z}/{x}/{y}?access_token={{ config('codeweek.MAPS_MAPBOX_ACCESS_TOKEN') }}"
        >
        </search-page-component>
    </section>
@endsection

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
