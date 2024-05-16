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

    <script>
        document.addEventListener('livewire:init', () => {
            Livewire.on('load-data', (event) => {
                console.log('load-data received ... bzzz brrr bggg');
                console.log(event.year);
                window.getEvents(event.year)
            });
        });
    </script>



@endpush

@section('content')


    {{--        {{dd($tag)}}--}}
    {{--    {{dd($active_countries)}}--}}

    <div class="home-map">
        <div class="add-button">
            <a class="codeweek-action-link-button"
               href="/add">{{__('menu.add_event')}}</a>
        </div>
        <div class="landing-wrapper">
            <div class="events-map-wrapper">
                <div id="home-map"></div>
            </div>
        </div>
    </div>

    <livewire:activity-map />

{{--    <div class="home-map">--}}
{{--        <div class="add-button">--}}
{{--            <a class="codeweek-action-link-button"--}}
{{--               href="/add">{{__('menu.add_event')}}</a>--}}
{{--        </div>--}}
{{--        <div class="landing-wrapper">--}}
{{--            <div class="events-map-wrapper">--}}
{{--                <div id="home-map"></div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}

{{--    <search-page-component
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
    </search-page-component>--}}

@endsection