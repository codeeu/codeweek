<section class="home-map">
    <div class="landing-wrapper" style="position: relative;height: 450px;">
        <div class="events-map-wrapper" style="position: absolute;width: 100%;height: 450px;">
            <div id="home-map"></div>
        </div>
    </div>
    <div id="past-events">
        @lang('event.show_events_for')
        <select id="id_year" name="year">
            @foreach($years as $year)
                <option value="{{$year}}" {{ ($year==$selectedYear)?'selected':''}}>{{$year}}</option>
            @endforeach
        </select>
    </div>
</section>

@push('scripts')
    <script defer src="//europa.eu/webtools/load.js" type="text/javascript"></script>
    <link href="{{asset('css/MarkerCluster.css')}}" media="screen" rel="stylesheet" />
    <link href="{{asset('css/MarkerCluster.Default.css')}}" media="screen" rel="stylesheet" />
    <script type="application/json">
        {
            "service" : "map",
            "version" : "2.0",
            "renderTo" : "home-map",
            "custom": ["js/customMap.js","js/leaflet.markercluster.js"]
        }
    </script>
@endpush