@extends('layout.base')

@section('title', 'Find Coding Events Near You – EU Code Week')
@section('description', 'Search for coding events happening across Europe. Join workshops, hackathons, and coding activities for all skill levels.')

@push('scripts')
    <script defer src="{{asset('js/countriesGeoCentroids.js')}}" type="text/javascript"></script>
    <script defer src="//europa.eu/webtools/load.js" type="text/javascript"></script>
    <link href="{{asset('css/MarkerCluster.css')}}" media="screen" rel="stylesheet"/>
    <link href="{{asset('css/MarkerCluster.Default.css')}}" media="screen" rel="stylesheet"/>
    <script type="application/json">
        {
            "service" : "map
            "version" : "2.0",
            "renderTo" : "home-map",
            "custom": ["js/customSearchMap.js","js/leaflet.markercluster.js"]
        }
    </script>

{{--    <script src="https://t003c459d.emailsys2a.net/form/26/4245/574a0c9b7e/popup.js" async></script>--}}
@endpush

@section('content')

    {{--        {{dd($tag)}}--}}
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
            :prp-tag="'{{$tag}}'"

    >
    </search-page-component>

@endsection