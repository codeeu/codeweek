L.custom = {
    init: function (obj, params) {

        console.log('🚀 Initializing custom map...');

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

            // Detect correct format
            var countryData = Array.isArray(data) && data.length > 1 ? data[1] : data;

            console.log('🌍 Detected countries:', Object.keys(countryData));

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
                            .setContent(content)

                        e.target.bindPopup(popup).openPopup();
                    }
                });
            }

            // Clear old layers
            if (markersCountryLayers.length > 0) {
                console.log(`♻️ Clearing ${markersCountryLayers.length} old marker layers...`);
                $.each(markersCountryLayers, function (key, countryLayer) {
                    countryLayer.clearLayers();
                    map.removeLayer(countryLayer);
                });
                markersCountryLayers = [];
            }

            // Build single master cluster
            var allMarkers = [];
            var totalEvents = 0;
            var missingGeo = 0;

            $.each(countryData, function (countryCode, countryEvents) {
                console.log(`→ Processing country: ${countryCode} with ${countryEvents.length} events`);
                totalEvents += countryEvents.length;

                $.each(countryEvents, function (idx, val) {
                    if (val.geoposition) {
                        var coordinates = val.geoposition.split(',');
                        var lat = parseFloat(coordinates[0]);
                        var lng = parseFloat(coordinates[1]);

                        if (!isNaN(lat) && !isNaN(lng)) {
                            var marker = L.marker(L.latLng(lat, lng), { id: val.id });
                            marker.on('click', markerOnClick);
                            allMarkers.push(marker);
                        } else {
                            console.warn(`⚠️ Invalid geoposition for event ID ${val.id} in ${countryCode}:`, val.geoposition);
                            missingGeo++;
                        }
                    } else {
                        console.warn(`⚠️ Missing geoposition for event ID ${val.id} in ${countryCode}`);
                        missingGeo++;
                    }
                });
            });

            console.log(`✅ Total events processed: ${totalEvents}`);
            console.log(`✅ Total valid markers: ${allMarkers.length}`);
            console.log(`⚠️ Total events missing/invalid geoposition: ${missingGeo}`);

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

            console.log('🗺️ Master cluster added to map.');
            console.log('➡️ Triggering next components...');
            $wt._queue("next");
        };

        $('#id_year').on('change', function () {
            getEvents(this.value);
        });

        function param(name) {
            return (location.search.split(name + '=')[1] || '').split('&')[0];
        }

        function getEvents(year) {
            console.log(`📡 Fetching events for year: ${year}...`);
            $.ajax({
                dataType: "json",
                url: "api/event/list?year=" + year,
                success: success
            });
        }

        var year = param('year') ? param('year') : new Date().getFullYear();
        console.log(`🎯 Initial map year = ${year}`);
        getEvents(year);
    }
};
