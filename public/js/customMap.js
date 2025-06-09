L.custom = {
    init: function (obj, params) {

        window.map = L.map(obj, {
            center: [48, 4],
            zoom: 4,
            height: 450,
            maxZoom: 18,
            background: "osmec"
        });

        map.menu.remove("print");

        // Define one global marker cluster group
        var globalMarkersGroup = L.markerClusterGroup({
            showCoverageOnHover: false,
            maxClusterRadius: 120,
            chunkedLoading: true,
            iconCreateFunction: function (cluster) {
                var total = cluster.getAllChildMarkers().length;
                var iconSize;
                var className = "mycluster ";
                if (total <= 10) {
                    iconSize = L.point(30, 30);
                    className += "size1";
                } else if (total <= 100) {
                    iconSize = L.point(35, 35);
                    className += "size2";
                } else if (total <= 1000) {
                    iconSize = L.point(40, 40);
                    className += "size3";
                } else if (total <= 10000) {
                    iconSize = L.point(45, 45);
                    className += "size4";
                } else {
                    iconSize = L.point(50, 50);
                    className += "size5";
                }
                return L.divIcon({ html: '<div>' + total + '</div>', className: className, iconSize: iconSize });
            }
        });

        map.addLayer(globalMarkersGroup); // Add once

        // Marker click
        var markerOnClick = function (e) {
            var id = e.target.options.id;
            $.ajax({
                dataType: "json",
                url: "api/event/detail?id=" + id,
                success: function (res) {
                    var event = res.data;
                    var content = '<div><h4><a href="' + event.path + '" class="map-marker">' + event.title + '</a></h4><div style="display:flex;align-items: center;">' +
                        '<img src="' + event.picture + '" class="img-polaroid marker-buble-img" style="width:100px;height:100px;">' +
                        '<p style="overflow:hidden;">' + event.description + '</p>';

                    var popup = L.popup({ maxWidth: 600 })
                        .setContent(content);

                    e.target.bindPopup(popup).openPopup();
                }
            });
        };

        // Success callback
        var success = function (data) {

            // Clear existing markers first
            globalMarkersGroup.clearLayers();

            // Loop over countries and events
            $.each(data, function (countryCode, countryEvents) {
                $.each(countryEvents, function (key, val) {
                    var coordinates = val.geoposition.split(',');
                    var marker = L.marker(L.latLng(coordinates[0], coordinates[1]), {
                        id: val.id,
                        country: countryCode // store country on marker for filtering
                    });
                    marker.on('click', markerOnClick);
                    globalMarkersGroup.addLayer(marker);
                });
            });

            // Process next components
            $wt._queue("next");
        };

        // Country filter
        $('#id_country').on('change', function () {
            var selectedCountry = this.value;

            // Loop through all markers and toggle visibility
            globalMarkersGroup.eachLayer(function (marker) {
                if (!selectedCountry || selectedCountry === '') {
                    marker.setOpacity(1); // Show all
                } else if (marker.options.country === selectedCountry) {
                    marker.setOpacity(1); // Show matching
                } else {
                    marker.setOpacity(0); // Hide others
                }
            });
        });

        // Year filter
        $('#id_year').on('change', function () {
            getEvents(this.value);
        });

        // Get URL param
        function param(name) {
            return (location.search.split(name + '=')[1] || '').split('&')[0];
        }

        // AJAX fetch events
        function getEvents(year) {
            $.ajax({
                dataType: "json",
                url: "api/event/list?year=" + year,
                success: success
            });
        }

        // Initial load
        var year = param('year') ? param('year') : new Date().getFullYear();
        getEvents(year);
    }
};
