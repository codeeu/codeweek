<div
        id="testMap"
        class="w-full" style="height: 600px;"
        wire:ignore
        x-data
        x-init="leaflet()"

></div>

<script type="text/javascript">
    function leaflet(){
        mymap = L.map('testMap').setView([51.505, -0.09], 5);
        L.tileLayer('{{env('MAP_TILES')}}', {
            attribution: 'Map data',
            maxZoom: 18,
            id: 'mapbox/streets-v11',
            tileSize: 512,
            zoomOffset: -1,
            accessToken: 'pk.eyJ1IjoiYWxhaW52ZCIsImEiOiJja2c4NGJvd28wZG15MnBxb3pqdGJpMnFmIn0.4PZI2skT6BVtl9f5jRTnBQ'
        }).addTo(mymap);

        Livewire.on('testEvent', event => {
            mymap.setView([48,4], 10);
        });
    }
</script>