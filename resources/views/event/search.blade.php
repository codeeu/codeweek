@extends('layout.base')

@push('scripts')
    <script defer src="//europa.eu/webtools/load.js" type="text/javascript"></script>
    <link href="{{asset('css/MarkerCluster.css')}}" media="screen" rel="stylesheet" />
    <link href="{{asset('css/MarkerCluster.Default.css')}}" media="screen" rel="stylesheet" />
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

    <search-page-component
            :countrieslist="{{ $countries }}"
            :audienceslist="{{$audiences}}"
            :themeslist="{{$themes}}">
    </search-page-component>

@endsection