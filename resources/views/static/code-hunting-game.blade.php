@extends('layout.base')

@section('title', 'Code Hunting Game – Solve Clues with Coding')
@section('description', 'Join an exciting code-hunting adventure, solving clues and completing coding challenges.')

@section('content')

    <section id="codeweek-code-hunting-game-page" class="codeweek-page">

        <section class="codeweek-banner about">
            <div class="text">
                <h2>#EUCodeWeek</h2>
                <h1>Code Hunting Game</h1>
                    <h4>
                        <div>
                            <span style="">Scan this QR Code to start the game:</span>
                            <a href="https://t.me/treasurehuntbot?start=codeweek2020"><img style="vertical-align:middle" width="100" src="https://codeweek-s3.s3-eu-west-1.amazonaws.com/img/qrcode-codeweek-2020.png"></a>
                        </div>
                </h4>
            </div>
            <div class="image">
                <img src="/images/banner_about.svg" class="static-image">
            </div>
        </section>

        <div id="map-code-hunting-game" style="height: 800px;"></div>



    </section>

@endsection

@push('scripts')



        <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" integrity="sha512-xodZBNTC5n17Xt2atTPuE1HxjVMSvLVW9ocqUKLsCC5CXdbqCmblAshOMAS6/keqq/sMZMZ19scR4PsZChSR7A==" crossorigin=""/>
        <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js" integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA==" crossorigin=""></script>


    <script src="js/code-hunting/qrcode.min.js"></script>

    <script src="js/code-hunting/points.js"></script>
    <script src="js/code-hunting/europe_polygon.js"></script>


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
            const url_hunt_game = 'https://t.me/treasurehuntbot?start=' + point.hunt_code;
            let card =
                "<div class='codeweek-code-hunting-map-card'>" +
                    "<div class='left'>" +
                        "<img src='" + image + "'>" +
                        "<div class='links'>" +
                            "<div class='link'><a class='codeweek-button' href='" + point.link_wikipedia + "' target='_blank'>WIKIPEDIA</a></div>";

            if (point.link_more) {
                card = card + "<div class='link'><a class='codeweek-button' href='" + point.link_more + "' target='_blank'>READ MORE</a></div>";
            }
                            card = card +
                        "</div>" +
                    "</div>" +
                    "<div class='center'>" +
                        "<div class='title'>" + point.title + '</div>' +
                        "<div class='description'>" + point.description + '</div>' +
                    "</div>" +
                    "<a class='qrcode-link' target='_blank' href='" + url_hunt_game + "'><div class='qrcode' id='qrcode-hunting-game'></div></a>" +
                "</div>";
            const marker = L.marker(coordinates, {icon: robotIcon}).addTo(map)
                .bindPopup(card,{
                    maxWidth: 600,
                    minWidth: 300
                });
            marker.on('popupopen', () => {
                setTimeout(()=> {
                    new QRCode(document.getElementById("qrcode-hunting-game"), url_hunt_game);
                }, 200);
            });

            /*Create the random point*/
            const randomCoordinate = getRandomLatLng(polygon);
            L.marker(randomCoordinate, {icon: robotIcon}).addTo(map)
                .bindPopup("No event here! Sorry...");

        });


    </script>

@endpush
