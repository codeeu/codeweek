@extends('layout.base')

@section('content')

    <section id="codeweek-code-hunting-game-page" class="codeweek-page">

        <section class="codeweek-banner about">
            <div class="text">
                <h2>#CodeWeek</h2>
                <h1>Code Hunting Game</h1>
            </div>
            <div class="image">
                <img src="/images/banner_about.svg" class="static-image">
            </div>
        </section>

        <div id="map-code-hunting-game" style="height: 500px;"></div>

    </section>

@endsection

@push('scripts')

    <script src="https://unpkg.com/leaflet@1.6.0/dist/leaflet.js"
            integrity="sha512-gZwIG9x3wUXg2hdXF6+rVkLF/0Vi9U8D2Ntg4Ga5I5BZpVkVxlJWbSQtXPSiUTtC0TjtGOmxa1AJPuV0CPthew=="
            crossorigin=""></script>
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.6.0/dist/leaflet.css"
          integrity="sha512-xwE/Az9zrjBIphAcBb3F6JVqxf46+CDLwfLMHloNu6KEQCAWi6HcDUbeOfBIptF7tcCzusKFjFw2yuvEpDL9wQ=="
          crossorigin=""/>

    <script>
        var map = L.map('map-code-hunting-game').setView([50, -0.09], 4);

        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
        }).addTo(map);

        /*L.tileLayer('https://tiles.stadiamaps.com/tiles/osm_bright/{z}/{x}/{y}{r}.png', {
            maxZoom: 20,
            attribution: '&copy; <a href="https://stadiamaps.com/">Stadia Maps</a>, &copy; <a href="https://openmaptiles.org/">OpenMapTiles</a> &copy; <a href="http://openstreetmap.org">OpenStreetMap</a> contributors'
        }).addTo(map);*/

        /*L.tileLayer('https://maps.wikimedia.org/osm-intl/{z}/{x}/{y}{r}.png', {
            attribution: '<a href="https://wikimediafoundation.org/wiki/Maps_Terms_of_Use">Wikimedia</a>',
            minZoom: 1,
            maxZoom: 19
        }).addTo(map);*/

        L.tileLayer('https://stamen-tiles-{s}.a.ssl.fastly.net/toner-labels/{z}/{x}/{y}{r}.{ext}', {
            attribution: 'Map tiles by <a href="http://stamen.com">Stamen Design</a>, <a href="http://creativecommons.org/licenses/by/3.0">CC BY 3.0</a> &mdash; Map data &copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors',
            subdomains: 'abcd',
            minZoom: 0,
            maxZoom: 20,
            ext: 'png'
        }).addTo(map);

        /*Add markers*/
        const points = [
            {coords: [48.208174, 16.373819], title: "Printed Circuit Board PCB"},
            {coords: [42.675200, 23.368513], title: "The first Bulgarian computer " },
            {coords:[42.076742, 24.595522], title: "The digital wristwatch" },
            {coords:[42.701969, 23.333139], title: "The Matrix" },
            {coords:[35.865211, 23.304262], title: "Antikythera mechanism" },
            {coords:[40.166667, 22.483333], title: "Hydraulic organ" },
            {coords:[35.299363, 25.161591], title: "The first humanoid robot in history" },
            {coords:[47.503905, 19.054843], title: "PRINT 'BASIC man' - John G. Kemeny" },
            {coords:[47.506446, 19.054792], title: "John von Neumann" },
            {coords:[45.5502005,11.4808746], title: "MOS silicon gate technology and Faggin" },
            {coords:[38.9060833,16.5920004], title: "Jacquard  loom . precursor of the computer" },
            {coords:[45.6333333,13.797806], title: "Pioneer of computer graphics art" },
            {coords:[46.0320829,14.5277774], title: "Student project Flash game turned Nintendo hit" },
            {coords:[44.8149028,20.1424149], title: "Co-creator of Net.art, the first internet-native art movement" },
            {coords:[46.1859889,14.5933754], title: "Inventor of first pocket calculator and rfid cards" },
            {coords:[46.066912,14.5391733], title: "The most downloaded smartphone games of all time" },
            {coords:[46.0423559,14.4856699], title: "First 16-bit computer in Yugoslavia" },
            {coords:[45.9558333,13.6411393], title: "Technology company that taught China computer networking" },
            {coords:[46.0631224,14.5557518], title: "First global bittorrent tracker" },
            {coords:[46.233333, 14.366667], title: "First European Bitcoin exchange" },
            {coords:[59.339926, 18.054796], title: "First Swedish Computer" },
            {coords:[47.372684, 8.530828], title: "Doodle scheduling invented by Michael Näf and Paul E. Sevinç (2007)" }
        ]
        const treasureIcon = L.icon({
            iconUrl: 'images/treasure-icon.png',
            iconSize:     [48, 48], // size of the icon
            iconAnchor:   [48, 48], // point of the icon which will correspond to marker's location
            popupAnchor:  [-3, -76] // point from which the popup should open relative to the iconAnchor
        });
        points.forEach(point=>{
            L.marker(point.coords, {icon: treasureIcon}).addTo(map)
                .bindPopup(point.title);
        })

    </script>

@endpush
