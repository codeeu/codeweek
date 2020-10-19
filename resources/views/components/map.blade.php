<div wire:loading>
    Loading Data...
</div>

<div
        id="testMap"
        class="w-full" style="height: 600px;"
        x-data
        x-init="leaflet"
        wire:ignore

></div>

<script type="text/javascript">

    function leaflet() {
        console.log("leaflet function init")
        mymap = L.map('testMap').setView([51.505, -0.09], 5);
        L.tileLayer('{{env('MAP_TILES')}}', {
            attribution: 'Map data',
            maxZoom: 18,
            id: 'mapbox/streets-v11',
            tileSize: 512,
            zoomOffset: -1,
            accessToken: 'pk.eyJ1IjoiYWxhaW52ZCIsImEiOiJja2c4NGJvd28wZG15MnBxb3pqdGJpMnFmIn0.4PZI2skT6BVtl9f5jRTnBQ'
        }).addTo(mymap);


        {{--        @if($markers)--}}
        {{--        @foreach($this->markers as $marker)--}}
        {{--        JSmarkers.addLayer(L.marker(L.latLng({{$marker['geoposition']}})));--}}
        {{--        @endforeach--}}
        {{--            @endif--}}
        {{--        mymap.addLayer(JSmarkers);--}}
        var JSmarkers = L.markerClusterGroup();

        Livewire.on('markersUpdated', events => {
            console.log('update Markers');

            JSmarkers.clearLayers();
            for (var key in events) {

                for (i = 0; i < events[key].length; i++) {

                    var coordinates = events[key][i].geoposition.split(","); //create an array containing lat and lng as strings
                    //console.log(coordinates);
                    coordinates[0] = parseFloat(coordinates[0]); //convert lat string to number
                    coordinates[1] = parseFloat(coordinates[1]); //convert lng string to number
                    JSmarkers.addLayer(L.marker(coordinates));
                }
            }
            ;
            // for (i = 0; i < events.length; i++) {
            //
            //     var coordinates = events[i].geoposition.split(","); //create an array containing lat and lng as strings
            //     console.log(coordinates);
            //     coordinates[0] = parseFloat(coordinates[0]); //convert lat string to number
            //     coordinates[1] = parseFloat(coordinates[1]); //convert lng string to number
            //     JSmarkers.addLayer(L.marker(coordinates));
            // }
            mymap.addLayer(JSmarkers);
        })


        // Livewire.on('updateMarkers', events => {
        //     console.log('update Markers');
        //
        //     JSmarkers.clearLayers();
        //     for (i = 0; i < events.length; i++) {
        //
        //         var coordinates = events[i].geoposition.split(","); //create an array containing lat and lng as strings
        //         // console.log(coordinates);
        //         coordinates[0] = parseFloat(coordinates[0]); //convert lat string to number
        //         coordinates[1] = parseFloat(coordinates[1]); //convert lng string to number
        //         JSmarkers.addLayer(L.marker(coordinates));
        //     }
        //     mymap.addLayer(JSmarkers);
        //
        // });
    }
</script>