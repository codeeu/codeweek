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

        var markersCountryLayers = [];

        var success = function (data) {

            console.log('🔥 Full API response:', data);

            // SAFELY get the correct countries object
            var countryData = Array.isArray(data) && data.length > 1 ? data[1] : data;

            console.log('✅ Using countryData:', countryData);

            // Clear old layers
            if (markersCountryLayers.length > 0) {
                $.each(markersCountryLayers, function (key, countryLayer) {
                    countryLayer.clearLayers();
                    map.removeLayer(countryLayer);
                });
                markersCountryLayers = [];
            }

            // NEW: Build master cluster
            var allMarkers = [];

            $.each(countryData, function (countryIso, events) {
                $.each(events, function (idx, event) {
                    if (event.geoposition) {
                        var coordinates = event.geoposition.split(',');
                        var lat = parseFloat(coordinates[0]);
                        var lng = parseFloat(coordinates[1]);

                        if (!isNaN(lat) && !isNaN(lng)) {
                            var marker = L.marker(L.latLng(lat, lng), { id: event.id });
                            marker.on('click', function (e) {
                                var id = e.target.options.id;
                                $.ajax({
                                    dataType: "json",
                                    url: "api/event/detail?id=" + id,
                                    success: function (res) {
                                        var ev = res.data;
                                        var content = '<div><h4><a href="' + ev.path + '" class="map-marker">' + ev.title + '</a></h4>' +
                                            '<div style="display:flex;align-items: center;">' +
                                            '<img src="' + ev.picture + '" class="img-polaroid marker-buble-img" style="width:100px;height:100px;">' +
                                            '<p style="overflow:hidden;">' + ev.description + '</p></div>';

                                        var popup = L.popup({ maxWidth: 600 }).setContent(content);
                                        e.target.bindPopup(popup).openPopup();
                                    }
                                });
                            });
                            allMarkers.push(marker);
                        }
                    }
                });
            });

            var masterCluster = L.markerClusterGroup({
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

            masterCluster.addLayers(allMarkers);
            markersCountryLayers.push(masterCluster);
            map.addLayer(masterCluster);

            console.log('✅ Markers added:', allMarkers.length);

            $wt._queue("next");
        };

        $('#id_year').on('change', function () {
            getEvents(this.value);
        });

        function param(name) {
            return (location.search.split(name + '=')[1] || '').split('&')[0];
        }

        function getEvents(year) {
            $.ajax({
                dataType: "json",
                url: "api/event/list?year=" + year,
                success: success
            });
        }

        var year = param('year') ? param('year') : new Date().getFullYear();
        getEvents(year);
    }
};
