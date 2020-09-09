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

        <div id="map-code-hunting-game" style="height: 800px;"></div>

    </section>

@endsection

@push('scripts')

    <script src="https://unpkg.com/leaflet@1.6.0/dist/leaflet.js"
            integrity="sha512-gZwIG9x3wUXg2hdXF6+rVkLF/0Vi9U8D2Ntg4Ga5I5BZpVkVxlJWbSQtXPSiUTtC0TjtGOmxa1AJPuV0CPthew=="
            crossorigin=""></script>

    <script src="js/code-hunting/qrcode.min.js"></script>

    <script src="js/code-hunting/points.js"></script>
    <script src="js/code-hunting/europe_polygon.js"></script>

    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.6.0/dist/leaflet.css"
          integrity="sha512-xwE/Az9zrjBIphAcBb3F6JVqxf46+CDLwfLMHloNu6KEQCAWi6HcDUbeOfBIptF7tcCzusKFjFw2yuvEpDL9wQ=="
          crossorigin=""/>

    <script>


        const map = L.map('map-code-hunting-game').setView([50, -0.09], 4);

        const getRandomLatLng =  (polygon) => {
            const bounds = polygon.getBounds(),
                southWest = bounds.getSouthWest(),
                northEast = bounds.getNorthEast(),
                lngSpan = northEast.lng - southWest.lng,
                latSpan = northEast.lat - southWest.lat;

            return new L.LatLng(
                southWest.lat + latSpan * Math.random(),
                southWest.lng + lngSpan * Math.random());
        }


        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
        }).addTo(map);


        L.tileLayer('https://stamen-tiles-{s}.a.ssl.fastly.net/toner-labels/{z}/{x}/{y}{r}.{ext}', {
            attribution: 'Map tiles by <a href="http://stamen.com">Stamen Design</a>, <a href="http://creativecommons.org/licenses/by/3.0">CC BY 3.0</a> &mdash; Map data &copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors',
            subdomains: 'abcd',
            minZoom: 0,
            maxZoom: 20,
            ext: 'png'
        }).addTo(map);


        const polygon = L.polygon(europe_polygon);

        const robotIcon = L.icon({
            iconUrl: 'images/robot-orange.png',
            iconSize:     [32, 32], // size of the icon
            iconAnchor:   [16, 16], // point of the icon which will correspond to marker's location
            popupAnchor:  [0, -10] // point from which the popup should open relative to the iconAnchor
        });
        codeHuntingPoints.forEach(point=>{
            const coordinates = point.coordinates.split(",");
            const image = point.image ? "images/code-hunting-game/" + point.image : "https://codeweek-s3.s3.amazonaws.com/event_picture/logo_gs_2016_07703ca0-7e5e-4cab-affb-4de93e3f2497.png";
            let card =
                "<div class='codeweek-code-hunting-map-card'>" +
                    "<div class='left'>" +
                        "<img src='" + image + "'>" +
                        "<div class='links'>" +
                            "<div class='link'><a class='codeweek-button' href='" + point.link_wikipedia + "' target='_blank'>WIKIPEDIA</a></div>" +
                            "<div class='link'><a class='codeweek-button' href='" + point.link_more + "' target='_blank'>READ MORE</a></div>" +
                        "</div>" +
                    "</div>" +
                    "<div class='center'>" +
                        "<div class='title'>" + point.title + '</div>' +
                        "<div class='description'>" + point.description + '</div>' +
                    "</div>" +
                    "<div class='qrcode' id='qrcode-hunting-game'></div>" +
                "</div>";
            const marker = L.marker(coordinates, {icon: robotIcon}).addTo(map)
                .bindPopup(card,{
                    maxWidth: 600,
                    minWidth: 300
                });
            const randomCoordinate = getRandomLatLng(polygon);
            L.marker(randomCoordinate, {icon: robotIcon}).addTo(map)
                .bindPopup("No event here! Sorry...");

            marker.on('popupopen', () => {
                setTimeout(()=> {
                    const url_hunt_game = 'https://t.me/treasurehuntbot?start=' + point.hunt_code;
                    new QRCode(document.getElementById("qrcode-hunting-game"), url_hunt_game);
                }, 200);
            });
        });


    </script>

@endpush
