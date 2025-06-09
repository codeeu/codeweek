L.custom = {
    init: function(obj, params){ // this method is run as soon as the core loading process is loaded

        window.map = L.map(obj, {
            center: [51, 4],
            zoom: 4,
            height: 450,
            background: "osmec",
            maxZoom: 18
        });

        map.menu.remove("print");

        var markersCountryLayers = [];

        var success = function (data) {

            var markerOnClick = function(e){
                var id = e.target.options.id;
                $.ajax({
                    dataType: "json",
                    url: "api/event/detail?id=" + id,
                    success: function (res) {
                        var event = res.data;

                        var content = '<div><h4><a href="' + event.path + '" class="map-marker">' + event.title + '</a></h4><div style="display:flex;align-items: center;">' +
                            '<img src="' + event.picture + '" class="img-polaroid marker-buble-img" style="width:100px;height:100px;">' +
                            '<p style="overflow:hidden;">' + event.description + '</p>';

                        var popup = L.popup({maxWidth:600})
                            .setContent(content)

                        e.target.bindPopup(popup).openPopup();
                    }
                });
            }

            if (markersCountryLayers.length > 0){
                $.each(markersCountryLayers, function (key, countryLayer) {
                    countryLayer.clearLayers();
                })
                markersCountryLayers = [];
            }
            $.each(data, function (key, country) {
                var markersListPerCountry = [];
                $.each(country, function (key, val) {
                    var coordinates = val.geoposition.split(',');
                    var marker = L.marker(L.latLng(coordinates[0], coordinates[1]), {id: val.id});
                    marker.on('click', markerOnClick);
                    markersListPerCountry.push(marker);
                });
                var markers = L.markerClusterGroup({
                    showCoverageOnHover: false,
                    maxClusterRadius: 120,
                    chunkedLoading: true,
                    maxZoom: 18,
                    iconCreateFunction: function(cluster) {
                        var total = cluster.getAllChildMarkers().length;
                        var iconSize;
                        var className = "mycluster ";
                        if (total<= 10){
                            iconSize = L.point(30, 30);
                            className += "size1";
                        }else if(total <=100){
                            iconSize = L.point(35, 35);
                            className += "size2";
                        }else if(total <= 1000) {
                            iconSize = L.point(40, 40);
                            className += "size3";
                        }else if(total <= 10000) {
                            iconSize = L.point(45, 45);
                            className += "size4";
                        }else {
                            iconSize = L.point(50, 50);
                            className += "size5";
                        }
                        return L.divIcon({ html: '<div>'+total+'</div>', className: className, iconSize: iconSize });
                    }
                });
                markers.addLayers(markersListPerCountry);
                markersCountryLayers.push(markers);
                map.addLayer(markers);
            });

            // process next components
            $wt._queue("next");
        }

        $('#id_year').on('change', function () {
            //window.location = window.App.url + '/events?year=' + this.value;
            getEvents(this.value);
        });

        function param(name) {
            return (location.search.split(name + '=')[1] || '').split('&')[0];
        }

        if (window.eventsToMap){
            success(window.eventsToMap);
            window.eventsToMap = undefined;
        }

        window.getEvents = success;

        window.centralizeMap = function(country_iso){
            if (map) {
                let centerInfo = {
                    latitude: 51,
                    longitude: 4,
                    zoom: 4
                };
                if (country_iso) {
                    const countryInfo = centroids.find(ctrds => ctrds.iso === country_iso);
                    console.log("COUNTRY_INFO="+countryInfo);
                    if (countryInfo){
                        centerInfo = countryInfo;
                    }
                }
                const latlng = new L.LatLng(centerInfo.latitude, centerInfo.longitude);
                map.setView(latlng, centerInfo.zoom, {animation: true});
            }
        };

        if (window.countrySelected) {
            window.centralizeMap(window.countrySelected);
        }

        /*function getEvents(year) {
            $.ajax({
                dataType: "json",
                url: "api/event/list?year="+ year,
                success: success
            });
        }*/

        //var year = param('year') ? param('year') : 2019;
        //getEvents(year);


    }
}