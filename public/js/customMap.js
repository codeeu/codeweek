L.custom = {
    init: function(obj, params){ // this method is run as soon as the core loading process is loaded

        window.map = L.map(obj, {
            center: [48, 4],
            zoom: 4,
            height: 450,
            background: "osmec"
        });

        var success = function (data) {
            /*var featureCollection = {
                type: 'FeatureCollection',
                features: data
            }

            map.markers.add( featureCollection );*/

            /*var markers = L.markerClusterGroup({
                showCoverageOnHover: false
                /!*iconCreateFunction: function(cluster) {
                    return L.divIcon({ html: '<b>' + cluster.getChildCount() + '</b>' });
                }*!/
            });
            var markerList = [];

            for (var i = 0; i < data.length; i++) {
                /!*var marker = L.marker(L.latLng(data[i].geometry.coordinates[1], data[i].geometry.coordinates[0]), { title: data[i].properties.name });
                marker.bindPopup(data[i].properties.name);*!/

                var coordinates = data[i].geoposition.split(',');
                var marker = L.marker(L.latLng(coordinates[0],coordinates[1]), { title: data[i].id });
                marker.bindPopup(data[i].id);

                markerList.push(marker)
            }

            markers.addLayers(markerList);
            map.addLayer(markers);*/


            var layers = [];
            $.each(data, function (key, country) {
                var markersListPerCountry = [];
                $.each(country, function (key, val) {
                    var coordinates = val.geoposition.split(',');
                    var marker = L.marker(L.latLng(coordinates[0], coordinates[1]), {title: val.id});
                    marker.bindPopup(val.id);
                    markersListPerCountry.push(marker);
                });
                var markers = L.markerClusterGroup({showCoverageOnHover: false, maxClusterRadius: 120});
                markers.addLayers(markersListPerCountry);
                layers.push(markers);
            });

            map.addLayer(L.layerGroup(layers));

            // process next components
            $wt._queue("next");
        }
        $.ajax({
            dataType: "json",
            url: "api/event/list?year=2018",
            success: success
        });

        /*L.esri.Cluster.featureLayer({
            url: 'http://codeweek.test/api/event/list?year=2018'
        }).addTo(map);*/

        $wt._queue("next");

    }
}