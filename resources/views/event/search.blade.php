@extends('layout.base')

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
@endpush

@section('content')

    {{--    {{dd($countries)}}--}}
    {{--    {{dd($active_countries)}}--}}

    <search-page-component
            :prp-years={{json_encode($years)}}
                    :prp-query="'{{$query}}'"
            :prp-selected-country="{{json_encode($selected_country)}}"
            :prp-selected-year="{{$selected_year}}"
            :countrieslist="{{$active_countries->values()}}"
            :audienceslist="{{$audiences}}"
            :themeslist="{{$themes}}"
            :typeslist="{{$activity_types}}"

    >
    </search-page-component>

@endsection